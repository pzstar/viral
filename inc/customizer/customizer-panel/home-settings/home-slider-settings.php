<?php

/* ============SLIDER IMAGES SECTION============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_slider_section', array(
    'title' => esc_html__('Home Slider', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => -1,
    'hiding_control' => 'viral_pro_slider_disable',
)));

$wp_customize->add_setting('viral_pro_slider_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_slider_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_slider_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_slider_type',
                'viral_pro_slider_heading',
                'viral_pro_sliders',
                'viral_pro_slider_info',
                'viral_pro_slider_setting_heading',
                'viral_pro_slider_full_screen',
                'viral_pro_slider_arrow',
                'viral_pro_slider_dots',
                'viral_pro_slider_shadow',
                'viral_pro_arrow_position',
                'viral_pro_slider_pause',
                'viral_pro_arrow_position',
                'viral_pro_slider_caption_bg',
                'viral_pro_caption_width',
                'viral_pro_banner_image',
                'viral_pro_banner_title',
                'viral_pro_banner_subtitle',
                'viral_pro_banner_button_text',
                'viral_pro_banner_button_link',
                'viral_pro_banner_text_alignment',
                'viral_pro_banner_parallax_effect',
                'viral_pro_slider_shortcode'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_slider_overlay_color',
                'viral_pro_banner_overlay_color',
                'viral_pro_caption_bg_color',
                'viral_pro_caption_text_color',
                'viral_pro_slider_arrow_color_group',
                'viral_pro_caption_button_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_slider_bottom_seperator',
                'viral_pro_slider_bs_color',
                'viral_pro_slider_bs_height'
            )
        )
    ),
)));

//ENABLE/DISABLE SLIDER
$wp_customize->add_setting('viral_pro_slider_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_slider_disable', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_slider_type', array(
    'default' => 'normal',
    'sanitize_callback' => 'viral_pro_sanitize_choices'
));

$wp_customize->add_control('viral_pro_slider_type', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'radio',
    'label' => esc_html__('Slider Type', 'viral-pro'),
    'choices' => array(
        'normal' => esc_html__('Normal Slider', 'viral-pro'),
        'revolution' => esc_html__('Revolution Slider', 'viral-pro'),
        'banner' => esc_html__('Single Banner Image', 'viral-pro')
    )
));

/* Slider */
$wp_customize->add_setting('viral_pro_slider_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_slider_heading', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Sliders', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_sliders', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'image' => '',
            'title' => '',
            'subtitle' => '',
            'button_link' => '',
            'button_text' => esc_html__('Read More', 'viral-pro'),
            'alignment' => 'center',
            'enable' => 'on'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_sliders', array(
    'label' => esc_html__('Add Sliders', 'viral-pro'),
    'section' => 'viral_pro_slider_section',
    'box_label' => esc_html__('Slider', 'viral-pro'),
    'add_label' => esc_html__('Add Slider', 'viral-pro')
        ), array(
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Upload Image', 'viral-pro'),
        'default' => ''
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Slider Caption Title', 'viral-pro'),
        'default' => ''
    ),
    'subtitle' => array(
        'type' => 'textarea',
        'label' => esc_html__('Slider Caption Subtitle', 'viral-pro'),
        'default' => ''
    ),
    'button_link' => array(
        'type' => 'text',
        'label' => esc_html__('Slider Button Link', 'viral-pro'),
        'default' => ''
    ),
    'button_text' => array(
        'type' => 'text',
        'label' => esc_html__('Slider Button Text', 'viral-pro'),
        'default' => esc_html__('Read More', 'viral-pro')
    ),
    'alignment' => array(
        'type' => 'select',
        'label' => esc_html__('Slider Caption Alignment', 'viral-pro'),
        'default' => 'center',
        'options' => array(
            'center' => esc_html__('Center', 'viral-pro'),
            'left' => esc_html__('Left', 'viral-pro'),
            'right' => esc_html__('Right', 'viral-pro')
        )
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable Slider', 'viral-pro'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->add_setting('viral_pro_slider_info', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_slider_info', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Note:', 'viral-pro'),
    'description' => esc_html__('Recommended Image Size: 1900X800', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_slider_setting_heading', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Slider Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_full_screen', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_slider_full_screen', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Full Screen Slider', 'viral-pro'),
    'description' => esc_html__('Image may crop on either sides to cover the full screen.', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_arrow', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_slider_arrow', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Slider Arrow', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_dots', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_slider_dots', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Slider Dots', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_shadow', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_slider_shadow', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Slider Bottom Shadow', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_arrow_position', array(
    'default' => 'bottom',
    'sanitize_callback' => 'viral_pro_sanitize_choices'
));

$wp_customize->add_control('viral_pro_arrow_position', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'select',
    'label' => esc_html__('Slider Arrow Position', 'viral-pro'),
    'choices' => array(
        'center' => esc_html('Center', 'viral-pro'),
        'bottom' => esc_html('Bottom', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_slider_pause', array(
    'default' => '6',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_slider_pause', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Slider Pause Duration', 'viral-pro'),
    'description' => esc_html__('Slider Pause duration in seconds', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 15,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_slider_overlay_color', array(
    'default' => 'rgba(255,255,255,0)',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_slider_overlay_color', array(
    'label' => esc_html__('Slider Overlay Color', 'viral-pro'),
    'section' => 'viral_pro_slider_section',
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

/* Banner */
$wp_customize->add_setting('viral_pro_banner_image', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage',
    'default' => get_template_directory_uri() . '/images/bg.jpg'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'viral_pro_banner_image', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Upload Banner Image', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_banner_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_banner_title', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'text',
    'label' => esc_html__('Banner Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_banner_subtitle', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_banner_subtitle', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'textarea',
    'label' => esc_html__('Banner SubTitle', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_banner_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_banner_button_text', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_banner_button_link', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_banner_button_link', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'text',
    'label' => esc_html__('Banner Link', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_banner_text_alignment', array(
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'default' => 'center',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_banner_text_alignment', array(
    'type' => 'select',
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Banner Text Alignment', 'viral-pro'),
    'choices' => array(
        'left' => esc_html__('Left', 'viral-pro'),
        'right' => esc_html__('Right', 'viral-pro'),
        'center' => esc_html__('Center', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_banner_parallax_effect', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'none',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_banner_parallax_effect', array(
    'type' => 'radio',
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Background Effect', 'viral-pro'),
    'choices' => array(
        'none' => esc_html__('None', 'viral-pro'),
        'parallax' => esc_html__('Enable Parallax', 'viral-pro'),
        'scroll' => esc_html__('Horizontal Moving', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_slider_caption_bg', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_slider_caption_bg', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Caption Background', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_caption_width', array(
    'default' => '50',
    'sanitize_callback' => 'viral_pro_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_caption_width_tablet', array(
    'default' => '70',
    'sanitize_callback' => 'viral_pro_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_caption_width_mobile', array(
    'default' => '90',
    'sanitize_callback' => 'viral_pro_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Slider_Control($wp_customize, 'viral_pro_caption_width', array(
    'section' => 'viral_pro_slider_section',
    'settings' => array(
        'desktop' => 'viral_pro_caption_width',
        'tablet' => 'viral_pro_caption_width_tablet',
        'mobile' => 'viral_pro_caption_width_mobile',
    ),
    'label' => esc_html__('Caption Width(%)', 'viral-pro'),
    'input_attrs' => array(
        'min' => 30,
        'max' => 100,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_banner_overlay_color', array(
    'default' => 'rgba(255,255,255,0)',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_banner_overlay_color', array(
    'label' => esc_html__('Banner Overlay Color', 'viral-pro'),
    'section' => 'viral_pro_slider_section',
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

$wp_customize->add_setting('viral_pro_caption_bg_color', array(
    'default' => 'rgba(0, 0, 0, 0.3)',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_caption_bg_color', array(
    'label' => esc_html__('Caption Background Color', 'viral-pro'),
    'section' => 'viral_pro_slider_section',
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

$wp_customize->add_setting('viral_pro_caption_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_caption_text_color', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Caption Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_arrow_bg_color', array(
    'default' => '#222222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_slider_arrow_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_slider_arrow_bg_color_hover', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_slider_arrow_color_hover', array(
    'default' => '#222222',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_slider_arrow_color_group', array(
    'label' => esc_html__('Slider Navigation Colors', 'viral-pro'),
    'section' => 'viral_pro_slider_section',
    'show_opacity' => true,
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
        'normal_viral_pro_slider_arrow_bg_color' => 'viral_pro_slider_arrow_bg_color',
        'normal_viral_pro_slider_arrow_color' => 'viral_pro_slider_arrow_color',
        'hover_viral_pro_slider_arrow_bg_color_hover' => 'viral_pro_slider_arrow_bg_color_hover',
        'hover_viral_pro_slider_arrow_color_hover' => 'viral_pro_slider_arrow_color_hover',
    ),
    'group' => array(
        'normal_viral_pro_slider_arrow_bg_color' => esc_html__('Slider Arrow/Dot Background Color', 'viral-pro'),
        'normal_viral_pro_slider_arrow_color' => esc_html__('Slider Arrow Color', 'viral-pro'),
        'hover_viral_pro_slider_arrow_bg_color_hover' => esc_html__('Slider Arrow/Dot Background Color', 'viral-pro'),
        'hover_viral_pro_slider_arrow_color_hover' => esc_html__('Slider Arrow Color', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_caption_button_bg_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_caption_button_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_caption_button_bg_hov_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_caption_button_text_hov_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_caption_button_color_group', array(
    'label' => esc_html__('Caption Button Colors', 'viral-pro'),
    'section' => 'viral_pro_slider_section',
    'show_opacity' => false,
    'settings' => array(
        'normal_viral_pro_caption_button_bg_color' => 'viral_pro_caption_button_bg_color',
        'normal_viral_pro_caption_button_text_color' => 'viral_pro_caption_button_text_color',
        'hover_viral_pro_caption_button_bg_hov_color' => 'viral_pro_caption_button_bg_hov_color',
        'hover_viral_pro_caption_button_text_hov_color' => 'viral_pro_caption_button_text_hov_color',
    ),
    'group' => array(
        'normal_viral_pro_caption_button_bg_color' => esc_html__('Button Background Color', 'viral-pro'),
        'normal_viral_pro_caption_button_text_color' => esc_html__('Button Text Color', 'viral-pro'),
        'hover_viral_pro_caption_button_bg_hov_color' => esc_html__('Button Background Color', 'viral-pro'),
        'hover_viral_pro_caption_button_text_hov_color' => esc_html__('Button Text Color', 'viral-pro')
    )
)));

/* Revolution Slider Shortcode */
$wp_customize->add_setting('viral_pro_slider_shortcode', array(
    'default' => '',
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control('viral_pro_slider_shortcode', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'text',
    'label' => esc_html__('Slider ShortCode', 'viral-pro'),
    'description' => esc_html__('Add the ShortCode for Slider', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_slider_bottom_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'none',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_slider_bottom_seperator', array(
    'section' => 'viral_pro_slider_section',
    'type' => 'select',
    'label' => esc_html__('Bottom Seperator', 'viral-pro'),
    'choices' => array_merge(array('none' => 'None'), viral_pro_svg_seperator())
));

$wp_customize->add_setting('viral_pro_slider_bs_color', array(
    'default' => '#FF0000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_slider_bs_color', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Bottom Seperator Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_slider_bs_height', array(
    'sanitize_callback' => 'viral_pro_sanitize_number_blank',
    'default' => 60,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_slider_bs_height_tablet', array(
    'sanitize_callback' => 'viral_pro_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_slider_bs_height_mobile', array(
    'sanitize_callback' => 'viral_pro_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Slider_Control($wp_customize, 'viral_pro_slider_bs_height', array(
    'section' => 'viral_pro_slider_section',
    'label' => esc_html__('Bottom Seperator Height (px)', 'viral-pro'),
    'settings' => array(
        'desktop' => 'viral_pro_slider_bs_height',
        'tablet' => 'viral_pro_slider_bs_height_tablet',
        'mobile' => 'viral_pro_slider_bs_height_mobile',
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 200,
        'step' => 1,
    )
)));

$wp_customize->selective_refresh->add_partial('viral_pro_sliders', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_slider_pause', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_slider_full_screen', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_slider_arrow', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_slider_dots', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_slider_shadow', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_arrow_position', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_slider_bottom_seperator', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_banner_button_link', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_banner_parallax_effect', array(
    'selector' => '#ht-home-slider-section',
    'render_callback' => 'viral_pro_slider_section',
    'container_inclusive' => true
));

