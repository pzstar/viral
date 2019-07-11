<?php

/* ============TAB SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_tab_section', array(
    'title' => esc_html__('Tab Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_tab_section'),
    'hiding_control' => 'viral_pro_tab_section_disable'
)));

//ENABLE/DISABLE SERVICE SECTION
$wp_customize->add_setting('viral_pro_tab_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_tab_section_disable', array(
    'section' => 'viral_pro_tab_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_tab_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_tab_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_tab_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_tab_section_disable',
                'viral_pro_tab_section_heading',
                'viral_pro_tab_super_title',
                'viral_pro_tab_title',
                'viral_pro_tab_sub_title',
                'viral_pro_tab_title_style',
                'viral_pro_tab_header',
                'viral_pro_tabs',
                'viral_pro_tab_setting_heading',
                'viral_pro_tab_style',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_tab_cs_heading',
                'viral_pro_tab_super_title_color',
                'viral_pro_tab_title_color',
                'viral_pro_tab_text_color',
                'viral_pro_tab_link_color',
                'viral_pro_tab_link_hov_color',
                'viral_pro_tab_block_color_seperator',
                'viral_pro_tab_block_title_color',
                'viral_pro_tab_block_active_title_color',
                'viral_pro_tab_block_active_bg_color',
                'viral_pro_tab_block_content_title_color',
                'viral_pro_tab_block_content_text_color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_tab_enable_fullwindow',
                'viral_pro_tab_align_item',
                'viral_pro_tab_fw_seperator',
                'viral_pro_tab_bg_type',
                'viral_pro_tab_bg_color',
                'viral_pro_tab_bg_gradient',
                'viral_pro_tab_bg_image',
                'viral_pro_tab_parallax_effect',
                'viral_pro_tab_bg_video',
                'viral_pro_tab_overlay_color',
                'viral_pro_tab_cs_seperator',
                'viral_pro_tab_padding',
                'viral_pro_tab_seperator0',
                'viral_pro_tab_section_seperator',
                'viral_pro_tab_seperator1',
                'viral_pro_tab_top_seperator',
                'viral_pro_tab_ts_color',
                'viral_pro_tab_ts_height',
                'viral_pro_tab_seperator2',
                'viral_pro_tab_bottom_seperator',
                'viral_pro_tab_bs_color',
                'viral_pro_tab_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_tab_section_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_tab_section_heading', array(
    'section' => 'viral_pro_tab_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tab_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_tab_super_title', array(
    'section' => 'viral_pro_tab_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_tab_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Tab Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_tab_title', array(
    'section' => 'viral_pro_tab_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_tab_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Tab Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_tab_sub_title', array(
    'section' => 'viral_pro_tab_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_tab_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_tab_title_style', array(
    'section' => 'viral_pro_tab_section',
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

//TABS PAGES

$wp_customize->add_setting('viral_pro_tab_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_tab_header', array(
    'section' => 'viral_pro_tab_section',
    'label' => esc_html__('Tab Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tabs', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => '',
            'title' => '',
            'page' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_tabs', array(
    'section' => 'viral_pro_tab_section',
    'box_label' => esc_html__('Tabs Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Icon', 'viral-pro'),
        'default' => 'icofont-angry-monster'
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-pro'),
        'default' => ''
    ),
    'page' => array(
        'type' => 'select',
        'label' => esc_html__('Select Page', 'viral-pro'),
        'options' => $viral_pro_page_choice,
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

$wp_customize->add_setting('viral_pro_tab_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_tab_setting_heading', array(
    'section' => 'viral_pro_tab_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tab_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_tab_style', array(
    'section' => 'viral_pro_tab_section',
    'label' => esc_html__('Tab Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/tab-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/tab-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/tab-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/tab-style4.png',
        'style5' => $imagepath . '/inc/customizer/images/tab-style5.png'
    )
)));

$wp_customize->add_setting("viral_pro_tab_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_tab_block_color_seperator", array(
    'section' => 'viral_pro_tab_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_tab_block_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_tab_block_title_color', array(
    'section' => 'viral_pro_tab_section',
    'priority' => 56,
    'label' => esc_html__('Tab Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tab_block_active_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_tab_block_active_title_color', array(
    'section' => 'viral_pro_tab_section',
    'priority' => 56,
    'label' => esc_html__('Active Tab Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tab_block_active_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFC107'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_tab_block_active_bg_color', array(
    'section' => 'viral_pro_tab_section',
    'priority' => 56,
    'label' => esc_html__('Active Tab Background/Border Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tab_block_content_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_tab_block_content_title_color', array(
    'section' => 'viral_pro_tab_section',
    'priority' => 56,
    'label' => esc_html__('Tab Content Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_tab_block_content_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_tab_block_content_text_color', array(
    'section' => 'viral_pro_tab_section',
    'priority' => 56,
    'label' => esc_html__('Tab Content Text Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_tab_title_style', array(
    'selector' => '.ht-tab-section',
    'render_callback' => 'viral_pro_tab_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_tab_super_title', array(
    'selector' => '.ht-tab-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_tab_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_tab_title', array(
    'selector' => '.ht-tab-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_tab_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_tab_sub_title', array(
    'selector' => '.ht-tab-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_tab_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_tabs', array(
    'selector' => '.ht-tab-section .ht-section-content',
    'render_callback' => 'viral_pro_tab_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_tab_style', array(
    'selector' => '.ht-tab-section .ht-section-content',
    'render_callback' => 'viral_pro_tab_content'
));

