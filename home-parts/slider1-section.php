<?php
/**
 * @package Viral
 */

$disable_section = get_theme_mod('viral_pro_frontpage_slider_sec1_disable', 'off');

if( $disable_section == 'on' ){
return;
}
?>
<div id="vl-slider-section">
<?php  
	$viral_pro_frontpage_slider_blocks = get_theme_mod('viral_pro_frontpage_slider_blocks1', json_encode(array(
        array(
            'category' => '-1',
            'layout' => 'style1',
            'enable' => 'on'
            )
    )));

    //var_dump($viral_pro_frontpage_slider_blocks);

	if($viral_pro_frontpage_slider_blocks){
		$viral_pro_frontpage_slider_blocks = json_decode($viral_pro_frontpage_slider_blocks);
		foreach ($viral_pro_frontpage_slider_blocks as $viral_pro_frontpage_slider_block) {
			if($viral_pro_frontpage_slider_block->enable == 'on'){
				$viral_pro_layout = $viral_pro_frontpage_slider_block->layout;
				
				$args = array(
					'cat' => $viral_pro_frontpage_slider_block->category,
					'layout' => $viral_pro_layout,
					);

				do_action('viral_pro_slider_section1', $args);
		
			}
		}
	}
?>
</div>