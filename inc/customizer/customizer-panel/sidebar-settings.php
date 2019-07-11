<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
//LAYOUT OPTIONS
$wp_customize->add_section('viral_pro_layout_options_section', array(
    'title' => esc_html__('Sidebar Settings', 'viral-pro'),
    'priority' => 16
));

$wp_customize->add_setting('viral_pro_sidebar_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_sidebar_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_layout_options_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Layouts', 'viral-pro'),
            'fields' => array(
                'viral_pro_page_layout',
                'viral_pro_post_layout',
                'viral_pro_archive_layout',
                'viral_pro_home_blog_layout',
                'viral_pro_search_layout',
                'viral_pro_shop_layout'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Styles', 'viral-pro'),
            'fields' => array(
                'viral_pro_sidebar_style'
            ),
        )
    ),
)));

$wp_customize->add_setting('viral_pro_page_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_page_layout', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Page Layout', 'viral-pro'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to all the General Pages and Portfolio Pages.', 'viral-pro'),
    'options' => array(
        'right-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_pro_post_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_post_layout', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Post Layout', 'viral-pro'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to all the Posts.', 'viral-pro'),
    'options' => array(
        'right-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_pro_archive_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_archive_layout', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Archive Page Layout', 'viral-pro'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to all Archive Pages.', 'viral-pro'),
    'options' => array(
        'right-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_pro_home_blog_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_home_blog_layout', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Blog Page Layout', 'viral-pro'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to Blog Page.', 'viral-pro'),
    'options' => array(
        'right-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_pro_search_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_search_layout', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Search Page Layout', 'viral-pro'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to Search Page.', 'viral-pro'),
    'options' => array(
        'right-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('viral_pro_shop_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_shop_layout', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Shop Page Layout(WooCommerce)', 'viral-pro'),
    'class' => 'ht-one-forth-width',
    'description' => esc_html__('Applies to Shop Page, Product Category, Product Tag and all Single Products Pages.', 'viral-pro'),
    'options' => array(
        'right-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => $imagepath . '/inc/customizer/images/sidebar-layouts/no-sidebar-narrow.png'
    ),
        //'active_callback' => 'viral_pro_is_woocommerce_activated'
)));

$wp_customize->add_setting('viral_pro_sidebar_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'sidebar-style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_sidebar_style', array(
    'section' => 'viral_pro_layout_options_section',
    'label' => esc_html__('Sidebar Style', 'viral-pro'),
    'class' => 'ht-half-width',
    'options' => array(
        'sidebar-style1' => $imagepath . '/inc/customizer/images/sidebar-styles/sidebar-style1.png',
        'sidebar-style2' => $imagepath . '/inc/customizer/images/sidebar-styles/sidebar-style2.png',
        'sidebar-style3' => $imagepath . '/inc/customizer/images/sidebar-styles/sidebar-style3.png'
    )
)));
