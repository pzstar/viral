<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
$wp_customize->add_section('viral_pro_blog_options_section', array(
    'title' => __('Blog/Single Post Settings', 'viral-pro'),
    'priority' => 30
));

$wp_customize->add_setting('viral_pro_blog_sec_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Viral_Pro_Control_Tab($wp_customize, 'viral_pro_blog_sec_nav', array(
    'type' => 'tab',
    'section' => 'viral_pro_blog_options_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('BLog Page', 'viral-pro'),
            'fields' => array(
                'viral_pro_blog_layout',
                'viral_pro_blog_cat',
                'viral_pro_archive_content',
                'viral_pro_archive_excerpt_length',
                'viral_pro_archive_readmore',
                'viral_pro_blog_date',
                'viral_pro_blog_author',
                'viral_pro_blog_comment',
                'viral_pro_blog_category',
                'viral_pro_blog_tag',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Single Post', 'viral-pro'),
            'fields' => array(
                'viral_pro_single_blog_title',
                'viral_pro_single_post_top_elements',
                'viral_pro_single_post_bottom_elements'
            ),
        ),
    ),
)));

$wp_customize->add_setting('viral_pro_blog_layout', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => 'blog-layout1'
));

$wp_customize->add_control(new Viral_Pro_Image_Select($wp_customize, 'viral_pro_blog_layout', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Blog Layout', 'viral-pro'),
    'image_path' => $imagepath . '/inc/customizer/images/blog-layouts/',
    'choices' => array(
        'blog-layout1' => esc_html__('Layout 1', 'viral-pro'),
        'blog-layout2' => esc_html__('Layout 2', 'viral-pro'),
        'blog-layout3' => esc_html__('Layout 3', 'viral-pro'),
        'blog-layout4' => esc_html__('Layout 4', 'viral-pro')
    )
)));

$wp_customize->add_setting('viral_pro_blog_cat', array(
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control(new Viral_Pro_Customize_Checkbox_Multiple($wp_customize, 'viral_pro_blog_cat', array(
    'label' => esc_html__('Exclude Category', 'viral-pro'),
    'section' => 'viral_pro_blog_options_section',
    'choices' => $viral_pro_cat,
    'description' => esc_html__('Post with selected category will not display in the blog page', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_archive_content', array(
    'default' => 'excerpt',
    'sanitize_callback' => 'viral_pro_sanitize_choices'
));

$wp_customize->add_control('viral_pro_archive_content', array(
    'section' => 'viral_pro_blog_options_section',
    'type' => 'radio',
    'label' => esc_html__('Archive Content', 'viral-pro'),
    'choices' => array(
        'full-content' => esc_html__('Full Content', 'viral-pro'),
        'excerpt' => esc_html__('Excerpt', 'viral-pro')
    )
));

$wp_customize->add_setting('viral_pro_archive_excerpt_length', array(
    'sanitize_callback' => 'absint',
    'default' => 100
));

$wp_customize->add_control(new Viral_Pro_Range_Control($wp_customize, 'viral_pro_archive_excerpt_length', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Excerpt Length (words)', 'viral-pro'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('viral_pro_archive_readmore', array(
    'default' => esc_html__('Read More', 'viral-pro'),
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control('viral_pro_archive_readmore', array(
    'section' => 'viral_pro_blog_options_section',
    'type' => 'text',
    'label' => esc_html__('Read More Text', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_blog_date', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_date', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Display Posted Date', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_author', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_author', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Display Author', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_comment', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_comment', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Display Comment', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_category', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_category', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Display Category', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_blog_tag', array(
    'sanitize_callback' => 'viral_pro_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Viral_Pro_Checkbox_Control($wp_customize, 'viral_pro_blog_tag', array(
    'section' => 'viral_pro_blog_options_section',
    'label' => esc_html__('Display Tag', 'viral-pro')
)));

$wp_customize->add_setting('viral_pro_single_blog_title', array(
    'default' => esc_html__('Blog Post', 'viral-pro'),
    'sanitize_callback' => 'viral_pro_sanitize_text'
));

$wp_customize->add_control('viral_pro_single_blog_title', array(
    'section' => 'viral_pro_blog_options_section',
    'type' => 'text',
    'label' => esc_html__('Header Title', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_single_post_top_elements', array(
    'default' => array('post_meta', 'featured_image', 'content', 'category', 'tag', 'social_share'),
    'sanitize_callback' => 'viral_pro_sanitize_multi_choices',
));

$wp_customize->add_control(new Viral_Pro_Sortable_Control($wp_customize, 'viral_pro_single_post_top_elements', array(
    'label' => esc_html__('Content Display & Order', 'viral-pro'),
    'section' => 'viral_pro_blog_options_section',
    'settings' => 'viral_pro_single_post_top_elements',
    'choices' => array(
        'featured_image' => esc_html__('Featured Image', 'viral-pro'),
        'post_meta' => esc_html__('Post Meta', 'viral-pro'),
        'content' => esc_html__('Content', 'viral-pro'),
        'category' => esc_html__('Category', 'viral-pro'),
        'tag' => esc_html__('Tags', 'viral-pro'),
        'social_share' => esc_html__('Social Share', 'viral-pro'),
    )
)));

$wp_customize->add_setting('viral_pro_single_post_bottom_elements', array(
    'default' => array('author_box', 'pagination', 'comment', 'related_posts'),
    'sanitize_callback' => 'viral_pro_sanitize_multi_choices',
));

$wp_customize->add_control(new Viral_Pro_Sortable_Control($wp_customize, 'viral_pro_single_post_bottom_elements', array(
    'label' => esc_html__('Content Display & Order', 'viral-pro'),
    'section' => 'viral_pro_blog_options_section',
    'settings' => 'viral_pro_single_post_bottom_elements',
    'choices' => array(
        'author_box' => esc_html__('Author Box', 'viral-pro'),
        'pagination' => esc_html__('Prev/Next Navigation', 'viral-pro'),
        'comment' => esc_html__('Comment', 'viral-pro'),
        'related_posts' => esc_html__('Related Posts', 'viral-pro')
    )
)));
