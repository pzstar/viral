<?php

/* ============UPDATE SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_news_section', array(
    'title' => esc_html__('Content Slider Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_news_section'),
    'hiding_control' => 'viral_pro_news_section_disable'
)));

//ENABLE/DISABLE SERVICE SECTION
$wp_customize->add_setting('viral_pro_news_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_news_section_disable', array(
    'section' => 'viral_pro_news_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_news_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_news_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_news_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_news_section_heading',
                'viral_pro_news_super_title',
                'viral_pro_news_title',
                'viral_pro_news_sub_title',
                'viral_pro_news_title_style',
                'viral_pro_news_header',
                'viral_pro_news',
                'viral_pro_news_setting_heading',
                'viral_pro_news_style',
                'viral_pro_news_button_heading',
                'viral_pro_news_button_text',
                'viral_pro_news_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_news_cs_heading',
                'viral_pro_news_super_title_color',
                'viral_pro_news_title_color',
                'viral_pro_news_text_color',
                'viral_pro_news_link_color',
                'viral_pro_news_link_hov_color',
                'viral_pro_news_block_color_seperator',
                'viral_pro_news_block_bg_color',
                'viral_pro_news_block_title_color',
                'viral_pro_news_block_text_color',
                'viral_pro_news_block_button_color_group',
                'viral_pro_news_mb_seperator',
                'viral_pro_news_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_news_enable_fullwindow',
                'viral_pro_news_align_item',
                'viral_pro_news_fw_seperator',
                'viral_pro_news_bg_type',
                'viral_pro_news_bg_color',
                'viral_pro_news_bg_gradient',
                'viral_pro_news_bg_image',
                'viral_pro_news_parallax_effect',
                'viral_pro_news_bg_video',
                'viral_pro_news_overlay_color',
                'viral_pro_news_cs_seperator',
                'viral_pro_news_padding',
                'viral_pro_news_seperator0',
                'viral_pro_news_section_seperator',
                'viral_pro_news_seperator1',
                'viral_pro_news_top_seperator',
                'viral_pro_news_ts_color',
                'viral_pro_news_ts_height',
                'viral_pro_news_seperator2',
                'viral_pro_news_bottom_seperator',
                'viral_pro_news_bs_color',
                'viral_pro_news_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_news_section_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_news_section_heading', array(
    'section' => 'viral_pro_news_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_news_super_title', array(
    'section' => 'viral_pro_news_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_news_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('News and Update Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_news_title', array(
    'section' => 'viral_pro_news_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_news_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('News and Update Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_news_sub_title', array(
    'section' => 'viral_pro_news_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_news_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_news_title_style', array(
    'section' => 'viral_pro_news_section',
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

//UPDATES PAGES

$wp_customize->add_setting('viral_pro_news_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_news_header', array(
    'section' => 'viral_pro_news_section',
    'label' => esc_html__('Updates Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'title' => '',
            'content' => '',
            'image' => '',
            'button_text' => '',
            'button_link' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_news', array(
    'section' => 'viral_pro_news_section',
    'box_label' => esc_html__('Updates Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
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
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Upload Image', 'viral-pro'),
        'default' => ''
    ),
    'button_text' => array(
        'type' => 'text',
        'label' => esc_html__('Button Text', 'viral-pro'),
        'default' => ''
    ),
    'button_link' => array(
        'type' => 'text',
        'label' => esc_html__('Button Link', 'viral-pro'),
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

$wp_customize->add_setting('viral_pro_news_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_news_setting_heading', array(
    'section' => 'viral_pro_news_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_news_style', array(
    'section' => 'viral_pro_news_section',
    'label' => esc_html__('Updates Block Style', 'viral-pro'),
    'class' => 'ht-full-width',
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/news-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/news-style2.png'
    )
)));

$wp_customize->add_setting('viral_pro_news_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_news_button_heading', array(
    'section' => 'viral_pro_news_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_news_button_text', array(
    'section' => 'viral_pro_news_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_news_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_news_button_link', array(
    'section' => 'viral_pro_news_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_news_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_news_block_color_seperator", array(
    'section' => 'viral_pro_news_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_news_block_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#f7f9fd'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_news_block_bg_color', array(
    'section' => 'viral_pro_news_section',
    'priority' => 56,
    'label' => esc_html__('News Block Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news_block_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_news_block_title_color', array(
    'section' => 'viral_pro_news_section',
    'priority' => 56,
    'label' => esc_html__('News Block Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news_block_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_news_block_text_color', array(
    'section' => 'viral_pro_news_section',
    'priority' => 56,
    'label' => esc_html__('News Block Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_news_block_button_bg_color', array(
    'default' => '#222222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_news_block_button_bg_color_hover', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_news_block_button_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_news_block_button_text_color_hover', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_news_block_button_color_group', array(
    'label' => esc_html__('News Block Button Colors', 'viral-pro'),
    'section' => 'viral_pro_news_section',
    'show_opacity' => true,
    'priority' => 56,
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        '#FF0000',
        '#CCCCCC'
    ),
    'settings' => array(
        'normal_viral_pro_news_block_button_bg_color' => 'viral_pro_news_block_button_bg_color',
        'normal_viral_pro_news_block_button_text_color' => 'viral_pro_news_block_button_text_color',
        'hover_viral_pro_news_block_button_bg_color_hover' => 'viral_pro_news_block_button_bg_color_hover',
        'hover_viral_pro_news_block_button_text_color_hover' => 'viral_pro_news_block_button_text_color_hover',
    ),
    'group' => array(
        'normal_viral_pro_news_block_button_bg_color' => esc_html__('Button Background Color', 'viral-pro'),
        'normal_viral_pro_news_block_button_text_color' => esc_html__('Button Text Color', 'viral-pro'),
        'hover_viral_pro_news_block_button_bg_color_hover' => esc_html__('Button Background Color', 'viral-pro'),
        'hover_viral_pro_news_block_button_text_color_hover' => esc_html__('Button Text Color', 'viral-pro')
    )
)));

$wp_customize->selective_refresh->add_partial('viral_pro_news_title_style', array(
    'selector' => '.ht-news-section',
    'render_callback' => 'viral_pro_news_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_news_super_title', array(
    'selector' => '.ht-news-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_news_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_news_title', array(
    'selector' => '.ht-news-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_news_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_news_sub_title', array(
    'selector' => '.ht-news-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_news_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_news', array(
    'selector' => '.ht-newscontent',
    'render_callback' => 'viral_pro_news_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_news_style', array(
    'selector' => '.ht-newscontent',
    'render_callback' => 'viral_pro_news_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_news_button_text', array(
    'selector' => '.ht-news-section',
    'render_callback' => 'viral_pro_news_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_news_button_link', array(
    'selector' => '.ht-news-section',
    'render_callback' => 'viral_pro_news_section',
    'container_inclusive' => true
));
