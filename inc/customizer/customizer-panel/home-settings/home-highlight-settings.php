<?php

/* ============HIGHLIGHT SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_highlight_section', array(
    'title' => esc_html__('Highlight Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_highlight_section'),
    'hiding_control' => 'viral_pro_highlight_section_disable'
)));

//ENABLE/DISABLE FEATURED SECTION
$wp_customize->add_setting('viral_pro_highlight_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_highlight_section_disable', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_highlight_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_highlight_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_highlight_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_highlight_title_sub_title_heading',
                'viral_pro_highlight_super_title',
                'viral_pro_highlight_title',
                'viral_pro_highlight_sub_title',
                'viral_pro_highlight_title_style',
                'viral_pro_highlight_block_heading',
                'viral_pro_highlight',
                'viral_pro_highlight_setting_heading',
                'viral_pro_highlight_style',
                'viral_pro_highlight_col',
                'viral_pro_highlight_fullwidth',
                'viral_pro_highlight_button_heading',
                'viral_pro_highlight_button_text',
                'viral_pro_highlight_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_highlight_cs_heading',
                'viral_pro_highlight_super_title_color',
                'viral_pro_highlight_title_color',
                'viral_pro_highlight_text_color',
                'viral_pro_highlight_link_color',
                'viral_pro_highlight_link_hov_color',
                'viral_pro_highlight_block_text_color',
                'viral_pro_highlight_mb_seperator',
                'viral_pro_highlight_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_highlight_enable_fullwindow',
                'viral_pro_highlight_align_item',
                'viral_pro_highlight_fw_seperator',
                'viral_pro_highlight_bg_type',
                'viral_pro_highlight_bg_color',
                'viral_pro_highlight_bg_gradient',
                'viral_pro_highlight_bg_image',
                'viral_pro_highlight_parallax_effect',
                'viral_pro_highlight_bg_video',
                'viral_pro_highlight_overlay_color',
                'viral_pro_highlight_cs_seperator',
                'viral_pro_highlight_padding',
                'viral_pro_highlight_seperator0',
                'viral_pro_highlight_section_seperator',
                'viral_pro_highlight_seperator1',
                'viral_pro_highlight_top_seperator',
                'viral_pro_highlight_ts_color',
                'viral_pro_highlight_ts_height',
                'viral_pro_highlight_seperator2',
                'viral_pro_highlight_bottom_seperator',
                'viral_pro_highlight_bs_color',
                'viral_pro_highlight_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_highlight_title_sub_title_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_highlight_title_sub_title_heading', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_highlight_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_highlight_super_title', array(
    'section' => 'viral_pro_highlight_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_highlight_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Highlight Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_highlight_title', array(
    'section' => 'viral_pro_highlight_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_highlight_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Highlight Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_highlight_sub_title', array(
    'section' => 'viral_pro_highlight_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_highlight_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_highlight_title_style', array(
    'section' => 'viral_pro_highlight_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

//HIGHLIGHT BLOCK

$wp_customize->add_setting('viral_pro_highlight_block_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_highlight_block_heading', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('Highlight Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_highlight', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-angry-monster',
            'image' => '',
            'title' => '',
            'content' => '',
            'link' => '',
            'link_text' => esc_html__('Read More', 'viral-pro'),
            'overlay_color' => 'rgba(255, 193, 7, 0.8)',
            'text_color' => '#FFFFFF',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_highlight', array(
    'section' => 'viral_pro_highlight_section',
    'box_label' => esc_html__('Highlight Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'viral-pro'),
        'default' => 'icofont-angry-monster'
    ),
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Upload Image', 'viral-pro'),
        'default' => ''
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
    'overlay_color' => array(
        'type' => 'colorpicker',
        'label' => esc_html__('Background Overlay', 'viral-pro'),
        'default' => 'rgba(255, 193, 7, 0.8)'
    ),
    'text_color' => array(
        'type' => 'colorpicker',
        'label' => esc_html__('Text Color', 'viral-pro'),
        'default' => '#FFFFFF'
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

$wp_customize->add_setting('viral_pro_highlight_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_highlight_setting_heading', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_highlight_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_highlight_style', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('Highlight Block Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/highlight-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/highlight-style2.png'
    )
)));

$wp_customize->add_setting('viral_pro_highlight_col', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_highlight_col', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('No of Columns', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 4,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_highlight_fullwidth', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_highlight_fullwidth', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('Cover Full Width', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_highlight_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_highlight_button_heading', array(
    'section' => 'viral_pro_highlight_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_highlight_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_highlight_button_text', array(
    'section' => 'viral_pro_highlight_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_highlight_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_highlight_button_link', array(
    'section' => 'viral_pro_highlight_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_title_style', array(
    'selector' => '.ht-highlight-section',
    'render_callback' => 'viral_pro_highlight_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_super_title', array(
    'selector' => '.ht-highlight-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_highlight_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_title', array(
    'selector' => '.ht-highlight-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_highlight_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_sub_title', array(
    'selector' => '.ht-highlight-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_highlight_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight', array(
    'selector' => '.ht-highlight-content',
    'render_callback' => 'viral_pro_highlight_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_style', array(
    'selector' => '.ht-highlight-content',
    'render_callback' => 'viral_pro_highlight_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_col', array(
    'selector' => '.ht-highlight-content',
    'render_callback' => 'viral_pro_highlight_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_button_text', array(
    'selector' => '.ht-highlight-section',
    'render_callback' => 'viral_pro_highlight_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_highlight_button_link', array(
    'selector' => '.ht-highlight-section',
    'render_callback' => 'viral_pro_highlight_section',
    'container_inclusive' => true
));

