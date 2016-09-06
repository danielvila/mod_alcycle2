<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_alcycle2
 *
 * @copyright   Copyright (C) 2016 Daniel Vila, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Restricted access');
 if ($efecto=='carousel') {$class='carousel';}
?>
<div class="cycle2 slide<?php echo $module->id; ?>">
	<div class="cycle-slideshow <?php echo $class;?>" data-cycle-fx="<?php echo $efecto;?>" data-cycle-timeout="<?php echo $timeout;?>"
            <?php
            if ($visible > 0 && $efecto=='carousel') {echo 'data-cycle-carousel-visible="'.$visible.'" ';}
            if ($fluid && $efecto=='carousel') {echo 'data-cycle-carousel-fluid="true" ';}
            if ($efecto=='shuffle' && $reverse) {echo 'data-cycle-reverse="'.$reverse.'" ';}
            if ($count > 7 && $efecto=='tileBlind') {echo 'data-cycle-tile-count="'.$count.'" ';}
            if ($vertical ==0 && $efecto=='tileBlind') {echo 'data-cycle-tile-vertical="false" ';}
            if ($count2 > 7 && $efecto=='tileSlide') {echo 'data-cycle-tile-count="'.$count2.'" ';}
            if ($vertical2 ==0 && $efecto=='tileSlide') {echo 'data-cycle-tile-vertical="false" ';}
            if ($caption) {echo 'data-cycle-caption-plugin="caption2" ';}
            if ($efecnumdiap=='slide') {echo 'data-cycle-caption-fx-out="slideUp" data-cycle-caption-fx-in="slideDown" ';}
            if ($efecoverlay=='slide') {echo 'data-cycle-overlay-fx-out="slideUp" data-cycle-overlay-fx-in="slideDown" ';}
            if ($pager) {echo 'data-cycle-pager="#pager'.$module->id.'" ';}
            ?>
            data-cycle-next="#next<?php echo $module->id; ?>" data-cycle-prev="#prev<?php echo $module->id; ?>"
	>
		<?php
        if ($numdiap) {echo '<div class="cycle-caption"></div>';}
        if ($caption) {echo '<div class="cycle-overlay"></div>';}
		foreach($sliders as $imagenes) {
			require( JModuleHelper::getLayoutPath('mod_alcycle2','default_images'));
		}?>
	</div>
    <?php
    if ($rows) {
        echo'<div class="center">
                <a href="#" id="prev'.$module->id.'" class="cycle-prev">&lt;&lt; Prev </a>
                <a href="#" id="next'.$module->id.'" class="cycle-next"> Next &gt;&gt; </a>
            </div>';
        if ($pager) {echo '<div class="cycle-pager" id="pager'.$module->id.'"></div>';}
    }?>
</div>
