<?php
/**
 * Template Name: Home Page
 *
 * @package Viral
 */

get_header(); ?>

<div class="vl-container">
	<?php
	$sections = viral_pro_frontpage_sections();
	$section_names = array();

	foreach ($sections as $section) {
		$section_names[] = str_replace(array('viral_pro_frontpage_', '_sec', '_'), array('', '', '-'), $section);
	}

	foreach ($section_names as $section_name) {
		get_template_part('home-parts/'.$section_name.'-section');
	}
	?>
</div>

<?php get_footer(); ?>
