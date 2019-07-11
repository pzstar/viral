<?php

/**
 * Register customizer panels, sections, settings, and controls.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $wp_customize
 * @return void
 */
# Register our customizer panels, sections, settings, and controls.
require get_template_directory() . '/inc/customizer/typography/google-fonts-list.php';

add_action('customize_register', 'viral_pro_typography_customize_register', 15);

function viral_pro_typography_customize_register($wp_customize) {

    require get_template_directory() . '/inc/customizer/typography/customizer-typography-control-class.php';

    // Register typography control JS template.
    $wp_customize->register_control_type('Viral_Pro_Typography_Control');

    // Add the typography panel.
    $wp_customize->add_panel('typography', array(
        'priority' => 1,
        'title' => esc_html__('Typography Settings', 'viral-pro')
    ));

    // Add the body typography section.
    $wp_customize->add_section('body_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Body', 'viral-pro')
    ));

    $wp_customize->add_setting('body_font_family', array(
        'default' => 'Pontano Sans',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_line_height', array(
        'default' => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'body_typography', array(
        'label' => esc_html__('Body Typography', 'viral-pro'),
        'description' => __('Select how you want your body to appear.', 'viral-pro'),
        'section' => 'body_typography',
        'settings' => array(
            'family' => 'body_font_family',
            'style' => 'body_font_style',
            'text_decoration' => 'body_text_decoration',
            'text_transform' => 'body_text_transform',
            'size' => 'body_font_size',
            'line_height' => 'body_line_height',
            'typocolor' => 'body_color'
        ),
        'input_attrs' => array(
            'min' => 10,
            'max' => 40,
            'step' => 1
        )
    )));

    // Add the Menu typography section.
    $wp_customize->add_section('menu_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Menu', 'viral-pro')
    ));

    $wp_customize->add_setting('menu_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('menu_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('menu_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('menu_text_transform', array(
        'default' => 'uppercase',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('menu_font_size', array(
        'default' => '14',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('menu_line_height', array(
        'default' => '3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('menu_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'menu_typography', array(
        'label' => esc_html__('Menu Typography', 'viral-pro'),
        'description' => __('Select how you want your menu to appear.', 'viral-pro'),
        'section' => 'menu_typography',
        'settings' => array(
            'family' => 'menu_font_family',
            'style' => 'menu_font_style',
            'text_decoration' => 'menu_text_decoration',
            'text_transform' => 'menu_text_transform',
            'size' => 'menu_font_size',
            'line_height' => 'menu_line_height',
            'letter_spacing' => 'menu_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 10,
            'max' => 40,
            'step' => 1
        )
    )));

    // Add the Page Title typography section.
    $wp_customize->add_section('page_title_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Page Title', 'viral-pro')
    ));

    $wp_customize->add_setting('page_title_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('page_title_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('page_title_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('page_title_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('page_title_font_size', array(
        'default' => '40',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('page_title_line_height', array(
        'default' => '1.5',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('page_title_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'page_title_typography', array(
        'label' => esc_html__('Page Title Typography', 'viral-pro'),
        'description' => __('Page/Post/Archive Titles', 'viral-pro'),
        'section' => 'page_title_typography',
        'settings' => array(
            'family' => 'page_title_font_family',
            'style' => 'page_title_font_style',
            'text_decoration' => 'page_title_text_decoration',
            'text_transform' => 'page_title_text_transform',
            'size' => 'page_title_font_size',
            'line_height' => 'page_title_line_height',
            'letter_spacing' => 'page_title_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H1 typography section.
    $wp_customize->add_section('header_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Headers(H1, H2, H3, H4, H5, H6)', 'viral-pro')
    ));

    $wp_customize->add_setting('common_header_typography', array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'default' => true
    ));

    $wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'common_header_typography', array(
        'section' => 'header_typography',
        'label' => esc_html__('Use Common Typography for all Headers', 'viral-pro')
    )));

    // Add H typography section.
    $wp_customize->add_setting('h_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_font_size', array(
        'default' => '42',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h_typography', array(
        'label' => esc_html__('Header Typography', 'viral-pro'),
        'description' => __('Select how you want your Header to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h_font_family',
            'style' => 'h_font_style',
            'text_decoration' => 'h_text_decoration',
            'text_transform' => 'h_text_transform',
            'size' => 'h_font_size',
            'line_height' => 'h_line_height',
            'letter_spacing' => 'h_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    $wp_customize->add_setting('header_typography_note', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'header_typography_note', array(
        'label' => esc_html__('Note', 'viral-pro'),
        'section' => 'header_typography',
        'description' => esc_html__('Set the font size of H1. Other headers (H2, H3, H4, H5, H6) will inherit the font size of H1 in decreasing order. ', 'viral-pro')
    )));

    $wp_customize->add_setting('header_typography_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'header_typography_nav', array(
        'type' => 'tab',
        'section' => 'header_typography',
        //'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('H1', 'viral-pro'),
                'fields' => array(
                    'h1_typography_heading',
                    'h1_typography',
                ),
                'active' => true
            ),
            array(
                'name' => esc_html__('H2', 'viral-pro'),
                'fields' => array(
                    'h2_typography_heading',
                    'h2_typography',
                )
            ),
            array(
                'name' => esc_html__('H3', 'viral-pro'),
                'fields' => array(
                    'h3_typography_heading',
                    'h3_typography',
                )
            ),
            array(
                'name' => esc_html__('H4', 'viral-pro'),
                'fields' => array(
                    'h4_typography_heading',
                    'h4_typography',
                )
            ),
            array(
                'name' => esc_html__('H5', 'viral-pro'),
                'fields' => array(
                    'h5_typography_heading',
                    'h5_typography',
                )
            ),
            array(
                'name' => esc_html__('H6', 'viral-pro'),
                'fields' => array(
                    'h6_typography_heading',
                    'h6_typography',
                )
            )
        ),
    )));

    // Add H1 typography section.
    $wp_customize->add_setting('h1_typography_heading', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'h1_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H1', 'viral-pro')
    )));

    $wp_customize->add_setting('h1_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_font_size', array(
        'default' => '38',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h1_typography', array(
        'label' => esc_html__('Header H1 Typography', 'viral-pro'),
        'description' => __('Select how you want your H1 to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h1_font_family',
            'style' => 'h1_font_style',
            'text_decoration' => 'h1_text_decoration',
            'text_transform' => 'h1_text_transform',
            'size' => 'h1_font_size',
            'line_height' => 'h1_line_height',
            'letter_spacing' => 'h1_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H2 typography section.
    $wp_customize->add_setting('h2_typography_heading', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'h2_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H2', 'viral-pro')
    )));

    $wp_customize->add_setting('h2_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_font_size', array(
        'default' => '34',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h2_typography', array(
        'label' => esc_html__('Header H2 Typography', 'viral-pro'),
        'description' => __('Select how you want your H2 to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h2_font_family',
            'style' => 'h2_font_style',
            'text_decoration' => 'h2_text_decoration',
            'text_transform' => 'h2_text_transform',
            'size' => 'h2_font_size',
            'line_height' => 'h2_line_height',
            'letter_spacing' => 'h2_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H3 typography section.
    $wp_customize->add_setting('h3_typography_heading', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'h3_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H3', 'viral-pro')
    )));

    $wp_customize->add_setting('h3_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_font_size', array(
        'default' => '30',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h3_typography', array(
        'label' => esc_html__('Header H3 Typography', 'viral-pro'),
        'description' => __('Select how you want your H3 to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h3_font_family',
            'style' => 'h3_font_style',
            'text_decoration' => 'h3_text_decoration',
            'text_transform' => 'h3_text_transform',
            'size' => 'h3_font_size',
            'line_height' => 'h3_line_height',
            'letter_spacing' => 'h3_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H4 typography section.
    $wp_customize->add_setting('h4_typography_heading', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'h4_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H4', 'viral-pro')
    )));

    $wp_customize->add_setting('h4_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_font_size', array(
        'default' => '26',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h4_typography', array(
        'label' => esc_html__('Header H4 Typography', 'viral-pro'),
        'description' => __('Select how you want your H4 to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h4_font_family',
            'style' => 'h4_font_style',
            'text_decoration' => 'h4_text_decoration',
            'text_transform' => 'h4_text_transform',
            'size' => 'h4_font_size',
            'line_height' => 'h4_line_height',
            'letter_spacing' => 'h4_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H5 typography section.
    $wp_customize->add_setting('h5_typography_heading', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'h5_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H5', 'viral-pro')
    )));

    $wp_customize->add_setting('h5_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_font_size', array(
        'default' => '22',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h5_typography', array(
        'label' => esc_html__('Header H5 Typography', 'viral-pro'),
        'description' => __('Select how you want your H6 to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h5_font_family',
            'style' => 'h5_font_style',
            'text_decoration' => 'h5_text_decoration',
            'text_transform' => 'h5_text_transform',
            'size' => 'h5_font_size',
            'line_height' => 'h5_line_height',
            'letter_spacing' => 'h5_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H6 typography section.
    $wp_customize->add_setting('h6_typography_heading', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'h6_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H6', 'viral-pro')
    )));

    $wp_customize->add_setting('h6_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_font_size', array(
        'default' => '20',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'h6_typography', array(
        'label' => esc_html__('Header H6 Typography', 'viral-pro'),
        'description' => __('Select how you want your H6 to appear.', 'viral-pro'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h6_font_family',
            'style' => 'h6_font_style',
            'text_decoration' => 'h6_text_decoration',
            'text_transform' => 'h6_text_transform',
            'size' => 'h6_font_size',
            'line_height' => 'h6_line_height',
            'letter_spacing' => 'h6_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add the Section Title typography section.
    $wp_customize->add_section('section_title_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Home Page Section Title', 'viral-pro')
    ));

    $wp_customize->add_setting('section_title_font_family', array(
        'default' => 'Oswald',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_font_size', array(
        'default' => '36',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_line_height', array(
        'default' => '1.5',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('section_title_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Typography_Control($wp_customize, 'section_title_typography', array(
        'label' => esc_html__('Section Title Typography', 'viral-pro'),
        'description' => __('Select how you want your home section title to appear.', 'viral-pro'),
        'section' => 'section_title_typography',
        'settings' => array(
            'family' => 'section_title_font_family',
            'style' => 'section_title_font_style',
            'text_decoration' => 'section_title_text_decoration',
            'text_transform' => 'section_title_text_transform',
            'size' => 'section_title_font_size',
            'line_height' => 'section_title_line_height',
            'letter_spacing' => 'section_title_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));
}

/**
 * Register control scripts/styles.
 *
 */
add_action('customize_controls_enqueue_scripts', 'viral_pro_typography_customizer_script');

function viral_pro_typography_customizer_script() {
    wp_enqueue_script('viral-pro-customize-controls', get_template_directory_uri() . '/inc/customizer/typography/js/customize-controls.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('viral-pro-customize-controls', get_template_directory_uri() . '/inc/customizer/typography/css/customize-controls.css');
}

/**
 * Load preview scripts/styles.
 *
 */
add_action('customize_preview_init', 'viral_pro_typography_customize_preview_script');

function viral_pro_typography_customize_preview_script() {
    wp_enqueue_script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array('jquery'));
    wp_enqueue_script('viral-pro-customize-preview', get_template_directory_uri() . '/inc/customizer/typography/js/customize-previews.js', array('jquery', 'customize-preview', 'webfont'));
}

function viral_pro_get_google_font_variants() {

    $font_list = array_merge(viral_pro_standard_font_array(), viral_pro_google_font_array());

    $font_family = $_REQUEST['font_family'];
    $font_array = viral_pro_search_key($font_list, 'family', $font_family);

    $variants_array = $font_array['0']['variants'];
    $options_array = "";
    foreach ($variants_array as $key => $variants) {
        $selected = $key == '400' ? 'selected="selected"' : '';
        $options_array .= '<option ' . $selected . ' value="' . $key . '">' . $variants . '</option>';
    }

    if (!empty($options_array)) {
        echo $options_array;
    } else {
        echo $options_array = '';
    }
    die();
}

add_action("wp_ajax_get_google_font_variants", "viral_pro_get_google_font_variants");

function viral_pro_search_key($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, viral_pro_search_key($subarray, $key, $value));
        }
    }
    return $results;
}
