<?php
/**
 * @package Viral
 */

$disable_section = get_theme_mod('viral_pro_frontpage_middle_left_sec_disable', 'off');

if( $disable_section == 'on' ){
return;
}
?>
<div id="vl-middle-section" class="vl-clearfix">
	<div id="primary">
		<?php 
		$viral_pro_frontpage_middle_blocks = get_theme_mod('viral_pro_frontpage_middle_blocks');

		if($viral_pro_frontpage_middle_blocks){
			$viral_pro_frontpage_middle_blocks = json_decode($viral_pro_frontpage_middle_blocks);
			foreach ($viral_pro_frontpage_middle_blocks as $viral_pro_frontpage_middle_block) {
				if($viral_pro_frontpage_middle_block->category && ($viral_pro_frontpage_middle_block->enable == 'on' )){
					$viral_pro_layout = $viral_pro_frontpage_middle_block->layout;
					
					$args = array(
						'cat' => $viral_pro_frontpage_middle_block->category,
						'layout' => $viral_pro_layout,
						'title' => $viral_pro_frontpage_middle_block->title
						);

					do_action('viral_pro_middle_section', $args);

				}
			}
		}
		?>
	</div>

	<div id="secondary" class="widget-area">
		<?php dynamic_sidebar('viral-frontpage-sidebar') ?>
	</div>
</div>