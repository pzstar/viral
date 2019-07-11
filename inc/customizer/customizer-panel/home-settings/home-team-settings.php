<?php

/* ============TEAM SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_team_section', array(
    'title' => esc_html__('Team Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_team_section'),
    'hiding_control' => 'viral_pro_team_section_disable'
)));

//ENABLE/DISABLE TEAM SECTION
$wp_customize->add_setting('viral_pro_team_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_team_section_disable', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_team_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_team_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_team_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_team_title_subtitle_heading',
                'viral_pro_team_super_title',
                'viral_pro_team_title',
                'viral_pro_team_sub_title',
                'viral_pro_team_title_style',
                'viral_pro_team_header',
                'viral_pro_team',
                'viral_pro_team_setting_heading',
                'viral_pro_team_style',
                'viral_pro_team_col',
                'viral_pro_team_image_height',
                'viral_pro_team_slider_enable',
                'viral_pro_team_button_heading',
                'viral_pro_team_button_text',
                'viral_pro_team_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_team_cs_heading',
                'viral_pro_team_super_title_color',
                'viral_pro_team_title_color',
                'viral_pro_team_text_color',
                'viral_pro_team_link_color',
                'viral_pro_team_link_hov_color',
                'viral_pro_team_block_color_seperator',
                'viral_pro_team_block_title_color',
                'viral_pro_team_block_text_color',
                'viral_pro_team_block_social_icon_color',
                'viral_pro_team_block_carousel_arrow_color_group',
                'viral_pro_team_mb_seperator',
                'viral_pro_team_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_team_enable_fullwindow',
                'viral_pro_team_align_item',
                'viral_pro_team_fw_seperator',
                'viral_pro_team_bg_type',
                'viral_pro_team_bg_color',
                'viral_pro_team_bg_gradient',
                'viral_pro_team_bg_image',
                'viral_pro_team_parallax_effect',
                'viral_pro_team_bg_video',
                'viral_pro_team_overlay_color',
                'viral_pro_team_cs_seperator',
                'viral_pro_team_padding',
                'viral_pro_team_seperator0',
                'viral_pro_team_section_seperator',
                'viral_pro_team_seperator1',
                'viral_pro_team_top_seperator',
                'viral_pro_team_ts_color',
                'viral_pro_team_ts_height',
                'viral_pro_team_seperator2',
                'viral_pro_team_bottom_seperator',
                'viral_pro_team_bs_color',
                'viral_pro_team_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_team_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_team_title_subtitle_heading', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_team_super_title', array(
    'section' => 'viral_pro_team_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_team_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Team Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_team_title', array(
    'section' => 'viral_pro_team_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_team_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Team Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_team_sub_title', array(
    'section' => 'viral_pro_team_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_team_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_team_title_style', array(
    'section' => 'viral_pro_team_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

$wp_customize->add_setting('viral_pro_team_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_team_header', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Team Blocks', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'image' => '',
            'name' => '',
            'designation' => '',
            'content' => '',
            'facebook_link' => '',
            'twitter_link' => '',
            'google_plus_link' => '',
            'link' => '',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_team', array(
    'section' => 'viral_pro_team_section',
    'box_label' => esc_html__('Team Block', 'viral-pro'),
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
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Detail Page Link', 'viral-pro'),
        'default' => ''
    ),
    'facebook_link' => array(
        'type' => 'text',
        'label' => esc_html__('Facebook Url', 'viral-pro'),
        'default' => ''
    ),
    'twitter_link' => array(
        'type' => 'text',
        'label' => esc_html__('Twitter Url', 'viral-pro'),
        'default' => ''
    ),
    'google_plus_link' => array(
        'type' => 'text',
        'label' => esc_html__('Google Plus Url', 'viral-pro'),
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

$wp_customize->add_setting('viral_pro_team_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_team_setting_heading', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_team_style', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Team Block Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/team-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/team-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/team-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/team-style4.png'
    )
)));

$wp_customize->add_setting('viral_pro_team_col', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_team_col', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('No of Columns', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 4,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_team_image_height', array(
    'sanitize_callback' => 'absint',
    'default' => 300,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_team_image_height', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Image Height', 'viral-pro'),
    'input_attrs' => array(
        'min' => 100,
        'max' => 600,
        'step' => 10,
    )
)));

$wp_customize->add_setting('viral_pro_team_slider_enable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_team_slider_enable', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('Enable Carousel Slider', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_team_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_team_button_heading', array(
    'section' => 'viral_pro_team_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_team_button_text', array(
    'section' => 'viral_pro_team_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_team_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_team_button_link', array(
    'section' => 'viral_pro_team_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_team_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_team_block_color_seperator", array(
    'section' => 'viral_pro_team_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_team_block_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_team_block_title_color', array(
    'section' => 'viral_pro_team_section',
    'priority' => 56,
    'label' => esc_html__('Team Block Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team_block_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_team_block_text_color', array(
    'section' => 'viral_pro_team_section',
    'priority' => 56,
    'label' => esc_html__('Team Block Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team_block_social_icon_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_team_block_social_icon_color', array(
    'section' => 'viral_pro_team_section',
    'priority' => 56,
    'label' => esc_html__('Team Block Social Icon Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_team_block_carousel_arrow_bg_color', array(
    'default' => '#222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_team_block_carousel_arrow_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_team_block_carousel_arrow_bg_color_hover', array(
    'default' => '#222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_team_block_carousel_arrow_color_hover', array(
    'default' => '#FFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_team_block_carousel_arrow_color_group', array(
    'label' => esc_html__('Team Block Carousel Navigation Colors', 'viral-pro'),
    'section' => 'viral_pro_team_section',
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
        'normal_viral_pro_team_block_carousel_arrow_bg_color' => 'viral_pro_team_block_carousel_arrow_bg_color',
        'normal_viral_pro_team_block_carousel_arrow_color' => 'viral_pro_team_block_carousel_arrow_color',
        'hover_viral_pro_team_block_carousel_arrow_bg_color_hover' => 'viral_pro_team_block_carousel_arrow_bg_color_hover',
        'hover_viral_pro_team_block_carousel_arrow_color_hover' => 'viral_pro_team_block_carousel_arrow_color_hover',
    ),
    'group' => array(
        'normal_viral_pro_team_block_carousel_arrow_bg_color' => esc_html__('Carousel Arrow Background Color', 'viral-pro'),
        'normal_viral_pro_team_block_carousel_arrow_color' => esc_html__('Carousel Arrow Color', 'viral-pro'),
        'hover_viral_pro_team_block_carousel_arrow_bg_color_hover' => esc_html__('Carousel Arrow Background Color', 'viral-pro'),
        'hover_viral_pro_team_block_carousel_arrow_color_hover' => esc_html__('Carousel Arrow Color', 'viral-pro')
    )
)));

$wp_customize->selective_refresh->add_partial('viral_pro_team_title_style', array(
    'selector' => '.ht-team-section',
    'render_callback' => 'viral_pro_team_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_super_title', array(
    'selector' => '.ht-team-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_team_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_title', array(
    'selector' => '.ht-team-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_team_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_sub_title', array(
    'selector' => '.ht-team-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_team_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_team', array(
    'selector' => '.ht-team-content',
    'render_callback' => 'viral_pro_team_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_style', array(
    'selector' => '.ht-team-content',
    'render_callback' => 'viral_pro_team_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_col', array(
    'selector' => '.ht-team-content',
    'render_callback' => 'viral_pro_team_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_slider_enable', array(
    'selector' => '.ht-team-content',
    'render_callback' => 'viral_pro_team_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_button_text', array(
    'selector' => '.ht-team-section',
    'render_callback' => 'viral_pro_team_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_team_button_link', array(
    'selector' => '.ht-team-section',
    'render_callback' => 'viral_pro_team_section',
    'container_inclusive' => true
));

