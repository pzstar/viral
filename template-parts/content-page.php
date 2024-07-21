<?php
/**
 * @package Viral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('vl-article-content'); ?> <?php echo viral_get_schema_attribute('article'); ?>>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'viral'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->