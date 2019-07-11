<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'viral-pro');
$wp_customize->get_section('colors')->priority = 10;

//COLOR SETTINGS
$wp_customize->add_setting('viral_pro_template_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'sanitize_hex_color',
    'priority' => 1
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_template_color', array(
    'section' => 'colors',
    'label' => esc_html__('Theme Primary Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_color_section_seperator1', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_color_section_seperator1', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('viral_pro_color_content_info', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_color_content_info', array(
    'section' => 'colors',
    'label' => esc_html__('Content Colors', 'viral-pro'),
    'description' => esc_html__('This settings apply only in the single posts (ie page and post detail pages only)', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_content_header_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_content_header_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Header Color(H1, H2, H3, H4, H5, H6)', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_content_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_content_text_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_content_link_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_content_link_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_content_link_hov_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_content_link_hov_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Hover Color', 'viral-pro'),
)));

$wp_customize->add_setting('viral_pro_color_section_seperator2', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_color_section_seperator2', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('viral_pro_content_widget_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_content_widget_title_color', array(
    'section' => 'colors',
    'label' => esc_html__('Sidebar Widget Title Color', 'viral-pro')
)));
