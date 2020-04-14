<?php

/**
 * @package Viral
 */
function viral_dymanic_styles() {
    $color = get_theme_mod('viral_template_color', '#0078af');
    $color = sanitize_hex_color($color); //Sanitized here so that variable can be used inside quote
    $header_typography = get_theme_mod('viral_header_typography', 'Roboto');
    $body_typography = get_theme_mod('viral_body_typography', 'Roboto');
    $header_typography = wp_filter_post_kses($header_typography); //Sanitized here so that variable can be used inside quote
    $body_typography = wp_filter_post_kses($body_typography); //Sanitized here so that variable can be used inside quote
    $custom_css = "
body,
button,
input,
select,
textarea{
font-family: '{$body_typography}', sans-serif;
}

.vl-site-title,
.vl-main-navigation a,
h1,
h2,
h3,
h4,
h5,
h6{
font-family: '{$header_typography}', sans-serif;
}

button,
input[type='button'],
input[type='reset'],
input[type='submit'],
.vl-post-info,
.entry-footer .vl-read-more,
.vl-timeline .vl-post-item:hover:after,
#vl-back-top,
.comment-navigation .nav-previous a,
.comment-navigation .nav-next a,
.pagination a, 
.pagination span,
.vl-top-header,
#vl-site-navigation,
.vl-main-navigation ul ul,
.vl-ticker-title,
.vl-ticker .owl-prev, 
.vl-ticker .owl-next,
.vl-top-block .post-categories li a:hover{
	background:{$color};
}

a,
.entry-categories .fa,
.vl-share-buttons a:hover,
.widget-area a:hover,
.comment-list a:hover,
.vl-site-title a,
.vl-site-description,
.post-navigation a:hover,
.vl-ticker .owl-item a:hover,
.vl-post-item h3 a:hover{
	color:{$color};
}

.widget-title,
h3#reply-title,
h3.comments-title,
.comment-navigation .nav-next a:after,
.vl-block-title{
border-left-color: {$color};
}

.comment-navigation .nav-previous a:after{
border-right-color: {$color};
}

.vl-ticker-title:after{
    border-color: transparent transparent transparent {$color};
}
";

    return wp_strip_all_tags(viral_css_strip_whitespace($custom_css));
}
