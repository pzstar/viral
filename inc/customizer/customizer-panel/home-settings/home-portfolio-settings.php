<?php

/* ============PORTFOLIO SECTION PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_portfolio_section', array(
    'title' => esc_html__('Portfolio Masonary Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_portfolio_section'),
    'hiding_control' => 'viral_pro_portfolio_section_disable'
)));

$wp_customize->add_setting('viral_pro_portfolio_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_portfolio_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_portfolio_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_portfolio_title_sec_heading',
                'viral_pro_portfolio_super_title',
                'viral_pro_portfolio_title',
                'viral_pro_portfolio_sub_title',
                'viral_pro_portfolio_title_style',
                'viral_pro_portfolio_cat_heading',
                'viral_pro_portfolio_cat',
                'viral_pro_portfolio_show_all',
                'viral_pro_portfolio_active_cat',
                'viral_pro_portfolio_button_text',
                'viral_pro_portfolio_button_link',
                'viral_pro_portfolio_setting_heading',
                'viral_pro_portfolio_cat_menu',
                'viral_pro_portfolio_tab_style',
                'viral_pro_portfolio_style',
                'viral_pro_portfolio_orderby',
                'viral_pro_portfolio_order',
                'viral_pro_portfolio_full_width',
                'viral_pro_portfolio_gap',
                'viral_pro_portfolio_zoom',
                'viral_pro_portfolio_link',
                'viral_pro_portfolio_button_heading'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_portfolio_cs_heading',
                'viral_pro_portfolio_super_title_color',
                'viral_pro_portfolio_title_color',
                'viral_pro_portfolio_text_color',
                'viral_pro_portfolio_link_color',
                'viral_pro_portfolio_link_hov_color',
                'viral_pro_portfolio_block_seperator',
                'viral_pro_portfolio_tab_text_color',
                'viral_pro_portfolio_activetab_text_color',
                'viral_pro_portfolio_activetab_bg_color',
                'viral_pro_portfolio_image_hover_bg_color',
                'viral_pro_portfolio_title_icon_color',
                'viral_pro_portfolio_mb_seperator',
                'viral_pro_portfolio_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_portfolio_enable_fullwindow',
                'viral_pro_portfolio_align_item',
                'viral_pro_portfolio_fw_seperator',
                'viral_pro_portfolio_bg_type',
                'viral_pro_portfolio_bg_color',
                'viral_pro_portfolio_bg_gradient',
                'viral_pro_portfolio_bg_image',
                'viral_pro_portfolio_parallax_effect',
                'viral_pro_portfolio_bg_video',
                'viral_pro_portfolio_overlay_color',
                'viral_pro_portfolio_cs_seperator',
                'viral_pro_portfolio_padding',
                'viral_pro_portfolio_seperator0',
                'viral_pro_portfolio_section_seperator',
                'viral_pro_portfolio_seperator1',
                'viral_pro_portfolio_top_seperator',
                'viral_pro_portfolio_ts_color',
                'viral_pro_portfolio_ts_height',
                'viral_pro_portfolio_seperator2',
                'viral_pro_portfolio_bottom_seperator',
                'viral_pro_portfolio_bs_color',
                'viral_pro_portfolio_bs_height'
            ),
        )
    ),
)));

//ENABLE/DISABLE PORTFOLIO
$wp_customize->add_setting('viral_pro_portfolio_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_portfolio_section_disable', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('viral_pro_portfolio_title_sec_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolio_title_sec_heading', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_super_title', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolio_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Portfolio Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_title', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolio_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Portfolio Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_sub_title', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolio_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_title_style', array(
    'section' => 'viral_pro_portfolio_section',
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
$wp_customize->add_setting('viral_pro_portfolio_cat_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolio_cat_heading', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Portfolio Category', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_cat', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Customize_Checkbox_Multiple($wp_customize, 'viral_pro_portfolio_cat', array(
    'label' => esc_html__('Select Category', 'viral-pro'),
    'section' => 'viral_pro_portfolio_section',
    'choices' => $viral_pro_portfolio_cat
)));

$wp_customize->add_setting('viral_pro_portfolio_show_all', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolio_show_all', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('All', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_active_cat', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => '*',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_active_cat', array(
    'type' => 'select',
    'label' => esc_html__('Active Category', 'viral-pro'),
    'section' => 'viral_pro_portfolio_section',
    'choices' => $viral_pro_portfolio_cat_all
));

$wp_customize->add_setting('viral_pro_portfolio_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolio_setting_heading', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_cat_menu', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolio_cat_menu', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Show Tab', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_tab_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_portfolio_tab_style', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Portfolio Tab Style', 'viral-pro'),
    'class' => 'ht-full-width',
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/portfolio-tab-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/portfolio-tab-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/portfolio-tab-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/portfolio-tab-style4.png',
    )
)));

$wp_customize->add_setting('viral_pro_portfolio_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_portfolio_style', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Portfolio Masonary Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/portfolio-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/portfolio-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/portfolio-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/portfolio-style4.png',
        'style5' => $imagepath . '/inc/customizer/images/portfolio-style5.png',
        'style6' => $imagepath . '/inc/customizer/images/portfolio-style6.png',
    )
)));

$wp_customize->add_setting('viral_pro_portfolio_orderby', array(
    'default' => 'date',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_orderby', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'select',
    'label' => esc_html__('Portfolio Order By', 'viral-pro'),
    'choices' => array(
        'title' => esc_html__('Post Title', 'viral-pro'),
        'date' => esc_html__('Posted Dated', 'viral-pro'),
        'rand' => esc_html__('Random', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_portfolio_order', array(
    'default' => 'DESC',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_order', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'select',
    'label' => esc_html__('Portfolio Order', 'viral-pro'),
    'choices' => array(
        'ASC' => esc_html__('Ascending Order', 'viral-pro'),
        'DESC' => esc_html__('Descending Order', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_portfolio_full_width', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolio_full_width', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Full Width', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_gap', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolio_gap', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Space Between Portfolios', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_zoom', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolio_zoom', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Show Zoom Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_portfolio_link', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('Show Link Button', 'viral-pro')
)));

$wp_customize->add_setting("viral_pro_portfolio_block_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_portfolio_block_seperator", array(
    'section' => 'viral_pro_portfolio_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_portfolio_tab_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolio_tab_text_color', array(
    'section' => 'viral_pro_portfolio_section',
    'priority' => 56,
    'label' => esc_html__('Tab Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_activetab_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#111111'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolio_activetab_text_color', array(
    'section' => 'viral_pro_portfolio_section',
    'priority' => 56,
    'label' => esc_html__('Active Tab Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_activetab_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFC107'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolio_activetab_bg_color', array(
    'section' => 'viral_pro_portfolio_section',
    'priority' => 56,
    'label' => esc_html__('Active Tab Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_image_hover_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFC107'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolio_image_hover_bg_color', array(
    'section' => 'viral_pro_portfolio_section',
    'priority' => 56,
    'label' => esc_html__('Image Hover Background Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_title_icon_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#FFFFFF'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_portfolio_title_icon_color', array(
    'section' => 'viral_pro_portfolio_section',
    'priority' => 56,
    'label' => esc_html__('Title Text, Icon Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_portfolio_button_heading', array(
    'section' => 'viral_pro_portfolio_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_portfolio_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_button_text', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_portfolio_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_portfolio_button_link', array(
    'section' => 'viral_pro_portfolio_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_title_style', array(
    'selector' => '.ht-portfolio-section',
    'render_callback' => 'viral_pro_portfolio_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_super_title', array(
    'selector' => '.ht-portfolio-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_portfolio_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_title', array(
    'selector' => '.ht-portfolio-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_portfolio_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_sub_title', array(
    'selector' => '.ht-portfolio-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_portfolio_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_cat', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_show_all', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_active_cat', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_cat_menu', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_tab_style', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_style', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_orderby', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_order', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_full_width', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_gap', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_zoom', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_link', array(
    'selector' => '.ht-portfolio-content',
    'render_callback' => 'viral_pro_portfolio_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_button_text', array(
    'selector' => '.ht-portfolio-section',
    'render_callback' => 'viral_pro_portfolio_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_portfolio_button_link', array(
    'selector' => '.ht-portfolio-section',
    'render_callback' => 'viral_pro_portfolio_section',
    'container_inclusive' => true
));
