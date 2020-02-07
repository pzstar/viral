<?php
/**
 * Template Name: Home Page
 *
 * @package Viral
 */
get_header();
?>
<div class="vl-container">
    <div id="vl-top-section">
        <?php
        $viral_ticker_category = get_theme_mod('viral_ticker_category', '-1');
        if ($viral_ticker_category) {
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
                <div class="vl-ticker">
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
                        while ($query->have_posts()): $query->the_post();
                            echo '<a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a>';
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php
            endif;
            ?>
        <?php }
        ?>

        <?php get_template_part('home-parts/top-section'); ?>
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
get_footer();
