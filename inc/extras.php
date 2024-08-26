<?php
/**
 * @package Viral
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function viral_body_classes($classes) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    $post_type = array('post', 'page');

    if (is_singular($post_type)) {
        global $post;
        $sidebar_layout = get_post_meta($post->ID, 'viral_sidebar_layout', true);

        if (!$sidebar_layout) {
            $sidebar_layout = 'right-sidebar';
        }

        $classes[] = 'viral-' . $sidebar_layout;
    }

    $website_layout = get_theme_mod('viral_website_layout');
    if ($website_layout == 'boxed') {
        $classes[] = 'vl-boxed';
    }

    return $classes;
}

add_filter('body_class', 'viral_body_classes');

if (!function_exists('viral_excerpt')) {

    function viral_excerpt($content, $letter_count) {
        $new_content = strip_shortcodes($content);
        $new_content = wp_strip_all_tags($new_content);
        $content = mb_substr($new_content, 0, $letter_count);

        if (($letter_count !== 0) && (strlen($new_content) > $letter_count)) {
            $content .= "...";
        }
        return $content;
    }

}

add_filter('wp_page_menu_args', 'viral_change_wp_page_menu_args');

if (!function_exists('viral_change_wp_page_menu_args')) {

    function viral_change_wp_page_menu_args($args) {
        $args['menu_class'] = 'vl-menu vl-clearfix';
        return $args;
    }

}

if (!function_exists('viral_filter_archive_title')) {

    function viral_filter_archive_title($title) {
        if (is_category()) {
            $title = single_cat_title('', false);
        }
        return $title;
    }

}

add_filter('get_the_archive_title', 'viral_filter_archive_title');

if (!function_exists('viral_comment')) {

    function viral_comment($comment, $args, $depth) {
        $tag = ('div' === $args['style']) ? 'div' : 'li';
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? 'parent' : '', $comment); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php if (0 != $args['avatar_size'])
                            echo get_avatar($comment, $args['avatar_size']); ?>
                        <?php echo sprintf('<b class="fn">%s</b>', get_comment_author_link($comment)); ?>
                    </div><!-- .comment-author -->

                    <?php if ('0' == $comment->comment_approved): ?>
                        <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'viral'); ?></p>
                    <?php endif; ?>
                    <?php edit_comment_link(esc_html__('Edit', 'viral'), '<span class="edit-link">', '</span>'); ?>
                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->

                <div class="comment-metadata vl-clearfix">
                    <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php
                            /* translators: 1: comment date, 2: comment time */
                            printf(esc_html__('%1$s at %2$s', 'viral'), get_comment_date('', $comment), get_comment_time());
                            ?>
                        </time>
                    </a>

                    <?php
                    comment_reply_link(array_merge($args, array(
                        'add_below' => 'div-comment',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'before' => '<div class="reply">',
                        'after' => '</div>'
                    )));
                    ?>
                </div><!-- .comment-metadata -->
            </article><!-- .comment-body -->
            <?php
    }

}

add_filter('get_custom_logo', 'viral_remove_itemprop');

function viral_remove_itemprop() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>', esc_url(home_url('/')), wp_get_attachment_image($custom_logo_id, 'full', false, array(
        'class' => 'custom-logo',
    ))
    );
    return $html;
}

if (function_exists('viral_check_social_icon_exists')) {

    function viral_check_social_icon_exists() {
        $facebook = get_theme_mod('viral_social_facebook');
        $twitter = get_theme_mod('viral_social_twitter');
        $pinterest = get_theme_mod('viral_social_pinterest');
        $youtube = get_theme_mod('viral_social_youtube');
        $linkedin = get_theme_mod('viral_social_linkedin');
        $instagram = get_theme_mod('viral_social_instagram');

        if ($facebook || $twitter || $pinterest || $youtube || $linkedin || $instagram) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('viral_social_links')) {

    function viral_social_links() {
        $facebook = get_theme_mod('viral_social_facebook', '#');
        $twitter = get_theme_mod('viral_social_twitter', '#');
        $pinterest = get_theme_mod('viral_social_pinterest', '#');
        $youtube = get_theme_mod('viral_social_youtube', '#');
        $linkedin = get_theme_mod('viral_social_linkedin', '#');
        $instagram = get_theme_mod('viral_social_instagram', '#');

        if ($facebook)
            echo '<a class="vl-facebook" href="' . esc_url($facebook) . '" target="_blank"><i class="mdi-facebook"></i></a>';

        if ($twitter)
            echo '<a class="vl-twitter" href="' . esc_url($twitter) . '" target="_blank"><i class="ti-x-twitter"></i></a>';

        if ($pinterest)
            echo '<a class="vl-pinterest" href="' . esc_url($pinterest) . '" target="_blank"><i class="mdi-pinterest"></i></a>';

        if ($youtube)
            echo '<a class="vl-youtube" href="' . esc_url($youtube) . '" target="_blank"><i class="mdi-youtube"></i></a>';

        if ($linkedin)
            echo '<a class="vl-linkedin" href="' . esc_url($linkedin) . '" target="_blank"><i class="mdi-linkedin"></i></a>';

        if ($instagram)
            echo '<a class="vl-instagram" href="' . esc_url($instagram) . '" target="_blank"><i class="mdi-instagram"></i></a>';
    }

}

if (!function_exists('viral_show_date')) {

    function viral_show_date() {
        $viral_left_header_date = get_theme_mod('viral_left_header_date', true);
        if ($viral_left_header_date) {
            echo '<span><i class="mdi-clock-time-nine-outline"></i>';
            echo date_i18n('l, F j', time());
            echo '</span>';
        }
    }

}

if (!function_exists('viral_header_text')) {

    function viral_header_text() {
        $viral_left_header_text = get_theme_mod('viral_left_header_text');
        if ($viral_left_header_text) {
            echo '<span>';
            echo '<i class="mdi-bookmark"></i>' . esc_html($viral_left_header_text);
            echo '</span>';
        }
    }

}

if (!function_exists('viral_top_menu')) {

    function viral_top_menu() {
        wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                'container_class' => 'vl-menu',
                'depth' => -1,
                'menu_class' => 'vl-clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'fallback_cb' => false
            )
        );
    }

}

function viral_css_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        //"} " => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}

add_action('viral_right_header_content', 'viral_social_links');
add_action('viral_left_header_content', 'viral_show_date', 10);
add_action('viral_left_header_content', 'viral_header_text', 20);
add_action('viral_left_header_content', 'viral_top_menu', 30);

function viral_filter_wordpress_widget_title_class($default_widget_args) {
    $default_widget_args['before_title'] = '<h2 class="vl-block-title"><span>';
    $default_widget_args['after_title'] = '</span></h2>';
    return $default_widget_args;
}

add_filter('elementor/widgets/wordpress/widget_args', 'viral_filter_wordpress_widget_title_class');

function viral_create_elementor_kit() {
    if (!did_action('elementor/loaded')) {
        return;
    }

    $kit = Elementor\Plugin::$instance->kits_manager->get_active_kit();

    if (!$kit->get_id()) {
        $created_default_kit = Elementor\Plugin::$instance->kits_manager->create_default();
        update_option('elementor_active_kit', $created_default_kit);
    }
}

function viral_enable_wpform_export($args) {
    $args['can_export'] = true;
    return $args;
}

add_action('init', 'viral_create_elementor_kit');
add_filter('wpforms_post_type_args', 'viral_enable_wpform_export');

function viral_typography_vars($keys) {
    if (!$keys && !is_array($keys)) {
        return;
    }
    $css = array();

    foreach ($keys as $key) {
        $family = get_theme_mod($key . '_typography');
        $style = get_theme_mod($key . '_style');
        $text_decoration = get_theme_mod($key . '_text_decoration');
        $text_transform = get_theme_mod($key . '_text_transform');
        $size = get_theme_mod($key . '_size');
        $line_height = get_theme_mod($key . '_line_height');
        $letter_spacing = get_theme_mod($key . '_letter_spacing');
        $color = get_theme_mod($key . '_color');

        if (strpos($style, 'italic')) {
            $italic = 'italic';
        }

        $weight = absint($style);
        $key = str_replace('_', '-', $key);

        $css[] = (!empty($family) && $family != 'Default') ? "--" . $key . "-family: '{$family}', serif" : NULL;
        $css[] = !empty($weight) ? "--" . $key . "-weight: {$weight}" : NULL;
        $css[] = !empty($italic) ? "--" . $key . "-style: {$italic}" : NULL;
        $css[] = !empty($text_transform) ? "--" . $key . "-text-transform: {$text_transform}" : NULL;
        $css[] = !empty($text_decoration) ? "--" . $key . "-text-decoration: {$text_decoration}" : NULL;
        $css[] = !empty($size) ? "--" . $key . "-size: {$size}px" : NULL;
        $css[] = !empty($line_height) ? "--" . $key . "-line-height: {$line_height}" : NULL;
        $css[] = !empty($letter_spacing) ? "--" . $key . "-letter-spacing: {$letter_spacing}px" : NULL;
        $css[] = !empty($color) ? "--" . $key . "-color: {$color}" : NULL;
    }

    $css = array_filter($css);

    return implode(';', $css);
}

if (!function_exists('viral_add_custom_fonts')) {

    function viral_add_custom_fonts($fonts) {
        if (class_exists('Hash_Custom_Font_Uploader_Public')) {
            if (!empty(Hash_Custom_Font_Uploader_Public::get_all_fonts_list())) {
                $new_fonts = array(
                    'label' => esc_html__('Custom Fonts', 'viral'),
                    'fonts' => Hash_Custom_Font_Uploader_Public::get_all_fonts_list()
                );
                array_unshift($fonts, $new_fonts);
            }
        }
        return $fonts;
    }

}

add_filter('viral_regsiter_fonts', 'viral_add_custom_fonts');

function viral_premium_demo_config($demos) {
    $premium_demos = array(
        'newspaper' => array(
            'name' => 'Viral Pro - NewsPaper',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/newspaper.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/newspaper/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'magazine' => array(
            'name' => 'Viral Pro - Magazine',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/magazine.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/magazine/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'news' => array(
            'name' => 'Viral Pro - News',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/news.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/news/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'viral-news-one' => array(
            'name' => 'Viral Pro - News One',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/viral-news-one.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/viral-news-one/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'viral-news-two' => array(
            'name' => 'Viral Pro - News Two',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/viral-news-two.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/viral-news-two/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'viral-news-three' => array(
            'name' => 'Viral Pro - News Three',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/viral-news-three.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/viral-news-three/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'viral-news-four' => array(
            'name' => 'Viral Pro - News Four',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/viral-news-four.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/viral-news-four/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'sports' => array(
            'name' => 'Viral Pro - Sports',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/sports.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/sports/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'technology' => array(
            'name' => 'Viral Pro - Technology',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/technology.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/technology/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'illustration' => array(
            'name' => 'Viral Pro - Illustration',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/illustration.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/illustration/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'fashion' => array(
            'name' => 'Viral Pro - Fashion',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/fashion.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/fashion/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'travel' => array(
            'name' => 'Viral Pro - Travel',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/travel.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/travel/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        ),
        'rtl' => array(
            'name' => 'Viral Pro - RTL',
            'type' => 'pro',
            'buy_url' => 'https://hashthemes.com/wordpress-theme/viral-pro/',
            'image' => 'https://hashthemes.com/import-files/viral-pro/screen/rtl.jpg',
            'preview_url' => 'https://demo.hashthemes.com/viral-pro/rtl/',
            'tags' => array(
                'premium' => 'Premium'
            ),
            'pagebuilder' => array(
                'customizer' => 'Customizer',
                'elementor' => 'Elementor'
            )
        )
    );

    $demos = array_merge($demos, $premium_demos);
    return $demos;
}

add_action('hdi_import_files', 'viral_premium_demo_config');
