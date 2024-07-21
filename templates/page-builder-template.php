<?php
/**
 * Template Name: Blank Template(For Page Builders)
 *
 * @package Viral
 */
get_header();
?>

<div class="vl-container vl-clearfix">
    <div class="vl-content-area">

        <?php while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; // End of the loop. ?>

    </div><!-- #primary -->
</div>

<?php get_footer(); ?>