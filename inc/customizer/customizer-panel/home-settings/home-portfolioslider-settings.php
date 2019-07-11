<?php

/* ============PORTFOLIO SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_portfolioslider_section', array(
    'title' => esc_html__('Portfolio Slider Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_portfolioslider_section'),
    'hiding_control' => 'viral_pro_portfolioslider_section_disable'
)));

$wp_customize->add_setting('viral_pro_portfolioslider_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_portfolioslider_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_portfolioslider_title_sec_heading',
                'viral_pro_portfolioslider_super_title',
                'viral_pro_portfolioslider_title',
                'viral_pro_portfolioslider_sub_title',
                'viral_pro_portfolioslider_title_style',
                'viral_pro_portfolioslider_cat_heading',
                'viral_pro_portfolioslider_cat',
                'viral_pro_portfolioslider_show_all',
                'viral_pro_portfolioslider_active_cat',
                'viral_pro_portfolioslider_button_text',
                'viral_pro_portfolioslider_button_link',
                'viral_pro_portfolioslider_setting_heading',
                'viral_pro_portfolioslider_cat_menu',
                'viral_pro_portfolioslider_tab_style',
                'viral_pro_portfolioslider_orderby',
                'viral_pro_portfolioslider_order',
                'viral_pro_portfolioslider_full_width',
                'viral_pro_portfolioslider_image_size',
                'viral_pro_portfolioslider_gap',
                'viral_pro_portfolioslider_zoom',
                'viral_pro_portfolioslider_link',
                'viral_pro_portfolioslider_carousel_heading',
                'viral_pro_portfolioslider_slides',
                'viral_pro_portfolioslider_slides_space',
                'viral_pro_portfolioslider_transition_time',
                'viral_pro_portfolioslider_auto_transition',
                'viral_pro_portfolioslider_navigation',
                'viral_pro_portfolioslider_pager',
                'viral_pro_portfolioslider_button_heading'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_portfolioslider_cs_heading',
                'viral_pro_portfolioslider_super_title_color',
                'viral_pro_portfolioslider_title_color',
                'viral_pro_portfolioslider_text_color',
                'viral_pro_portfolioslider_link_color',
                'viral_pro_portfolioslider_link_hov_color',
                'viral_pro_portfoliosider_block_seperator',
                'viral_pro_portfolioslider_tab_text_color',
                'viral_pro_portfolioslider_activetab_text_color',
                'viral_pro_portfolioslider_activetab_bg_color',
                'viral_pro_portfolioslider_title_icon_bg_color',
                'viral_pro_portfolioslider_title_icon_color',
                'viral_pro_portfolioslider_carousel_arrow_color_group',
                'viral_pro_portfolioslider_carousel_dot_color',
                'viral_pro_portfolioslider_mb_seperator',
                'viral_pro_portfolioslider_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_portfolioslider_enable_fullwindow',
                'viral_pro_portfolioslider_align_item',
                'viral_pro_portfolioslider_fw_seperator',
                'viral_pro_portfolioslider_bg_type',
                'viral_pro_portfolioslider_bg_color',
                'viral_pro_portfolioslider_bg_gradient',
                'viral_pro_portfolioslider_bg_image',
                'viral_pro_portfolioslider_parallax_effect',
                'viral_pro_portfolioslider_bg_video',
                'viral_pro_portfolioslider_overlay_color',
                'viral_pro_portfolioslider_cs_seperator',
                'viral_pro_portfolioslider_padding',
                'viral_pro_portfolioslider_seperator0',
                'viral_pro_portfolioslider_section_seperator',
                'viral_pro_portfolioslider_seperator1',
                'viral_pro_portfolioslider_top_seperator',
                'viral_pro_portfolioslider_ts_color',
                'viral_pro_portfolioslider_ts_height',
                'viral_pro_portfolioslider_seperator2',
                'viral_pro_portfolioslider_bottom_seperator',
                'viral_pro_portfolioslider_bs_color',
                'viral_pro_portfolioslider_bs_height'
            ),
        )
    ),
)));

//ENABLE/DISABLE PORTFOLIO
$wp_customize->add_setting('viral_pro_portfolioslider_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_portfolioslider_section_disable', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_pro_portfolioslider_title_sec_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolioslider_title_sec_heading', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_super_title', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolioslider_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Portfolio Slider Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_title', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolioslider_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Portfolio Slider Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_sub_title', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolioslider_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_title_style', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => array(
        'ht-section-title-top-center' => esc_html__('Top Center Aligned', 'viral-pro'),
        'ht-section-title-top-cs' => esc_html__('Top Center Aligned with Seperator', 'viral-pro'),
        'ht-section-title-top-left' => esc_html__('Top Left Aligned', 'viral-pro'),
        'ht-section-title-top-ls' => esc_html__('Top Left Aligned with Seperator', 'viral-pro'),
        'ht-section-title-single-row' => esc_html__('Top Single Row', 'viral-pro'),
        'ht-section-title-big' => esc_html__('Top Center Aligned with Big Super Title', 'viral-pro')
    )
));

//PORTFOLIO CHOICES
$wp_customize->add_setting('viral_pro_portfolioslider_cat_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolioslider_cat_heading', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Portfolio Category', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_cat', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Customize_Checkbox_Multiple($wp_customize, 'viral_pro_portfolioslider_cat', array(
    'label' => esc_html__('Select Category', 'viral-pro'),
    'section' => 'viral_pro_portfolioslider_section',
    'choices' => $viral_pro_portfolio_cat
)));

$wp_customize->add_setting('viral_pro_portfolioslider_show_all', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_show_all', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('All', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_active_cat', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => '*',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_active_cat', array(
    'type' => 'select',
    'label' => esc_html__('Active Category', 'viral-pro'),
    'section' => 'viral_pro_portfolioslider_section',
    'choices' => $viral_pro_portfolio_cat_all
));

$wp_customize->add_setting('viral_pro_portfolioslider_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolioslider_setting_heading', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_cat_menu', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_cat_menu', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Show Tab', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_tab_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_portfolioslider_tab_style', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Portfolio Tab Style', 'viral-pro'),
    'class' => 'ht-full-width',
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/portfolio-tab-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/portfolio-tab-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/portfolio-tab-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/portfolio-tab-style4.png',
    )
)));

$wp_customize->add_setting('viral_pro_portfolioslider_orderby', array(
    'default' => 'date',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_orderby', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'select',
    'label' => esc_html__('Portfolio Order By', 'viral-pro'),
    'choices' => array(
        'title' => esc_html__('Post Title', 'viral-pro'),
        'date' => esc_html__('Posted Dated', 'viral-pro'),
        'rand' => esc_html__('Random', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_portfolioslider_order', array(
    'default' => 'DESC',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_order', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'select',
    'label' => esc_html__('Portfolio Order', 'viral-pro'),
    'choices' => array(
        'ASC' => esc_html__('Ascending Order', 'viral-pro'),
        'DESC' => esc_html__('Descending Order', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_portfolioslider_image_size', array(
    'default' => 'viral-pro-600x600',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_image_size', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'select',
    'label' => esc_html__('Image Size', 'viral-pro'),
    'choices' => viral_pro_get_image_sizes()
));

$wp_customize->add_setting('viral_pro_portfolioslider_zoom', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_zoom', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Show Zoom Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_link', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Show link Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_full_width', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_full_width', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Cover Full Width', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_carousel_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolioslider_carousel_heading', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Slider Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_slides', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_portfolioslider_slides', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('No of Slides', 'viral-pro'),
    'input_attrs' => array(
        'min' => 1,
        'max' => 6,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_portfolioslider_slides_space', array(
    'sanitize_callback' => 'absint',
    'default' => 20,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_portfolioslider_slides_space', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Space Between Slides', 'viral-pro'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 50,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_portfolioslider_transition_time', array(
    'sanitize_callback' => 'absint',
    'default' => 8,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_portfolioslider_transition_time', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Slider Transition Time (Seconds)', 'viral-pro'),
    'input_attrs' => array(
        'min' => 4,
        'max' => 20,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_portfolioslider_auto_transition', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_auto_transition', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Auto Transition', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_navigation', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_navigation', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Show Silder Navigation Arrow', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_pager', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolioslider_pager', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('Show Silder Navigation Dots', 'viral-pro')
)));

$wp_customize->add_setting("viral_pro_portfoliosider_block_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_portfoliosider_block_seperator", array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_portfolioslider_tab_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolioslider_tab_text_color', array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56,
    'label' => esc_html__('Tab Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_activetab_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#111111'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolioslider_activetab_text_color', array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56,
    'label' => esc_html__('Active Tab Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_activetab_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFC107'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolioslider_activetab_bg_color', array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56,
    'label' => esc_html__('Active Tab Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_title_icon_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFC107'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolioslider_title_icon_bg_color', array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56,
    'label' => esc_html__('Image Title Background, Button Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_title_icon_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFFFFF'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolioslider_title_icon_color', array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56,
    'label' => esc_html__('Image Title Text, Icon Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_carousel_dot_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolioslider_carousel_dot_color', array(
    'section' => 'viral_pro_portfolioslider_section',
    'priority' => 56,
    'label' => esc_html__('Carousel Dots Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_carousel_arrow_bg_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_portfolioslider_carousel_arrow_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_portfolioslider_carousel_arrow_bg_color_hover', array(
    'default' => '#111111',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_portfolioslider_carousel_arrow_color_hover', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, 'viral_pro_portfolioslider_carousel_arrow_color_group', array(
    'label' => esc_html__('Carousel Arrow Colors', 'viral-pro'),
    'section' => 'viral_pro_portfolioslider_section',
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
        'normal_viral_pro_portfolioslider_carousel_arrow_bg_color' => 'viral_pro_portfolioslider_carousel_arrow_bg_color',
        'normal_viral_pro_portfolioslider_carousel_arrow_color' => 'viral_pro_portfolioslider_carousel_arrow_color',
        'hover_viral_pro_portfolioslider_carousel_arrow_bg_color_hover' => 'viral_pro_portfolioslider_carousel_arrow_bg_color_hover',
        'hover_viral_pro_portfolioslider_carousel_arrow_color_hover' => 'viral_pro_portfolioslider_carousel_arrow_color_hover',
    ),
    'group' => array(
        'normal_viral_pro_portfolioslider_carousel_arrow_bg_color' => esc_html__('Carousel Arrow Background Color', 'viral-pro'),
        'normal_viral_pro_portfolioslider_carousel_arrow_color' => esc_html__('Carousel Arrow Color', 'viral-pro'),
        'hover_viral_pro_portfolioslider_carousel_arrow_bg_color_hover' => esc_html__('Carousel Arrow Background Color', 'viral-pro'),
        'hover_viral_pro_portfolioslider_carousel_arrow_color_hover' => esc_html__('Carousel Arrow Color', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_portfolioslider_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolioslider_button_heading', array(
    'section' => 'viral_pro_portfolioslider_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolioslider_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_button_text', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolioslider_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolioslider_button_link', array(
    'section' => 'viral_pro_portfolioslider_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_title_style', array(
    'selector' => '.ht-portfolioslider-section',
    'render_callback' => 'viral_pro_portfolioslider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_super_title', array(
    'selector' => '.ht-portfolioslider-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_portfolioslider_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_title', array(
    'selector' => '.ht-portfolioslider-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_portfolioslider_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_sub_title', array(
    'selector' => '.ht-portfolioslider-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_portfolioslider_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_cat', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_show_all', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_active_cat', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_cat_menu', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_tab_style', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_style', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_orderby', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_order', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_image_size', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_full_width', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_zoom', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_link', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_slides', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_slides_space', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_transition_time', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_auto_transition', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_navigation', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_pager', array(
    'selector' => '.ht-portfolioslider-content',
    'render_callback' => 'viral_pro_portfolioslider_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_button_text', array(
    'selector' => '.ht-portfolioslider-section',
    'render_callback' => 'viral_pro_portfolioslider_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolioslider_button_link', array(
    'selector' => '.ht-portfolioslider-section',
    'render_callback' => 'viral_pro_portfolioslider_section',
    'container_inclusive' => true
));
