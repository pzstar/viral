<?php

/* ============CLIENTS LOGO SECTION============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_logo_section', array(
    'title' => esc_html__('Clients Logo Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_logo_section'),
    'hiding_control' => 'viral_pro_logo_section_disable'
)));

//ENABLE/DISABLE LOGO SECTION
$wp_customize->add_setting('viral_pro_logo_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_logo_section_disable', array(
    'section' => 'viral_pro_logo_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_logo_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_logo_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_logo_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_logo_title_subtitle_heading',
                'viral_pro_logo_super_title',
                'viral_pro_logo_title',
                'viral_pro_logo_sub_title',
                'viral_pro_logo_title_style',
                'viral_pro_logo_header',
                'viral_pro_logo',
                'viral_pro_logo_new_tab',
                'viral_pro_logo_setting_heading',
                'viral_pro_logo_style'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_logo_cs_heading',
                'viral_pro_logo_super_title_color',
                'viral_pro_logo_title_color',
                'viral_pro_logo_text_color',
                'viral_pro_logo_link_color',
                'viral_pro_logo_link_hov_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_logo_enable_fullwindow',
                'viral_pro_logo_align_item',
                'viral_pro_logo_fw_seperator',
                'viral_pro_logo_bg_type',
                'viral_pro_logo_bg_color',
                'viral_pro_logo_bg_gradient',
                'viral_pro_logo_bg_image',
                'viral_pro_logo_parallax_effect',
                'viral_pro_logo_bg_video',
                'viral_pro_logo_overlay_color',
                'viral_pro_logo_cs_seperator',
                'viral_pro_logo_padding',
                'viral_pro_logo_seperator0',
                'viral_pro_logo_section_seperator',
                'viral_pro_logo_seperator1',
                'viral_pro_logo_top_seperator',
                'viral_pro_logo_ts_color',
                'viral_pro_logo_ts_height',
                'viral_pro_logo_seperator2',
                'viral_pro_logo_bottom_seperator',
                'viral_pro_logo_bs_color',
                'viral_pro_logo_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_logo_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_logo_title_subtitle_heading', array(
    'section' => 'viral_pro_logo_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_logo_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_logo_super_title', array(
    'section' => 'viral_pro_logo_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_logo_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Client Logo Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_logo_title', array(
    'section' => 'viral_pro_logo_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_logo_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Clients Logo Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_logo_sub_title', array(
    'section' => 'viral_pro_logo_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_logo_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_logo_title_style', array(
    'section' => 'viral_pro_logo_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => array(
        'ht-section-title-top-center' => esc_html__('Top Center Aligned', 'viral-pro'),
        'ht-section-title-top-cs' => esc_html__('Top Center Aligned with Seperator', 'viral-pro'),
        'ht-section-title-top-left' => esc_html__('Top Left Aligned', 'viral-pro'),
        'ht-section-title-top-ls' => esc_html__('Top Left Aligned with Seperator', 'viral-pro'),
        'ht-section-title-single-row' => esc_html__('Top Single Row', 'viral-pro'),
        'ht-section-title-big' => esc_html__('Top Center Aligned with Big Super Title', 'viral-pro')
    )
));

//CLIENTS LOGOS
$wp_customize->add_setting('viral_pro_logo_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_logo_header', array(
    'section' => 'viral_pro_logo_section',
    'label' => esc_html__('Clients Logos', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_logo', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'image' => '',
            'link' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_logo', array(
    'section' => 'viral_pro_logo_section',
    'box_label' => esc_html__('Clients Logo', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Upload Logo', 'viral-pro'),
        'default' => ''
    ),
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Logo Link', 'viral-pro'),
        'default' => ''
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Section', 'viral-pro'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->add_setting('viral_pro_logo_new_tab', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_logo_new_tab', array(
    'type' => 'checkbox',
    'section' => 'viral_pro_logo_section',
    'label' => esc_html__('Open Logo Link in New Tab', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_logo_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_logo_setting_heading', array(
    'section' => 'viral_pro_logo_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_logo_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_logo_style', array(
    'section' => 'viral_pro_logo_section',
    'label' => esc_html__('Logo Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/logo-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/logo-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/logo-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/logo-style4.png',
    )
)));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_title_style', array(
    'selector' => '.ht-logo-section',
    'render_callback' => 'viral_pro_logo_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_super_title', array(
    'selector' => '.ht-logo-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_logo_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_title', array(
    'selector' => '.ht-logo-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_logo_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_sub_title', array(
    'selector' => '.ht-logo-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_logo_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo', array(
    'selector' => '.ht-logo-content',
    'render_callback' => 'viral_pro_logo_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_new_tab', array(
    'selector' => '.ht-logo-content',
    'render_callback' => 'viral_pro_logo_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_style', array(
    'selector' => '.ht-logo-content',
    'render_callback' => 'viral_pro_logo_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_button_text', array(
    'selector' => '.ht-logo-section',
    'render_callback' => 'viral_pro_logo_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_logo_button_link', array(
    'selector' => '.ht-logo-section',
    'render_callback' => 'viral_pro_logo_section',
    'container_inclusive' => true
));
