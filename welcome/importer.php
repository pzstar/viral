<?php

/**
 *
 * @package Viral
 */
function viral_import_files() {
    return array(
        array(
            'import_file_name' => 'Viral Demo Import',
            'local_import_file' => trailingslashit(get_template_directory()) . 'welcome/demo-data/content.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'welcome/demo-data/widgets.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'welcome/demo-data/customizer.dat',
            'import_preview_image_url' => get_stylesheet_directory_uri() . '/screenshot.png',
            'preview_url' => 'https://demo.hashthemes.com/viral'
        )
    );
}

add_filter('pt-ocdi/import_files', 'viral_import_files');

function viral_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
    $top_menu = get_term_by('name', 'Top Header Menu', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id,
        'top-menu' => $top_menu->term_id
    ));

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home Page');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}

add_action('pt-ocdi/after_import', 'viral_after_import_setup');

add_filter('pt-ocdi/disable_pt_branding', '__return_true');
