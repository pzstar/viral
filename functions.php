<?php

/**
 * Viral functions and definitions.
 *
 * @package Viral
 */
if (!function_exists('viral_setup')) :

    function viral_setup() {

        load_theme_textdomain('viral', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
        add_image_size('viral-780x440', 780, 440, true);
        add_image_size('viral-600x600', 600, 600, true);
        add_image_size('viral-400x400', 400, 400, true);
        add_image_size('viral-150x150', 150, 150, true);

        register_nav_menus(array(
            'primary' => esc_html__('Main Menu', 'viral'),
            'top-menu' => esc_html__('Top Header Menu', 'viral'),
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        add_theme_support('custom-background', apply_filters('viral_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support('custom-logo', array(
            'height' => 60,
            'width' => 300,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('.vl-site-title', '.vl-site-description'),
        ));
    }

endif; // viral_setup
add_action('after_setup_theme', 'viral_setup');

function viral_content_width() {
    $GLOBALS['content_width'] = apply_filters('viral_content_width', 810);
}

add_action('after_setup_theme', 'viral_content_width', 0);

/**
 * Register widget area.
 */
function viral_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'viral'),
        'id' => 'viral-sidebar',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Ads', 'viral'),
        'id' => 'viral-header-ads',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Home Middle Section - Right Sidebar', 'viral'),
        'id' => 'viral-frontpage-sidebar',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'viral'),
        'id' => 'viral-footer1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'viral'),
        'id' => 'viral-footer2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'viral'),
        'id' => 'viral-footer3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'viral'),
        'id' => 'viral-footer4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'viral_widgets_init');

if (!function_exists('viral_fonts_url')) :

    /**
     * Register Google fonts for Viral.
     *
     * @return string Google fonts URL for the theme.
     */
    function viral_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto Condensed, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Roboto Condensed font: on or off', 'viral')) {
            $fonts[] = 'Roboto Condensed:300italic,400italic,700italic,400,300,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Roboto font: on or off', 'viral')) {
            $fonts[] = 'Roboto:300,400,400i,500,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'viral');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * Enqueue scripts and styles.
 */
function viral_scripts() {
    wp_enqueue_style('viral-fonts', viral_fonts_url(), array(), null);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '1.0.0');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0');
    wp_enqueue_style('viral-style', get_stylesheet_uri());
    wp_add_inline_style('viral-style', viral_dymanic_styles());

    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('viral-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'viral_scripts');

/**
 * Enqueue admin scripts and styles.
 */
function viral_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('viral-admin-scripts', get_template_directory_uri() . '/inc/js/admin-scripts.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('viral-admin-style', get_template_directory_uri() . '/inc/css/admin-style.css');
}

add_action('admin_enqueue_scripts', 'viral_admin_scripts');

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        do_action('wp_body_open');
    }

}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Hooks additions.
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Dynamic Styles additions.
 */
require get_template_directory() . '/inc/style.php';

/**
 * Widgets additions.
 */
require get_template_directory() . '/inc/widgets/widget-fields.php';
require get_template_directory() . '/inc/widgets/widget-contact-info.php';
require get_template_directory() . '/inc/widgets/widget-personal-info.php';
require get_template_directory() . '/inc/widgets/widget-timeline.php';
require get_template_directory() . '/inc/widgets/widget-category-block.php';
require get_template_directory() . '/inc/widgets/widget-advertisement.php';

/**
 * Welcome Page.
 */
require get_template_directory() . '/welcome/welcome.php';

/**
 * Demo Import.
 */
require get_template_directory() . '/welcome/importer.php';
