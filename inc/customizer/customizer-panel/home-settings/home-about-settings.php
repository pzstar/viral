<?php

/* ============ABOUT US SECTION============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_about_section', array(
    'title' => esc_html__('About Us Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_about_section'),
    'hiding_control' => 'viral_pro_about_page_disable'
)));

//ENABLE/DISABLE ABOUT US PAGE
$wp_customize->add_setting('viral_pro_about_page_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_about_page_disable', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_pro_about_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_about_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_about_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_about_page_heading',
                'viral_pro_about_page',
                'viral_pro_about_sidebar_heading',
                'viral_pro_disable_about_sidebar',
                'viral_pro_about_sidebar_width',
                'viral_pro_about_sidebar',
                'viral_pro_about_image',
                'viral_pro_about_gallery',
                'viral_pro_about_widget',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_about_cs_heading',
                'viral_pro_about_super_title_color',
                'viral_pro_about_title_color',
                'viral_pro_about_text_color',
                'viral_pro_about_link_color',
                'viral_pro_about_link_hov_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_about_enable_fullwindow',
                'viral_pro_about_align_item',
                'viral_pro_about_fw_seperator',
                'viral_pro_about_bg_type',
                'viral_pro_about_bg_color',
                'viral_pro_about_bg_gradient',
                'viral_pro_about_bg_image',
                'viral_pro_about_parallax_effect',
                'viral_pro_about_bg_video',
                'viral_pro_about_overlay_color',
                'viral_pro_about_cs_seperator',
                'viral_pro_about_padding',
                'viral_pro_about_seperator0',
                'viral_pro_about_section_seperator',
                'viral_pro_about_seperator1',
                'viral_pro_about_top_seperator',
                'viral_pro_about_ts_color',
                'viral_pro_about_ts_height',
                'viral_pro_about_seperator2',
                'viral_pro_about_bottom_seperator',
                'viral_pro_about_bs_color',
                'viral_pro_about_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_about_page_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_about_page_heading', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('About Page - Left Block', 'viral-pro')
)));

//ABOUT US PAGE
$wp_customize->add_setting('viral_pro_about_page', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_about_page', array(
    'section' => 'viral_pro_about_section',
    'type' => 'dropdown-pages',
    'label' => esc_html__('Select a Page', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_about_sidebar_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_about_sidebar_heading', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('Sidebar - Right Block', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_disable_about_sidebar', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_disable_about_sidebar', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('Disable Sidebar', 'viral-pro'),
    'description' => esc_html__('If disabled, the left content will cover the full width', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_about_sidebar_width', array(
    'sanitize_callback' => 'absint',
    'default' => 40,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_about_sidebar_width', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('Sidebar Width', 'viral-pro'),
    'input_attrs' => array(
        'min' => 10,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_about_sidebar', array(
    'default' => 'gallery',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_about_sidebar', array(
    'section' => 'viral_pro_about_section',
    'type' => 'select',
    'label' => esc_html__('Choose Content to Display', 'viral-pro'),
    'choices' => array(
        'gallery' => esc_html__('Gallery', 'viral-pro'),
        'single-image' => esc_html__('Single Image', 'viral-pro'),
        'widget' => esc_html__('Widget', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_about_gallery', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Display_Gallery_Control($wp_customize, 'viral_pro_about_gallery', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('Gallery', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_about_image', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'viral_pro_about_image', array(
    'section' => 'viral_pro_about_section',
    'label' => esc_html__('Upload Image', 'viral-pro'),
    'description' => esc_html__('Recommended Image Size: 500X600px', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_about_widget', array(
    'default' => '0',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_about_widget', array(
    'section' => 'viral_pro_about_section',
    'type' => 'select',
    'label' => esc_html__('Replace Image by widget', 'viral-pro'),
    'choices' => $viral_pro_widget_list
));

$wp_customize->selective_refresh->add_partial('viral_pro_about_page', array(
    'selector' => '.ht-about-page',
    'render_callback' => 'viral_pro_about_page'
));

$wp_customize->selective_refresh->add_partial('viral_pro_disable_about_sidebar', array(
    'selector' => '.ht-about-container',
    'render_callback' => 'viral_pro_about_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_about_image', array(
    'selector' => '.ht-about-sidebar',
    'render_callback' => 'viral_pro_about_sidebar',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_about_gallery', array(
    'selector' => '.ht-about-sidebar',
    'render_callback' => 'viral_pro_about_sidebar',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_about_sidebar', array(
    'selector' => '.ht-about-sidebar',
    'render_callback' => 'viral_pro_about_sidebar',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_about_widget', array(
    'selector' => '.ht-about-sidebar',
    'render_callback' => 'viral_pro_about_sidebar',
    'container_inclusive' => true
));
