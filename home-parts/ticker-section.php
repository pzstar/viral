<?php
/**
 * @package Viral
 */

$disable_section = get_theme_mod('viral_pro_frontpage_ticker_sec_disable', 'off');

if( $disable_section == 'on' ){
return;
}

$viral_pro_ticker_category = get_theme_mod('viral_pro_ticker_category');
if($viral_pro_ticker_category){
	$args = array(
		'cat' => $viral_pro_ticker_category,
		'posts_per_page' => 5,
		'sticky_post' => false
		);
	$query = new WP_Query($args);
	if($query->have_posts()):
		?>
		<div class="vl-ticker">
		<span class="vl-ticker-title">
		<?php 
		$viral_pro_ticker_title = get_theme_mod('viral_pro_ticker_title');
		if($viral_pro_ticker_title){
			echo esc_html($viral_pro_ticker_title);
		}else{
			echo get_cat_name($viral_pro_ticker_category);
		}
		?>
		</span>
		<div class="owl-carousel">
		<?php
		while($query->have_posts()): $query->the_post();
		echo '<a href="'.esc_url(get_permalink()).'">'.esc_html(get_the_title()).'</a>';
		endwhile;
		wp_reset_postdata();
		?>
		</div>
		</div>
	<?php
	endif;
	?>
<?php 
} 