<?php

/* ============SERVICE SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_service_section', array(
    'title' => esc_html__('Service Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_service_section'),
    'hiding_control' => 'viral_pro_service_section_disable'
)));

//ENABLE/DISABLE SERVICE SECTION
$wp_customize->add_setting('viral_pro_service_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_service_section_disable', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_service_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_service_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_service_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_service_section_heading',
                'viral_pro_service_super_title',
                'viral_pro_service_title',
                'viral_pro_service_sub_title',
                'viral_pro_service_title_style',
                'viral_pro_service_header',
                'viral_pro_service',
                'viral_pro_service_bg_heading',
                'viral_pro_service_bg',
                'viral_pro_service_bg_align',
                'viral_pro_service_setting_heading',
                'viral_pro_service_style',
                'viral_pro_service_button_heading',
                'viral_pro_service_button_text',
                'viral_pro_service_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_service_cs_heading',
                'viral_pro_service_super_title_color',
                'viral_pro_service_title_color',
                'viral_pro_service_text_color',
                'viral_pro_service_link_color',
                'viral_pro_service_link_hov_color',
                'viral_pro_service_block_color_seperator',
                'viral_pro_service_block_icon_color',
                'viral_pro_service_block_heading_color',
                'viral_pro_service_block_text_color',
                'viral_pro_service_block_link_color',
                'viral_pro_service_mb_seperator',
                'viral_pro_service_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_service_enable_fullwindow',
                'viral_pro_service_align_item',
                'viral_pro_service_fw_seperator',
                'viral_pro_service_bg_type',
                'viral_pro_service_bg_color',
                'viral_pro_service_bg_gradient',
                'viral_pro_service_bg_image',
                'viral_pro_service_parallax_effect',
                'viral_pro_service_bg_video',
                'viral_pro_service_overlay_color',
                'viral_pro_service_cs_seperator',
                'viral_pro_service_padding',
                'viral_pro_service_padding_bottom',
                'viral_pro_service_seperator0',
                'viral_pro_service_section_seperator',
                'viral_pro_service_seperator1',
                'viral_pro_service_top_seperator',
                'viral_pro_service_ts_color',
                'viral_pro_service_ts_height',
                'viral_pro_service_seperator2',
                'viral_pro_service_bottom_seperator',
                'viral_pro_service_bs_color',
                'viral_pro_service_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_service_section_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_service_section_heading', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_super_title', array(
    'section' => 'viral_pro_service_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_service_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Service Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_title', array(
    'section' => 'viral_pro_service_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_service_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Service Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_sub_title', array(
    'section' => 'viral_pro_service_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_service_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_title_style', array(
    'section' => 'viral_pro_service_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => array(
        'ht-section-title-top-center' => esc_html__('Top Center Aligned', 'viral-pro'),
        'ht-section-title-top-cs' => esc_html__('Top Center Aligned with Seperator', 'viral-pro'),
        'ht-section-title-top-left' => esc_html__('Top Left Aligned', 'viral-pro'),
        'ht-section-title-top-ls' => esc_html__('Top Left Aligned with Seperator', 'viral-pro'),
        'ht-section-title-big' => esc_html__('Top Center Aligned with Big Super Title', 'viral-pro')
    )
));

//SERVICE PAGES

$wp_customize->add_setting('viral_pro_service_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_service_header', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('Service Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-angry-monster',
            'title' => '',
            'content' => '',
            'link' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_service', array(
    'section' => 'viral_pro_service_section',
    'box_label' => esc_html__('Service Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'viral-pro'),
        'default' => 'icofont-angry-monster'
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-pro'),
        'default' => ''
    ),
    'content' => array(
        'type' => 'textarea',
        'label' => esc_html__('Content', 'viral-pro'),
        'default' => ''
    ),
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Link', 'viral-pro'),
        'default' => ''
    ),
    'link_text' => array(
        'type' => 'text',
        'label' => esc_html__('Link Text', 'viral-pro'),
        'default' => esc_html__('Read More', 'viral-pro'),
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

$wp_customize->add_setting('viral_pro_service_bg_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_service_bg_heading', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('Service Image', 'viral-pro')
)));

// Registers example_background settings
$wp_customize->add_setting('viral_pro_service_bg_url', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_setting('viral_pro_service_bg_id', array(
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('viral_pro_service_bg_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('viral_pro_service_bg_size', array(
    'default' => 'auto',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('viral_pro_service_bg_pos', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('viral_pro_service_bg_attach', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field'
));

// Registers example_background control
$wp_customize->add_control(new Viral_Pro_Background_Control($wp_customize, 'viral_pro_service_bg', array(
    'label' => esc_html__('Background Image', 'viral-pro'),
    'section' => 'viral_pro_service_section',
    'settings' => array(
        'image_url' => 'viral_pro_service_bg_url',
        'image_id' => 'viral_pro_service_bg_id',
        'repeat' => 'viral_pro_service_bg_repeat', // Use false to hide the field
        'size' => 'viral_pro_service_bg_size',
        'position' => 'viral_pro_service_bg_pos',
        'attach' => 'viral_pro_service_bg_attach'
    )
)));

$wp_customize->add_setting('viral_pro_service_bg_align', array(
    'default' => 'right',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_bg_align', array(
    'section' => 'viral_pro_service_section',
    'type' => 'radio',
    'label' => esc_html__('Image Position', 'viral-pro'),
    'choices' => array(
        'left' => esc_html__('Left', 'viral-pro'),
        'right' => esc_html__('Right', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_service_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_service_setting_heading', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_service_style', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('Service Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/service-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/service-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/service-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/service-style4.png'
    )
)));

$wp_customize->add_setting('viral_pro_service_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_service_button_heading', array(
    'section' => 'viral_pro_service_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_button_text', array(
    'section' => 'viral_pro_service_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_service_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_service_button_link', array(
    'section' => 'viral_pro_service_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_service_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_service_block_color_seperator", array(
    'section' => 'viral_pro_service_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_service_block_icon_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_service_block_icon_color', array(
    'section' => 'viral_pro_service_section',
    'priority' => 56,
    'label' => esc_html__('Service Block Icon Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service_block_heading_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_service_block_heading_color', array(
    'section' => 'viral_pro_service_section',
    'priority' => 56,
    'label' => esc_html__('Service Block Heading Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service_block_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_service_block_text_color', array(
    'section' => 'viral_pro_service_section',
    'priority' => 56,
    'label' => esc_html__('Service Block Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_service_block_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_service_block_link_color', array(
    'section' => 'viral_pro_service_section',
    'priority' => 56,
    'label' => esc_html__('Service Block Link Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_service_title_style', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_super_title', array(
    'selector' => '.ht-service-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_service_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_title', array(
    'selector' => '.ht-service-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_service_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_sub_title', array(
    'selector' => '.ht-service-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_service_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service', array(
    'selector' => '.ht-service-post-holder',
    'render_callback' => 'viral_pro_service_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_bg_url', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_bg_size', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_bg_repeat', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_bg_attach', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_bg_pos', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_bg_align', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_style', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_button_text', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_service_button_link', array(
    'selector' => '.ht-service-section',
    'render_callback' => 'viral_pro_service_section',
    'container_inclusive' => true
));
