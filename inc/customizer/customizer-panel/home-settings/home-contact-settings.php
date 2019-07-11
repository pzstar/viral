<?php

/* =============CONTACT US================== */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_contact_section', array(
    'title' => esc_html__('Contact Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_contact_section'),
    'hiding_control' => 'viral_pro_contact_section_disable'
)));

//ENABLE/DISABLE CONTACT SECTION
$wp_customize->add_setting('viral_pro_contact_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_contact_section_disable', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_contact_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_contact_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_contact_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_google_map_heading',
                'viral_pro_longitude',
                'viral_pro_latitude',
                'viral_pro_map_style',
                'viral_pro_google_map_api',
                'viral_pro_enable_iframe_map',
                'viral_pro_google_map_iframe',
                'viral_pro_contact_details_heading',
                'viral_pro_show_contact_detail',
                'viral_pro_contact_shortcode',
                'viral_pro_contact_detail',
                'viral_pro_contact_social_icons',
                'viral_pro_contact_social_link'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_contact_cs_heading',
                'viral_pro_contact_super_title_color',
                'viral_pro_contact_title_color',
                'viral_pro_contact_text_color',
                'viral_pro_contact_link_color',
                'viral_pro_contact_link_hov_color',
                'viral_pro_contact_color_seperator',
                'viral_pro_contact_form_field_color',
                'viral_pro_team_contact_button_color_group',
                'viral_pro_team_social_icon_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_contact_enable_fullwindow',
                'viral_pro_contact_align_item',
                'viral_pro_contact_fw_seperator',
                'viral_pro_contact_bg_type',
                'viral_pro_contact_bg_color',
                'viral_pro_contact_bg_gradient',
                'viral_pro_contact_bg_image',
                'viral_pro_contact_parallax_effect',
                'viral_pro_contact_bg_video',
                'viral_pro_contact_overlay_color',
                'viral_pro_contact_cs_seperator',
                'viral_pro_contact_padding',
                'viral_pro_contact_seperator0',
                'viral_pro_contact_section_seperator',
                'viral_pro_contact_seperator1',
                'viral_pro_contact_top_seperator',
                'viral_pro_contact_ts_color',
                'viral_pro_contact_ts_height',
                'viral_pro_contact_seperator2',
                'viral_pro_contact_bottom_seperator',
                'viral_pro_contact_bs_color',
                'viral_pro_contact_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_google_map_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_google_map_heading', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Google Map', 'viral-pro'),
    'description' => sprintf(esc_html__('Get the Longitude and Latitude value of the location from %s', 'viral-pro'), '<a target="_blank" href="https://www.latlong.net/">here</a>')
)));

$wp_customize->add_setting('viral_pro_latitude', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => '29.424122',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_latitude', array(
    'section' => 'viral_pro_contact_section',
    'type' => 'text',
    'label' => esc_html__('Latitude', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_longitude', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => '-98.493629',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_longitude', array(
    'section' => 'viral_pro_contact_section',
    'type' => 'text',
    'label' => esc_html__('Longitude', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_map_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'normal',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_map_style', array(
    'section' => 'viral_pro_contact_section',
    'type' => 'select',
    'label' => esc_html__('Map Style', 'viral-pro'),
    'choices' => array(
        'normal' => esc_html__('Normal', 'viral-pro'),
        'light' => esc_html__('Light', 'viral-pro'),
        'dark' => esc_html__('Dark', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_google_map_api', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_google_map_api', array(
    'label' => esc_html__('Google Map API Key', 'viral-pro'),
    'section' => 'viral_pro_contact_section',
    'description' => sprintf(esc_html__('Google Map API key is required for a map to work. Enter API key %s', 'viral-pro'), '<a target="_blank" href="' . admin_url('admin.php?page=viral-pro-options') . '">' . esc_html__('Here', 'viral-pro') . '</a>')
)));

$wp_customize->add_setting('viral_pro_enable_iframe_map', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_enable_iframe_map', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Enable Iframe Google Map', 'viral-pro'),
    'description' => esc_html__('Don\'t have Google API. No Problem. Enable Iframe Google Map and add the Google Map Iframe below.', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_google_map_iframe', array(
    //'sanitize_callback' => 'wp_kses_post',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_google_map_iframe', array(
    'section' => 'viral_pro_contact_section',
    'type' => 'textarea',
    'label' => esc_html__('Google Map Iframe', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_contact_details_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_contact_details_heading', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Contact Details', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_show_contact_detail', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'on',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_show_contact_detail', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Show Contact Detail', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_contact_shortcode', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_contact_shortcode', array(
    'section' => 'viral_pro_contact_section',
    'type' => 'text',
    'label' => esc_html__('Contact Form Shortcode', 'viral-pro'),
    'description' => sprintf(esc_html__('Install %s plugin to get the shortcode', 'viral-pro'), '<a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a>')
));

$wp_customize->add_setting('viral_pro_contact_detail', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => '',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Page_Editor($wp_customize, 'viral_pro_contact_detail', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Contact Detail', 'viral-pro'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('viral_pro_contact_social_icons', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_contact_social_icons', array(
    'section' => 'viral_pro_contact_section',
    'label' => esc_html__('Show Social Icons Below Contact Detail', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_contact_social_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_contact_social_link', array(
    'label' => esc_html__('Social Icons', 'viral-pro'),
    'section' => 'viral_pro_contact_section',
    'description' => sprintf(esc_html__('Add your %s here', 'viral-pro'), '<a href="#">Social Icons</a>')
)));

$wp_customize->add_setting("viral_pro_contact_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_contact_color_seperator", array(
    'section' => 'viral_pro_contact_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_contact_form_field_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_contact_form_field_color', array(
    'section' => 'viral_pro_contact_section',
    'priority' => 56,
    'label' => esc_html__('Contact Form Fields Border Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_contact_button_bg_color', array(
    'default' => '#222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_contact_button_text_color', array(
    'default' => '#FFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_contact_button_bg_color_hover', array(
    'default' => '#222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_contact_button_text_color_hover', array(
    'default' => '#FFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_team_contact_button_color_group', array(
    'label' => esc_html__('Contact Form Button Colors', 'viral-pro'),
    'section' => 'viral_pro_contact_section',
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
        'normal_viral_pro_contact_button_bg_color' => 'viral_pro_contact_button_bg_color',
        'normal_viral_pro_contact_button_text_color' => 'viral_pro_contact_button_text_color',
        'hover_viral_pro_contact_button_bg_color_hover' => 'viral_pro_contact_button_bg_color_hover',
        'hover_viral_pro_contact_button_text_color_hover' => 'viral_pro_contact_button_text_color_hover',
    ),
    'group' => array(
        'normal_viral_pro_contact_button_bg_color' => esc_html__('Button Background Color', 'viral-pro'),
        'normal_viral_pro_contact_button_text_color' => esc_html__('Button Text Color', 'viral-pro'),
        'hover_viral_pro_contact_button_bg_color_hover' => esc_html__('Button Background Color', 'viral-pro'),
        'hover_viral_pro_contact_button_text_color_hover' => esc_html__('Button Text Color', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_social_icon_bg_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_social_icon_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_social_icon_bg_color_hover', array(
    'default' => '#333333',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_social_icon_color_hover', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_team_social_icon_color_group', array(
    'label' => esc_html__('Social Icon Colors', 'viral-pro'),
    'section' => 'viral_pro_contact_section',
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
        'normal_viral_pro_social_icon_bg_color' => 'viral_pro_social_icon_bg_color',
        'normal_viral_pro_social_icon_color' => 'viral_pro_social_icon_color',
        'hover_viral_pro_social_icon_bg_color_hover' => 'viral_pro_social_icon_bg_color_hover',
        'hover_viral_pro_social_icon_color_hover' => 'viral_pro_social_icon_color_hover',
    ),
    'group' => array(
        'normal_viral_pro_social_icon_bg_color' => esc_html__('Social Icon Background Color', 'viral-pro'),
        'normal_viral_pro_social_icon_color' => esc_html__('Social Icon Color', 'viral-pro'),
        'hover_viral_pro_social_icon_bg_color_hover' => esc_html__('Social Icon Background Color', 'viral-pro'),
        'hover_viral_pro_social_icon_color_hover' => esc_html__('Social Icon Color', 'viral-pro')
    )
)));

$wp_customize->selective_refresh->add_partial('viral_pro_longitude', array(
    'selector' => '.ht-contact-google-map',
    'render_callback' => 'viral_pro_contact_map',
));

$wp_customize->selective_refresh->add_partial('viral_pro_latitude', array(
    'selector' => '.ht-contact-google-map',
    'render_callback' => 'viral_pro_contact_map',
));

$wp_customize->selective_refresh->add_partial('viral_pro_map_style', array(
    'selector' => '.ht-contact-google-map',
    'render_callback' => 'viral_pro_contact_map',
));

$wp_customize->selective_refresh->add_partial('viral_pro_google_map_api', array(
    'selector' => '.ht-contact-google-map',
    'render_callback' => 'viral_pro_contact_map',
));

$wp_customize->selective_refresh->add_partial('viral_pro_enable_iframe_map', array(
    'selector' => '.ht-contact-google-map',
    'render_callback' => 'viral_pro_contact_map',
));

$wp_customize->selective_refresh->add_partial('viral_pro_google_map_iframe', array(
    'selector' => '.ht-contact-google-map',
    'render_callback' => 'viral_pro_contact_map',
));

$wp_customize->selective_refresh->add_partial('viral_pro_contact_shortcode', array(
    'selector' => '.ht-contact-section .ht-container',
    'render_callback' => 'viral_pro_contact_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_contact_detail', array(
    'selector' => '.ht-contact-section .ht-container',
    'render_callback' => 'viral_pro_contact_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_contact_social_icons', array(
    'selector' => '.ht-contact-section .ht-container',
    'render_callback' => 'viral_pro_contact_content',
));

$wp_customize->selective_refresh->add_partial('viral_pro_show_contact_detail', array(
    'selector' => '.ht-contact-section',
    'render_callback' => 'viral_pro_contact_section',
    'container_inclusive' => true
));


