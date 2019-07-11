<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */

/*============FRONT PAGE PANEL============*/
$wp_customize->add_panel(
    'viral_pro_front_page_panel',
    array(
        'title'             => __( 'Front Page Sections', 'viral-pro' ),
        'description' => esc_html__('Drag and Drop to Reorder', 'viral-pro') . '<img class="viral-pro-drag-spinner" src="' . admin_url('/images/spinner.gif') . '">',
        'priority'          => 20
    )
);

/*============FRONT PAGE TICKER SECTION============*/
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_ticker_sec', array(
    'title' => esc_html__('Ticker Modules', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_ticker_sec'),
    'hiding_control' => 'viral_pro_frontpage_ticker_sec_disable'
)));

$wp_customize->add_setting('viral_pro_frontpage_ticker_sec_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_ticker_sec_disable', array(
    'section' => 'viral_pro_frontpage_ticker_sec',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));


$wp_customize->add_setting(
    'viral_pro_ticker_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'viral_pro_sanitize_text'
    )
);

$wp_customize->add_control(
    'viral_pro_ticker_title',
    array(
        'settings'      => 'viral_pro_ticker_title',
        'section'       => 'viral_pro_frontpage_ticker_sec',
        'label'         => __( 'Ticker Title', 'viral-pro' )
    )
);

$wp_customize->add_setting(
    'viral_pro_ticker_category',
    array(
        'default'           => '',
        'sanitize_callback' => 'viral_pro_sanitize_integer'
    )
);

$wp_customize->add_control(
    new Viral_Pro_Category_Dropdown(
    $wp_customize,
    'viral_pro_ticker_category',
        array(
            'settings'      => 'viral_pro_ticker_category',
            'section'       => 'viral_pro_frontpage_ticker_sec',
            'label'         => __( 'Choose Ticker Category', 'viral-pro' )
        )
    )
);

/*============FRONT PAGE SLIDER SECTION============*/
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_slider_sec1', array(
    'title' => esc_html__('Slider Modules One', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_slider_sec1'),
    'hiding_control' => 'viral_pro_frontpage_slider_sec1_disable'
)));

$wp_customize->add_setting('viral_pro_frontpage_slider_sec1_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_slider_sec1_disable', array(
    'section' => 'viral_pro_frontpage_slider_sec1',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting( 
    'viral_pro_frontpage_slider_blocks1', 
    array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'category' => '',
            'layout' => 'style1',
            'enable' => 'on'
            )
    ))
));

$wp_customize->add_control( 
    new Viral_Pro_Repeater_Controler(
        $wp_customize, 
        'viral_pro_frontpage_slider_blocks1', 
        array(
            'label'   => __('FrontPage Slider Blocks - FullWidth','viral-pro'),
            'section' => 'viral_pro_frontpage_slider_sec1',
            'box_label' => __('News Section','viral-pro'),
            'add_label' => __('Add Section','viral-pro'),
        ),
        array(
            'category' => array(
                'type'        => 'multicategory',
                'label'       => __( 'Select Category', 'viral-pro' ),
                'default'     => ''
            ),              
            'layout' => array(
                'type'        => 'selector',
                'label'       => __( 'Layouts', 'viral-pro' ),
                'description' => __( 'Select the Block Layout', 'viral-pro' ),
                'options' => array(
                    'style1' => $image_path_url.'top-layout1.png',
                    'style2' => $image_path_url.'top-layout2.png',
                    'style3' => $image_path_url.'top-layout3.png',
                    'style4' => $image_path_url.'top-layout4.png',
                    ),
                'default'     => 'style1'
            ),
            'enable' => array(
                'type'        => 'switch',
                'label'       => __( 'Enable Section', 'viral-pro' ),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                    ),
                'default'     => 'on'
            )
        )
    ) 
);

$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_slider_sec2', array(
    'title' => esc_html__('Slider Modules Two', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_slider_sec2'),
    'hiding_control' => 'viral_pro_frontpage_slider_sec2_disable'
)));

$wp_customize->add_setting('viral_pro_frontpage_slider_sec2_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_slider_sec2_disable', array(
    'section' => 'viral_pro_frontpage_slider_sec2',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting( 
    'viral_pro_frontpage_slider_blocks2', 
    array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'category' => '',
            'layout' => 'style1',
            'enable' => 'on'
            )
    ))
));

$wp_customize->add_control( 
    new Viral_Pro_Repeater_Controler(
        $wp_customize, 
        'viral_pro_frontpage_slider_blocks2', 
        array(
            'label'   => __('FrontPage Slider Blocks - FullWidth','viral-pro'),
            'section' => 'viral_pro_frontpage_slider_sec2',
            'box_label' => __('News Section','viral-pro'),
            'add_label' => __('Add Section','viral-pro'),
        ),
        array(
            'category' => array(
                'type'        => 'multicategory',
                'label'       => __( 'Select Category', 'viral-pro' ),
                'default'     => ''
            ),              
            'layout' => array(
                'type'        => 'selector',
                'label'       => __( 'Layouts', 'viral-pro' ),
                'description' => __( 'Select the Block Layout', 'viral-pro' ),
                'options' => array(
                    'style1' => $image_path_url.'top-layout1.png',
                    'style2' => $image_path_url.'top-layout2.png',
                    'style3' => $image_path_url.'top-layout3.png',
                    'style4' => $image_path_url.'top-layout4.png',
                    ),
                'default'     => 'style1'
            ),
            'enable' => array(
                'type'        => 'switch',
                'label'       => __( 'Enable Section', 'viral-pro' ),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                    ),
                'default'     => 'on'
            )
        )
    ) 
);

/*============FRONT PAGE TOP SECTION============*/
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_tile_sec', array(
    'title' => esc_html__('Tile Modules', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_tile_sec'),
    'hiding_control' => 'viral_pro_frontpage_tile_sec_disable'
)));

$wp_customize->add_setting('viral_pro_frontpage_tile_sec_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_tile_sec_disable', array(
    'section' => 'viral_pro_frontpage_tile_sec',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting( 
    'viral_pro_frontpage_top_blocks', 
    array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'title' => '' ,
            'category' => '',
            'layout' => 'style1',
            'enable' => 'on'
            )
    ))
));

$wp_customize->add_control( 
    new Viral_Pro_Repeater_Controler(
        $wp_customize, 
        'viral_pro_frontpage_top_blocks', 
        array(
            'label'   => __('Tile Blocks - FullWidth','viral-pro'),
            'section' => 'viral_pro_frontpage_tile_sec',
            'settings' => 'viral_pro_frontpage_top_blocks',
            'box_label' => __('News Section','viral-pro'),
            'add_label' => __('Add Section','viral-pro'),
        ),
        array(
            'category' => array(
                'type'        => 'multicategory',
                'label'       => __( 'Select Category', 'viral-pro' ),
                'default'     => ''
            ),              
            'layout' => array(
                'type'        => 'selector',
                'label'       => __( 'Layouts', 'viral-pro' ),
                'description' => __( 'Select the Block Layout', 'viral-pro' ),
                'options' => array(
                    'style1' => $image_path_url.'top-layout1.png',
                    'style2' => $image_path_url.'top-layout2.png',
                    'style3' => $image_path_url.'top-layout3.png',
                    'style4' => $image_path_url.'top-layout4.png',
                    ),
                'default'     => 'style1'
            ),
            'enable' => array(
                'type'        => 'switch',
                'label'       => __( 'Enable Section', 'viral-pro' ),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                    ),
                'default'     => 'on'
            )
        )
    ) 
);

/*============FRONT PAGE MIDDLE SECTION============*/
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_middle_left_sec', array(
    'title' => esc_html__('Middle Section - Left Content', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_middle_left_sec'),
    'hiding_control' => 'viral_pro_frontpage_middle_left_sec_disable'
)));

//ENABLE/DISABLE ABOUT US PAGE
$wp_customize->add_setting('viral_pro_frontpage_middle_left_sec_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_middle_left_sec_disable', array(
    'section' => 'viral_pro_frontpage_middle_left_sec',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting( 
    'viral_pro_frontpage_middle_blocks', 
    array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'title' => '' ,
            'category' => '',
            'layout' => 'style1',
            'enable' => 'on'
            )
    ))
));

$wp_customize->add_control( 
    new Viral_Pro_Repeater_Controler(
        $wp_customize, 
        'viral_pro_frontpage_middle_blocks', 
        array(
            'label'   => __('FrontPage Middle Blocks - Left Content', 'viral-pro'),
            'section' => 'viral_pro_frontpage_middle_left_sec',
            'settings' => 'viral_pro_frontpage_middle_blocks',
            'box_label' => __('News Section','viral-pro'),
            'add_label' => __('Add Section','viral-pro'),
        ),
        array(
            'title' => array(
                'type'        => 'text',
                'label'       => __( 'Title', 'viral-pro' ),
                'description' => __( 'Optional - Leave blank to hide Title', 'viral-pro' )
            ),
            'category' => array(
                'type'        => 'category',
                'label'       => __( 'Category', 'viral-pro' ),
                'default'     => ''
            ),              
            'layout' => array(
                'type'        => 'selector',
                'label'       => __( 'Layouts', 'viral-pro' ),
                'description' => __( 'Select the Block Layout', 'viral-pro' ),
                'options' => array(
                    'style1' => $image_path_url.'middle-layout1.png',
                    'style2' => $image_path_url.'middle-layout2.png',
                    'style3' => $image_path_url.'middle-layout3.png',
                    'style4' => $image_path_url.'middle-layout4.png',
                    ),
                'default'     => 'style1'
            ),
            'enable' => array(
                'type'        => 'switch',
                'label'       => esc_attr__( 'Enable Section', 'viral-pro' ),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                    ),
                'default'     => 'on'
            )
        )
    ) 
);

/*============FRONT PAGE BOTTOM SECTION============*/
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_bottom_sec', array(
    'title' => esc_html__('Bottom Section', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_bottom_sec'),
    'hiding_control' => 'viral_pro_frontpage_bottom_sec_disable'
)));

//ENABLE/DISABLE ABOUT US PAGE
$wp_customize->add_setting('viral_pro_frontpage_bottom_sec_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_bottom_sec_disable', array(
    'section' => 'viral_pro_frontpage_bottom_sec',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting( 
    'viral_pro_frontpage_bottom_blocks', 
    array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'title' => '' ,
            'category' => '',
            'layout' => 'style1',
            'enable' => 'on'
            )
    ))
));

$wp_customize->add_control( 
    new Viral_Pro_Repeater_Controler(
        $wp_customize, 
        'viral_pro_frontpage_bottom_blocks', 
        array(
            'label'   => __('FrontPage Bottom Blocks - FullWidth','viral-pro'),
            'section' => 'viral_pro_frontpage_bottom_sec',
            'settings' => 'viral_pro_frontpage_bottom_blocks',
            'box_label' => __('News Section','viral-pro'),
            'add_label' => __('Add Section','viral-pro'),
        ),
        array(
            'category1' => array(
                'type'        => 'category',
                'label'       => __( 'Category', 'viral-pro' ),
                'default'     => '',
                'class'       => 'vl-bottom-block-cat1'
            ),
            'category2' => array(
                'type'        => 'category',
                'label'       => __( 'Category', 'viral-pro' ),
                'default'     => '',
                'class'       => 'vl-bottom-block-cat2'
            ),  
            'category3' => array(
                'type'        => 'category',
                'label'       => __( 'Category', 'viral-pro' ),
                'default'     => '',
                'class'       => 'vl-bottom-block-cat3'
            ),                  
            'layout' => array(
                'type'        => 'selector',
                'label'       => __( 'Layouts', 'viral-pro' ),
                'description' => __( 'Select the Block Layout', 'viral-pro' ),
                'options' => array(
                    'style1' => $image_path_url.'bottom-layout1.png',
                    'style2' => $image_path_url.'bottom-layout2.png',
                    ),
                'default'     => 'style1',
                'class'       => 'vl-bottom-block-layout'
            ),
            'enable' => array(
                'type'        => 'switch',
                'label'       => __( 'Enable Section', 'viral-pro' ),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                    ),
                'default'     => 'on'
            )
        )
    ) 
);


/*============VIDEO SECTION============*/
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_frontpage_video_sec', array(
    'title' => esc_html__('Video Module', 'viral-pro'),
    'panel' => 'viral_pro_front_page_panel',
    'priority' => viral_pro_get_section_position('viral_pro_frontpage_video_sec'),
    'hiding_control' => 'viral_pro_frontpage_video_sec_disable'
)));

//ENABLE/DISABLE ABOUT US PAGE
$wp_customize->add_setting('viral_pro_frontpage_video_sec_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_frontpage_video_sec_disable', array(
    'section' => 'viral_pro_frontpage_video_sec',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting( 
    'viral_pro_frontpage_video_blocks', 
    array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'id' => '' ,
            'enable' => 'on'
            )
    ))
));

$wp_customize->add_control( 
    new Viral_Pro_Repeater_Controler(
        $wp_customize, 
        'viral_pro_frontpage_video_blocks', 
        array(
            'label'   => __('Videos','viral-pro'),
            'section' => 'viral_pro_frontpage_video_sec',
            'settings' => 'viral_pro_frontpage_video_blocks',
            'box_label' => __('Video','viral-pro'),
            'add_label' => __('Add Video','viral-pro'),
        ),
        array(                 
            'id' => array(
                'type'        => 'text',
                'label'       => __( 'Video ID', 'viral-pro' ),
                'description' => __( 'Enter the video id.', 'viral-pro' ),
                'default'     => ''
            ),
            'enable' => array(
                'type'        => 'switch',
                'label'       => __( 'Enable Section', 'viral-pro' ),
                'switch' => array(
                    'on' => 'Yes',
                    'off' => 'No'
                    ),
                'default'     => 'on'
            )
        )
    ) 
);



$section_array = array();
$exculde_section_array = array('about', 'contact', 'tab', 'cta', 'logo', 'customa', 'customb');

foreach ($section_array as $id) {

    $wp_customize->add_setting("viral_pro_{$id}_enable_fullwindow", array(
        'default' => 'off',
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, "viral_pro_{$id}_enable_fullwindow", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Full Window Section', 'viral-pro'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'viral-pro'),
            'off' => esc_html__('No', 'viral-pro')
        ),
        'priority' => 5
    )));

    $wp_customize->add_setting("viral_pro_{$id}_align_item", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'default' => 'top',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_pro_{$id}_align_item", array(
        'section' => "viral_pro_{$id}_section",
        'type' => 'radio',
        'label' => esc_html__('Content Alignment', 'viral-pro'),
        'choices' => array(
            'top' => esc_html__('Top', 'viral-pro'),
            'middle' => esc_html__('Middle', 'viral-pro'),
            'bottom' => esc_html__('Bottom', 'viral-pro')
        ),
        'priority' => 10
    ));

    $wp_customize->add_setting("viral_pro_{$id}_fw_seperator", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
    ));

    $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_{$id}_fw_seperator", array(
        'section' => "viral_pro_{$id}_section",
        'priority' => 10
    )));

    $wp_customize->add_setting("viral_pro_{$id}_bg_type", array(
        'default' => 'color-bg',
        'sanitize_callback' => 'viral_pro_sanitize_choices',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_pro_{$id}_bg_type", array(
        'section' => "viral_pro_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Background Type', 'viral-pro'),
        'choices' => array(
            'color-bg' => esc_html__('Color Background', 'viral-pro'),
            'gradient-bg' => esc_html__('Gradient Background', 'viral-pro'),
            'image-bg' => esc_html__('Image Background', 'viral-pro'),
            'video-bg' => esc_html__('Video Background', 'viral-pro')
        ),
        'priority' => 15
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_color", array(
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_bg_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Background Color', 'viral-pro'),
        'priority' => 20
    )));

    $wp_customize->add_setting("viral_pro_{$id}_bg_gradient", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Gradient_Control($wp_customize, "viral_pro_{$id}_bg_gradient", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Gradient Background', 'viral-pro'),
        'priority' => 25
    )));

    // Registers example_background settings
    $wp_customize->add_setting("viral_pro_{$id}_bg_image_url", array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_image_id", array(
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_image_repeat", array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_image_size", array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_position", array(
        'default' => 'center-center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_image_attach", array(
        'default' => 'fixed',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    // Registers example_background control
    $wp_customize->add_control(new Viral_Pro_Background_Control($wp_customize, "viral_pro_{$id}_bg_image", array(
        'label' => esc_html__('Background Image', 'viral-pro'),
        'section' => "viral_pro_{$id}_section",
        'settings' => array(
            'image_url' => "viral_pro_{$id}_bg_image_url",
            'image_id' => "viral_pro_{$id}_bg_image_id",
            'repeat' => "viral_pro_{$id}_bg_image_repeat", // Use false to hide the field
            'size' => "viral_pro_{$id}_bg_image_size",
            'position' => "viral_pro_{$id}_bg_position",
            'attach' => "viral_pro_{$id}_bg_image_attach"
        ),
        'priority' => 30
    )));

    $wp_customize->add_setting("viral_pro_{$id}_parallax_effect", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'default' => 'none',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_pro_{$id}_parallax_effect", array(
        'type' => 'radio',
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Background Effect', 'viral-pro'),
        'choices' => array(
            'none' => esc_html__('None', 'viral-pro'),
            'parallax' => esc_html__('Enable Parallax', 'viral-pro'),
            'scroll' => esc_html__('Horizontal Moving', 'viral-pro')
        ),
        'priority' => 35
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bg_video", array(
        'default' => '6O9Nd1RSZSY',
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control("viral_pro_{$id}_bg_video", array(
        'section' => "viral_pro_{$id}_section",
        'type' => 'text',
        'label' => esc_html__('Youtube Video ID', 'viral-pro'),
        'description' => esc_html__('https://www.youtube.com/watch?v=yNAsk4Zw2p0. Add only yNAsk4Zw2p0', 'viral-pro'),
        'priority' => 40
    ));

    $wp_customize->add_setting("viral_pro_{$id}_overlay_color", array(
        'default' => 'rgba(255,255,255,0)',
        'sanitize_callback' => 'viral_pro_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Alpha_Color_Control($wp_customize, "viral_pro_{$id}_overlay_color", array(
        'label' => esc_html__('Background Overlay Color', 'viral-pro'),
        'section' => "viral_pro_{$id}_section",
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
        ),
        'priority' => 45
    )));

    $wp_customize->add_setting("viral_pro_{$id}_cs_heading", array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, "viral_pro_{$id}_cs_heading", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Color Settings', 'viral-pro'),
        'priority' => 50
    )));

    $wp_customize->add_setting("viral_pro_{$id}_super_title_color", array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_super_title_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Section Super Title Color', 'viral-pro'),
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_pro_{$id}_title_color", array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_title_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Section Title Color', 'viral-pro'),
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_pro_{$id}_text_color", array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_text_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Section Text Color', 'viral-pro'),
        'priority' => 55
    )));

    $wp_customize->add_setting("viral_pro_{$id}_link_color", array(
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_link_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Section Link Color', 'viral-pro'),
        'priority' => 55
    )));

    if (!in_array($id, $exculde_section_array)) {
        $wp_customize->add_setting("viral_pro_{$id}_mb_seperator", array(
            'sanitize_callback' => 'viral_pro_sanitize_text'
        ));

        $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_{$id}_mb_seperator", array(
            'section' => "viral_pro_{$id}_section",
            'priority' => 60
        )));

        $wp_customize->add_setting("viral_pro_{$id}_mb_bg_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_setting("viral_pro_{$id}_mb_text_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_setting("viral_pro_{$id}_mb_hov_bg_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_setting("viral_pro_{$id}_mb_hov_text_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new Viral_Pro_Color_Tab_Control($wp_customize, "viral_pro_{$id}_mb_color_group", array(
            'label' => esc_html__('More Button Colors', 'viral-pro'),
            'section' => "viral_pro_{$id}_section",
            'show_opacity' => false,
            'priority' => 60,
            'settings' => array(
                "normal_viral_pro_{$id}_mb_bg_color" => "viral_pro_{$id}_mb_bg_color",
                "normal_viral_pro_{$id}_mb_text_color" => "viral_pro_{$id}_mb_text_color",
                "hover_viral_pro_{$id}_mb_hov_bg_color" => "viral_pro_{$id}_mb_hov_bg_color",
                "hover_viral_pro_{$id}_mb_hov_text_color" => "viral_pro_{$id}_mb_hov_text_color",
            ),
            'group' => array(
                "normal_viral_pro_{$id}_mb_bg_color" => esc_html__('Button Background Color', 'viral-pro'),
                "normal_viral_pro_{$id}_mb_text_color" => esc_html__('Button Text Color', 'viral-pro'),
                "hover_viral_pro_{$id}_mb_hov_bg_color" => esc_html__('Button Background Color', 'viral-pro'),
                "hover_viral_pro_{$id}_mb_hov_text_color" => esc_html__('Button Text Color', 'viral-pro')
            )
        )));
    }

    $wp_customize->add_setting("viral_pro_{$id}_cs_seperator", array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_{$id}_cs_seperator", array(
        'section' => "viral_pro_{$id}_section",
        'priority' => 80
    )));

    $wp_customize->add_setting("viral_pro_{$id}_padding_top", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'default' => 100,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_padding_bottom", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'default' => 100,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_tablet_padding_top", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_tablet_padding_bottom", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_mobile_padding_top", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_mobile_padding_bottom", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Dimensions_Control($wp_customize, "viral_pro_{$id}_padding", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Top & Bottom Paddings (px)', 'viral-pro'),
        'settings' => array(
            'desktop_top' => "viral_pro_{$id}_padding_top",
            'desktop_bottom' => "viral_pro_{$id}_padding_bottom",
            'tablet_top' => "viral_pro_{$id}_tablet_padding_top",
            'tablet_bottom' => "viral_pro_{$id}_tablet_padding_bottom",
            'mobile_top' => "viral_pro_{$id}_mobile_padding_top",
            'mobile_bottom' => "viral_pro_{$id}_mobile_padding_bottom",
        ),
        'input_attrs' => array(
            'min' => 0,
            'max' => 400,
            'step' => 1,
        ),
        'priority' => 85
    )));

    $wp_customize->add_setting("viral_pro_{$id}_seperator0", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
    ));

    $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_{$id}_seperator0", array(
        'section' => "viral_pro_{$id}_section",
        'priority' => 90
    )));

    $wp_customize->add_setting("viral_pro_{$id}_section_seperator", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'default' => 'no',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_pro_{$id}_section_seperator", array(
        'section' => "viral_pro_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Enable Seperator', 'viral-pro'),
        'choices' => array(
            'no' => esc_html__('Disable', 'viral-pro'),
            'top' => esc_html__('Enable Top Seperator', 'viral-pro'),
            'bottom' => esc_html__('Enable Bottom Seperator', 'viral-pro'),
            'top-bottom' => esc_html__('Enable Top & Bottom Seperator', 'viral-pro')
        ),
        'priority' => 95
    ));

    $wp_customize->add_setting("viral_pro_{$id}_seperator1", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
    ));

    $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_{$id}_seperator1", array(
        'section' => "viral_pro_{$id}_section",
        'priority' => 100
    )));

    $wp_customize->add_setting("viral_pro_{$id}_top_seperator", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'default' => 'big-triangle-center',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_pro_{$id}_top_seperator", array(
        'section' => "viral_pro_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Top Seperator', 'viral-pro'),
        'choices' => viral_pro_svg_seperator(),
        'priority' => 105
    ));

    $wp_customize->add_setting("viral_pro_{$id}_ts_color", array(
        'default' => '#FF0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_ts_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Top Seperator Color', 'viral-pro'),
        'priority' => 115
    )));

    $wp_customize->add_setting("viral_pro_{$id}_ts_height", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'default' => 60,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_ts_height_tablet", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_ts_height_mobile", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Range_Slider_Control($wp_customize, "viral_pro_{$id}_ts_height", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Top Seperator Height (px)', 'viral-pro'),
        'settings' => array(
            'desktop' => "viral_pro_{$id}_ts_height",
            'tablet' => "viral_pro_{$id}_ts_height_tablet",
            'mobile' => "viral_pro_{$id}_ts_height_mobile",
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 200,
            'step' => 1,
        ),
        'priority' => 120
    )));

    $wp_customize->add_setting("viral_pro_{$id}_seperator2", array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_{$id}_seperator2", array(
        'section' => "viral_pro_{$id}_section",
        'priority' => 125
    )));

    $wp_customize->add_setting("viral_pro_{$id}_bottom_seperator", array(
        'sanitize_callback' => 'viral_pro_sanitize_text',
        'default' => 'big-triangle-center',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control("viral_pro_{$id}_bottom_seperator", array(
        'section' => "viral_pro_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Bottom Seperator', 'viral-pro'),
        'choices' => viral_pro_svg_seperator(),
        'priority' => 130
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bs_color", array(
        'default' => '#FF0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "viral_pro_{$id}_bs_color", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Bottom Seperator Color', 'viral-pro'),
        'priority' => 135,
    )));

    $wp_customize->add_setting("viral_pro_{$id}_bs_height", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'default' => 60,
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bs_height_tablet", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting("viral_pro_{$id}_bs_height_mobile", array(
        'sanitize_callback' => 'viral_pro_sanitize_number_blank',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Viral_Pro_Range_Slider_Control($wp_customize, "viral_pro_{$id}_bs_height", array(
        'section' => "viral_pro_{$id}_section",
        'label' => esc_html__('Bottom Seperator Height (px)', 'viral-pro'),
        'input_attrs' => array(
            'min' => 20,
            'max' => 200,
            'step' => 1,
        ),
        'settings' => array(
            'desktop' => "viral_pro_{$id}_bs_height",
            'tablet' => "viral_pro_{$id}_bs_height_tablet",
            'mobile' => "viral_pro_{$id}_bs_height_mobile",
        ),
        'priority' => 140
    )));

    $wp_customize->selective_refresh->add_partial("viral_pro_{$id}_bg_type", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_pro_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_pro_{$id}_parallax_effect", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_pro_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_pro_{$id}_section_seperator", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_pro_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_pro_{$id}_top_seperator", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_pro_{$id}_section",
        'container_inclusive' => true
    ));

    $wp_customize->selective_refresh->add_partial("viral_pro_{$id}_bottom_seperator", array(
        'selector' => "#ht-{$id}-section",
        'render_callback' => "viral_pro_{$id}_section",
        'container_inclusive' => true
    ));
}