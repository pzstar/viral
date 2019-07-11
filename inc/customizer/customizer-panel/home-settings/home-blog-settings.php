<?php

/* ============BLOG PANEL============ */
$wp_customize->add_section(new Viral_Pro_Toggle_Section($wp_customize, 'viral_pro_blog_section', array(
    'title' => esc_html__('Blog Section', 'viral-pro'),
    'panel' => 'viral_pro_home_panel',
    'priority' => viral_pro_get_section_position('viral_pro_blog_section'),
    'hiding_control' => 'viral_pro_blog_section_disable'
)));

//ENABLE/DISABLE BLOG SECTION
$wp_customize->add_setting('viral_pro_blog_section_disable', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Viral_Pro_Switch_Control($wp_customize, 'viral_pro_blog_section_disable', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Disable Section', 'viral-pro'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'viral-pro'),
        'off' => esc_html__('No', 'viral-pro')
    ),
    'class' => 'switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('viral_pro_blog_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_blog_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_blog_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'viral-pro'),
            'fields' => array(
                'viral_pro_blog_title_subtitle_heading',
                'viral_pro_blog_super_title',
                'viral_pro_blog_title',
                'viral_pro_blog_sub_title',
                'viral_pro_blog_title_style',
                'viral_pro_blog_cat_exclude',
                'viral_pro_blog_setting_heading',
                'viral_pro_blog_style',
                'viral_pro_blog_col',
                'viral_pro_blog_post_count',
                'viral_pro_blog_image_height',
                'viral_pro_blog_excerpt_count',
                'viral_pro_blog_show_date',
                'viral_pro_blog_show_author_comment',
                'viral_pro_blog_button_heading',
                'viral_pro_blog_button_text',
                'viral_pro_blog_button_link',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'viral-pro'),
            'fields' => array(
                'viral_pro_blog_cs_heading',
                'viral_pro_blog_super_title_color',
                'viral_pro_blog_title_color',
                'viral_pro_blog_text_color',
                'viral_pro_blog_link_color',
                'viral_pro_blog_link_hov_color',
                'viral_pro_blog_block_color_seperator',
                'viral_pro_blog_block_title_color',
                'viral_pro_blog_block_text_color',
                'viral_pro_blog_block_read_more_color',
                'viral_pro_blog_mb_seperator',
                'viral_pro_blog_mb_color_group'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'viral-pro'),
            'fields' => array(
                'viral_pro_blog_enable_fullwindow',
                'viral_pro_blog_align_item',
                'viral_pro_blog_fw_seperator',
                'viral_pro_blog_bg_type',
                'viral_pro_blog_bg_color',
                'viral_pro_blog_bg_gradient',
                'viral_pro_blog_bg_image',
                'viral_pro_blog_parallax_effect',
                'viral_pro_blog_bg_video',
                'viral_pro_blog_overlay_color',
                'viral_pro_blog_cs_seperator',
                'viral_pro_blog_padding',
                'viral_pro_blog_seperator0',
                'viral_pro_blog_section_seperator',
                'viral_pro_blog_seperator1',
                'viral_pro_blog_top_seperator',
                'viral_pro_blog_ts_color',
                'viral_pro_blog_ts_height',
                'viral_pro_blog_seperator2',
                'viral_pro_blog_bottom_seperator',
                'viral_pro_blog_bs_color',
                'viral_pro_blog_bs_height'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_blog_title_subtitle_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_blog_title_subtitle_heading', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Section Title & Sub Title', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_super_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_blog_super_title', array(
    'section' => 'viral_pro_blog_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_blog_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Blog Section', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_blog_title', array(
    'section' => 'viral_pro_blog_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_blog_sub_title', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => esc_html__('Blog Section SubTitle', 'viral-pro'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_blog_sub_title', array(
    'section' => 'viral_pro_blog_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_blog_title_style', array(
    'default' => 'ht-section-title-top-center',
    'sanitize_callback' => 'viral_pro_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_blog_title_style', array(
    'section' => 'viral_pro_blog_section',
    'type' => 'select',
    'label' => esc_html__('Title Style', 'viral-pro'),
    'choices' => viral_pro_tagline_style()
));

//BLOG SETTINGS
$wp_customize->add_setting('viral_pro_blog_setting_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_blog_setting_heading', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Settings', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_style', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Selector($wp_customize, 'viral_pro_blog_style', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Blog Style', 'viral-pro'),
    'options' => array(
        'style1' => $imagepath . '/inc/customizer/images/blog-style1.png',
        'style2' => $imagepath . '/inc/customizer/images/blog-style2.png',
        'style3' => $imagepath . '/inc/customizer/images/blog-style3.png',
        'style4' => $imagepath . '/inc/customizer/images/blog-style4.png',
    )
)));

$wp_customize->add_setting('viral_pro_blog_cat_exclude', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Customize_Checkbox_Multiple($wp_customize, 'viral_pro_blog_cat_exclude', array(
    'label' => esc_html__('Exclude Category from Blog Posts', 'viral-pro'),
    'section' => 'viral_pro_blog_section',
    'choices' => $viral_pro_cat
)));

$wp_customize->add_setting('viral_pro_blog_col', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('viral_pro_blog_image_height', array(
    'sanitize_callback' => 'absint',
    'default' => 300,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_blog_image_height', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Blog Image Height(px)', 'viral-pro'),
    'input_attrs' => array(
        'min' => 100,
        'max' => 500,
        'step' => 10,
    )
)));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_blog_col', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('No of Columns', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 4,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_blog_post_count', array(
    'sanitize_callback' => 'absint',
    'default' => 3,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_blog_post_count', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Number of Posts to show', 'viral-pro'),
    'input_attrs' => array(
        'min' => 2,
        'max' => 15,
        'step' => 1,
    )
)));

$wp_customize->add_setting('viral_pro_blog_excerpt_count', array(
    'sanitize_callback' => 'absint',
    'default' => 120,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_blog_excerpt_count', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Excerpt Character', 'viral-pro'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 600,
        'step' => 10,
    )
)));

$wp_customize->add_setting('viral_pro_blog_show_date', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_show_date', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Show Date', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_show_author_comment', array(
    'sanitize_callback' => 'viral_pro_sanitize_checkbox',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_show_author_comment', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('Show Author & Comment Count', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_button_heading', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Heading($wp_customize, 'viral_pro_blog_button_heading', array(
    'section' => 'viral_pro_blog_section',
    'label' => esc_html__('More Button', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_button_text', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_blog_button_text', array(
    'section' => 'viral_pro_blog_section',
    'type' => 'text',
    'label' => esc_html__('More Button Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_blog_button_link', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('viral_pro_blog_button_link', array(
    'section' => 'viral_pro_blog_section',
    'type' => 'text',
    'label' => esc_html__('More Button Link', 'viral-pro')
));

$wp_customize->add_setting("viral_pro_blog_block_color_seperator", array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
));

$wp_customize->add_control(new Viral_Pro_Separator_Control($wp_customize, "viral_pro_blog_block_color_seperator", array(
    'section' => 'viral_pro_blog_section',
    'priority' => 56
)));

$wp_customize->add_setting('viral_pro_blog_block_title_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_blog_block_title_color', array(
    'section' => 'viral_pro_blog_section',
    'priority' => 56,
    'label' => esc_html__('Blog Block Title Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_block_text_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_blog_block_text_color', array(
    'section' => 'viral_pro_blog_section',
    'priority' => 56,
    'label' => esc_html__('Blog Block Text Color', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_block_read_more_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
    'default' => '#333333'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'viral_pro_blog_block_read_more_color', array(
    'section' => 'viral_pro_blog_section',
    'priority' => 56,
    'label' => esc_html__('Blog Block Read More Color', 'viral-pro')
)));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_title_style', array(
    'selector' => '.ht-blog-section',
    'render_callback' => 'viral_pro_blog_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_super_title', array(
    'selector' => '.ht-blog-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_blog_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_title', array(
    'selector' => '.ht-blog-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_blog_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_sub_title', array(
    'selector' => '.ht-blog-section .ht-section-title-tagline',
    'render_callback' => 'viral_pro_blog_title',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_cat_exclude', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_style', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_col', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_post_count', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_excerpt_count', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_show_date', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_show_author_comment', array(
    'selector' => '.ht-blog-content',
    'render_callback' => 'viral_pro_blog_content'
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_button_text', array(
    'selector' => '.ht-blog-section',
    'render_callback' => 'viral_pro_blog_section',
    'container_inclusive' => true
));

$wp_customize->selective_refresh->add_partial('viral_pro_blog_button_link', array(
    'selector' => '.ht-blog-section',
    'render_callback' => 'viral_pro_blog_section',
    'container_inclusive' => true
));

