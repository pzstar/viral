<?php

/* ============TESTIMONIAL PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_testimonial_section', array(
    'title' => esc_html__('Testimonial Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_testimonial_section'),
    'hiding_control' => 'viral_pro_testimonial_section_disable'
)));

//ENABLE/DISABLE TESTIMONIAL SECTION
$wp_customize->add_setting('viral_pro_testimonial_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_testimonial_section_disable', array(
    'section' => 'viral_pro_testimonial_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_testimonial_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_testimonial_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_testimonial_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_testimonial_title_subtitle_heading',
                'viral_pro_testimonial_super_title',
                'viral_pro_testimonial_title',
                'viral_pro_testimonial_sub_title',
                'viral_pro_testimonial_title_style',
                'viral_pro_testimonial_header',
                'viral_pro_testimonial',
                'viral_pro_testimonial_setting_heading',
                'viral_pro_testimonial_style',
                'viral_pro_testimonial_button_heading',
                'viral_pro_testimonial_button_text',
                'viral_pro_testimonial_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_testimonial_cs_heading',
                'viral_pro_testimonial_super_title_color',
                'viral_pro_testimonial_title_color',
                'viral_pro_testimonial_text_color',
                'viral_pro_testimonial_link_color',
                'viral_pro_testimonial_link_hov_color',
                'viral_pro_testimonial_block_color_seperator',
                'viral_pro_testimonial_block_bg_color',
                'viral_pro_testimonial_block_name_color',
                'viral_pro_testimonial_block_designation_color',
                'viral_pro_testimonial_block_text_color',
                'viral_pro_testimonial_block_arrow_color',
                'viral_pro_testimonial_mb_seperator',
                'viral_pro_testimonial_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_testimonial_enable_fullwindow',
                'viral_pro_testimonial_align_item',
                'viral_pro_testimonial_fw_seperator',
                'viral_pro_testimonial_bg_type',
                'viral_pro_testimonial_bg_color',
                'viral_pro_testimonial_bg_gradient',
                'viral_pro_testimonial_bg_image',
                'viral_pro_testimonial_parallax_effect',
                'viral_pro_testimonial_bg_video',
                'viral_pro_testimonial_overlay_color',
                'viral_pro_testimonial_cs_seperator',
                'viral_pro_testimonial_padding',
                'viral_pro_testimonial_seperator0',
                'viral_pro_testimonial_section_seperator',
                'viral_pro_testimonial_seperator1',
                'viral_pro_testimonial_top_seperator',
                'viral_pro_testimonial_ts_color',
                'viral_pro_testimonial_ts_height',
                'viral_pro_testimonial_seperator2',
                'viral_pro_testimonial_bottom_seperator',
                'viral_pro_testimonial_bs_color',
                'viral_pro_testimonial_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_testimonial_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_testimonial_title_subtitle_heading', array(
    'section' => 'viral_pro_testimonial_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_testimonial_super_title', array(
    'section' => 'viral_pro_testimonial_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_testimonial_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Testimonial Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_testimonial_title', array(
    'section' => 'viral_pro_testimonial_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_testimonial_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Testimonial Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_testimonial_sub_title', array(
    'section' => 'viral_pro_testimonial_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_testimonial_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_testimonial_title_style', array(
    'section' => 'viral_pro_testimonial_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

//TESTIMONIAL PAGES
$wp_customize->add_setting('viral_pro_testimonial_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_testimonial_header', array(
    'section' => 'viral_pro_testimonial_section',
    'label' => esc_html__('Testimonial', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'image' => '',
            'name' => '',
            'designation' => '',
            'content' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_testimonial', array(
    'section' => 'viral_pro_testimonial_section',
    'box_label' => esc_html__('Testimonial Block', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Upload Image', 'viral-pro'),
        'default' => ''
    ),
    'name' => array(
        'type' => 'text',
        'label' => esc_html__('Name', 'viral-pro'),
        'default' => ''
    ),
    'designation' => array(
        'type' => 'text',
        'label' => esc_html__('Designation', 'viral-pro'),
        'default' => ''
    ),
    'content' => array(
        'type' => 'textarea',
        'label' => esc_html__('Short Detail', 'viral-pro'),
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

$wp_customize->add_setting('viral_pro_testimonial_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_testimonial_setting_heading', array(
    'section' => 'viral_pro_testimonial_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_testimonial_style', array(
    'section' => 'viral_pro_testimonial_section',
    'label' => esc_html__('Testimonial Block Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/testimonial-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/testimonial-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/testimonial-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/testimonial-style4.png',
    )
)));

$wp_customize->add_setting('viral_pro_testimonial_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_testimonial_button_heading', array(
    'section' => 'viral_pro_testimonial_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_testimonial_button_text', array(
    'section' => 'viral_pro_testimonial_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_testimonial_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_testimonial_button_link', array(
    'section' => 'viral_pro_testimonial_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_testimonial_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_testimonial_block_color_seperator", array(
    'section' => 'viral_pro_testimonial_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_testimonial_block_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFFFFF'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_testimonial_block_bg_color', array(
    'section' => 'viral_pro_testimonial_section',
    'priority' => 56,
    'label' => esc_html__('Testimonial Block Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_block_name_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_testimonial_block_name_color', array(
    'section' => 'viral_pro_testimonial_section',
    'priority' => 56,
    'label' => esc_html__('Testimonial Block Name Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_block_designation_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_testimonial_block_designation_color', array(
    'section' => 'viral_pro_testimonial_section',
    'priority' => 56,
    'label' => esc_html__('Testimonial Block Designation Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_block_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_testimonial_block_text_color', array(
    'section' => 'viral_pro_testimonial_section',
    'priority' => 56,
    'label' => esc_html__('Testimonial Block Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_testimonial_block_arrow_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_testimonial_block_arrow_color', array(
    'section' => 'viral_pro_testimonial_section',
    'priority' => 56,
    'label' => esc_html__('Testimonial Block Slider Arrow/Dots Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_title_style', array(
    'selector' => '.ht-testimonial-section',
    'render_callback' => 'viral_pro_testimonial_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_super_title', array(
    'selector' => '.ht-testimonial-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_testimonial_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_title', array(
    'selector' => '.ht-testimonial-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_testimonial_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_sub_title', array(
    'selector' => '.ht-testimonial-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_testimonial_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial', array(
    'selector' => '.ht-testimonial-content',
    'render_callback' => 'viral_pro_testimonial_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_style', array(
    'selector' => '.ht-testimonial-content',
    'render_callback' => 'viral_pro_testimonial_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_button_text', array(
    'selector' => '.ht-testimonial-section',
    'render_callback' => 'viral_pro_testimonial_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_testimonial_button_link', array(
    'selector' => '.ht-testimonial-section',
    'render_callback' => 'viral_pro_testimonial_section',
    'container_inclusive' => true
));
