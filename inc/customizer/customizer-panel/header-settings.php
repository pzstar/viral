<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
/* HEADER PANEL */
$wp_customize->add_panel('viral_pro_header_settings_panel', array(
    'title' => esc_html__('Header Settings', 'viral-pro'),
    'priority' => 15
));

$wp_customize->get_section('title_tagline')->panel = 'viral_pro_header_settings_panel';
$wp_customize->get_section('title_tagline')->title = esc_html__('Logo & Favicon', 'viral-pro');

$wp_customize->add_setting('viral_pro_hide_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_hide_title', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Title', 'viral-pro')
));

$wp_customize->selective_refresh->add_partial('viral_pro_hide_title', array(
    'selector' => '#ht-site-branding',
    'render_callback' => 'viral_pro_header_logo'
));

$wp_customize->add_setting('viral_pro_hide_tagline', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_hide_tagline', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Tagline', 'viral-pro')
));

$wp_customize->selective_refresh->add_partial('viral_pro_hide_tagline', array(
    'selector' => '#ht-site-branding',
    'render_callback' => 'viral_pro_header_logo'
));

$wp_customize->add_setting('viral_pro_title_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_title_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Title/Tagline Color', 'viral-pro')
)));

//HEADER SETTINGS
$wp_customize->add_section('viral_pro_header_options', array(
    'title' => esc_html__('Header Options', 'viral-pro'),
    'panel' => 'viral_pro_header_settings_panel'
));

$wp_customize->add_setting('viral_pro_header_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_header_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_header_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Layouts', 'viral-pro'),
            'fields' => array(
                'viral_pro_mh_layout',
                'viral_pro_header_position',
                'viral_pro_responsive_width',
                'viral_pro_header_layouts'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Top Bar', 'viral-pro'),
            'fields' => array(
                'viral_pro_top_header',
                'viral_pro_th_bg_color',
                'viral_pro_th_text_color',
                'viral_pro_th_anchor_color',
                'viral_pro_th_padding',
                'viral_pro_th_disable_mobile',
                'viral_pro_top_header_options_heading',
                'viral_pro_th_left_display',
                'viral_pro_th_right_display',
                'viral_pro_top_header_seperator',
                'viral_pro_social_link',
                'viral_pro_th_menu',
                'viral_pro_th_widget',
                'viral_pro_th_text'
            ),
        ),
        array(
            'name' => esc_html__('Main Menu', 'viral-pro'),
            'fields' => array(
                'viral_pro_sticky_header',
                'viral_pro_mh_bg_color',
                'viral_pro_mh_bg_color_mobile',
                'viral_pro_mh_height',
                'viral_pro_add_menu',
                'viral_pro_mh_show_search',
                'viral_pro_mh_show_cart',
                'viral_pro_mh_show_social',
                'viral_pro_menu_seperator',
                'viral_pro_mh_menu_color',
                'viral_pro_mh_menu_hover_color',
                'viral_pro_mh_menu_hover_bg_color',
                'viral_pro_submenu_seperator',
                'viral_pro_mh_submenu_bg_color',
                'viral_pro_mh_submenu_color',
                'viral_pro_mh_submenu_hover_color',
                'viral_pro_menuhover_seperator',
                'viral_pro_mh_menu_hover_style',
                'viral_pro_menu_dropdown_padding'
            ),
        ),
    ),
)));

//HEADER LAYOUTS
$wp_customize->add_setting('viral_pro_mh_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'header-style1'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_mh_layout', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Header Layout', 'viral-pro'),
    'class' => 'ht-full-width',
    'options' => array(
        'header-style1' => $imagepath . '/inc/customizer/images/headers/header-1.png',
        'header-style2' => $imagepath . '/inc/customizer/images/headers/header-2.png',
        'header-style3' => $imagepath . '/inc/customizer/images/headers/header-3.png',
        'header-style4' => $imagepath . '/inc/customizer/images/headers/header-4.png',
        'header-style5' => $imagepath . '/inc/customizer/images/headers/header-5.png',
        'header-style6' => $imagepath . '/inc/customizer/images/headers/header-6.png'
    )
)));

$wp_customize->add_setting('viral_pro_header_position', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'header-above'
));

$wp_customize->add_control('viral_pro_header_position', array(
    'section' => 'viral_pro_header_options',
    'type' => 'select',
    'label' => esc_html__('Header Position', 'viral-pro'),
    'choices' => array(
        'header-above' => esc_html__('Above Slider/Banner', 'viral-pro'),
        'header-over' => esc_html__('Over Slider/Banner', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_responsive_width', array(
    'sanitize_callback' => 'absint',
    'default' => 780
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_responsive_width', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Enable Responsive Menu After(px)', 'viral-pro'),
    'description' => esc_html__('Set the value of the screen immediately after the menu item breaks into multiple line.', 'viral-pro'),
    'input_attrs' => array(
        'min' => 480,
        'max' => 1200,
        'step' => 10
    )
)));

//TOP HEADER SETTINGS
$wp_customize->add_setting('viral_pro_top_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_top_header', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Enable Top Header', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_th_bg_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_th_bg_color', array(
    'label' => esc_html__('Top Header Background', 'viral-pro'),
    'section' => 'viral_pro_header_options',
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

$wp_customize->add_setting('viral_pro_th_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_th_text_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_th_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_th_anchor_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Anchor(Link) Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_th_padding', array(
    'sanitize_callback' => 'absint',
    'default' => 15,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_th_padding', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Top & Bottom Padding', 'viral-pro'),
    'input_attrs' => array(
        'min' => 5,
        'max' => 30,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_th_disable_mobile', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_th_disable_mobile', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Disable in Mobile', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_top_header_options_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_top_header_options_heading', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Top Header Content', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_th_left_display', array(
    'default' => 'none',
    'sanitize_callback' => 'viral_pro_sanitize_choices'
));

$wp_customize->add_control('viral_pro_th_left_display', array(
    'section' => 'viral_pro_header_options',
    'type' => 'radio',
    'label' => esc_html__('Display in Left Header', 'viral-pro'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'viral-pro'),
        'menu' => esc_html__('Menu', 'viral-pro'),
        'widget' => esc_html__('Widget', 'viral-pro'),
        'text' => esc_html__('HTML Text', 'viral-pro'),
        'none' => esc_html__('None', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_th_right_display', array(
    'default' => 'text',
    'sanitize_callback' => 'viral_pro_sanitize_choices'
));

$wp_customize->add_control('viral_pro_th_right_display', array(
    'section' => 'viral_pro_header_options',
    'type' => 'radio',
    'label' => esc_html__('Display in Right Header', 'viral-pro'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'viral-pro'),
        'menu' => esc_html__('Menu', 'viral-pro'),
        'widget' => esc_html__('Widget', 'viral-pro'),
        'text' => esc_html__('HTML Text', 'viral-pro'),
        'none' => esc_html__('None', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_top_header_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_top_header_seperator', array(
    'section' => 'viral_pro_header_options'
)));

$wp_customize->add_setting('viral_pro_social_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_social_link', array(
    'label' => esc_html__('Social Icons', 'viral-pro'),
    'section' => 'viral_pro_header_options',
    'description' => sprintf(esc_html__('Add your %s here', 'viral-pro'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('viral_pro_th_menu', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control('viral_pro_th_menu', array(
    'section' => 'viral_pro_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'viral-pro'),
    'choices' => $viral_pro_menu_choice
));

$wp_customize->add_setting('viral_pro_th_widget', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control('viral_pro_th_widget', array(
    'section' => 'viral_pro_header_options',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'viral-pro'),
    'choices' => $viral_pro_widget_list
));

$wp_customize->add_setting('viral_pro_th_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890'
));

$wp_customize->add_control(new Viral_Pro_Page_Editor($wp_customize, 'viral_pro_th_text', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Html Text', 'viral-pro'),
    'include_admin_print_footer' => true
)));


//MAIN HEADER SETTINGS
$wp_customize->add_setting('viral_pro_sticky_header', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_sticky_header', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Sticky Header', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_mh_bg_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_mh_bg_color', array(
    'label' => esc_html__('Header Background Color', 'viral-pro'),
    'section' => 'viral_pro_header_options',
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

$wp_customize->add_setting('viral_pro_mh_bg_color_mobile', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_mh_bg_color_mobile', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Header Bar Background Color(Mobile)', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_mh_height', array(
    'sanitize_callback' => 'absint',
    'default' => 90,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_mh_height', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Header Height', 'viral-pro'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_add_menu', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_add_menu', array(
    'section' => 'viral_pro_header_options',
    'description' => sprintf(esc_html__('Add %1$s and configure the below Settings. Set Menu Typography from %2$s.', 'viral-pro'), '<a href="' . admin_url() . '/nav-menus.php" target="_blank">Menu</a>', '<a href="#" id="menu_typography_link">Here</a>')
)));

$wp_customize->add_setting('viral_pro_mh_show_search', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_mh_show_search', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Search Button on Menu', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_mh_show_cart', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_mh_show_cart', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Cart Button on Menu', 'viral-pro'),
    'active_callback' => 'viral_pro_is_woocommerce_activated'
)));

$wp_customize->add_setting('viral_pro_mh_show_social', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_mh_show_social', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Social Icons on Menu', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_menu_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_menu_seperator', array(
    'section' => 'viral_pro_header_options'
)));

$wp_customize->add_setting('viral_pro_mh_menu_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_mh_menu_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Menu Link Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_mh_menu_hover_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_mh_menu_hover_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Menu Link Hover Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_mh_menu_hover_bg_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_mh_menu_hover_bg_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Menu Link Background Color on Hover', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_submenu_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_submenu_seperator', array(
    'section' => 'viral_pro_header_options'
)));

$wp_customize->add_setting('viral_pro_mh_submenu_bg_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_mh_submenu_bg_color', array(
    'label' => esc_html__('SubMenu Background Color', 'viral-pro'),
    'section' => 'viral_pro_header_options',
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

$wp_customize->add_setting('viral_pro_mh_submenu_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_mh_submenu_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('SubMenu Text/Link Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_mh_submenu_hover_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_mh_submenu_hover_color', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('SubMenu Link Hover Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_menuhover_seperator', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, 'viral_pro_menuhover_seperator', array(
    'section' => 'viral_pro_header_options'
)));

$wp_customize->add_setting('viral_pro_mh_menu_hover_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'hover-style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_mh_menu_hover_style', array(
    'section' => 'viral_pro_header_options',
    'label' => esc_html__('Menu Hover Style', 'viral-pro'),
    'class' => 'ht-full-width',
    'options' => array(
        'hover-style1' => $imagepath . '/inc/customizer/images/hover-styles/hover-style1.png',
        'hover-style2' => $imagepath . '/inc/customizer/images/hover-styles/hover-style2.png',
        'hover-style3' => $imagepath . '/inc/customizer/images/hover-styles/hover-style3.png',
        'hover-style4' => $imagepath . '/inc/customizer/images/hover-styles/hover-style4.png',
        'hover-style5' => $imagepath . '/inc/customizer/images/hover-styles/hover-style5.png',
        'hover-style6' => $imagepath . '/inc/customizer/images/hover-styles/hover-style6.png',
        'hover-style7' => $imagepath . '/inc/customizer/images/hover-styles/hover-style7.png',
        'hover-style8' => $imagepath . '/inc/customizer/images/hover-styles/hover-style8.png',
        'hover-style9' => $imagepath . '/inc/customizer/images/hover-styles/hover-style9.png',
        'hover-style10' => $imagepath . '/inc/customizer/images/hover-styles/hover-style10.png'
    )
)));

$wp_customize->add_setting('viral_pro_menu_dropdown_padding', array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_menu_dropdown_padding', array(
    'section' => 'viral_pro_header_options',
    'type' => 'number',
    'label' => esc_html__('Menu item Top/Bottom Padding', 'viral-pro'),
    'description' => esc_html__('(in px) Select appropriate number so that the submenu on hover appears just below the header bar.', 'viral-pro')
));

//HEADER BUTTON SETTINGS
$wp_customize->add_section('viral_pro_header_button_section', array(
    'title' => esc_html__('Header CTA Button', 'viral-pro'),
    'panel' => 'viral_pro_header_settings_panel',
    'description' => esc_html__('The CTA button will show at the end of the menu', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_header_button_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'on',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_header_button_disable', array(
    'section' => 'viral_pro_header_button_section',
    'label' => esc_html__('Disable Button', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section'
)));

$wp_customize->add_setting('viral_pro_hb_text', array(
    'default' => esc_html__('Call Us', 'viral-pro'),
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_hb_text', array(
    'section' => 'viral_pro_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_hb_link', array(
    'default' => 'tel:981123232',
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_hb_link', array(
    'section' => 'viral_pro_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Link', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_hb_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_hb_text_hov_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_hb_bg_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_hb_bg_hov_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_hb_color_group', array(
    'label' => esc_html__('Button Colors', 'viral-pro'),
    'section' => 'viral_pro_header_button_section',
    'show_opacity' => false,
    'settings' => array(
        'normal_viral_pro_hb_text_color' => 'viral_pro_hb_text_color',
        'normal_viral_pro_hb_bg_color' => 'viral_pro_hb_bg_color',
        'hover_viral_pro_hb_text_hov_color' => 'viral_pro_hb_text_hov_color',
        'hover_viral_pro_hb_bg_hov_color' => 'viral_pro_hb_bg_hov_color'
    ),
    'group' => array(
        'normal_viral_pro_hb_text_color' => 'Button Text Color',
        'normal_viral_pro_hb_bg_color' => 'Button Backgroud Color',
        'hover_viral_pro_hb_text_hov_color' => 'Button Text Color',
        'hover_viral_pro_hb_bg_hov_color' => 'Button Backgroud Color'
    )
)));

$wp_customize->add_setting('viral_pro_hb_borderradius', array(
    'sanitize_callback' => 'absint',
    'default' => 0,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_hb_borderradius', array(
    'section' => 'viral_pro_header_button_section',
    'label' => esc_html__('Button Border Radius', 'viral-pro'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_hb_disable_mobile', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_hb_disable_mobile', array(
    'section' => 'viral_pro_header_button_section',
    'label' => esc_html__('Disable in Mobile', 'viral-pro')
)));

//TITLE BAR SETTINGS
$wp_customize->add_section('viral_pro_titlebar_section', array(
    'title' => esc_html__('Title Bar Settings', 'viral-pro'),
    'panel' => 'viral_pro_header_settings_panel',
    'description' => esc_html__('This setting will apply in all post, pages, archive, search pages', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_titlebar_bg_url', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_titlebar_bg_id', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_titlebar_bg_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_titlebar_bg_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_titlebar_bg_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_titlebar_bg_attach', array(
    'default' => 'fixed',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

// Registers example_background control
$wp_customize->add_control(new Viral_Pro_Background_Control($wp_customize, 'viral_pro_titlebar_bg', array(
    'label' => esc_html__('Title Bar Background', 'viral-pro'),
    'section' => 'viral_pro_titlebar_section',
    'settings' => array(
        'image_url' => 'viral_pro_titlebar_bg_url',
        'image_id' => 'viral_pro_titlebar_bg_id',
        'repeat' => 'viral_pro_titlebar_bg_repeat', // Use false to hide the field
        'size' => 'viral_pro_titlebar_bg_size',
        'position' => 'viral_pro_titlebar_bg_position',
        'attach' => 'viral_pro_titlebar_bg_attach'
    )
)));

$wp_customize->add_setting('viral_pro_titlebar_bg_color', array(
    'default' => '#f7f9fd',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_titlebar_bg_color', array(
    'section' => 'viral_pro_titlebar_section',
    'label' => esc_html__('Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_titlebar_bg_overlay', array(
    'default' => 'rgba( 0, 0, 0, 0)',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, 'viral_pro_titlebar_bg_overlay', array(
    'label' => esc_html__('Header Background Overlay Color', 'viral-pro'),
    'section' => 'viral_pro_titlebar_section',
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

$wp_customize->add_setting('viral_pro_titlebar_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_titlebar_text_color', array(
    'section' => 'viral_pro_titlebar_section',
    'label' => esc_html__('Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_show_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_show_title', array(
    'section' => 'viral_pro_titlebar_section',
    'label' => esc_html__('Page Title/SubTitle', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_breadcrumb', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_breadcrumb', array(
    'section' => 'viral_pro_titlebar_section',
    'label' => esc_html__('BreadCrumb', 'viral-pro'),
    'description' => esc_html__('Breadcrumbs are a great way of letting your visitors find out where they are on your site.', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_titlebar_padding', array(
    'sanitize_callback' => 'absint',
    'default' => 50,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_titlebar_padding', array(
    'section' => 'viral_pro_titlebar_section',
    'label' => esc_html__('Top & Bottom Padding', 'viral-pro'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->selective_refresh->add_partial('viral_pro_header_button_disable', array(
    'selector' => '#ht-masthead',
    'render_callback' => 'viral_pro_header_styles',
    'container_inclusive' => true
));
