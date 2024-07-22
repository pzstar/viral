<?php
/**
 * @package Viral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('vl-archive-post'); ?> <?php echo viral_get_schema_attribute('archive'); ?>>
    <?php if ('post' == get_post_type()): ?>
        <div class="entry-meta vl-post-info">
            <?php viral_posted_on(); ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>

    <div class="vl-post-wrapper">
        <?php if (has_post_thumbnail()): ?>
            <figure class="entry-figure">
                <?php
                $viral_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-780x440');
                ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($viral_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()) ?>"></a>
            </figure>
        <?php endif; ?>
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        </header><!-- .entry-header -->

        <div class="entry-categories">
            <?php echo viral_entry_category(); ?>
        </div>
        <div class="entry-content">
            <?php
            echo viral_excerpt(get_the_content(), 800);
            ?>
        </div><!-- .entry-content -->

        <div class="entry-footer vl-clearfix">
            <a class="vl-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'viral'); ?></a>

            <?php viral_social_share(); ?>
        </div>
    </div>
</article><!-- #post-## -->