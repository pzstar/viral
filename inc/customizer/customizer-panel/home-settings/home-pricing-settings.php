<?php

/* ============PRICING SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_pricing_section', array(
    'title' => esc_html__('Pricing Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_pricing_section'),
    'hiding_control' => 'viral_pro_pricing_section_disable'
)));

//ENABLE/DISABLE pricing SECTION
$wp_customize->add_setting('viral_pro_pricing_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_pricing_section_disable', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_pricing_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_pricing_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_pricing_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_pricing_title_subtitle_heading',
                'viral_pro_pricing_super_title',
                'viral_pro_pricing_title',
                'viral_pro_pricing_sub_title',
                'viral_pro_pricing_title_style',
                'viral_pro_pricing_header',
                'viral_pro_pricing',
                'viral_pro_pricing_setting_heading',
                'viral_pro_pricing_style',
                'viral_pro_pricing_col',
                'viral_pro_pricing_button_heading',
                'viral_pro_pricing_button_text',
                'viral_pro_pricing_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_pricing_cs_heading',
                'viral_pro_pricing_super_title_color',
                'viral_pro_pricing_title_color',
                'viral_pro_pricing_text_color',
                'viral_pro_pricing_block_color_seperator',
                'viral_pro_pricing_block_highlight_color',
                'viral_pro_pricing_block_highlight_text_color',
                'viral_pro_pricing_link_color',
                'viral_pro_pricing_link_hov_color',
                'viral_pro_pricing_mb_seperator',
                'viral_pro_pricing_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_pricing_enable_fullwindow',
                'viral_pro_pricing_align_item',
                'viral_pro_pricing_fw_seperator',
                'viral_pro_pricing_bg_type',
                'viral_pro_pricing_bg_color',
                'viral_pro_pricing_bg_gradient',
                'viral_pro_pricing_bg_image',
                'viral_pro_pricing_parallax_effect',
                'viral_pro_pricing_bg_video',
                'viral_pro_pricing_overlay_color',
                'viral_pro_pricing_cs_seperator',
                'viral_pro_pricing_padding',
                'viral_pro_pricing_seperator0',
                'viral_pro_pricing_section_seperator',
                'viral_pro_pricing_seperator1',
                'viral_pro_pricing_top_seperator',
                'viral_pro_pricing_ts_color',
                'viral_pro_pricing_ts_height',
                'viral_pro_pricing_seperator2',
                'viral_pro_pricing_bottom_seperator',
                'viral_pro_pricing_bs_color',
                'viral_pro_pricing_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_pricing_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_pricing_title_subtitle_heading', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_pricing_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_pricing_super_title', array(
    'section' => 'viral_pro_pricing_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_pricing_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Pricing Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_pricing_title', array(
    'section' => 'viral_pro_pricing_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_pricing_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Pricing Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_pricing_sub_title', array(
    'section' => 'viral_pro_pricing_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_pricing_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_pricing_title_style', array(
    'section' => 'viral_pro_pricing_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

$wp_customize->add_setting('viral_pro_pricing_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_pricing_header', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('Pricing Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_pricing', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'plan' => '',
            'currency' => '',
            'price' => '',
            'price_per' => '',
            'content' => '',
            'button_text' => '',
            'button_link' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_pricing', array(
    'section' => 'viral_pro_pricing_section',
    'box_label' => esc_html__('Pricing Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'plan' => array(
        'type' => 'text',
        'label' => esc_html__('Pricing Title', 'viral-pro'),
        'default' => ''
    ),
    'currency' => array(
        'type' => 'text',
        'label' => esc_html__('Currency Symbol', 'viral-pro'),
        'default' => ''
    ),
    'price' => array(
        'type' => 'text',
        'label' => esc_html__('Price', 'viral-pro'),
        'default' => ''
    ),
    'price_per' => array(
        'type' => 'text',
        'label' => esc_html__('Price Per(/month, /year)', 'viral-pro'),
        'default' => ''
    ),
    'content' => array(
        'type' => 'textarea',
        'label' => esc_html__('Plan Feature List', 'viral-pro'),
        'default' => '',
        'description' => esc_html__('Enter Feature list seperated by Enter', 'viral-pro'),
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
    'is_featured' => array(
        'type' => 'checkbox',
        'label' => esc_html__('Is Featured?', 'viral-pro'),
        'default' => 'no'
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

$wp_customize->add_setting('viral_pro_pricing_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_pricing_setting_heading', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_pricing_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_pricing_style', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('Pricing Block Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/pricing-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/pricing-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/pricing-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/pricing-style4.png',
    )
)));

$wp_customize->add_setting('viral_pro_pricing_col', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_pricing_col', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('No of Columns', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 4,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_pricing_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_pricing_button_heading', array(
    'section' => 'viral_pro_pricing_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_pricing_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_pricing_button_text', array(
    'section' => 'viral_pro_pricing_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_pricing_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_pricing_button_link', array(
    'section' => 'viral_pro_pricing_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_pricing_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_pricing_block_color_seperator", array(
    'section' => 'viral_pro_pricing_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_pricing_block_highlight_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFC107'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_pricing_block_highlight_color', array(
    'section' => 'viral_pro_pricing_section',
    'priority' => 56,
    'label' => esc_html__('Pricing Block Highlight Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_pricing_block_highlight_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFFFFF'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_pricing_block_highlight_text_color', array(
    'section' => 'viral_pro_pricing_section',
    'priority' => 56,
    'label' => esc_html__('Pricing Block Highlight Text Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_title_style', array(
    'selector' => '.ht-pricing-section',
    'render_callback' => 'viral_pro_pricing_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_super_title', array(
    'selector' => '.ht-pricing-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_pricing_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_title', array(
    'selector' => '.ht-pricing-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_pricing_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_sub_title', array(
    'selector' => '.ht-pricing-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_pricing_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing', array(
    'selector' => '.ht-pricing-content',
    'render_callback' => 'viral_pro_pricing_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_style', array(
    'selector' => '.ht-pricing-content',
    'render_callback' => 'viral_pro_pricing_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_col', array(
    'selector' => '.ht-pricing-content',
    'render_callback' => 'viral_pro_pricing_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_button_text', array(
    'selector' => '.ht-pricing-section',
    'render_callback' => 'viral_pro_pricing_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_pricing_button_link', array(
    'selector' => '.ht-pricing-section',
    'render_callback' => 'viral_pro_pricing_section',
    'container_inclusive' => true
));
