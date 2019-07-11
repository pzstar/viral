<?php

/**
 * Square Plus Custom JS
 *
 * @package Square Plus
 */
function viral_pro_check_slider_type_rev($control) {
    $viral_pro_slider_type = $control->manager->get_setting('viral_pro_slider_type')->value();
    if ($viral_pro_slider_type == 'revolution') {
        return true;
    } else {
        return false;
    }
}

function viral_pro_check_slider_type_normal($control) {
    $viral_pro_slider_type = $control->manager->get_setting('viral_pro_slider_type')->value();
    if ($viral_pro_slider_type == 'normal') {
        return true;
    } else {
        return false;
    }
}

function viral_pro_check_slider_type_banner($control) {
    $viral_pro_slider_type = $control->manager->get_setting('viral_pro_slider_type')->value();
    if ($viral_pro_slider_type == 'banner') {
        return true;
    } else {
        return false;
    }
}

function viral_pro_check_slider_type_normal_or_banner($control) {
    $viral_pro_slider_type = $control->manager->get_setting('viral_pro_slider_type')->value();
    if ($viral_pro_slider_type == 'banner' || $viral_pro_slider_type == 'normal') {
        return true;
    } else {
        return false;
    }
}
