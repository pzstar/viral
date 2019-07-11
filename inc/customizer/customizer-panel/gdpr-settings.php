<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
/* GDPR SETTINGS PANEL */

$wp_customize->add_section('viral_pro_gdpr_section', array(
    'title' => esc_html__('GDPR Settings', 'viral-pro'),
    'description' => esc_html__('Use it add GDPR Compliance, Cookies Consent or any other Promotional Stuffs.', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_gdpr_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_gdpr_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_gdpr_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_gdpr_position',
                'viral_pro_gdpr_notice',
                'viral_pro_gdpr_confirm_button_text',
                'viral_pro_gdpr_button_text',
                'viral_pro_gdpr_button_link',
                'viral_pro_gdpr_new_tab',
                'viral_pro_gdpr_hide_mobile'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_gdpr_bg',
                'viral_pro_gdpr_text_color',
                'viral_pro_button_bg_color',
                'viral_pro_button_text_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('viral_pro_enable_gdpr', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_enable_gdpr', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('Activate GDPR Notice', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_gdpr_position', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'bottom-full-width',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_gdpr_position', array(
    'section' => 'viral_pro_gdpr_section',
    'type' => 'select',
    'label' => esc_html__('Select Position', 'viral-pro'),
    'choices' => array(
        'top-full-width' => esc_html__('Top - Full Width', 'viral-pro'),
        'bottom-full-width' => esc_html__('Bottom - Full Width', 'viral-pro'),
        'bottom-left-float' => esc_html__('Bottom Left - Float', 'viral-pro'),
        'bottom-right-float' => esc_html__('Bottom Right - Float', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_gdpr_bg', array(
    'default' => '#333333',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_gdpr_bg', array(
    'label' => esc_html__('Background Color', 'viral-pro'),
    'section' => 'viral_pro_gdpr_section',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('viral_pro_gdpr_notice', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Our website use cookies to improve and personalize your experience and to display advertisements(if any). Our website may also include cookies from third parties like Google Adsense, Google Analytics, Youtube. By using the website, you consent to the use of cookies. We’ve updated our Privacy Policy. Please click on the button to check our Privacy Policy.', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Page_Editor($wp_customize, 'viral_pro_gdpr_notice', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('GDPR Notice', 'viral-pro'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('viral_pro_gdpr_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_gdpr_text_color', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('Text Color', 'viral-pro'),
)));

$wp_customize->add_setting('viral_pro_gdpr_confirm_button_text', array(
    'default' => esc_html__('Ok, I Agree', 'viral-pro'),
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_gdpr_confirm_button_text', array(
    'section' => 'viral_pro_gdpr_section',
    'type' => 'text',
    'label' => esc_html__('Confirm Button Text', 'viral-pro'),
    'description' => esc_html__('This button closes the GDPR section. Once you close it, the section will not appear for 1 day.', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_gdpr_button_text', array(
    'default' => esc_html__('Privacy Policy', 'viral-pro'),
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_gdpr_button_text', array(
    'section' => 'viral_pro_gdpr_section',
    'type' => 'text',
    'label' => esc_html__('GDPR Notice Button Text', 'viral-pro'),
));

$wp_customize->add_setting('viral_pro_gdpr_button_link', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_gdpr_button_link', array(
    'section' => 'viral_pro_gdpr_section',
    'type' => 'text',
    'label' => esc_html__('GDPR Notice Page Link', 'viral-pro'),
    'description' => esc_html__('Leave blank if you don\'t want to show', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_gdpr_new_tab', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_gdpr_new_tab', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('Open Link in New Tab', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_button_bg_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_button_bg_color', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('Button Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_button_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_button_text_color', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('Button Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_gdpr_hide_mobile', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_gdpr_hide_mobile', array(
    'section' => 'viral_pro_gdpr_section',
    'label' => esc_html__('Hide Section in Mobile', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_gdpr_button_text', array(
    'selector' => '.viral-pro-privacy-policy',
    'render_callback' => 'viral_pro_gdpr_notice',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_gdpr_button_link', array(
    'selector' => '.viral-pro-privacy-policy',
    'render_callback' => 'viral_pro_gdpr_notice',
    'container_inclusive' => true
));
