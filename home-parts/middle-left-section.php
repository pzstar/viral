<?php

/**
 * @package Viral
 */
$viral_frontpage_middle_blocks = get_theme_mod('viral_frontpage_middle_blocks', json_encode(array(
    array(
        'title' => esc_html__('Title', 'viral'),
        'category' => '-1',
        'layout' => 'style1',
        'enable' => 'on'
    ))));

if ($viral_frontpage_middle_blocks) {
    $viral_frontpage_middle_blocks = json_decode($viral_frontpage_middle_blocks);
    foreach ($viral_frontpage_middle_blocks as $viral_frontpage_middle_block) {
        if ($viral_frontpage_middle_block->category && ($viral_frontpage_middle_block->enable == 'on')) {

            $args = array(
                'cat' => $viral_frontpage_middle_block->category,
                'layout' => $viral_frontpage_middle_block->layout,
                'title' => $viral_frontpage_middle_block->title
            );

            do_action('viral_middle_section', $args);
        }
    }
}