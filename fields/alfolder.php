<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_alcycle2
 *
 * @copyright   Copyright (C) 2016 Daniel Vila, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted index access');

jimport('joomla.form.formfield');
jimport('joomla.filesystem.folder');
class JFormFieldALFolder extends JFormField
{
	public $type = 'ALFolder';

	protected function getInput()
	{
		$html 		= '';
		$options 	= array();
		$base 		= JPATH_ROOT.DIRECTORY_SEPARATOR.'images';

		$attr 		= '';
		$attr 		.= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';

		if ((string) $this->element['readonly'] == 'true' || (string) $this->element['disabled'] == 'true')
		{
			$attr .= ' disabled="disabled"';
		}

		$attr .= $this->element['size'] ? ' size="'.(int) $this->element['size'].'"' : '';
		$attr .= $this->multiple ? ' multiple="multiple"' : '';

		$attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';

		$options[] 	= JHTML::_('select.option', '', JText::_('Seleccionar Folder'));
		$folders   	= JFolder::folders($base, '.', true, true);
		foreach ($folders as $folder)
		{
			$folder 	= str_replace($base, '', $folder);
			$value		= str_replace(DIRECTORY_SEPARATOR, '/', substr($folder, 1));
			$text	 	= str_replace(DIRECTORY_SEPARATOR, '/', $folder);
			$options[] 	= JHTML::_('select.option', $value, $text);
		}
		if (is_array($options))
		{
			sort($options);
		}

		$html = JHtml::_('select.genericlist', $options, $this->name, trim($attr), 'value', 'text', $this->value, $this->id);

		return $html;
	}

}
