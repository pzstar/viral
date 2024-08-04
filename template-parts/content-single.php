<?php
/**
 * @package Viral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('vl-article-content'); ?> <?php echo viral_get_schema_attribute('single'); ?>>
    <header class="entry-header">
        <?php viral_post_date(); ?>
    </header>

    <div class="entry-content">
        <?php
        $viral_display_featured_img = get_theme_mod('viral_display_featured_image');
        if ($viral_display_featured_img) {
            echo '<div class="single-featured-img">';
            the_post_thumbnail('large');
            echo '</div>';
        }

        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'viral'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php viral_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->