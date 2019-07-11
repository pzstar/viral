<?php

/**
 * Square Plus Theme Customizer
 *
 * @package Square Plus
 */
//SOCIAL SETTINGS
$wp_customize->add_section('viral_pro_social_section', array(
    'title' => esc_html__('Social Links', 'viral-pro')
));

$wp_customize->add_setting('viral_pro_social_icons', array(
    'sanitize_callback' => 'viral_pro_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-facebook',
            'text' => '',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Viral_Pro_Repeater_Controler($wp_customize, 'viral_pro_social_icons', array(
    'label' => esc_html__('Add Social Link', 'viral-pro'),
    'section' => 'viral_pro_social_section',
    'box_label' => esc_html__('Social Links', 'viral-pro'),
    'add_label' => esc_html__('Add New', 'viral-pro'),
        ), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'viral-pro'),
        'default' => 'icofont-facebook'
    ),
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Add Link', 'viral-pro'),
        'default' => ''
    ),
    'enable' => array(
        'type' => 'switch',
        'label' => esc_html__('Enable', 'viral-pro'),
        'switch' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));
