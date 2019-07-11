<?php
/**
 * @package Viral
 */

get_header(); ?>

<div class="vl-container">

	<div id="primary" class="content-area">
		<header class="vl-main-header">
			<h1><?php printf( esc_html__( 'Search Results for: %s', 'viral-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .entry-header -->

			<?php if ( have_posts() ) : ?>
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					get_template_part( 'template-parts/content', 'search' );
					?>

				<?php endwhile; ?>

				<?php the_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>