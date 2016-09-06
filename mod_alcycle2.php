<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_alcycle2
 *
 * @copyright   Copyright (C) 2016 Daniel Vila, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Restricted access');

require_once dirname(__FILE__).'/helper.php';
$layout = $params->get('layout', 'default');
$efecto = $params->get('efecto', 'flipHorz');
$timeout = $params->get('timeout', 1000);
if (!$params->get('play')) {
    $timeout=0;
}
$reverse = $params->get('reverse', 'false');
$rows = $params->get('rows', 0);

$fluid = $params->get('fluid', 1);
$visible = $params->get('visible', 0);

$pager = $params->get('pager', 0);
$count = $params->get('count', 7);
$vertical = $params->get('vertical', 1);
$count2 = $params->get('count2', 7);
$vertical2 = $params->get('vertical2', 1);
$numdiap = $params->get('numdiap', 0);
$efecnumdiap = $params->get('efecnumdiap', 'fade');
$caption = $params->get('showtext');
$efecoverlay = $params->get('efecoverlay', 'fade');


if (!is_null ($params->get('imagefolder')) && $params->get('imagefolder') !='true') {
	$sliders = modAlcycle2Helper::getImagesFromFolder($params);
}else {
	$sliders = modAlcycle2Helper::getModulo($params);
}

modAlcycle2Helper::getCssJs($efecto, $caption);

require( JModuleHelper::getLayoutPath( 'mod_alcycle2',$layout) );

$linkautor = $params->get('linkautor', 1);
if ($linkautor) {
	echo'<div style="font-size:9px"><a href="http://www.isipma.com" title="Power by isipma.com" target="_blank">Power by isipma.com</a></div>';
}
