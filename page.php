<?php
/**
 * @package Viral
 */
get_header();
?>

<div class="vl-container vl-clearfix">
    <div id="primary" class="content-area">

        <?php
        while (have_posts()):
            the_post();

            $viral_hide_title = get_post_meta($post->ID, 'viral_hide_title', true);

            if (!$viral_hide_title) {
                ?>
                <header class="vl-main-header">
                    <?php the_title('<h1>', '</h1>'); ?>
                </header><!-- .entry-header -->
                <?php
            }

            get_template_part('template-parts/content', 'page');
            ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
            ?>

        <?php endwhile; // End of the loop.   ?>

    </div><!-- #primary -->

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>