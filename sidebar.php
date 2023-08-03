<?php
/**
 * @package Viral
 */
$viral_sidebar_layout = "right-sidebar";

if (is_singular(array('post', 'page'))) {
    $viral_sidebar_layout = get_post_meta($post->ID, 'viral_sidebar_layout', true);
    if (!$viral_sidebar_layout) {
        $viral_sidebar_layout = "right-sidebar";
    }
}

if ($viral_sidebar_layout == "no-sidebar" || $viral_sidebar_layout == "no-sidebar-condensed") {
    return;
}

if (is_active_sidebar('viral-sidebar') && $viral_sidebar_layout == "right-sidebar") {
    ?>
    <div id="secondary" class="widget-area" <?php echo viral_get_schema_attribute('sidebar'); ?>>
        <?php dynamic_sidebar('viral-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}

if (is_active_sidebar('viral-left-sidebar') && $viral_sidebar_layout == "left-sidebar") {
    ?>
    <div id="secondary" class="widget-area" <?php echo viral_get_schema_attribute('sidebar'); ?>>
        <?php dynamic_sidebar('viral-left-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}
