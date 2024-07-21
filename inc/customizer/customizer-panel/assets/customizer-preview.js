function viralDynamicCss(control, style) {
    jQuery('style.' + control).remove();

    jQuery('head').append(
        '<style class="' + control + '">:root{' + style + '}</style>'
    );
}

jQuery(document).ready(function ($) {
    'use strict';
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.vl-site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.vl-site-description').text(to);
        });
    });
    // Header text color.
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            if ('blank' === to) {
                $('.vl-site-title a, .vl-site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.vl-site-title a, .vl-site-description').css({
                    'clip': 'auto',
                    'color': to,
                    'position': 'relative'
                });
            }
        });
    });

    wp.customize('viral_template_color', function (value) {
        value.bind(function (to) {
            var css = '--viral-template-color:' + to + ';';
            viralDynamicCss('viral_template_color', css);
        });
    });

    wp.customize('background_color', function (value) {
        value.bind(function (to) {
            var css = '--viral-background-color:' + to + ';';
            viralDynamicCss('background_color', css);
        });
    });
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.vm-site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.vm-site-description').text(to);
        });
    });

    wp.customize('viral_mag_tagline_position', function (value) {
        value.bind(function (to) {
            $(' #vm-masthead').removeClass('vm-tagline-inline-logo vm-tagline-below-logo').addClass(to);
        });
    });
});