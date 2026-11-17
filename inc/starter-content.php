<?php
/**
 * Starter content, shown on new sites in the Customizer and in the WordPress.org theme preview.
 *
 * @package Viral
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('viral_starter_content')) {

    function viral_starter_content() {
        // Paragraphs as block markup, so the posts open cleanly in the block editor.
        $paragraphs = function ($texts) {
            $html = '';
            foreach ($texts as $text) {
                $html .= '<!-- wp:paragraph --><p>' . $text . '</p><!-- /wp:paragraph -->';
            }
            return $html;
        };

        // The theme's Advertisement widget, showing a placeholder image bundled with the theme.
        $ad = function ($file, $title = '') {
            return array('viral_advertisement', array(
                'title' => $title,
                'image' => get_template_directory_uri() . '/images/starter/' . $file,
                'link' => '#',
                'newtab' => '',
            ));
        };

        $starter_content = array(
            'posts' => array(
                'viral-post-1' => array(
                    'post_type' => 'post',
                    'post_title' => _x('Heatwave Brings Record Temperatures Across the Region', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('Temperatures climbed past 40°C in several towns this week, breaking records that had stood for more than thirty years. Forecasters expect the hot spell to last until the weekend before cooler air arrives from the coast.', 'Theme starter content', 'viral'),
                        _x('Local councils have opened cooling centers in libraries and community halls, and health officials are asking people to drink plenty of water, stay out of the midday sun and check on elderly neighbors.', 'Theme starter content', 'viral'),
                        _x('Farmers say the heat has arrived at a difficult time, just weeks before harvest, and are watering crops at night to save what they can.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-1}}',
                ),
                'viral-post-2' => array(
                    'post_type' => 'post',
                    'post_title' => _x('Colorful Old Town Streets Draw Record Number of Visitors', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('The painted houses and tiled streets of the old town welcomed more visitors this summer than in any year before, according to the local tourism office.', 'Theme starter content', 'viral'),
                        _x('Cafe owners have added outdoor seating to keep up with demand, and a new walking tour now guides visitors through the quieter lanes behind the main square.', 'Theme starter content', 'viral'),
                        _x('Residents welcome the boost to local business but have asked the council to plan for busier seasons ahead, with more buses and better signs for visitors.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-2}}',
                ),
                'viral-post-3' => array(
                    'post_type' => 'post',
                    'post_title' => _x('Old Factory Chimney to Become Centerpiece of New Waterfront Park', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('The tall brick chimney that has stood by the lake for over a century will be kept and restored as part of a new waterfront park, the city announced on Monday.', 'Theme starter content', 'viral'),
                        _x('Plans include walking and cycling paths, a small museum about the town\'s industrial past and a viewing platform with views across the water at sunset.', 'Theme starter content', 'viral'),
                        _x('Work is expected to begin next spring, and the first section of the park could open to the public within two years.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-3}}',
                ),
                'viral-post-4' => array(
                    'post_type' => 'post',
                    'post_title' => _x('Young Boxers Shine at National Youth Championship', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('Two teenagers from the local boxing club came home with medals from the national youth championship, the club\'s best result since it opened.', 'Theme starter content', 'viral'),
                        _x('Their coach credits hard work and early morning training sessions, and says interest in the sport among young people in the area has never been higher.', 'Theme starter content', 'viral'),
                        _x('The club is now raising money for new equipment so it can welcome more members next season.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-4}}',
                ),
                'viral-post-5' => array(
                    'post_type' => 'post',
                    'post_title' => _x('Tea Growers Turn to Organic Farming as Demand Rises', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('A growing number of tea estates in the highlands are switching to organic methods as buyers at home and abroad ask for chemical-free leaves.', 'Theme starter content', 'viral'),
                        _x('Growers say the change takes several years and lowers yields at first, but the higher price for organic tea makes the effort worthwhile.', 'Theme starter content', 'viral'),
                        _x('Workers have been trained in new ways to protect the plants from pests, and some estates now invite visitors to see how their tea is grown and picked.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-5}}',
                ),
                'viral-post-6' => array(
                    'post_type' => 'post',
                    'post_title' => _x('Historic Fortress Reopens After Five-Year Restoration', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('After five years behind scaffolding, the old stone fortress on the hill has reopened its gates to visitors, with repaired towers, new walkways and a refreshed exhibition.', 'Theme starter content', 'viral'),
                        _x('Craftspeople used traditional tools and local stone to rebuild the damaged walls, keeping as much of the original structure as possible.', 'Theme starter content', 'viral'),
                        _x('Entry is free for local residents during the first month, and guided tours run every afternoon.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-6}}',
                ),
                'viral-post-7' => array(
                    'post_type' => 'post',
                    'post_title' => _x('New Rapid Bus Lanes Promise Shorter Commutes Downtown', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('Dedicated bus lanes opened on the city\'s main boulevard this week, and early figures suggest journeys across downtown are already up to ten minutes faster.', 'Theme starter content', 'viral'),
                        _x('The project also added new crossings, wider sidewalks and shade trees along the route, making the street safer for people on foot.', 'Theme starter content', 'viral'),
                        _x('Transport officials will review the results after six months before deciding whether to extend the lanes to other busy roads.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-7}}',
                ),
                'viral-post-8' => array(
                    'post_type' => 'post',
                    'post_title' => _x('How Communities Are Rebuilding After the Earthquake', 'Theme starter content', 'viral'),
                    'post_content' => $paragraphs(array(
                        _x('Months after the earthquake, families in the worst-hit villages are moving into new homes built to withstand future tremors.', 'Theme starter content', 'viral'),
                        _x('Volunteers, engineers and local builders have worked side by side, and many of the new houses use designs that are cheaper and stronger than before.', 'Theme starter content', 'viral'),
                        _x('Schools and health posts are next on the list, and aid groups say the community\'s own efforts have made all the difference.', 'Theme starter content', 'viral'),
                    )),
                    'thumbnail' => '{{viral-image-8}}',
                ),
                'about',
                'contact',
            ),

            // Photos from the WordPress.org Photo Directory (CC0).
            'attachments' => array(
                'viral-image-1' => array(
                    'post_title' => _x('Thermometer showing 40 degrees', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-1.jpg',
                ),
                'viral-image-2' => array(
                    'post_title' => _x('Colorful street with outdoor seating', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-2.jpg',
                ),
                'viral-image-3' => array(
                    'post_title' => _x('Chimney by a lake at sunset', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-3.jpg',
                ),
                'viral-image-4' => array(
                    'post_title' => _x('Young boxers training in a ring', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-4.jpg',
                ),
                'viral-image-5' => array(
                    'post_title' => _x('Worker on a tea plantation', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-5.jpg',
                ),
                'viral-image-6' => array(
                    'post_title' => _x('Stone fortress under a cloudy sky', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-6.jpg',
                ),
                'viral-image-7' => array(
                    'post_title' => _x('City road lined with palm trees', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-7.jpg',
                ),
                'viral-image-8' => array(
                    'post_title' => _x('House damaged by an earthquake', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/news-8.jpg',
                ),
                'viral-logo' => array(
                    'post_title' => _x('Viral Logo', 'Theme starter content', 'viral'),
                    'file' => 'images/starter/logo.png',
                ),
            ),

            // Settings from Demo One (demo.hashthemes.com/viral/demo1). Its blocks show the latest posts, as starter posts can't have categories.
            'theme_mods' => array(
                'custom_logo' => '{{viral-logo}}',
                'viral_website_layout' => 'fullwidth',
                'viral_template_color' => '#0e6fba',
                'viral_header_typography' => 'Poppins',
                'viral_body_typography' => 'Poppins',

                // Header: date and tagline on the left, social links on the right.
                'viral_left_header_date' => true,
                'viral_left_header_text' => _x('News That Matters', 'Theme starter content', 'viral'),
                'viral_social_facebook' => '#',
                'viral_social_twitter' => '#',
                'viral_social_pinterest' => '#',
                'viral_social_youtube' => '#',
                'viral_social_linkedin' => '#',
                'viral_social_instagram' => '#',
                'viral_full_width_menu_bar' => false,
                'viral_disable_menu_shadow' => true,

                // Front page sections.
                'viral_enable_frontpage' => true,
                'viral_ticker_title' => _x('Breaking News', 'Theme starter content', 'viral'),
                'viral_ticker_category' => '-1',
                'viral_ticker_dark_color_scheme' => true,
                'viral_frontpage_top_blocks' => wp_json_encode(array(
                    array('category' => '', 'layout' => 'style4', 'enable' => 'on'),
                    array('category' => '', 'layout' => 'style1', 'enable' => 'on'),
                )),
                'viral_frontpage_middle_blocks' => wp_json_encode(array(
                    array('title' => _x('Entertainment', 'Theme starter content', 'viral'), 'category' => '-1', 'layout' => 'style1', 'enable' => 'on'),
                    array('title' => _x('What\'s Hot', 'Theme starter content', 'viral'), 'category' => '-1', 'layout' => 'style2', 'enable' => 'on'),
                    array('title' => _x('Sports', 'Theme starter content', 'viral'), 'category' => '-1', 'layout' => 'style3', 'enable' => 'on'),
                    array('title' => _x('Business', 'Theme starter content', 'viral'), 'category' => '-1', 'layout' => 'style4', 'enable' => 'on'),
                )),
                'viral_frontpage_bottom_blocks' => wp_json_encode(array(
                    array('category1' => '-1', 'category2' => '-1', 'category3' => '-1', 'layout' => 'style1', 'enable' => 'on'),
                    array('category1' => '-1', 'category2' => '-1', 'category3' => '-1', 'layout' => 'style2', 'enable' => 'on'),
                )),
            ),

            'widgets' => array(
                'viral-header-ads' => array(
                    'header_ad' => $ad('ad-banner.jpg'),
                ),
                'viral-frontpage-sidebar' => array(
                    'whats_new' => array('viral_category_block', array('title' => _x('What\'s New', 'Theme starter content', 'viral'), 'category' => '-1', 'post_no' => 5)),
                    'frontpage_ad' => $ad('ad-sidebar.jpg', _x('Advertisement', 'Theme starter content', 'viral')),
                    'trending' => array('viral_timeline', array('title' => _x('Trending', 'Theme starter content', 'viral'), 'category' => '-1', 'post_no' => 5)),
                ),
                'viral-sidebar' => array(
                    'search',
                    'recent-posts',
                    'sidebar_ad' => $ad('ad-sidebar.jpg'),
                    'timeline' => array('viral_timeline', array('title' => _x('Timeline', 'Theme starter content', 'viral'), 'category' => '-1', 'post_no' => 7)),
                ),
                'viral-left-sidebar' => array(
                    'archives',
                    'meta',
                ),
                'viral-footer1' => array(
                    // A text widget rather than Personal Info, which centers its text around a photo and name.
                    'about' => array('text', array(
                        'title' => _x('About Us', 'Theme starter content', 'viral'),
                        'text' => _x('Viral brings you the latest news, stories and opinions from around the region and the world, updated every day by our team of reporters and editors.', 'Theme starter content', 'viral'),
                        'filter' => true,
                        'visual' => true,
                    )),
                ),
                'viral-footer2' => array(
                    'archives',
                ),
                'viral-footer3' => array(
                    'popular' => array('viral_category_block', array('title' => _x('Popular', 'Theme starter content', 'viral'), 'category' => '-1', 'post_no' => 3)),
                ),
                'viral-footer4' => array(
                    'latest_news' => array('recent-posts', array('title' => _x('Latest News', 'Theme starter content', 'viral'), 'number' => 7, 'show_date' => false)),
                ),
            ),

            'nav_menus' => array(
                'primary' => array(
                    'name' => __('Main Menu', 'viral'),
                    'items' => array(
                        'link_home',
                        'page_about',
                        'page_contact',
                    ),
                ),
            ),
        );

        add_theme_support('starter-content', apply_filters('viral_starter_content', $starter_content));
    }

}

add_action('after_setup_theme', 'viral_starter_content');

if (!function_exists('viral_preview_starter_posts')) {

    // In the Customizer, starter posts stay auto-drafts until the user publishes, so post lists can't see them; include them while previewing.
    function viral_preview_starter_posts($query) {
        global $wp_customize;

        if (is_admin() || !is_customize_preview() || !get_option('fresh_site') || !$wp_customize instanceof WP_Customize_Manager || !in_array($query->get('post_type'), array('', 'post'), true)) {
            return;
        }

        $setting = $wp_customize->get_setting('nav_menus_created_posts');
        $ids = $setting ? array_filter(array_map('absint', (array) $setting->value())) : array();

        if ($ids) {
            $query->set('post_status', array('publish', 'auto-draft'));
            $query->set('viral_starter_ids', $ids);
        }
    }

}

add_action('pre_get_posts', 'viral_preview_starter_posts');

if (!function_exists('viral_preview_starter_posts_where')) {

    // Limits the auto-drafts let in above to the starter content ones.
    function viral_preview_starter_posts_where($where, $query) {
        global $wpdb;
        $ids = $query->get('viral_starter_ids');

        if ($ids) {
            $where .= " AND ({$wpdb->posts}.post_status <> 'auto-draft' OR {$wpdb->posts}.ID IN (" . implode(',', array_map('absint', $ids)) . '))';
        }

        return $where;
    }

}

add_filter('posts_where', 'viral_preview_starter_posts_where', 10, 2);

if (!function_exists('viral_theme_preview_posts')) {

    // The WordPress.org theme preview keeps starter posts only in the object cache, with made-up IDs from 10000 and their keys as slugs, so post lists never see them.
    // Finds them there and gives them the dates and author the preview leaves out; returns nothing on real sites.
    function viral_theme_preview_posts() {
        static $posts = null;

        if (null !== $posts) {
            return $posts;
        }

        $posts = array();

        if (is_admin() || !get_option('fresh_site') || wp_using_ext_object_cache()) {
            return $posts;
        }

        $starter_content = get_theme_starter_content();
        $keys = array();
        foreach ((array) ($starter_content['posts'] ?? array()) as $key => $starter_post) {
            if ('post' === ($starter_post['post_type'] ?? '')) {
                $keys[$key] = true;
            }
        }

        $last_id = 10000 + count((array) ($starter_content['posts'] ?? array())) + count((array) ($starter_content['attachments'] ?? array())) + 20;
        $found = array();
        for ($id = 10000; $id < $last_id && count($found) < count($keys); $id++) {
            $cached = wp_cache_get($id, 'posts');
            if (is_object($cached) && isset($cached->post_name, $keys[$cached->post_name])) {
                $found[$cached->post_name] = $cached;
            }
        }

        if (!$found) {
            return $posts;
        }

        $latest = get_posts(array('numberposts' => 1, 'post_type' => 'post', 'suppress_filters' => true));
        $author = $latest ? $latest[0]->post_author : 1;
        $time = current_time('timestamp');
        $i = 0;

        // Starter content order, newest first, a few hours apart.
        foreach (array_keys($keys) as $key) {
            if (!isset($found[$key])) {
                continue;
            }

            $data = (object) array_merge((array) $found[$key], array(
                'post_status' => 'publish',
                'post_author' => $author,
                'post_date' => gmdate('Y-m-d H:i:s', $time - $i * 5 * HOUR_IN_SECONDS),
                'post_date_gmt' => get_gmt_from_date(gmdate('Y-m-d H:i:s', $time - $i * 5 * HOUR_IN_SECONDS)),
                'post_modified' => gmdate('Y-m-d H:i:s', $time - $i * 5 * HOUR_IN_SECONDS),
                'comment_status' => 'closed',
                'filter' => 'raw',
            ));
            wp_cache_set($data->ID, $data, 'posts');
            $posts[] = new WP_Post($data);
            $i++;
        }

        return $posts;
    }

}

if (!function_exists('viral_theme_preview_post_lists')) {

    // In the WordPress.org theme preview, the front page sections, latest posts and post widgets list the starter posts instead of the Theme Unit Test posts.
    function viral_theme_preview_post_lists($posts, $query) {
        if (null !== $posts || ($query->is_main_query() && !$query->is_home()) || !in_array($query->get('post_type'), array('', 'post'), true) || $query->get('p') || $query->get('page_id') || $query->get('post__in') || $query->get('s') || $query->get('cat') || $query->get('category_name') || $query->get('tag') || $query->get('tax_query') || $query->get('author')) {
            return $posts;
        }

        $preview_posts = viral_theme_preview_posts();

        if (!$preview_posts) {
            return $posts;
        }

        $per_page = (int) $query->get('posts_per_page');
        $per_page = $per_page > 0 ? $per_page : count($preview_posts);
        $offset = (int) $query->get('offset') + (max(1, (int) $query->get('paged')) - 1) * $per_page;
        $posts = array_slice($preview_posts, $offset, $per_page);

        $query->found_posts = count($preview_posts);
        $query->max_num_pages = (int) ceil(count($preview_posts) / $per_page);

        return 'ids' === $query->get('fields') ? wp_list_pluck($posts, 'ID') : $posts;
    }

}

add_filter('posts_pre_query', 'viral_theme_preview_post_lists', 10, 2);
