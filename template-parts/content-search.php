<?php
/**
 * @package Viral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo viral_get_schema_attribute('article'); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
</article><!-- #post-## -->