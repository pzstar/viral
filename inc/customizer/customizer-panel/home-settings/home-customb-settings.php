<?php

/* ============CUSTOM SECTION 2============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_customb_section', array(
    'title' => esc_html__('Custom Section B', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_customb_section'),
    'hiding_control' => 'viral_pro_customb_section_disable'
)));

//ENABLE/DISABLE CUSTOM SECTION
$wp_customize->add_setting('viral_pro_customb_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_customb_section_disable', array(
    'section' => 'viral_pro_customb_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_customb_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_customb_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_customb_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_customb_title_subtitle_heading',
                'viral_pro_customb_super_title',
                'viral_pro_customb_title',
                'viral_pro_customb_sub_title',
                'viral_pro_customb_title_style',
                'viral_pro_customb_page_heading',
                'viral_pro_customb_page'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_customb_cs_heading',
                'viral_pro_customb_super_title_color',
                'viral_pro_customb_title_color',
                'viral_pro_customb_text_color',
                'viral_pro_customb_link_color',
                'viral_pro_customb_link_hov_color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_customb_enable_fullwindow',
                'viral_pro_customb_align_item',
                'viral_pro_customb_fw_seperator',
                'viral_pro_customb_bg_type',
                'viral_pro_customb_bg_color',
                'viral_pro_customb_bg_gradient',
                'viral_pro_customb_bg_image',
                'viral_pro_customb_parallax_effect',
                'viral_pro_customb_bg_video',
                'viral_pro_customb_overlay_color',
                'viral_pro_customb_cs_seperator',
                'viral_pro_customb_padding',
                'viral_pro_customb_seperator0',
                'viral_pro_customb_section_seperator',
                'viral_pro_customb_seperator1',
                'viral_pro_customb_top_seperator',
                'viral_pro_customb_ts_color',
                'viral_pro_customb_ts_height',
                'viral_pro_customb_seperator2',
                'viral_pro_customb_bottom_seperator',
                'viral_pro_customb_bs_color',
                'viral_pro_customb_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_customb_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_customb_title_subtitle_heading', array(
    'section' => 'viral_pro_customb_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_customb_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_customb_super_title', array(
    'section' => 'viral_pro_customb_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_customb_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Custom B Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_customb_title', array(
    'section' => 'viral_pro_customb_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_customb_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Custom B Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_customb_sub_title', array(
    'section' => 'viral_pro_customb_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_customb_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_customb_title_style', array(
    'section' => 'viral_pro_customb_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

$wp_customize->add_setting('viral_pro_customb_page_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_customb_page_heading', array(
    'section' => 'viral_pro_customb_section',
    'label' => esc_html__('Page', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_customb_page', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_customb_page', array(
    'section' => 'viral_pro_customb_section',
    'type' => 'dropdown-pages',
    'label' => esc_html__('Select a Page', 'viral-pro'),
    'description' => esc_html__('Create a custom layout with the selected page using pagebuilder.', 'viral-pro')
));


$wp_customize->selective_refresh->add_partial('viral_pro_customb_title_style', array(
    'selector' => '.ht-customb-section',
    'render_callback' => 'viral_pro_customb_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_customb_super_title', array(
    'selector' => '.ht-customb-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_customb_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_customb_title', array(
    'selector' => '.ht-customb-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_customb_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_customb_sub_title', array(
    'selector' => '.ht-customb-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_customb_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_customb_page', array(
    'selector' => '.ht-customb-content',
    'render_callback' => 'viral_pro_customb_content'
));

