<?php

/**
 * @package Viral
 */
function viral_dymanic_styles() {
    $color = get_theme_mod('viral_template_color', '#0078af');
    $content_color = get_theme_mod('viral_content_color', '#404040');

    $custom_css = ":root {";
    $custom_css .= "--viral-template-color: {$color};";
    $custom_css .= "--viral-content-color: {$content_color};";
    $custom_css .= viral_typography_vars(array('viral_body', 'viral_header', 'viral_menu'));
    $custom_css .= "}";

    return wp_strip_all_tags(viral_css_strip_whitespace($custom_css));
}
