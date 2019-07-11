<?php

/* ============FEATURED SECTION PANEL============ */

$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_featured_section', array(
    'title' => esc_html__('Featured Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_featured_section'),
    'hiding_control' => 'viral_pro_featured_section_disable'
)));

//ENABLE/DISABLE FEATURED SECTION
$wp_customize->add_setting('viral_pro_featured_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_featured_section_disable', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro'),
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_pro_featured_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_featured_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_featured_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_featured_title_sub_title_heading',
                'viral_pro_featured_super_title',
                'viral_pro_featured_title',
                'viral_pro_featured_sub_title',
                'viral_pro_featured_title_style',
                'viral_pro_featured_block_heading',
                'viral_pro_featured',
                'viral_pro_featured_setting_heading',
                'viral_pro_featured_style',
                'viral_pro_featured_col',
                'viral_pro_featured_enable_space',
                'viral_pro_featured_enable_gradient_bg',
                'viral_pro_featured_button_heading',
                'viral_pro_featured_button_text',
                'viral_pro_featured_button_link'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_featured_cs_heading',
                'viral_pro_featured_super_title_color',
                'viral_pro_featured_title_color',
                'viral_pro_featured_text_color',
                'viral_pro_featured_link_color',
                'viral_pro_featured_link_hov_color',
                'viral_pro_feature_block_seperator',
                'viral_pro_feature_block_bg_color',
                'viral_pro_feature_block_text_color',
                'viral_pro_feature_block_icon_color',
                'viral_pro_feature_block_title_color',
                'viral_pro_feature_block_link_color',
                'viral_pro_featured_mb_seperator',
                'viral_pro_featured_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_featured_enable_fullwindow',
                'viral_pro_featured_align_item',
                'viral_pro_featured_fw_seperator',
                'viral_pro_featured_bg_type',
                'viral_pro_featured_bg_color',
                'viral_pro_featured_bg_gradient',
                'viral_pro_featured_bg_image',
                'viral_pro_featured_parallax_effect',
                'viral_pro_featured_bg_video',
                'viral_pro_featured_overlay_color',
                'viral_pro_featured_cs_seperator',
                'viral_pro_featured_padding',
                'viral_pro_featured_seperator0',
                'viral_pro_featured_section_seperator',
                'viral_pro_featured_seperator1',
                'viral_pro_featured_top_seperator',
                'viral_pro_featured_ts_color',
                'viral_pro_featured_ts_height',
                'viral_pro_featured_seperator2',
                'viral_pro_featured_bottom_seperator',
                'viral_pro_featured_bs_color',
                'viral_pro_featured_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_featured_title_sub_title_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_featured_title_sub_title_heading', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_featured_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_featured_super_title', array(
    'section' => 'viral_pro_featured_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_featured_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Featured Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_featured_title', array(
    'section' => 'viral_pro_featured_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_featured_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Featured Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_featured_sub_title', array(
    'section' => 'viral_pro_featured_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_featured_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_featured_title_style', array(
    'section' => 'viral_pro_featured_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

//FEATURED BLOCK

$wp_customize->add_setting('viral_pro_featured_block_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_featured_block_heading', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Featured Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_featured', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-angry-monster',
            'title' => '',
            'content' => '',
            'link' => '',
            'link_text' => esc_html__('Read More', 'viral-pro'),
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_featured', array(
    //'label'   => esc_html__('Highlight Page','viral-pro'),
    'section' => 'viral_pro_featured_section',
    'box_label' => esc_html__('Featured Block', 'viral-pro'),
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

$wp_customize->add_setting('viral_pro_featured_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_featured_setting_heading', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_featured_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style4',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_featured_style', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Featured Block Style', 'viral-pro'),
    'options' => array(
        'style4' => $imagepath . '/inc/customizer/images/featured-style4.png',
        'style5' => $imagepath . '/inc/customizer/images/featured-style5.png',
        'style6' => $imagepath . '/inc/customizer/images/featured-style6.png'
    )
)));

$wp_customize->add_setting('viral_pro_featured_col', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_featured_col', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('No of Columns', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 6,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_featured_enable_space', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_featured_enable_space', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Enable Space Between Blocks', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_featured_enable_gradient_bg', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'on',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_featured_enable_gradient_bg', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('Enable Gradient Background in Blocks', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_featured_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_featured_button_heading', array(
    'section' => 'viral_pro_featured_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_featured_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_featured_button_text', array(
    'section' => 'viral_pro_featured_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_featured_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_featured_button_link', array(
    'section' => 'viral_pro_featured_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_feature_block_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_feature_block_seperator", array(
    'section' => 'viral_pro_featured_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_feature_block_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#F6F7F8'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_feature_block_bg_color', array(
    'section' => 'viral_pro_featured_section',
    'priority' => 56,
    'label' => esc_html__('Featured Block Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_feature_block_icon_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_feature_block_icon_color', array(
    'section' => 'viral_pro_featured_section',
    'priority' => 56,
    'label' => esc_html__('Featured Block Icon Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_feature_block_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_feature_block_title_color', array(
    'section' => 'viral_pro_featured_section',
    'priority' => 56,
    'label' => esc_html__('Featured Block Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_feature_block_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_feature_block_text_color', array(
    'section' => 'viral_pro_featured_section',
    'priority' => 56,
    'label' => esc_html__('Featured Block Excerpt Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_feature_block_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_feature_block_link_color', array(
    'section' => 'viral_pro_featured_section',
    'priority' => 56,
    'label' => esc_html__('Featured Block Link Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_title_style', array(
    'selector' => '.ht-featured-section',
    'render_callback' => 'viral_pro_featured_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_super_title', array(
    'selector' => '.ht-featured-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_featured_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_title', array(
    'selector' => '.ht-featured-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_featured_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_sub_title', array(
    'selector' => '.ht-featured-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_featured_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured', array(
    'selector' => '.ht-featured-content',
    'render_callback' => 'viral_pro_featured_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_style', array(
    'selector' => '.ht-featured-content',
    'render_callback' => 'viral_pro_featured_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_col', array(
    'selector' => '.ht-featured-content',
    'render_callback' => 'viral_pro_featured_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_button_text', array(
    'selector' => '.ht-featured-section',
    'render_callback' => 'viral_pro_featured_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_featured_button_link', array(
    'selector' => '.ht-featured-section',
    'render_callback' => 'viral_pro_featured_section',
    'container_inclusive' => true
));
