<?php

/**
 * @package Viral
 */
$viral_frontpage_top_blocks = get_theme_mod('viral_frontpage_top_blocks', json_encode(array(
    array(
        'category' => '',
        'layout' => 'style1',
        'enable' => 'on'
    ))));

if ($viral_frontpage_top_blocks) {
    $viral_frontpage_top_blocks = json_decode($viral_frontpage_top_blocks);
    foreach ($viral_frontpage_top_blocks as $viral_frontpage_top_block) {
        if ($viral_frontpage_top_block->enable == 'on') {

            $args = array(
                'cat' => $viral_frontpage_top_block->category,
                'layout' => $viral_frontpage_top_block->layout
            );

            do_action('viral_top_section', $args);
        }
    }
}