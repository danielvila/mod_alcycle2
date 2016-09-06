<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_alcycle2
 *
 * @copyright   Copyright (C) 2016 Daniel Vila, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
abstract class modAlcycle2Helper
{
	public static function getCssJs($efecto, $caption){
		$alefectos = array('carousel'=>'carousel','flipHorz'=>'flip', 'flipVert'=>'flip', 'tileBlind'=>'tile', 'tileSlide'=>'tile',
						   'scrollHorz'=>'scrollVert', 'scrollVert'=>'scrollVert', 'shuffle'=>'shuffle');
		JHtml::stylesheet('mod_alcycle2/cycle2.min.css', array(), true);
		JHtml::script('mod_alcycle2/jquery.cycle2.min.js', false, true);
		JHtml::script('mod_alcycle2/jquery.cycle2.'.$alefectos[$efecto].'.min.js', false, true);
		if ($caption) {
			JHtml::script('mod_alcycle2/jquery.cycle2.caption2.min.js', false, true);
		}
	}
	public static function getModulo(&$params){
		$html='';
		$filter=array('.jpg', '.jpeg', '.png','.gif');
		for($i=1;$i<11;$i++){
			if($params->get("img".$i)!=''){
				$image = $params->get("img".$i);
				$name = explode('/',$image);
				$name = end($name);

				$titleimg = $params->get("titleimg".$i,'');
				$descimg = $params->get("descimg".$i,'');
				$file = JPath::clean(JPATH_ROOT.'/'.$image);
				jimport('joomla.filesystem.file');
				if (JFile::exists($file)) {
					$properties = JImage::getImageFileProperties($file);
					$slides[] = (object) array('image'=>$image,
						'alt'=>str_replace($filter,'', $name),
						'width'=>$properties->width,
						'height'=>$properties->height,
						'titleimg'=>$titleimg,
						'descimg'=>$descimg);
				}
			}
		}
		return $slides;
	}
	public static function getImagesFromFolder(&$params){
    	jimport( 'joomla.filesystem.folder' );
    	if(!is_numeric($max = $params->get('nummax'))) $max = 20;
        $folder ='images/'. $params->get('imagefolder');
		$exclude = array('.db', '.svn', 'CVS', '.DS_Store', '__MACOSX','index.html','.txt');
		$files= JFolder::files( $folder,'.',false,false,$exclude);

		shuffle($files);

		$images = array_slice($files, 0, $max);
		sort($images);
		$filter=array('.jpg', '.jpeg', '.png','.gif');
		foreach($images as $image) {
			$file = JPath::clean(JPATH_ROOT.'/'.$folder.'/'.$image);
			$properties = JImage::getImageFileProperties($file);
			$slides[] = (object) array('image'=> JURI::base() . $folder.'/'.$image,
				'alt'=>str_replace($filter,'', $image),
				'width'=>$properties->width,
				'height'=>$properties->height);
		}
		return $slides;
    }
}