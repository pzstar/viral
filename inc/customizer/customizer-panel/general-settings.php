<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
/* GENERAL SETTINGS PANEL */
$wp_customize->add_panel('viral_pro_general_settings_panel', array(
    'title' => esc_html__('General Settings', 'viral-pro'),
    'priority' => 1
));

//MOVE FRONT PAGE, BACKGROUND AND COLOR SETTING INTO GENERAL SETTING PANEL
$wp_customize->get_section('static_front_page')->panel = 'viral_pro_general_settings_panel';
$wp_customize->get_section('static_front_page')->priority = 10;
$wp_customize->get_section('background_image')->panel = 'viral_pro_general_settings_panel';
$wp_customize->get_control('background_color')->section = 'background_image';

//GENERAL SETTINGS
$wp_customize->add_section('viral_pro_general_options_section', array(
    'title' => esc_html__('General Options', 'viral-pro'),
    'panel' => 'viral_pro_general_settings_panel'
));

$wp_customize->add_setting('viral_pro_style_option', array(
    'default' => 'head',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_style_option', array(
    'section' => 'viral_pro_general_options_section',
    'type' => 'radio',
    'label' => esc_html__('Dynamic Style Option', 'viral-pro'),
    'choices' => array(
        'head' => esc_html__('WP Head', 'viral-pro'),
        'file' => esc_html__('Custom File', 'viral-pro')
    ),
    'description' => esc_html__('WP Head option will save the custom CSS in the header of the HTML file and Custom file option will save the custom CSS in a seperate file.', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_website_layout', array(
    'default' => 'wide',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_website_layout', array(
    'section' => 'viral_pro_general_options_section',
    'type' => 'radio',
    'label' => esc_html__('Website Layout', 'viral-pro'),
    'choices' => array(
        'wide' => esc_html__('Wide', 'viral-pro'),
        'boxed' => esc_html__('Boxed', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_website_width', array(
    'sanitize_callback' => 'absint',
    'default' => 1170,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_website_width', array(
    'section' => 'viral_pro_general_options_section',
    'label' => esc_html__('Website Container Width', 'viral-pro'),
    'input_attrs' => array(
        'min' => 900,
        'max' => 1400,
        'step' => 10
    )
)));

$wp_customize->add_setting('viral_pro_sidebar_width', array(
    'sanitize_callback' => 'absint',
    'default' => 30,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_sidebar_width', array(
    'section' => 'viral_pro_general_options_section',
    'label' => esc_html__('Sidebar Width (%)', 'viral-pro'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 50,
        'step' => 1
    )
)));

/*
  $wp_customize->add_setting('viral_pro_website_layout_seperator', array(
  'sanitize_callback' => 'viral_pro_sanitize_text'
  ));

  $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_website_layout_seperator', array(
  'section' => 'viral_pro_general_options_section'
  )));


  $wp_customize->add_setting('viral_pro_scroll_animation', array(
  'sanitize_callback' => 'viral_pro_sanitize_checkbox',
  'default' => true
  ));

  $wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_scroll_animation', array(
  'section' => 'viral_pro_general_options_section',
  'label' => esc_html__('Animation Effect on Scroll', 'viral-pro'),
  'description' => esc_html__('Elements appear with some animation as they appear in viewscreen', 'viral-pro')
  )));
 * 
 */

$wp_customize->add_setting('viral_pro_scroll_animation_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_scroll_animation_seperator', array(
    'section' => 'viral_pro_general_options_section'
)));

$wp_customize->add_setting('viral_pro_backtotop', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_backtotop', array(
    'section' => 'viral_pro_general_options_section',
    'label' => esc_html__('Back to Top Button', 'viral-pro'),
    'description' => esc_html__('A button on click scrolls to the top of the page.', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_backtotop_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_backtotop_seperator', array(
    'section' => 'viral_pro_general_options_section'
)));

$wp_customize->add_setting('viral_pro_nice_scroll', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_nice_scroll', array(
    'section' => 'viral_pro_general_options_section',
    'label' => esc_html__('Fancy ScrollBar', 'viral-pro'),
    'description' => esc_html__('Removes browser default scrollbar and replace it with fancy scrollbar.', 'viral-pro')
)));

//PRELOADER SETTINGS
$wp_customize->add_section('viral_pro_preloader_options_section', array(
    'title' => esc_html__('Preloader Options', 'viral-pro'),
    'panel' => 'viral_pro_general_settings_panel'
));

$wp_customize->add_setting('viral_pro_preloader', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_preloader', array(
    'section' => 'viral_pro_preloader_options_section',
    'label' => esc_html__('Enable Preloader', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_preloader_type', array(
    'default' => 'preloader1',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Image_Select($wp_customize, 'viral_pro_preloader_type', array(
    'section' => 'viral_pro_preloader_options_section',
    'type' => 'select',
    'label' => esc_html__('Preloader Type', 'viral-pro'),
    'image_path' => $imagepath . '/inc/customizer/images/preloaders/',
    'choices' => array(
        'preloader1' => esc_html__('Preloader 1', 'viral-pro'),
        'preloader2' => esc_html__('Preloader 2', 'viral-pro'),
        'preloader3' => esc_html__('Preloader 3', 'viral-pro'),
        'preloader4' => esc_html__('Preloader 4', 'viral-pro'),
        'preloader5' => esc_html__('Preloader 5', 'viral-pro'),
        'preloader6' => esc_html__('Preloader 6', 'viral-pro'),
        'preloader7' => esc_html__('Preloader 7', 'viral-pro'),
        'preloader8' => esc_html__('Preloader 8', 'viral-pro'),
        'preloader9' => esc_html__('Preloader 9', 'viral-pro'),
        'preloader10' => esc_html__('Preloader 10', 'viral-pro'),
        'preloader11' => esc_html__('Preloader 11', 'viral-pro'),
        'preloader12' => esc_html__('Preloader 12', 'viral-pro'),
        'preloader13' => esc_html__('Preloader 13', 'viral-pro'),
        'preloader14' => esc_html__('Preloader 14', 'viral-pro'),
        'preloader15' => esc_html__('Preloader 15', 'viral-pro'),
        'preloader16' => esc_html__('Preloader 16', 'viral-pro'),
        'custom' => esc_html__('Custom', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_preloader_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_preloader_color', array(
    'section' => 'viral_pro_preloader_options_section',
    'label' => esc_html__('Preloader Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_preloader_image', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'viral_pro_preloader_image', array(
    'section' => 'viral_pro_preloader_options_section',
    'description' => esc_html__('Custom Preloader Image - gif image is preferable', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_preloader_bg_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_preloader_bg_color', array(
    'section' => 'viral_pro_preloader_options_section',
    'label' => esc_html__('Preloader Background Color', 'viral-pro')
)));

//ADMIN LOGO
$wp_customize->add_section('viral_pro_admin_logo_section', array(
    'title' => esc_html__('Admin Logo', 'viral-pro'),
    'panel' => 'viral_pro_general_settings_panel',
    'description' => esc_html__('The logo will appear in the admin login page.', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_admin_logo', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'viral_pro_admin_logo', array(
    'section' => 'viral_pro_admin_logo_section',
    'label' => esc_html__('Upload Admin Logo', 'viral-pro'),
)));

$wp_customize->add_setting('viral_pro_admin_logo_width', array(
    'sanitize_callback' => 'absint',
    'default' => 180,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_admin_logo_width', array(
    'section' => 'viral_pro_admin_logo_section',
    'label' => esc_html__('Logo Width', 'viral-pro'),
    'input_attrs' => array(
        'min' => 80,
        'max' => 320,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_admin_logo_height', array(
    'sanitize_callback' => 'absint',
    'default' => 80,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_admin_logo_height', array(
    'section' => 'viral_pro_admin_logo_section',
    'label' => esc_html__('Logo Height', 'viral-pro'),
    'input_attrs' => array(
        'min' => 30,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_admin_logo_link', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_admin_logo_link', array(
    'section' => 'viral_pro_admin_logo_section',
    'type' => 'text',
    'label' => esc_html__('Admin Logo Link', 'viral-pro'),
    'description' => esc_html__('This is the url that is opened when clicked on the admin logo.', 'viral-pro')
));
