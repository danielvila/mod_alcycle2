<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_alcycle2
 *
 * @copyright   Copyright (C) 2016 Daniel Vila, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Restricted access');

echo'<img src="'.$imagenes->image .'" alt="'.$imagenes->alt .'"
        width="'.$imagenes->width .'" height="'.$imagenes->height .'"';
    if (!empty($imagenes->titleimg)) {
        echo'data-cycle-title="<h3>'.$imagenes->titleimg.'</h3>"';
    }
    if (!empty($imagenes->descimg)) {
        echo'data-cycle-desc="'.$imagenes->descimg.'"';
    }
echo' />';
?>
