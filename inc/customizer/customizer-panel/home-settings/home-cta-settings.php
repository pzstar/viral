<?php

/* ============CALL TO ACTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_cta_section', array(
    'title' => esc_html__('Call To Action Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_cta_section'),
    'hiding_control' => 'viral_pro_cta_section_disable'
)));

//ENABLE/DISABLE LOGO SECTION
$wp_customize->add_setting('viral_pro_cta_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_cta_section_disable', array(
    'section' => 'viral_pro_cta_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_cta_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_cta_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_cta_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_cta_super_title',
                'viral_pro_cta_title',
                'viral_pro_cta_sub_title',
                'viral_pro_cta_button1_text',
                'viral_pro_cta_button1_link',
                'viral_pro_cta_button2_text',
                'viral_pro_cta_button2_link',
                'viral_pro_cta_video_heading',
                'viral_pro_cta_video_url',
                'viral_pro_cta_video_button_icon',
                'viral_pro_cta_setting_heading',
                'viral_pro_cta_style'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_cta_cs_heading',
                'viral_pro_cta_super_title_color',
                'viral_pro_cta_title_color',
                'viral_pro_cta_text_color',
                'viral_pro_cta_link_color',
                'viral_pro_cta_link_hov_color',
                'viral_pro_cta_button1_bg_color',
                'viral_pro_cta_button1_text_color',
                'viral_pro_cta_button2_bg_color',
                'viral_pro_cta_button2_text_color',
                'viral_pro_cta_video_icon_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_cta_enable_fullwindow',
                'viral_pro_cta_align_item',
                'viral_pro_cta_fw_seperator',
                'viral_pro_cta_bg_type',
                'viral_pro_cta_bg_color',
                'viral_pro_cta_bg_gradient',
                'viral_pro_cta_bg_image',
                'viral_pro_cta_parallax_effect',
                'viral_pro_cta_bg_video',
                'viral_pro_cta_overlay_color',
                'viral_pro_cta_cs_seperator',
                'viral_pro_cta_padding',
                'viral_pro_cta_seperator0',
                'viral_pro_cta_section_seperator',
                'viral_pro_cta_seperator1',
                'viral_pro_cta_top_seperator',
                'viral_pro_cta_ts_color',
                'viral_pro_cta_ts_height',
                'viral_pro_cta_seperator2',
                'viral_pro_cta_bottom_seperator',
                'viral_pro_cta_bs_color',
                'viral_pro_cta_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_cta_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_super_title', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Call To Action Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_title', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Call To Action Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_sub_title', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_button1_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_button1_text', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'text',
    'label' => esc_html__('Button 1 Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_button1_link', array(
    'default' => '',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_button1_link', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'url',
    'label' => esc_html__('Button 1 Link', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_button2_text', array(
    'default' => '',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_button2_text', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'text',
    'label' => esc_html__('Button 2 Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_button2_link', array(
    'default' => '',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_button2_link', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'url',
    'label' => esc_html__('Button 2 Link', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_video_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_cta_video_heading', array(
    'section' => 'viral_pro_cta_section',
    'label' => esc_html__('Video', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_cta_video_url', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_cta_video_url', array(
    'section' => 'viral_pro_cta_section',
    'type' => 'text',
    'label' => esc_html__('Video Url', 'viral-pro'),
    'description' => esc_html__('To display YouTube, Vimeo or VK video, paste the video URL (https://www.youtube.com/watch?v=6O9Nd1RSZSY)', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_cta_video_button_icon', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'viral_pro_cta_video_button_icon', array(
    'section' => 'viral_pro_cta_section',
    'label' => esc_html__('Video Play Icon', 'viral-pro'),
    'description' => esc_html__('On clicking the video play button, the video will show in popup. Default play button will show if left empty.', 'viral-pro'),
)));

$wp_customize->add_setting('viral_pro_cta_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_cta_setting_heading', array(
    'section' => 'viral_pro_cta_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_cta_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_cta_style', array(
    'section' => 'viral_pro_cta_section',
    'label' => esc_html__('CTA Block Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/cta-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/cta-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/cta-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/cta-style4.png'
    )
)));

$wp_customize->add_setting('viral_pro_cta_button1_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_cta_button1_bg_color', array(
    'section' => 'viral_pro_cta_section',
    'priority' => 56,
    'label' => esc_html__('Button 1 Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_cta_button1_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_cta_button1_text_color', array(
    'section' => 'viral_pro_cta_section',
    'priority' => 56,
    'label' => esc_html__('Button 1 Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_cta_button2_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_cta_button2_bg_color', array(
    'section' => 'viral_pro_cta_section',
    'priority' => 56,
    'label' => esc_html__('Button 2 Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_cta_button2_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_cta_button2_text_color', array(
    'section' => 'viral_pro_cta_section',
    'priority' => 56,
    'label' => esc_html__('Button 2 Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_cta_video_icon_color', array(
    'default' => '#e52d27',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_cta_video_icon_color', array(
    'section' => 'viral_pro_cta_section',
    'priority' => 56,
    'label' => esc_html__('Video Play Button Color', 'viral-pro'),
    'description' => esc_html__('Only applies on default play button. Do not choose white color.', 'viral-pro'),
)));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_super_title', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_title', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_sub_title', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_button1_text', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_button1_link', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_button2_text', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_button2_link', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_style', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_video_url', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_cta_video_button_icon', array(
    'selector' => '.ht-cta-section',
    'render_callback' => 'viral_pro_cta_section',
    'container_inclusive' => true
));

