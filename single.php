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

            get_template_part('template-parts/content', 'single');
            ?>

            <nav class="navigation post-navigation">
                <div class="nav-links">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '<span><i class="mdi-chevron-left"></i>' . esc_html__('Prev', 'viral') . '</span>%title'); ?>
                    </div>

                    <div class="nav-next">
                        <?php next_post_link('%link', '<span>' . esc_html__('Next', 'viral') . '<i class="mdi-chevron-right"></i></span>%title'); ?>
                    </div>
                </div>
            </nav>

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