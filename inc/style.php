<?php

/**
 * @package Viral
 */
function viral_dymanic_styles() {
    $color = get_theme_mod('viral_template_color', '#0078af');
    $bg_color = str_replace('#', '', get_theme_mod('background_color', '#FFFFFF'));

    $custom_css = ":root {";
    $custom_css .= "--viral-template-color: {$color};";
    $custom_css .= "--viral-background-color: #{$bg_color};";
    $custom_css .= viral_typography_vars(array('viral_body', 'viral_header', 'viral_menu'));
    $custom_css .= "}";

    return wp_strip_all_tags(viral_css_strip_whitespace($custom_css));
}
