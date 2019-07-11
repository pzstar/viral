<?php
/**
 * @package Viral
 */
$disable_section = get_theme_mod('viral_pro_frontpage_top_sec_disable', 'off');

if( $disable_section == 'on' ){
return;
}
?>
<div id="vl-top-section">
	<?php  
	$viral_pro_frontpage_top_blocks = get_theme_mod('viral_pro_frontpage_top_blocks');

	if($viral_pro_frontpage_top_blocks){
		$viral_pro_frontpage_top_blocks = json_decode($viral_pro_frontpage_top_blocks);
		foreach ($viral_pro_frontpage_top_blocks as $viral_pro_frontpage_top_block) {
			if( $viral_pro_frontpage_top_block->enable == 'on' ){
				$viral_pro_layout = $viral_pro_frontpage_top_block->layout;
				
				$args = array(
					'cat' => $viral_pro_frontpage_top_block->category,
					'layout' => $viral_pro_layout
					);

				do_action('viral_pro_top_section', $args);
		
			}
		}
	}
?>
</div>