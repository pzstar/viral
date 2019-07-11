<?php
/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
$wp_customize->add_section('viral_pro_maintenance_section', array(
    'title' => esc_html__('Maintenance Mode Settings', 'viral-pro'),
    'priority' => -1,
    'description' => '<strong style="color:red">' . esc_html__('Note: Maintenance Screen only appears for non logged in user. Please open the website in another browser as a non logged in user inorder to check.', 'viral-pro') . '</strong>'
));

$wp_customize->add_setting('viral_pro_maintenance', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_maintenance', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Enable Maintenance Screen', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_maintenance_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_maintenance_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_maintenance_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_maintenance_layout',
                'viral_pro_maintenance_logo',
                'viral_pro_maintenance_title',
                'viral_pro_maintenance_text',
                'viral_pro_maintenance_date',
                'viral_pro_maintenance_shortcode',
                'viral_pro_maintenance_social',
                'viral_pro_maintenance_seperator',
                'viral_pro_maintenance_bg_type',
                'viral_pro_maintenance_banner',
                'viral_pro_maintenance_slider_shortcode',
                'viral_pro_maintenance_sliders',
                'viral_pro_maintenance_slider_info',
                'viral_pro_maintenance_slider_pause',
                'viral_pro_maintenance_video',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_maintenance_background_color',
                'viral_pro_maintenance_bg_overlay_color',
                'viral_pro_maintenance_title_color',
                'viral_pro_maintenance_text_color',
                'viral_pro_maintenance_counter_color',
                'viral_pro_maintenance_social_icon_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('viral_pro_maintenance_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'maintenance-style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Image_Select($wp_customize, 'viral_pro_maintenance_layout', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Maintenance Layout', 'viral-pro'),
    'image_path' => $imagepath . '/inc/customizer/images/maintenance/',
    'choices' => array(
        'maintenance-style1' => esc_html__('Full Width Style', 'viral-pro'),
        'maintenance-style2' => esc_html__('Half Width Style', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_maintenance_logo', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'viral_pro_maintenance_logo', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Upload Logo', 'viral-pro'),
)));

$wp_customize->add_setting('viral_pro_maintenance_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('WEBSITE UNDER MAINTENANCE', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_maintenance_title', array(
    'section' => 'viral_pro_maintenance_section',
    'type' => 'text',
    'label' => esc_html__('Maintenance Title', 'viral-pro'),
));

$wp_customize->add_setting('viral_pro_maintenance_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('We are coming soon with new changes. Stay Tuned!', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Page_Editor($wp_customize, 'viral_pro_maintenance_text', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Maintenance Text', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_maintenance_date', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Date_Control($wp_customize, 'viral_pro_maintenance_date', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Maintenance Date', 'viral-pro'),
    'description' => esc_html__('Choose the Date when you plan to make your website live.', 'viral-pro'),
)));

$wp_customize->add_setting('viral_pro_maintenance_shortcode', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_maintenance_shortcode', array(
    'section' => 'viral_pro_maintenance_section',
    'type' => 'text',
    'label' => esc_html__('Maintenance ShortCode', 'viral-pro'),
    'description' => esc_html__('Add the ShortCode for mailchimp or any other content that you want to show', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_maintenance_social', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_maintenance_social', array(
    'label' => esc_html__('Social Icons', 'viral-pro'),
    'section' => 'viral_pro_maintenance_section',
    'description' => sprintf(esc_html__('Add your %s here', 'viral-pro'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('viral_pro_maintenance_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_maintenance_seperator', array(
    'section' => 'viral_pro_maintenance_section',
)));

$wp_customize->add_setting('viral_pro_maintenance_bg_type', array(
    'default' => 'banner',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_maintenance_bg_type', array(
    'section' => 'viral_pro_maintenance_section',
    'type' => 'radio',
    'label' => esc_html__('Maintenance Background Type', 'viral-pro'),
    'choices' => array(
        'banner' => esc_html__('Banner Image', 'viral-pro'),
        'slider' => esc_html__('Image Slider', 'viral-pro'),
        'revolution' => esc_html__('Revolution Slider', 'viral-pro'),
        'video' => esc_html__('Video', 'viral-pro')
    )
));

$wp_customize->add_setting("viral_pro_maintenance_banner_image", array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => get_template_directory_uri() . '/images/bg.jpg',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("viral_pro_maintenance_banner_image_id", array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("viral_pro_maintenance_banner_image_repeat", array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("viral_pro_maintenance_banner_image_size", array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("viral_pro_maintenance_banner_image_position", array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("viral_pro_maintenance_banner_image_attach", array(
    'default' => 'fixed',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

// Registers example_background control
$wp_customize->add_control(new Viral_Pro_Background_Control($wp_customize, "viral_pro_maintenance_banner", array(
    'label' => esc_html__('Upload Banner Image', 'viral-pro'),
    'section' => "viral_pro_maintenance_section",
    'settings' => array(
        'image_url' => "viral_pro_maintenance_banner_image",
        'image_id' => "viral_pro_maintenance_banner_image_id",
        'repeat' => "viral_pro_maintenance_banner_image_repeat", // Use false to hide the field
        'size' => "viral_pro_maintenance_banner_image_size",
        'position' => "viral_pro_maintenance_banner_image_position",
        'attach' => "viral_pro_maintenance_banner_image_attach"
    ),
)));

$wp_customize->add_setting('viral_pro_maintenance_slider_shortcode', array(
    'default' => '',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_maintenance_slider_shortcode', array(
    'section' => 'viral_pro_maintenance_section',
    'type' => 'text',
    'label' => esc_html__('Slider ShortCode', 'viral-pro'),
    'description' => esc_html__('Add the ShortCode for Slider', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_maintenance_sliders', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'image' => ''
        )
    ))
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_maintenance_sliders', array(
    'label' => esc_html__('Add Sliders', 'viral-pro'),
    'section' => 'viral_pro_maintenance_section',
    'box_label' => esc_html__('Slider', 'viral-pro'),
    'add_label' => esc_html__('Add Slider', 'viral-pro')
        ), array(
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Upload Image', 'viral-pro'),
        'default' => ''
    )
)));

$wp_customize->add_setting('viral_pro_maintenance_slider_info', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_maintenance_slider_info', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Note:', 'viral-pro'),
    'description' => esc_html__('Recommended Image Size: 1900X1000', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_maintenance_slider_pause', array(
    'default' => '5',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_maintenance_slider_pause', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Slider Pause Duration', 'viral-pro'),
    'description' => esc_html__('Slider Pause duration in seconds', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 10,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_maintenance_video', array(
    'default' => 'yNAsk4Zw2p0',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_maintenance_video', array(
    'section' => 'viral_pro_maintenance_section',
    'type' => 'text',
    'label' => esc_html__('Video Id', 'viral-pro'),
    'description' => 'https://www.youtube.com/watch?v=<strong>yNAsk4Zw2p0</strong>. ' . esc_html__('Add only yNAsk4Zw2p0', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_maintenance_background_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_maintenance_background_color', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_maintenance_bg_overlay_color', array(
    'default' => 'rgba(255,255,255,0)',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_maintenance_bg_overlay_color', array(
    'label' => esc_html__('Background Overlay Color', 'viral-pro'),
    'section' => 'viral_pro_maintenance_section',
    'palette' => array(
        'rgb(255, 255, 255, 0.3)', // RGB, RGBa, and hex values supported
        'rgba(0, 0, 0, 0.3)',
        'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
        '#00CC99', // Mix of color types = no problem
        '#00C439',
        '#00C569',
        'rgba( 255, 234, 255, 0.2 )', // Different spacing = no problem
        '#AACC99', // Mix of color types = no problem
        '#33C439',
    )
)));

$wp_customize->add_setting('viral_pro_maintenance_title_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_maintenance_title_color', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_maintenance_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_maintenance_text_color', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_maintenance_counter_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_maintenance_counter_color', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Counter Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_maintenance_social_icon_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_maintenance_social_icon_color', array(
    'section' => 'viral_pro_maintenance_section',
    'label' => esc_html__('Social Icon Color', 'viral-pro')
)));