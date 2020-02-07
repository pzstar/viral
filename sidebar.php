<?php
/**
 * @package Viral
 */
if (!is_active_sidebar('viral-sidebar')) {
    return;
}
?>

<div id="secondary" class="widget-area">
    <?php dynamic_sidebar('viral-sidebar'); ?>
</div><!-- #secondary -->
