<?php
/**
 * @package Viral
 */

$disable_section = get_theme_mod('viral_pro_frontpage_bottom_sec_disable', 'off');

if( $disable_section == 'on' ){
return;
}
?>
<div id="vl-bottom-section">
<?php  
	$viral_pro_frontpage_bottom_blocks = get_theme_mod('viral_pro_frontpage_bottom_blocks');

	if($viral_pro_frontpage_bottom_blocks){
		$viral_pro_frontpage_bottom_blocks = json_decode($viral_pro_frontpage_bottom_blocks);
		foreach ($viral_pro_frontpage_bottom_blocks as $viral_pro_frontpage_bottom_block) {
			if($viral_pro_frontpage_bottom_block->enable == 'on'){
				$viral_pro_layout = $viral_pro_frontpage_bottom_block->layout;
				
				$args = array(
					'cat1' => $viral_pro_frontpage_bottom_block->category1,
					'cat2' => $viral_pro_frontpage_bottom_block->category2,
					'cat3' => $viral_pro_frontpage_bottom_block->category3,
					'layout' => $viral_pro_layout,
					);

				do_action('viral_pro_bottom_section', $args);
		
			}
		}
	}
?>
</div>