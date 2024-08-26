<?php
/**
 * Front Page
 *
 * @package Viral
 */
get_header();

$viral_enable_frontpage = get_theme_mod('viral_enable_frontpage', false);

if ($viral_enable_frontpage) {
    ?>
    <div class="vl-container">
        <div id="vl-top-section">
            <?php
            $ticket_class = array();
            $viral_full_width_menu_bar = get_theme_mod('viral_full_width_menu_bar', false);
            $viral_disable_menu_shadow = get_theme_mod('viral_disable_menu_shadow', false);
            $viral_ticker_dark_color_scheme = get_theme_mod('viral_ticker_dark_color_scheme', false);
            $ticket_class[] = $viral_full_width_menu_bar && $viral_disable_menu_shadow ? 'vl-full-width-ticker' : '';
            $ticket_class[] = $viral_ticker_dark_color_scheme ? 'vl-dark-ticker' : '';

            $viral_ticker_category = get_theme_mod('viral_ticker_category', '-1');
            if ($viral_ticker_category !== 'none') {
                $args = array(
                    'posts_per_page' => 5,
                    'ignore_sticky_posts' => true
                );

                if ($viral_ticker_category != '-1') {
                    $args['cat'] = $viral_ticker_category;
                }

                $query = new WP_Query($args);
                if ($query->have_posts()):
                    ?>
                    <div class="vl-ticker <?php echo esc_attr(implode(' ', $ticket_class)); ?>">
                        <div class="vl-container">
                            <span class="vl-ticker-title">
                                <?php
                                $viral_ticker_title = get_theme_mod('viral_ticker_title', esc_html__('Breaking News', 'viral'));
                                if ($viral_ticker_title) {
                                    echo esc_html($viral_ticker_title);
                                } else {
                                    echo esc_html(get_cat_name($viral_ticker_category));
                                }
                                ?>
                            </span>
                            <div class="owl-carousel">
                                <?php
                                while ($query->have_posts()):
                                    $query->the_post();
                                    echo '<a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a>';
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endif;
            }

            get_template_part('home-parts/top-section'); ?>
        </div>

        <div id="vl-middle-section" class="vl-clearfix">
            <div id="primary">
                <?php get_template_part('home-parts/middle-left-section'); ?>
            </div>

            <div id="secondary" class="widget-area">
                <?php dynamic_sidebar('viral-frontpage-sidebar') ?>
            </div>
        </div>

        <div id="vl-bottom-section">
            <?php get_template_part('home-parts/bottom-section'); ?>
        </div>
    </div>
    <?php
} else {
    if ('posts' == get_option('show_on_front')) {
        include(get_home_template());
    } else {
        include(get_page_template());
    }
}

get_footer();