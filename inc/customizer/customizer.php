<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function viral_pro_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->remove_control('header_text');

    global $wp_registered_sidebars;
    $image_path_url = $imagepath = get_template_directory_uri();
    $viral_pro_menu_choice = $viral_pro_portfolio_cat = $viral_pro_portfolio_cat_all = $viral_pro_page_choice = $viral_pro_cat = $all = array();

    $viral_pro_widget_list[] = esc_html__('-- Choose Widget --', 'viral-pro');
    foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
        $viral_pro_widget_list[$wp_registered_sidebar['id']] = $wp_registered_sidebar['name'];
    }

    $viral_pro_categories = get_categories(array('hide_empty' => 0));
    foreach ($viral_pro_categories as $viral_pro_category) {
        $viral_pro_cat[$viral_pro_category->term_id] = $viral_pro_category->cat_name;
    }

    $viral_pro_portfolio_categories = get_categories(array('taxonomy' => 'portfolio_type', 'hide_empty' => 0));
    foreach ($viral_pro_portfolio_categories as $viral_pro_portfolio_category) {
        $viral_pro_portfolio_cat[$viral_pro_portfolio_category->term_id] = $viral_pro_portfolio_category->cat_name;
    }

    $all['*'] = esc_html__('All', 'viral-pro');

    $viral_pro_portfolio_cat_all = $all + $viral_pro_portfolio_cat;

    $viral_pro_pages = get_pages(array('hide_empty' => 0));
    foreach ($viral_pro_pages as $viral_pro_pages_single) {
        $viral_pro_page_choice[$viral_pro_pages_single->ID] = $viral_pro_pages_single->post_title;
    }

    $viral_pro_menus = get_terms('nav_menu', array('hide_empty' => false));
    foreach ($viral_pro_menus as $viral_pro_menus_single) {
        $viral_pro_menu_choice[$viral_pro_menus_single->slug] = $viral_pro_menus_single->name;
    }

    for ($i = 1; $i <= 100; $i++) {
        $viral_pro_percentage[$i] = $i;
    }

    $wp_customize->register_control_type('Viral_Pro_Background_Control');
    $wp_customize->register_control_type('Viral_Pro_Control_Tab');
    $wp_customize->register_control_type('Viral_Pro_Dimensions_Control');
    $wp_customize->register_control_type('Viral_Pro_Range_Slider_Control');
    $wp_customize->register_control_type('Viral_Pro_Sortable_Control');
    $wp_customize->register_control_type('Viral_Pro_Color_Tab_Control');
    $wp_customize->register_section_type('Viral_Pro_Toggle_Section');

    /*
    $customizer_maintenance_mode = of_get_option('customizer_maintenance_mode', '1');
    if ($customizer_maintenance_mode) {
        require get_template_directory() . '/inc/customizer/customizer-panel/maintenance.php';
    }*/
    
    require get_template_directory() . '/inc/customizer/customizer-panel/general-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/color-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/header-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/sidebar-settings.php';

    require get_template_directory() . '/inc/customizer/customizer-panel/home-settings.php';
    /*
    $customizer_home_settings = of_get_option('customizer_home_settings', '1');
    if ($customizer_home_settings) {
        require get_template_directory() . '/inc/customizer/customizer-panel/home-settings.php';
    }*/
    
    require get_template_directory() . '/inc/customizer/customizer-panel/blog-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/footer-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/social-settings.php';

    /*
    $customizer_gdpr_settings = of_get_option('customizer_gdpr_settings', '1');
    if ($customizer_gdpr_settings) {
        require get_template_directory() . '/inc/customizer/customizer-panel/gdpr-settings.php';
    }*/
    

    /* ============IMPORTANT LINKS============ */
    $wp_customize->add_section('viral_pro_implink_section', array(
        'title' => esc_html__('Important Links', 'viral-pro'),
        'priority' => 1000
    ));

    $wp_customize->add_setting('viral_pro_imp_links', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_imp_links', array(
        'section' => 'viral_pro_implink_section',
        'description' => '<a class="ht-implink" href="https://demo.hashthemes.com/viral-pro/" target="_blank">' . esc_html__('Live Demo', 'viral-pro') . '</a><a class="ht-implink" href="https://hashthemes.com/support/forum/viral-pro/" target="_blank">' . esc_html__('Support Forum', 'viral-pro') . '</a><a class="ht-implink" href="https://www.facebook.com/hashtheme/" target="_blank">' . esc_html__('Like Us in Facebook', 'viral-pro') . '</a>',
    )));

    $wp_customize->add_setting('viral_pro_rate_us', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_rate_us', array(
        'section' => 'viral_pro_implink_section',
        'description' => sprintf(esc_html__('Please do rate our theme if you liked it %s', 'viral-pro'), '<a class="ht-implink" href="https://wordpress.org/support/theme/square/reviews/?filter=5" target="_blank">Rate/Review</a>'),
    )));

    $wp_customize->add_setting('viral_pro_setup_instruction', array(
        'sanitize_callback' => 'viral_pro_sanitize_text'
    ));

    $wp_customize->add_control(new Viral_Pro_Info_Text($wp_customize, 'viral_pro_setup_instruction', array(
        'section' => 'viral_pro_implink_section',
        'description' => __('<strong>Instruction - Setting up Home Page</strong><br/>1. Create a new
					page (any title, like Home )<br/>
2. In right column: Page Attributes -> Template: Home Page<br/>
3. Click on Publish<br/>
4. Go to Appearance-> Customize -> General settings -> Static Front Page<br/>
5. Select - A static page<br/>
6. In Front Page, select the page that you created in the step 1<br/>
7. Save changes', 'viral-pro'),
    )));

    $wp_customize->remove_control('viral_pro_about_super_title_color');
    $wp_customize->remove_control('viral_pro_contact_super_title_color');
}

add_action('customize_register', 'viral_pro_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function viral_pro_customize_preview_js() {
    wp_enqueue_script('viral-pro-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-preview.js', array('customize-preview'), '1.0.0', true);
}

add_action('customize_preview_init', 'viral_pro_customize_preview_js');

function viral_pro_customizer_script() {
    wp_enqueue_script('viral-pro-customizer-chosen-script', get_template_directory_uri() . '/inc/customizer/js/chosen.jquery.js', array("jquery"), '1.4.1', true);
    wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/inc/customizer/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '1.0.2', true);
    wp_enqueue_script('viral-pro-customizer-script', get_template_directory_uri() . '/inc/customizer/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), '1.0.0', true);

    wp_enqueue_style('fontawesome-5.2.0', get_template_directory_uri() . '/css/all.css', array(), '5.2.0');
    wp_enqueue_style('essential-icon', get_template_directory_uri() . '/css/essential-icon.css', array(), '4.4.0');
    wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/css/materialdesignicons.css', array(), '4.4.0');
    wp_enqueue_style('icofont', get_template_directory_uri() . '/css/icofont.css', array(), '1.0.0');
    wp_enqueue_style('eleganticons', get_template_directory_uri() . '/css/eleganticons.css', array(), '1.00');
    wp_enqueue_style('viral-pro-customizer-chosen-style', get_template_directory_uri() . '/inc/customizer/css/chosen.css');
    wp_enqueue_style('viral-pro-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-controls.css', array('wp-color-picker'), '1.0.0');
}

add_action('customize_controls_enqueue_scripts', 'viral_pro_customizer_script');

require get_template_directory() . '/inc/customizer/customizer-control-class.php';
require get_template_directory() . '/inc/customizer/customizer-control-sanitization.php';
require get_template_directory() . '/inc/customizer/customizer-active-callbacks.php';
require get_template_directory() . '/inc/customizer/font-icons.php';
require get_template_directory() . '/inc/customizer/typography/typography.php';

add_action('wp_ajax_viral_pro_order_sections', 'viral_pro_order_sections');

function viral_pro_order_sections() {
    if (isset($_POST['sections'])) {
        set_theme_mod('viral_pro_frontpage_sections', $_POST['sections']);
    }
    wp_die();
}

if (!function_exists('viral_pro_frontpage_sections')) {

    function viral_pro_frontpage_sections() {
        $defaults = array(
            'viral_pro_about_section',
            'viral_pro_highlight_section',
            'viral_pro_featured_section',
            'viral_pro_portfolio_section',
            'viral_pro_portfolioslider_section',
            'viral_pro_service_section',
            'viral_pro_team_section',
            'viral_pro_counter_section',
            'viral_pro_testimonial_section',
            'viral_pro_pricing_section',
            'viral_pro_news_section',
            'viral_pro_tab_section',
            'viral_pro_blog_section',
            'viral_pro_logo_section',
            'viral_pro_cta_section',
            'viral_pro_contact_section',
            'viral_pro_customa_section',
            'viral_pro_customb_section'
        );
        $sections = get_theme_mod('viral_pro_frontpage_sections', $defaults);
        return $sections;
    }

}

if (!function_exists('viral_pro_get_section_position')) {

    function viral_pro_get_section_position($key) {
        $sections = viral_pro_frontpage_sections();
        $position = array_search($key, $sections);
        $return = ( $position + 1 ) * 10;
        return $return;
    }

}

function viral_pro_svg_seperator() {
    return array(
        'big-triangle-center' => esc_html__('Big Triangle Center', 'viral-pro'),
        'big-triangle-left' => esc_html__('Big Triangle Left', 'viral-pro'),
        'big-triangle-right' => esc_html__('Big Triangle Right', 'viral-pro'),
        'clouds' => esc_html__('Clouds', 'viral-pro'),
        'curve-center' => esc_html__('Curve Center', 'viral-pro'),
        'curve-repeater' => esc_html__('Curve Repeater', 'viral-pro'),
        'droplets' => esc_html__('Droplets', 'viral-pro'),
        'paper-cut' => esc_html__('Paint Brush', 'viral-pro'),
        'small-triangle-center' => esc_html__('Small Triangle Center', 'viral-pro'),
        'tilt-left' => esc_html__('Tilt Left', 'viral-pro'),
        'tilt-right' => esc_html__('Tilt Right', 'viral-pro'),
        'uniform-waves' => esc_html__('Uniform Waves', 'viral-pro'),
        'water-waves' => esc_html__('Water Waves', 'viral-pro'),
        'big-waves' => esc_html__('Big Waves', 'viral-pro'),
        'slanted-waves' => esc_html__('Slanted Waves', 'viral-pro'),
        'zigzag' => esc_html__('Zigzag', 'viral-pro'),
    );
}

function viral_pro_tagline_style() {
    return array(
        'ht-section-title-top-center' => esc_html__('Top Center Aligned', 'viral-pro'),
        'ht-section-title-top-cs' => esc_html__('Top Center Aligned with Seperator', 'viral-pro'),
        'ht-section-title-top-left' => esc_html__('Top Left Aligned', 'viral-pro'),
        'ht-section-title-top-ls' => esc_html__('Top Left Aligned with Seperator', 'viral-pro'),
        'ht-section-title-single-row' => esc_html__('Top Single Row', 'viral-pro'),
        'ht-section-title-side' => esc_html__('Float Left Side', 'viral-pro'),
        'ht-section-title-big' => esc_html__('Top Center Aligned with Big Super Title', 'viral-pro')
    );
}

if (!function_exists('viral_pro_is_woocommerce_activated')) {

    function viral_pro_is_woocommerce_activated() {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }

}
