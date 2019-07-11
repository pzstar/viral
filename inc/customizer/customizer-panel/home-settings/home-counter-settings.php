<?php

/* ============COUNTER SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_counter_section', array(
    'title' => esc_html__('Counter Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_counter_section'),
    'hiding_control' => 'viral_pro_counter_section_disable'
)));

//ENABLE/DISABLE COUNTER SECTION
$wp_customize->add_setting('viral_pro_counter_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_counter_section_disable', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_counter_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_counter_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_counter_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_counter_title_subtitle_heading',
                'viral_pro_counter_super_title',
                'viral_pro_counter_title',
                'viral_pro_counter_sub_title',
                'viral_pro_counter_title_style',
                'viral_pro_counter_heading',
                'viral_pro_counter',
                'viral_pro_counter_setting_heading',
                'viral_pro_counter_style',
                'viral_pro_counter_col',
                'viral_pro_counter_button_heading',
                'viral_pro_counter_button_text',
                'viral_pro_counter_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_counter_cs_heading',
                'viral_pro_counter_super_title_color',
                'viral_pro_counter_title_color',
                'viral_pro_counter_text_color',
                'viral_pro_counter_link_color',
                'viral_pro_counter_link_hov_color',
                'viral_pro_counter_block_color_seperator',
                'viral_pro_counter_block_title_color',
                'viral_pro_counter_block_number_color',
                'viral_pro_counter_block_icon_color',
                'viral_pro_team_mb_seperator',
                'viral_pro_counter_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_counter_enable_fullwindow',
                'viral_pro_counter_align_item',
                'viral_pro_counter_fw_seperator',
                'viral_pro_counter_bg_type',
                'viral_pro_counter_bg_color',
                'viral_pro_counter_bg_gradient',
                'viral_pro_counter_bg_image',
                'viral_pro_counter_parallax_effect',
                'viral_pro_counter_bg_video',
                'viral_pro_counter_overlay_color',
                'viral_pro_counter_cs_seperator',
                'viral_pro_counter_padding',
                'viral_pro_counter_seperator0',
                'viral_pro_counter_section_seperator',
                'viral_pro_counter_seperator1',
                'viral_pro_counter_top_seperator',
                'viral_pro_counter_ts_color',
                'viral_pro_counter_ts_height',
                'viral_pro_counter_seperator2',
                'viral_pro_counter_bottom_seperator',
                'viral_pro_counter_bs_color',
                'viral_pro_counter_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_counter_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_counter_title_subtitle_heading', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('Section Titles', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_counter_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_counter_super_title', array(
    'section' => 'viral_pro_counter_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_counter_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Counter Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_counter_title', array(
    'section' => 'viral_pro_counter_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_counter_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Counter Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_counter_sub_title', array(
    'section' => 'viral_pro_counter_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_counter_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_counter_title_style', array(
    'section' => 'viral_pro_counter_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

$wp_customize->add_setting('viral_pro_counter_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_counter_heading', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('Counters', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_counter', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'title' => '',
            'value' => '',
            'icon' => 'icofont-angry-monster',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_counter', array(
    'section' => 'viral_pro_counter_section',
    'box_label' => esc_html__('Counter Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'viral-pro'),
        'default' => ''
    ),
    'value' => array(
        'type' => 'text',
        'label' => esc_html__('Counter Value', 'viral-pro'),
        'default' => ''
    ),
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Icon', 'viral-pro'),
        'default' => 'icofont-angry-monster'
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

$wp_customize->add_setting('viral_pro_counter_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_counter_setting_heading', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_counter_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_counter_style', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('Counter Block Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/counter-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/counter-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/counter-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/counter-style4.png'
    )
)));

$wp_customize->add_setting('viral_pro_counter_col', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_counter_col', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('No of Columns', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 6,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_counter_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_counter_button_heading', array(
    'section' => 'viral_pro_counter_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_counter_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_counter_button_text', array(
    'section' => 'viral_pro_counter_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_counter_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_counter_button_link', array(
    'section' => 'viral_pro_counter_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_counter_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_counter_block_color_seperator", array(
    'section' => 'viral_pro_counter_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_counter_block_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_counter_block_title_color', array(
    'section' => 'viral_pro_counter_section',
    'priority' => 56,
    'label' => esc_html__('Counter Block Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_counter_block_number_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_counter_block_number_color', array(
    'section' => 'viral_pro_counter_section',
    'priority' => 56,
    'label' => esc_html__('Counter Block Number Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_counter_block_icon_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_counter_block_icon_color', array(
    'section' => 'viral_pro_counter_section',
    'priority' => 56,
    'label' => esc_html__('Counter Block Icon Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_title_style', array(
    'selector' => '.ht-counter-section',
    'render_callback' => 'viral_pro_counter_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_super_title', array(
    'selector' => '.ht-counter-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_counter_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_title', array(
    'selector' => '.ht-counter-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_counter_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_sub_title', array(
    'selector' => '.ht-counter-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_counter_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter', array(
    'selector' => '.ht-counter-content',
    'render_callback' => 'viral_pro_counter_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_style', array(
    'selector' => '.ht-counter-content',
    'render_callback' => 'viral_pro_counter_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_col', array(
    'selector' => '.ht-counter-content',
    'render_callback' => 'viral_pro_counter_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_button_text', array(
    'selector' => '.ht-counter-section',
    'render_callback' => 'viral_pro_counter_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_counter_button_link', array(
    'selector' => '.ht-counter-section',
    'render_callback' => 'viral_pro_counter_section',
    'container_inclusive' => true
));
