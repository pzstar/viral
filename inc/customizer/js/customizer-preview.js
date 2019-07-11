/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

function viral_pro_dynamic_css(control, style) {
    jQuery('style.' + control).remove();

    jQuery('head').append(
            '<style class="' + control + '">' + style + '</style>'
            );
}

function viral_pro_get_contrast(hexcolor) {
    var hex = String(hexcolor).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    var r = parseInt(hex.substr(0, 2), 16);
    var g = parseInt(hex.substr(2, 2), 16);
    var b = parseInt(hex.substr(4, 2), 16);
    var contrast = ((r * 299) + (g * 587) + (b * 114)) / 1000;
    return contrast;
}

function viral_pro_convert_hex(hexcolor, opacity) {
    var hex = String(hexcolor).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    r = parseInt(hex.substring(0, 2), 16);
    g = parseInt(hex.substring(2, 4), 16);
    b = parseInt(hex.substring(4, 6), 16);

    result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')';
    return result;
}

(function ($) {
    wp.customize.bind('preview-ready', function () {
        wp.customize.preview.bind('viral-pro-gdpr-add-class', function (data) {
            // When the section is expanded, open the login designer page specified via localization.
            if (true === data.expanded) {
                var enable_gdpr = wp.customize('viral_pro_enable_gdpr').get();
                if ('off' == enable_gdpr) {
                    var css = '.customizer-gdpr-section .viral-pro-privacy-policy{display:none !important}';
                } else {
                    var css = '.customizer-gdpr-section .viral-pro-privacy-policy{display:block !important}';
                }
                viral_pro_dynamic_css('viral_pro_enable_gdpr', css);

                $('body').addClass('customizer-gdpr-section');
            }
        });

        wp.customize.preview.bind('viral-pro-gdpr-remove-class', function (data) {
            $('body').removeClass('customizer-gdpr-section');
        });
    });

    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.ht-site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.ht-site-description').text(to);
        });
    });

    wp.customize('viral_pro_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-site-title a, .ht-site-description, .ht-site-description a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_title_color', css);
        });
    });

    wp.customize('viral_pro_website_layout', function (value) {
        value.bind(function (to) {
            if (to === 'boxed') {
                $('body').addClass('ht-boxed');
            } else {
                $('body').removeClass('ht-boxed');
            }
        });
    });

    wp.customize('viral_pro_th_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-site-header .ht-top-header{background:' + to + '}';
            css += '.ht-header-three .ht-header .ht-container,.ht-sticky-header .ht-header-three .ht-header.headroom.headroom--not-top{border-bottom-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_th_bg_color', css);
        });
    });

    wp.customize('viral_pro_th_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-site-header .ht-top-header{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_th_text_color', css);
        });
    });

    wp.customize('viral_pro_th_anchor_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-site-header .ht-top-header a,.ht-site-header .ht-top-header a:hover,.ht-site-header .ht-top-header a i,.ht-site-header .ht-top-header a:hover i{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_th_anchor_color', css);
        });
    });

    wp.customize('viral_pro_th_padding', function (value) {
        value.bind(function (to) {
            var headerHeight = $('#ht-masthead').outerHeight();
            var title_padding = wp.customize('viral_pro_titlebar_padding').get();
            var mainHeaderHeight = wp.customize('viral_pro_mh_height').get();
            var mainHeaderHalfHeight = parseInt(mainHeaderHeight / 2);
            var header6_padding_bottom = parseInt(to) + mainHeaderHalfHeight;


            var css = '.ht-site-header .ht-top-header{padding-top:' + to + 'px;padding-bottom:' + to + 'px}';
            css += '.ht-header-six.ht-site-header .ht-top-header{padding-bottom: ' + header6_padding_bottom + 'px;}';

            if ($('#ht-masthead').hasClass('ht-header-one')) {
                $('.ht-header-above .ht-main-header').css('padding-top',  parseInt(title_padding));
                $('.ht-header-over .ht-main-header').css('padding-top', headerHeight + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-two')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding) + 40);
            } else if ($('#ht-masthead').hasClass('ht-header-three')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding));
            }

            viral_pro_dynamic_css('viral_pro_th_padding', css);
        });
    });

    wp.customize('viral_pro_mh_bg_color_mobile', function (value) {
        value.bind(function (to) {
            var responsiveWidth = wp.customize('viral_pro_responsive_width').get();
            var css = '@media screen and (max-width:' + responsiveWidth + 'px){';
            css += '.ht-header-one .ht-header, .ht-header-two .ht-header .ht-container, .ht-header-three .ht-header .ht-container, .ht-header-four .ht-header .ht-container, .ht-header-five .ht-main-navigation,.ht-header-six .ht-header .ht-container{background:' + to + '}';
            css += '}';
            viral_pro_dynamic_css('viral_pro_mh_bg_color_mobile', css);
        });
    });

    wp.customize('viral_pro_mh_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-header-one .ht-header,.ht-header-two .ht-header .ht-container,.ht-header-three .ht-header .ht-container,.ht-header-four .ht-header .ht-container, .ht-header-five .ht-main-navigation,.ht-header-six .ht-header .ht-container,.ht-sticky-header .ht-header-two .ht-header.headroom.headroom--not-top,.ht-sticky-header .ht-header-three .ht-header.headroom.headroom--not-top,.ht-sticky-header .ht-header-four .ht-header.headroom.headroom--not-top,.ht-sticky-header .ht-header-six .ht-header.headroom.headroom--not-top{background:' + to + '}';
            css += '.ht-header-four .ht-middle-header{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_bg_color', css);
        });
    });

    wp.customize('viral_pro_mh_height', function (value) {
        value.bind(function (to) {
            var viral_pro_mh_height = parseInt(to);
            var viral_pro_header3_height = viral_pro_mh_height + 4;
            var viral_pro_mh_half_height = viral_pro_mh_height / 2;
            var viral_pro_mh_2half_height = viral_pro_mh_half_height / 2;

            var viral_pro_logo_height = viral_pro_mh_height - 30;
            var viral_pro_logo_height_header2 = viral_pro_logo_height + 40;

            var viral_pro_caption_top_margin = viral_pro_mh_half_height + 20;

            var title_padding = wp.customize('viral_pro_titlebar_padding').get();
            var viral_pro_th_padding = wp.customize('viral_pro_th_padding').get();

            var viral_pro_header_bottom_margin_titlebar_hide = viral_pro_mh_half_height + 40;
            var viral_pro_header6_padding_bottom = parseInt(viral_pro_th_padding) + viral_pro_mh_half_height;
            var headerHeight = $('#ht-masthead').outerHeight();

            var css = '.ht-header-one .ht-header .ht-container,.ht-header-two .ht-main-navigation, .ht-header-four .ht-main-navigation,.ht-header-five .ht-main-navigation .ht-container,.ht-header-six .ht-header .ht-container{height:' + to + 'px}';
            css += '.ht-header-three .ht-header .ht-container{height:' + viral_pro_header3_height + 'px;}';
            css += '.ht-header-four .ht-middle-header{padding-bottom:' + viral_pro_mh_half_height + 'px;}';

            css += '.ht-header-six.ht-site-header .ht-top-header{padding-bottom:' + viral_pro_header6_padding_bottom + 'px;}';

            css += '.hover-style5 .ht-menu > ul > li.menu-item > a,.hover-style6 .ht-menu > ul > li.menu-item > a,.hover-style5 .ht-header-bttn,.hover-style6 .ht-header-bttn{line-height:' + to + 'px}';

            css += '.ht-header-over .ht-slide-caption{margin-top:' + viral_pro_mh_half_height + 'px;}';
            css += '.ht-header-style6 .ht-slide-caption{margin-top:' + viral_pro_mh_2half_height + 'px;}';
            css += '.ht-header-style2 .ht-slide-caption,.ht-header-style3 .ht-slide-caption,.ht-header-style5 .ht-slide-caption, .ht-top-header-off.ht-header-style6 .ht-slide-caption{margin-top:' + viral_pro_caption_top_margin + 'px;}';

            css += '.ht-top-header-on.ht-sticky-header .ht-header-two .ht-header.headroom.headroom--top #ht-site-branding img{max-height: ' + viral_pro_logo_height_header2 + 'px;}';
            css += '.ht-header-one #ht-site-branding img,.ht-top-header-on.ht-sticky-header .ht-header-two .ht-header.headroom.headroom--not-top #ht-site-branding img,.ht-top-header-off #ht-site-branding img,.ht-header-three #ht-site-branding img,.ht-header-six #ht-site-branding img{max-height:' + viral_pro_logo_height + 'px;}';

            css += '.ht-hide-titlebar .ht-header-four#ht-masthead, .ht-hide-titlebar .ht-header-six#ht-masthead{padding-bottom:' + viral_pro_header_bottom_margin_titlebar_hide + 'px;}';


            if ($('#ht-masthead').hasClass('ht-header-one')) {
                $('.ht-header-over .ht-main-header').css('padding-top', headerHeight + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-two')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding) + 40);
            } else if ($('#ht-masthead').hasClass('ht-header-three')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-four')) {
                $('.ht-main-header').css('padding-top', viral_pro_mh_half_height + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-six') && $('body').hasClass('ht-top-header-on')) {
                $('.ht-main-header').css('padding-top', viral_pro_mh_half_height + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-six') && $('body').hasClass('ht-top-header-off')) {
                $('.ht-main-header').css('padding-top', viral_pro_mh_height + parseInt(title_padding) + 30);
            }

            viral_pro_dynamic_css('viral_pro_mh_height', css);
        });
    });

    wp.customize('viral_pro_website_width', function (value) {
        value.bind(function (container_width) {
            var boxed_container_width = parseInt(container_width) + 80;
            var css = '.ht-container,.ht-slide-caption{max-width:' + container_width + 'px}';
            css += 'body.ht-boxed #ht-page{max-width:' + boxed_container_width + 'px;}';
            viral_pro_dynamic_css('viral_pro_website_width', css);
        });
    });

    wp.customize('viral_pro_sidebar_width', function (value) {
        value.bind(function (to) {
            var primary = 100 - 3 - parseInt(to);
            var css = '#primary{width:' + primary + '%}';
            css += '#secondary{width:' + to + '%;}';
            viral_pro_dynamic_css('viral_pro_sidebar_width', css);
        });
    });

    wp.customize('viral_pro_mh_menu_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-menu > ul > li.menu-item > a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_menu_color', css);
        });
    });

    wp.customize('viral_pro_mh_menu_hover_color', function (value) {
        value.bind(function (to) {
            var css = '.hover-style1 .ht-menu > ul> li.menu-item:hover > a,.hover-style1 .ht-menu > ul> li.menu-item.current_page_item > a, .hover-style1 .ht-menu > ul > li.menu-item.current-menu-item > a,.ht-menu > ul > li.menu-item:hover > a,.ht-menu > ul > li.menu-item:hover > a > i,.ht-menu > ul > li.menu-item.current_page_item > a,.ht-menu > ul > li.menu-item.current-menu-item > a,.ht-menu > ul > li.menu-item.current_page_ancestor > a,.ht-menu > ul > li.menu-item.current > a{color:' + to + '}';
            css += '.hover-style2 .ht-menu > ul > li.menu-item:hover > a,.hover-style2 .ht-menu > ul > li.menu-item.current_page_item > a,.hover-style2 .ht-menu > ul > li.menu-item.current-menu-item > a,.hover-style2 .ht-menu > ul > li.menu-item.current_page_ancestor > a,.hover-style2 .ht-menu > ul > li.menu-item.current > a,.hover-style4 .ht-menu > ul > li.menu-item:hover > a,.hover-style4 .ht-menu > ul > li.menu-item.current_page_item > a,.hover-style4 .ht-menu > ul > li.menu-item.current-menu-item > a,.hover-style4 .ht-menu > ul > li.menu-item.current_page_ancestor > a,.hover-style4 .ht-menu > ul > li.menu-item.current > a{color:' + to + ';border-color:' + to + '}'
            css += '.hover-style6 .ht-menu > ul > li.menu-item:hover > a:before,.hover-style6 .ht-menu > ul > li.menu-item.current_page_item > a:before,.hover-style6 .ht-menu > ul > li.menu-item.current-menu-item > a:before,.hover-style6 .ht-menu > ul > li.menu-item.current_page_ancestor > a:before,.hover-style6 .ht-menu > ul > li.menu-item.current > a:before,.hover-style8 .ht-menu>ul>li.menu-item>a:before, .hover-style9 .ht-menu>ul>li.menu-item>a:before{background:' + to + '}';
            css += '.hover-style7 .ht-menu>ul>li.menu-item>a:before{border-left-color:' + to + ';border-top-color:' + to + '}';
            css += '.hover-style7 .ht-menu>ul>li.menu-item>a:after{border-right-color:' + to + ';border-bottom-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_menu_hover_color', css);
        });
    });

    wp.customize('viral_pro_mh_menu_hover_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.hover-style1 .ht-menu>ul>li.menu-item:hover>a,.hover-style1 .ht-menu>ul>li.menu-item.current_page_item>a,.hover-style1 .ht-menu>ul>li.menu-item.current-menu-item>a,.hover-style1 .ht-menu>ul>li.menu-item.current_page_ancestor>a,.hover-style1 .ht-menu>ul>li.menu-item.current>a,.hover-style5 .ht-menu>ul>li.menu-item:hover>a,.hover-style5 .ht-menu>ul>li.menu-item.current_page_item>a,.hover-style5 .ht-menu>ul>li.menu-item.current-menu-item>a,.hover-style5 .ht-menu>ul>li.menu-item.current_page_ancestor>a,.hover-style5 .ht-menu>ul>li.menu-item.current>a,.hover-style3 .ht-menu>ul>li.menu-item:hover>a,.hover-style3 .ht-menu>ul>li.menu-item.current_page_item>a,.hover-style3 .ht-menu>ul>li.menu-item.current-menu-item>a,.hover-style3 .ht-menu>ul>li.menu-item.current_page_ancestor>a,.hover-style3 .ht-menu>ul>li.menu-item.current>a{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_menu_hover_bg_color', css);
        });
    });

    wp.customize('viral_pro_mh_submenu_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-menu ul ul,.menu-item-ht-cart .widget_shopping_cart,#ht-responsive-menu{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_submenu_bg_color', css);
        });
    });

    wp.customize('viral_pro_mh_submenu_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-menu .megamenu *,#ht-responsive-menu .megamenu *,.ht-menu .megamenu a,#ht-responsive-menu .megamenu a,.ht-menu ul ul li.menu-item>a,.menu-item-ht-cart .widget_shopping_cart a,.menu-item-ht-cart .widget_shopping_cart,#ht-responsive-menu li.menu-item>a,#ht-responsive-menu li.menu-item>a i,#ht-responsive-menu li .sub-toggle,.megamenu-category .mega-post-title a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_submenu_color', css);
        });
    });

    wp.customize('viral_pro_mh_submenu_hover_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-menu .megamenu a:hover,#ht-responsive-menu .megamenu a:hover,.ht-menu .megamenu a:hover>i,#ht-responsive-menu .megamenu a:hover>i,.ht-menu>ul>li>ul:not(.megamenu) li.menu-item:hover>a,.ht-menu ul ul.megamenu li.menu-item>a:hover,.ht-menu ul ul li.menu-item>a:hover i,.menu-item-ht-cart .widget_shopping_cart a:hover,.ht-menu .megamenu-full-width.megamenu-category .cat-megamenu-tab>div.active-tab,.ht-menu .megamenu-full-width.megamenu-category .mega-post-title a:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_mh_submenu_hover_color', css);
        });
    });

    wp.customize('viral_pro_mh_menu_hover_style', function (value) {
        value.bind(function (to) {
            $('#ht-masthead').removeClass('hover-style1 hover-style2 hover-style3 hover-style4 hover-style5 hover-style6 hover-style7 hover-style8 hover-style9 hover-style10').addClass(to);
        });
    });

    wp.customize('viral_pro_menu_dropdown_padding', function (value) {
        value.bind(function (to) {
            var css = '.ht-menu>ul>li.menu-item{padding-top:' + to + 'px;padding-bottom:' + to + 'px}';
            viral_pro_dynamic_css('viral_pro_menu_dropdown_padding', css);
        });
    });

    wp.customize('viral_pro_hb_text', function (value) {
        value.bind(function (to) {
            $('.ht-header-bttn').text(to);
        });
    });

    wp.customize('viral_pro_hb_link', function (value) {
        value.bind(function (to) {
            $('.ht-header-bttn').attr('href', to);
        });
    });

    wp.customize('viral_pro_hb_text_color', function (value) {
        value.bind(function (to) {
            var css = 'a.ht-header-bttn{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_hb_text_color', css);
        });
    });

    wp.customize('viral_pro_hb_text_hov_color', function (value) {
        value.bind(function (to) {
            var css = 'a.ht-header-bttn:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_hb_text_hov_color', css);
        });
    });

    wp.customize('viral_pro_hb_bg_color', function (value) {
        value.bind(function (to) {
            var css = 'a.ht-header-bttn{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_hb_bg_color', css);
        });
    });

    wp.customize('viral_pro_hb_bg_hov_color', function (value) {
        value.bind(function (to) {
            var css = 'a.ht-header-bttn:hover{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_hb_bg_hov_color', css);
        });
    });

    wp.customize('viral_pro_hb_borderradius', function (value) {
        value.bind(function (to) {
            var css = 'a.ht-header-bttn{border-radius:' + to + 'px}';
            viral_pro_dynamic_css('viral_pro_hb_borderradius', css);
        });
    });

    wp.customize('viral_pro_hb_disable_mobile', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.ht-header-bttn').addClass('ht-mobile-hide');
            } else {
                $('.ht-header-bttn').removeClass('ht-mobile-hide');
            }
        });
    });

    wp.customize('viral_pro_titlebar_bg_url', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header{background-image:url(' + to + ')}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_url', css);
        });
    });

    wp.customize('viral_pro_titlebar_bg_repeat', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header{background-repeat:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_repeat', css);
        });
    });

    wp.customize('viral_pro_titlebar_bg_size', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header{background-size:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_size', css);
        });
    });

    wp.customize('viral_pro_titlebar_bg_position', function (value) {
        value.bind(function (to) {
            to = to.replace('-', ' ');
            var css = '.ht-main-header{background-position:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_position', css);
        });
    });

    wp.customize('viral_pro_titlebar_bg_attach', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header{background-attachment:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_attach', css);
        });
    });

    wp.customize('viral_pro_titlebar_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_color', css);
        });
    });

    wp.customize('viral_pro_titlebar_bg_overlay', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header:before{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_bg_overlay', css);
        });
    });

    wp.customize('viral_pro_titlebar_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-header,.ht-main-header *,.woocommerce .woocommerce-breadcrumb a,.breadcrumb-trail a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_titlebar_text_color', css);
        });
    });

    wp.customize('viral_pro_titlebar_padding', function (value) {
        value.bind(function (title_padding) {
            if (!$('#ht-masthead').hasClass('ht-header-six')) {
                var headerHeight = $('#ht-masthead').outerHeight();
            } else {
                var headerHeight = wp.customize('viral_pro_mh_height').get();
            }
            var viral_pro_mh_half_height = headerHeight / 2;

            if ($('#ht-masthead').hasClass('ht-header-one')) {
                $('.ht-header-above .ht-main-header').css('padding-top', parseInt(title_padding));
                $('.ht-header-over .ht-main-header').css('padding-top', headerHeight + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-two')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding) + 40);
            } else if ($('#ht-masthead').hasClass('ht-header-three')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-four')) {
                $('.ht-main-header').css('padding-top', viral_pro_mh_half_height + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-six') && $('body').hasClass('ht-top-header-on')) {
                $('.ht-main-header').css('padding-top', viral_pro_mh_half_height + parseInt(title_padding));
            } else if ($('#ht-masthead').hasClass('ht-header-six') && $('body').hasClass('ht-top-header-off')) {
                $('.ht-main-header').css('padding-top', headerHeight + parseInt(title_padding) + 30);
            } else {
                $('.ht-main-header').css('padding-top', parseInt(title_padding));
            }

            var css = '.ht-main-header{padding-bottom:' + parseInt(title_padding) + 'px}';
            viral_pro_dynamic_css('viral_pro_titlebar_padding', css);
        });
    });

    wp.customize('viral_pro_footer_bg_url', function (value) {
        value.bind(function (to) {
            var css = '#ht-colophon{background-image:url(' + to + ')}';
            viral_pro_dynamic_css('viral_pro_footer_bg_url', css);
        });
    });

    wp.customize('viral_pro_footer_bg_repeat', function (value) {
        value.bind(function (to) {
            var css = '#ht-colophon{background-repeat:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_bg_repeat', css);
        });
    });

    wp.customize('viral_pro_footer_bg_size', function (value) {
        value.bind(function (to) {
            var css = '#ht-colophon{background-size:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_bg_size', css);
        });
    });

    wp.customize('viral_pro_footer_bg_position', function (value) {
        value.bind(function (to) {
            to = to.replace('-', ' ');
            var css = '#ht-colophon{background-position:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_bg_position', css);
        });
    });

    wp.customize('viral_pro_footer_bg_attach', function (value) {
        value.bind(function (to) {
            var css = '#ht-colophon{background-attachment:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_bg_attach', css);
        });
    });

    wp.customize('viral_pro_footer_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style1 .ht-main-footer:before,.footer-style2.ht-site-footer:before,.footer-style3.ht-site-footer:before,.footer-style4.ht-site-footer:before,.footer-style5.ht-site-footer:before{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_bg_color', css);
        });
    });

    wp.customize('viral_pro_footer_title_color', function (value) {
        value.bind(function (to) {
            var borderColor = viral_pro_convert_hex(to, 20);
            var css = '#ht-colophon .widget-title{color:' + to + ' !important}';
            css += '.ht-sidebar-style1 .ht-site-footer .widget-title:after,.ht-sidebar-style3 .ht-site-footer .widget-title:after{background-color:' + to + ' !important}';
            css += '.ht-sidebar-style2 .ht-site-footer .widget-title{border-color:' + borderColor + ' !important}';
            viral_pro_dynamic_css('viral_pro_footer_title_color', css);
        });
    });

    wp.customize('viral_pro_footer_text_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style1 .ht-main-footer *,.footer-style2.ht-site-footer *,.footer-style3 .ht-main-footer *,.footer-style4.ht-site-footer *,.footer-style5 .ht-top-footer *,.footer-style5 .ht-bottom-footer *{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_text_color', css);
        });
    });

    wp.customize('viral_pro_footer_anchor_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style1 .ht-main-footer a,.footer-style1 .ht-main-footer a *,.footer-style2.ht-site-footer a,.footer-style2.ht-site-footer a *,.footer-style3 .ht-main-footer a,.footer-style3 .ht-main-footer a *,.footer-style4.ht-site-footer a,.footer-style4.ht-site-footer a *,.footer-style5 .ht-top-footer a,.footer-style5 .ht-top-footer a *,.footer-style5 .ht-bottom-footer a,.footer-style5 .ht-bottom-footer a *{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_anchor_color', css);
        });
    });

    wp.customize('viral_pro_footer_secondary_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style1 .ht-top-footer,.footer-style1 .ht-bottom-top-footer,.footer-style1 .ht-bottom-footer,.footer-style3 .ht-top-footer .ht-container,.footer-style3 .ht-bottom-top-footer .ht-container,.footer-style3 .ht-bottom-footer .ht-container,.footer-style5 .ht-main-footer,.footer-style5 .ht-bottom-top-footer{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_secondary_bg_color', css);
        });
    });

    wp.customize('viral_pro_footer_secondary_text_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style1 .ht-top-footer *,.footer-style1 .ht-bottom-top-footer *,.footer-style1 .ht-bottom-footer *,.footer-style3 .ht-top-footer .ht-container *,.footer-style3 .ht-bottom-top-footer .ht-container *,.footer-style3 .ht-bottom-footer .ht-container *,.footer-style5 .ht-main-footer *,.footer-style5 .ht-bottom-top-footer *{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_secondary_text_color', css);
        });
    });

    wp.customize('viral_pro_footer_secondary_anchor_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style1 .ht-top-footer a,.footer-style1 .ht-top-footer a *,.footer-style1 .ht-bottom-top-footer a,.footer-style1 .ht-bottom-top-footer a *,.footer-style1 .ht-bottom-footer a,.footer-style1 .ht-bottom-footer a *,.footer-style3 .ht-top-footer .ht-container a,.footer-style3 .ht-top-footer .ht-container a *,.footer-style3 .ht-bottom-top-footer .ht-container a,.footer-style3 .ht-bottom-top-footer .ht-container a *,.footer-style3 .ht-bottom-footer .ht-container a,.footer-style3 .ht-bottom-footer .ht-container a *,.footer-style5 .ht-main-footer a,.footer-style5 .ht-main-footer a *,.footer-style5 .ht-bottom-top-footer a,.footer-style5 .ht-bottom-top-footer a *{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_secondary_anchor_color', css);
        });
    });

    wp.customize('viral_pro_footer_border_color', function (value) {
        value.bind(function (to) {
            var css = '.footer-style2 .ht-top-footer .ht-container,.footer-style2 .ht-footer,.footer-style2 .ht-bottom-top-footer .ht-container,.footer-style2 .ht-bottom-footer .ht-container,.footer-style4 .ht-top-footer,.footer-style4 .ht-bottom-top-footer,.footer-style4 .ht-bottom-footer{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_footer_border_color', css);
        });
    });

    wp.customize('viral_pro_footer_copyright', function (value) {
        value.bind(function (to) {
            $('.ht-site-info').html(to);
        });
    });

    wp.customize('viral_pro_gdpr_position', function (value) {
        value.bind(function (to) {
            $('.viral-pro-privacy-policy').removeClass('top-full-width bottom-full-width bottom-left-float bottom-right-float').addClass(to);
        });
    });

    wp.customize('viral_pro_gdpr_bg', function (value) {
        value.bind(function (to) {
            var css = '.viral-pro-privacy-policy{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_gdpr_bg', css);
        });
    });

    wp.customize('viral_pro_gdpr_notice', function (value) {
        value.bind(function (to) {
            $('.policy-text').html(to);
        });
    });

    wp.customize('viral_pro_gdpr_confirm_button_text', function (value) {
        value.bind(function (to) {
            $('#viral-pro-confirm').text(to);
        });
    });

    wp.customize('viral_pro_gdpr_text_color', function (value) {
        value.bind(function (to) {
            var css = '.viral-pro-privacy-policy, .policy-text a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_gdpr_text_color', css);
        });
    });

    wp.customize('viral_pro_button_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.policy-buttons a,.policy-buttons a:hover{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_button_bg_color', css);
        });
    });

    wp.customize('viral_pro_button_text_color', function (value) {
        value.bind(function (to) {
            var css = '.policy-buttons a,.policy-buttons a:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_button_text_color', css);
        });
    });

    wp.customize('viral_pro_gdpr_hide_mobile', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.viral-pro-privacy-policy').addClass('policy-hide-mobile');
            } else {
                $('.viral-pro-privacy-policy').removeClass('policy-hide-mobile');
            }
        });
    });

    wp.customize('viral_pro_enable_gdpr', function (value) {
        value.bind(function (to) {
            if ('off' == to) {
                var css = '.customizer-gdpr-section .viral-pro-privacy-policy{display:none !important}';
            } else {
                var css = '.customizer-gdpr-section .viral-pro-privacy-policy{display:block !important}';
            }

            viral_pro_dynamic_css('viral_pro_enable_gdpr', css);
        });
    });

    wp.customize('viral_pro_banner_image', function (value) {
        value.bind(function (to) {
            $('.ht-main-banner').css('background-image', 'url(' + to + ')');
        });
    });

    wp.customize('viral_pro_banner_title', function (value) {
        value.bind(function (to) {
            $('.ht-banner-title').text(to);
        });
    });

    wp.customize('viral_pro_banner_subtitle', function (value) {
        value.bind(function (to) {
            $('.ht-banner-subtitle').text(to);
        });
    });

    wp.customize('viral_pro_banner_button_text', function (value) {
        value.bind(function (to) {
            $('.ht-banner-button .ht-button').text(to);
        });
    });

    wp.customize('viral_pro_banner_text_alignment', function (value) {
        value.bind(function (to) {
            $('.ht-main-banner .ht-container').removeClass('ht-banner-left ht-banner-right ht-banner-center').addClass('ht-banner-' + to);
        });
    });

    wp.customize('viral_pro_banner_overlay_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-main-banner:before{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_banner_overlay_color', css);
        });
    });

    wp.customize('viral_pro_slider_bs_color', function (value) {
        value.bind(function (to) {
            var css = '#ht-home-slider-section .bottom-section-seperator svg{fill:' + to + '}';
            viral_pro_dynamic_css('viral_pro_slider_bs_color', css);
        });
    });

    wp.customize('viral_pro_slider_bs_height', function (value) {
        value.bind(function (to) {
            var desktop = to;
            var tablet = wp.customize('viral_pro_slider_bs_height_tablet').get();
            var mobile = wp.customize('viral_pro_slider_bs_height_mobile').get();

            var css = '#ht-home-slider-section .bottom-section-seperator{height:' + desktop + 'px}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '#ht-home-slider-section .bottom-section-seperator{height:' + tablet + 'px}';
                css += '}';
            }

            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '#ht-home-slider-section .bottom-section-seperator{height:' + mobile + 'px}';
                css += '}';
            }

            viral_pro_dynamic_css('viral_pro_slider_bs_height', css);
        });
    });

    wp.customize('viral_pro_slider_bs_height_tablet', function (value) {
        value.bind(function (to) {
            var desktop = wp.customize('viral_pro_slider_bs_height').get();
            var tablet = to;
            var mobile = wp.customize('viral_pro_slider_bs_height_mobile').get();

            var css = '#ht-home-slider-section .bottom-section-seperator{height:' + desktop + 'px}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '#ht-home-slider-section .bottom-section-seperator{height:' + tablet + 'px}';
                css += '}';
            }

            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '#ht-home-slider-section .bottom-section-seperator{height:' + mobile + 'px}';
                css += '}';
            }

            viral_pro_dynamic_css('viral_pro_slider_bs_height', css);
        });
    });

    wp.customize('viral_pro_slider_bs_height_mobile', function (value) {
        value.bind(function (to) {
            var desktop = wp.customize('viral_pro_slider_bs_height').get();
            var tablet = wp.customize('viral_pro_slider_bs_height_tablet').get();
            var mobile = to;

            var css = '#ht-home-slider-section .bottom-section-seperator{height:' + desktop + 'px}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '#ht-home-slider-section .bottom-section-seperator{height:' + tablet + 'px}';
                css += '}';
            }

            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '#ht-home-slider-section .bottom-section-seperator{height:' + mobile + 'px}';
                css += '}';
            }

            viral_pro_dynamic_css('viral_pro_slider_bs_height', css);
        });
    });

    wp.customize('viral_pro_slider_overlay_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-slide:before{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_slider_overlay_color', css);
        });
    });

    wp.customize('viral_pro_slider_arrow_bg_color', function (value) {
        value.bind(function (to) {
            var css = '#ht-home-slider-section .owl-nav [class*="owl-"], #ht-home-slider-section .owl-dots .owl-dot{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_slider_arrow_bg_color', css);
        });
    });

    wp.customize('viral_pro_slider_arrow_bg_color_hover', function (value) {
        value.bind(function (to) {
            var css = '#ht-home-slider-section .owl-nav [class*="owl-"]:hover, #ht-home-slider-section .owl-dots .owl-dot:hover{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_slider_arrow_bg_color_hover', css);
        });
    });

    wp.customize('viral_pro_slider_arrow_color', function (value) {
        value.bind(function (to) {
            var css = '#ht-home-slider-section .owl-nav [class*="owl-"]{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_slider_arrow_color', css);
        });
    });

    wp.customize('viral_pro_slider_arrow_color_hover', function (value) {
        value.bind(function (to) {
            var css = '#ht-home-slider-section .owl-nav [class*="owl-"]:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_slider_arrow_color_hover', css);
        });
    });

    wp.customize('viral_pro_slider_caption_bg', function (value) {
        value.bind(function (to) {
            if (to) {
                $('#ht-slider, .ht-main-banner').addClass('ht-caption-bg').removeClass('ht-caption-no-bg');
            } else {
                $('#ht-slider, .ht-main-banner').addClass('ht-caption-no-bg').removeClass('ht-caption-bg');
                ;
            }
        });
    });

    wp.customize('viral_pro_caption_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-caption-bg .ht-slide-caption, .ht-main-banner.ht-caption-bg .ht-banner-caption-bg{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_caption_bg_color', css);
        });
    });

    wp.customize('viral_pro_caption_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-slide-cap-title, .ht-slide-cap-desc, .ht-banner-title, .ht-banner-subtitle{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_caption_text_color', css);
        });
    });

    wp.customize('viral_pro_caption_button_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-slide-button a, .ht-banner-button a{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_caption_button_bg_color', css);
        });
    });

    wp.customize('viral_pro_caption_button_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-slide-button a, .ht-banner-button a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_caption_button_text_color', css);
        });
    });

    wp.customize('viral_pro_caption_button_bg_hov_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-slide-button a:hover, .ht-banner-button a:hover{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_caption_button_bg_hov_color', css);
        });
    });

    wp.customize('viral_pro_caption_button_text_hov_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-slide-button a:hover, .ht-banner-button a:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_caption_button_text_hov_color', css);
        });
    });

    wp.customize('viral_pro_caption_width', function (value) {
        value.bind(function (to) {
            var desktop = to;
            var tablet = wp.customize('viral_pro_caption_width_tablet').get();
            var mobile = wp.customize('viral_pro_caption_width_mobile').get();

            var css = '.ht-slide-caption, .ht-banner-caption{width:' + desktop + '%}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '.ht-slide-caption, .ht-banner-caption{width:' + tablet + '%}';
                css += '}';
            }

            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '.ht-slide-caption, .ht-banner-caption{width:' + mobile + '%}';
                css += '}';
            }

            viral_pro_dynamic_css('viral_pro_caption_width', css);
        });
    });

    wp.customize('viral_pro_caption_width_tablet', function (value) {
        value.bind(function (to) {
            var desktop = wp.customize('viral_pro_caption_width').get();
            var tablet = to;
            var mobile = wp.customize('viral_pro_caption_width_mobile').get();

            var css = '.ht-slide-caption, .ht-banner-caption{width:' + desktop + '%}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '.ht-slide-caption, .ht-banner-caption{width:' + tablet + '%}';
                css += '}';
            }

            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '.ht-slide-caption, .ht-banner-caption{width:' + mobile + '%}';
                css += '}';
            }

            viral_pro_dynamic_css('viral_pro_caption_width', css);
        });
    });

    wp.customize('viral_pro_caption_width_mobile', function (value) {
        value.bind(function (to) {
            var desktop = wp.customize('viral_pro_caption_width').get();
            var tablet = wp.customize('viral_pro_caption_width_tablet').get();
            var mobile = to;

            var css = '.ht-slide-caption, .ht-banner-caption{width:' + desktop + '%}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '.ht-slide-caption, .ht-banner-caption{width:' + tablet + '%}';
                css += '}';
            }

            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '.ht-slide-caption, .ht-banner-caption{width:' + mobile + '%}';
                css += '}';
            }

            viral_pro_dynamic_css('viral_pro_caption_width', css);
        });
    });

    var settingIds = ['about', 'highlight', 'featured', 'portfolio', 'portfolioslider', 'service', 'team', 'counter', 'testimonial', 'blog', 'logo', 'cta', 'pricing', 'news', 'tab', 'contact', 'customa', 'customb'];

    $.each(settingIds, function (i, settingId) {
        wp.customize('viral_pro_' + settingId + '_enable_fullwindow', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                if ('on' == to) {
                    var css = sectionClass + ' .ht-section-wrap{min-height:100vh;display: -webkit-flex;display: -ms-flexbox;display: flex;overflow: hidden;flex-wrap: wrap}';
                } else {
                    var css = sectionClass + ' .ht-section-wrap{min-height:0;display:block;overflow:visible;}';
                }
                viral_pro_dynamic_css('viral_pro_' + settingId + '_enable_fullwindow', css);

                if (settingId == 'contact' && to == 'on') {
                    $('.ht-contact-section').addClass('ht-window-height');
                } else if (settingId == 'contact' && to == 'off') {
                    $('.ht-contact-section').removeClass('ht-window-height');
                }
            });
        });

        wp.customize('viral_pro_' + settingId + '_align_item', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var styles;
                if (to == 'top') {
                    styles = "align-items: flex-start";
                } else if (to == 'middle') {
                    styles = "align-items: center";
                } else if (to == 'bottom') {
                    styles = "align-items: flex-end";
                } else {
                    styles = "align-items: normal";
                }

                var css = sectionClass + ' .ht-section-wrap{' + styles + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_align_item', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_type', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                if ('color-bg' == to) {
                    var color = wp.customize('viral_pro_' + settingId + '_bg_color').get();
                    var css = sectionClass + '{background-color:' + color + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_color', css);

                    var css = sectionClass + ' .ht-section-wrap{background-color:transparent}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_overlay_color', css);

                    var css = sectionClass + '{background-image:none}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_url', css);

                } else if ('image-bg' == to) {
                    var image = wp.customize('viral_pro_' + settingId + '_bg_image_url').get();
                    var css = sectionClass + '{background-image:url(' + image + ')}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_url', css);

                    var image_repeat = wp.customize('viral_pro_' + settingId + '_bg_image_repeat').get();
                    var css = sectionClass + '{background-repeat:' + image_repeat + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_repeat', css);

                    var image_size = wp.customize('viral_pro_' + settingId + '_bg_image_size').get();
                    var css = sectionClass + '{background-size:' + image_size + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_size', css);

                    var image_position = wp.customize('viral_pro_' + settingId + '_bg_position').get();
                    image_position = image_position.replace('-', ' ');
                    var css = sectionClass + '{background-position:' + image_position + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_position', css);

                    var image_attach = wp.customize('viral_pro_' + settingId + '_bg_image_attach').get();
                    var css = sectionClass + '{background-attachment:' + image_attach + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_attach', css);

                    var color = wp.customize('viral_pro_' + settingId + '_bg_color').get();
                    var css = sectionClass + '{background-color:' + color + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_color', css);

                    var color_overlay = wp.customize('viral_pro_' + settingId + '_overlay_color').get();
                    var css = sectionClass + ' .ht-section-wrap{background-color:' + color_overlay + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_overlay_color', css);
                } else if ('gradient-bg' == to) {
                    var gradient = wp.customize('viral_pro_' + settingId + '_bg_gradient').get();
                    var css = sectionClass + '{' + gradient + '}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_gradient', css);

                    var css = sectionClass + ' .ht-section-wrap{background-color:transparent}';
                    viral_pro_dynamic_css('viral_pro_' + settingId + '_overlay_color', css);

                } else if ('video-bg' == to) {
                    wp.customize.preview.send('refresh');
                }
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{background-color:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_image_url', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{background-image:url(' + to + ')}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_url', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_image_repeat', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{background-repeat:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_repeat', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_image_size', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{background-size:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_size', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_position', function (value) {
            value.bind(function (to) {
                to = to.replace('-', ' ');
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{background-position:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_position', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_image_attach', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{background-attachment:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_image_attach', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bg_gradient', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + '{' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bg_gradient', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_overlay_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-wrap{background-color:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_overlay_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_super_title_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-super-title{color:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_super_title_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_title_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-title{color:' + to + '}';
                css += sectionClass + ' .ht-section-title-top-cs .ht-section-title:after,' + sectionClass + ' .ht-section-title-top-ls .ht-section-title:after,' + sectionClass + ' .ht-section-title-big .ht-section-title:after{background:' + to + '}';
                css += sectionClass + ' .ht-section-title-big .ht-section-title:after{box-shadow: -35px -8px 0px 0px ' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_title_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_text_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-wrap{color:' + to + '}';
                var contrast = viral_pro_get_contrast(to);

                if (settingId == 'counter') {
                    css += ".ht-section .style1 .ht-counter:after, .ht-section .style1 .ht-counter:before, " + sectionClass + " .style2 .ht-counter:before,.ht-counter-section .style2 .ht-counter:after," + sectionClass + " .style2 .ht-counter>span:before, " + sectionClass + " .style2 .ht-counter>span:after{background:" + to + "}";
                    css += ".ht-section .style1 .ht-counter{border-color:" + to + "}";
                    css += ".ht-section .style2 .ht-counter-title:before,.ht-section .style2 .ht-counter-title:after,.ht-section .style2 .ht-counter-title span:before,.ht-section .style2 .ht-counter-title span:after," + sectionClass + " .style2 .ht-counter-icon:after{background:" + to + "}";
                }

                if (settingId == 'portfolio') {
                    css += sectionClass + " .ht-portfolio-cat-name-list.style1 .ht-portfolio-cat-name{border-left-color:" + to + "}";
                    css += sectionClass + " .ht-portfolio-cat-name-list.style2 .ht-portfolio-cat-name.active:after{background-color:" + to + "}";
                    css += sectionClass + " .ht-portfolio-cat-name-list.style2 .ht-portfolio-cat-name{color:" + to + "}";
                }

                if (settingId == 'testimonial') {
                    css += sectionClass + " .style1 .owl-dots .owl-dot{background-color:" + to + "}";
                    css += sectionClass + " .style2 .slick-dots li{border-color:" + to + "}";
                    css += sectionClass + " .style2 .slick-dots li.slick-active button{background-color:" + to + "}";
                }

                if (settingId == 'logo') {
                    css += sectionClass + " .style1 .owl-dots .owl-dot{background-color:" + to + "}";
                }

                css += sectionClass + " .ht-section-title-single-row .ht-section-title-wrap{border-color:" + to + " }";
                viral_pro_dynamic_css('viral_pro_' + settingId + '_text_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_link_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' a, ' + sectionClass + ' a:hover{color:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_link_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_mb_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-button .ht-button{background:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_mb_bg_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_mb_text_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-button .ht-button{color:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_mb_text_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_mb_hov_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-button .ht-button:hover{background:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_mb_hov_bg_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_mb_hov_text_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .ht-section-button .ht-button:hover{color:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_mb_hov_text_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_padding_top', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';

                var desktop = to;
                var tablet = wp.customize('viral_pro_' + settingId + '_tablet_padding_top').get();
                var mobile = wp.customize('viral_pro_' + settingId + '_mobile_padding_top').get();

                var css = sectionClass + ' .ht-section-wrap{padding-top:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-wrap{padding-top:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-wrap{padding-top:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_padding_top', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_tablet_padding_top', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';

                var desktop = wp.customize('viral_pro_' + settingId + '_padding_top').get();
                var tablet = to;
                var mobile = wp.customize('viral_pro_' + settingId + '_mobile_padding_top').get();

                var css = sectionClass + ' .ht-section-wrap{padding-top:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-wrap{padding-top:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-wrap{padding-top:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_padding_top', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_mobile_padding_top', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';

                var desktop = wp.customize('viral_pro_' + settingId + '_padding_top').get();
                var tablet = wp.customize('viral_pro_' + settingId + '_tablet_padding_top').get();
                var mobile = to;

                var css = sectionClass + ' .ht-section-wrap{padding-top:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-wrap{padding-top:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-wrap{padding-top:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_padding_top', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_padding_bottom', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';

                var desktop = to;
                var tablet = wp.customize('viral_pro_' + settingId + '_tablet_padding_bottom').get();
                var mobile = wp.customize('viral_pro_' + settingId + '_mobile_padding_bottom').get();

                var css = sectionClass + ' .ht-section-wrap{padding-bottom:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-wrap{padding-bottom:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-wrap{padding-bottom:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_padding_bottom', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_tablet_padding_bottom', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';

                var desktop = wp.customize('viral_pro_' + settingId + '_padding_bottom').get();
                var tablet = to;
                var mobile = wp.customize('viral_pro_' + settingId + '_mobile_padding_bottom').get();

                var css = sectionClass + ' .ht-section-wrap{padding-bottom:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-wrap{padding-bottom:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-wrap{padding-bottom:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_padding_bottom', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_mobile_padding_bottom', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';

                var desktop = wp.customize('viral_pro_' + settingId + '_padding_bottom').get();
                var tablet = wp.customize('viral_pro_' + settingId + '_tablet_padding_bottom').get();
                var mobile = to;

                var css = sectionClass + ' .ht-section-wrap{padding-bottom:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-wrap{padding-bottom:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-wrap{padding-bottom:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_padding_bottom', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_ts_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .top-section-seperator svg{ fill:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_ts_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bs_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var css = sectionClass + ' .bottom-section-seperator svg{ fill:' + to + '}';
                viral_pro_dynamic_css('viral_pro_' + settingId + '_bs_color', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_ts_height', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var desktop = to;
                var tablet = wp.customize('viral_pro_' + settingId + '_ts_height_tablet').get();
                var mobile = wp.customize('viral_pro_' + settingId + '_ts_height_mobile').get();

                var css = sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_ts_height', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_ts_height_tablet', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var desktop = wp.customize('viral_pro_' + settingId + '_ts_height').get();
                var tablet = to;
                var mobile = wp.customize('viral_pro_' + settingId + '_ts_height_mobile').get();

                var css = sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_ts_height', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_ts_height_mobile', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var desktop = wp.customize('viral_pro_' + settingId + '_ts_height').get();
                var tablet = wp.customize('viral_pro_' + settingId + '_ts_height_tablet').get();
                var mobile = to;

                var css = sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-seperator.top-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_ts_height', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bs_height', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var desktop = to;
                var tablet = wp.customize('viral_pro_' + settingId + '_bs_height_tablet').get();
                var mobile = wp.customize('viral_pro_' + settingId + '_bs_height_mobile').get();

                var css = sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_bs_height', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bs_height_tablet', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var desktop = wp.customize('viral_pro_' + settingId + '_bs_height').get();
                var tablet = to;
                var mobile = wp.customize('viral_pro_' + settingId + '_bs_height_mobile').get();

                var css = sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_bs_height', css);
            });
        });

        wp.customize('viral_pro_' + settingId + '_bs_height_mobile', function (value) {
            value.bind(function (to) {
                var sectionClass = '.ht-' + settingId + '-section';
                var desktop = wp.customize('viral_pro_' + settingId + '_bs_height').get();
                var tablet = wp.customize('viral_pro_' + settingId + '_bs_height_tablet').get();
                var mobile = to;

                var css = sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .ht-section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                viral_pro_dynamic_css('viral_pro_' + settingId + '_bs_height', css);
            });
        });

    });

    wp.customize('viral_pro_feature_block_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-featured-post{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_feature_block_bg_color', css);
        });
    });

    wp.customize('viral_pro_featured_enable_space', function (value) {
        value.bind(function (to) {
            if ('on' == to) {
                $('.ht-featured-post-wrap').addClass('ht-featured-space-on').removeClass('ht-featured-space-off');
            } else {
                $('.ht-featured-post-wrap').addClass('ht-featured-space-off').removeClass('ht-featured-space-on');
            }
        });
    });

    wp.customize('viral_pro_featured_enable_gradient_bg', function (value) {
        value.bind(function (to) {
            if ('on' == to) {
                $('.ht-featured-post-wrap').addClass('ht-featured-gradient-on').removeClass('ht-featured-gradient-off');
            } else {
                $('.ht-featured-post-wrap').addClass('ht-featured-gradient-off').removeClass('ht-featured-gradient-on');
            }
        });
    });

    wp.customize('viral_pro_feature_block_icon_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-featured-section .ht-featured-icon i{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_feature_block_icon_color', css);
        });
    });

    wp.customize('viral_pro_feature_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-featured-post h5{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_feature_block_title_color', css);
        });
    });

    wp.customize('viral_pro_feature_block_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-featured-section .ht-featured-excerpt{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_feature_block_text_color', css);
        });
    });

    wp.customize('viral_pro_feature_block_link_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-featured-section .ht-featured-link a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_feature_block_link_color', css);
        });
    });

    wp.customize('viral_pro_about_sidebar_width', function (value) {
        value.bind(function (to) {
            var width = 100 - to;
            var css = '.ht-about-sidebar{width:' + to + '%}';
            css += '.ht-about-sec {width:' + width + '%}';
            viral_pro_dynamic_css('viral_pro_feature_block_text_color', css);
        });
    });

    wp.customize('viral_pro_tab_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-tab-wrap .ht-tab{color:' + to + '}';
            css += '.ht-tab-wrap.style4 .ht-tab span, .ht-tab-wrap.style4 .ht-tab:after{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_tab_block_title_color', css);
        });
    });

    wp.customize('viral_pro_tab_block_active_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-tab-wrap .ht-tab.ht-active,.ht-tab-wrap.style2 .ht-tab.ht-active, .ht-tab-wrap.style5 .ht-tab.ht-active{color:' + to + '}';
            css += '.ht-tab-wrap.style4 .ht-tab.ht-active span{border-color:' + to + '}';
            css += '.ht-tab-wrap.style4 .ht-tab.ht-active span:before{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_tab_block_active_title_color', css);
        });
    });

    wp.customize('viral_pro_tab_block_active_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-tab-wrap.style3 .ht-tab.ht-active{border-color:' + to + '}';
            css += '.ht-tab-wrap.style1 .ht-tab.ht-active:after,.ht-tab-wrap.style2 .ht-tab.ht-active, .ht-tab-wrap.style5 .ht-tab.ht-active, .ht-tab-wrap.style5 .ht-tab.ht-active:before,.ht-tab-wrap.style5 .ht-tab.ht-active:after{background:' + to + '}';
            css += '.ht-tab-wrap.style2 .ht-tab.ht-active:after{border-left-color:' + to + '}';
            css += '.ht-tab-section .style1 .ht-tabs{border-color:' + viral_pro_convert_hex(to, 40) + '}';
            viral_pro_dynamic_css('viral_pro_tab_block_active_bg_color', css);
        });
    });

    wp.customize('viral_pro_tab_block_content_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-tab-wrap .ht-content h5{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_tab_block_content_title_color', css);
        });
    });

    wp.customize('viral_pro_tab_block_content_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-tab-wrap .ht-content{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_tab_block_content_text_color', css);
        });
    });

    wp.customize('viral_pro_service_block_icon_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-service-section .ht-service-icon i{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_service_block_icon_color', css);
        });
    });

    wp.customize('viral_pro_service_block_icon_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-service-section .ht-service-icon i{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_service_block_icon_color', css);
        });
    });

    wp.customize('viral_pro_service_block_heading_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-service-section .ht-service-excerpt h5{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_service_block_heading_color', css);
        });
    });

    wp.customize('viral_pro_service_block_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-service-section .ht-service-text-inner, .ht-service-post-wrap.owl-carousel .owl-nav button.owl-prev i, .ht-service-post-wrap.owl-carousel .owl-nav button.owl-next i{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_service_block_text_color', css);
        });
    });

    wp.customize('viral_pro_service_block_link_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-service-section .ht-service-more,.ht-service-section.style1 .ht-service-more{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_service_block_link_color', css);
        });
    });

    wp.customize('viral_pro_service_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-service-section.style2 .ht-section-title-tagline{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_service_title_color_nborder', css);
        });
    });

    wp.customize('viral_pro_team_image_height', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-member .ht-team-image{height:' + to + 'px}';
            viral_pro_dynamic_css('viral_pro_team_image_height', css);
        });
    });

    wp.customize('viral_pro_team_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-member h5, .ht-team-designation{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_title_color', css);
        });
    });

    wp.customize('viral_pro_team_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-member h5, .ht-team-designation{color:' + to + '}';
            css += '.ht-team-member.style1 .ht-team-member-excerpt h5:after{background:' + to + '}';
            css += '.ht-team-member.style3 .ht-team-content{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_title_color', css);
        });
    });

    wp.customize('viral_pro_team_block_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-member .team-short-content,.ht-team-member a.ht-team-detail{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_text_color', css);
        });
    });

    wp.customize('viral_pro_team_block_social_icon_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-member .ht-team-social-id a, .ht-team-member.style4 .ht-team-social-id a,.ht-team-member.style3 .ht-team-social-id a{color:' + to + ';border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_social_icon_color', css);
        });
    });

    wp.customize('viral_pro_team_block_carousel_arrow_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-carousel.owl-carousel .owl-nav .owl-prev, .ht-team-carousel.owl-carousel .owl-nav .owl-next{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_carousel_arrow_bg_color', css);
        });
    });

    wp.customize('viral_pro_team_block_carousel_arrow_bg_color_hover', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-carousel.owl-carousel .owl-nav .owl-prev:hover, .ht-team-carousel.owl-carousel .owl-nav .owl-next:hover{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_carousel_arrow_bg_color_hover', css);
        });
    });

    wp.customize('viral_pro_team_block_carousel_arrow_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-carousel.owl-carousel .owl-nav .owl-prev, .ht-team-carousel.owl-carousel .owl-nav .owl-next{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_carousel_arrow_color', css);
        });
    });

    wp.customize('viral_pro_team_block_carousel_arrow_color_hover', function (value) {
        value.bind(function (to) {
            var css = '.ht-team-carousel.owl-carousel .owl-nav .owl-prev:hover, .ht-team-carousel.owl-carousel .owl-nav .owl-next:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_team_block_carousel_arrow_color_hover', css);
        });
    });

    wp.customize('viral_pro_counter_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-counter-section .ht-counter-title{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_counter_block_title_color', css);
        });
    });

    wp.customize('viral_pro_counter_block_number_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-counter-section .ht-counter-count{color:' + to + '}';
            css += '.ht-counter-section .style4 .ht-counter-count:after{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_counter_block_number_color', css);
        });
    });

    wp.customize('viral_pro_counter_block_icon_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-counter-section .ht-counter-icon{color:' + to + '}';
            css += '.ht-counter-section .style1 .ht-counter-icon:after, .ht-counter-section .style1 .ht-counter-icon:before{background:' + to + '}';
            css += '.ht-counter-section .style3 .ht-counter:after{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_counter_block_icon_color', css);
        });
    });

    wp.customize('viral_pro_testimonial_block_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-testimonial-wrap.style1 .ht-testimonial, .ht-testimonial-section .style3 .ht-testimonial-box, .ht-testimonial-section .style4 .ht-testimonial-box, .ht-testimonial-section .style4 .ht-testimonial-box img{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_testimonial_block_bg_color', css);
        });
    });

    wp.customize('viral_pro_testimonial_block_name_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-testimonial-wrap h5{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_testimonial_block_name_color', css);
        });
    });

    wp.customize('viral_pro_testimonial_block_designation_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-testimonial-wrap .designation{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_testimonial_block_designation_color', css);
        });
    });

    wp.customize('viral_pro_testimonial_block_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-testimonial-wrap .ht-testimonial-excerpt{color:' + to + '}';
            css += '.ht-testimonial-section .style3 .ht-testimonial-excerpt:after{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_testimonial_block_text_color', css);
        });
    });

    wp.customize('viral_pro_testimonial_block_arrow_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-testimonial-section .style4 .owl-nav [class^="owl-"]{color:' + to + '}';
            css += '.ht-testimonial-wrap.style1 .owl-dots .owl-dot, .ht-testimonial-section .style2 .slick-dots li{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_testimonial_block_arrow_color', css);
        });
    });

    wp.customize('viral_pro_pricing_block_highlight_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-pricing.style1:hover .ht-pricing-header,.ht-pricing.style1:hover .ht-pricing-button a, .ht-pricing.style1.ht-featured .ht-pricing-header, .ht-pricing.style1.ht-featured .ht-pricing-button a, .ht-pricing.style2:hover .ht-pricing-header, .ht-pricing.style2 .ht-pricing-button a, .ht-pricing.style2.ht-featured .ht-pricing-header, .ht-pricing.style3, .ht-pricing.style4 .ht-pricing-header, .ht-pricing.style4 .ht-pricing-button{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_pricing_block_highlight_color', css);
        });
    });

    wp.customize('viral_pro_pricing_block_highlight_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-pricing.style1:hover .ht-pricing-header *,.ht-pricing.style1:hover .ht-pricing-button a, .ht-pricing.style1.ht-featured .ht-pricing-header *, .ht-pricing.style1.ht-featured .ht-pricing-button a, .ht-pricing.style2:hover .ht-pricing-header *, .ht-pricing.style2 .ht-pricing-button a, .ht-pricing.style2.ht-featured .ht-pricing-header *, .ht-pricing.style3 .ht-pricing-header h5, .ht-pricing.style3, .ht-pricing.style4 .ht-pricing-header *, .ht-pricing.style4 .ht-pricing-button a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_pricing_block_highlight_text_color', css);
        });
    });

    wp.customize('viral_pro_news_block_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-wrap.style1 .ht-news, .ht-news-section .style2 .ht-news-content{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_bg_color', css);
        });
    });

    wp.customize('viral_pro_news_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-content h5{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_title_color', css);
        });
    });

    wp.customize('viral_pro_news_block_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-section .ht-news-text{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_text_color', css);
        });
    });

    wp.customize('viral_pro_news_block_button_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-section .ht-news-link, .ht-news-wrap.owl-carousel .owl-nav button.owl-prev, .ht-news-wrap.owl-carousel .owl-nav button.owl-next{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_button_bg_color', css);
        });
    });

    wp.customize('viral_pro_news_block_button_bg_color_hover', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-section .ht-news-link:hover, .ht-news-wrap.owl-carousel .owl-nav button.owl-prev:hover, .ht-news-wrap.owl-carousel .owl-nav button.owl-next:hover{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_button_bg_color_hover', css);
        });
    });

    wp.customize('viral_pro_news_block_button_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-section .ht-news-link, .ht-news-wrap.owl-carousel .owl-nav button.owl-prev, .ht-news-wrap.owl-carousel .owl-nav button.owl-next{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_button_text_color', css);
        });
    });

    wp.customize('viral_pro_news_block_button_text_color_hover', function (value) {
        value.bind(function (to) {
            var css = '.ht-news-section .ht-news-link:hover, .ht-news-wrap.owl-carousel .owl-nav button.owl-prev:hover, .ht-news-wrap.owl-carousel .owl-nav button.owl-next:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_news_block_button_text_color_hover', css);
        });
    });

    wp.customize('viral_pro_blog_block_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-blog-excerpt h5 a{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_blog_block_title_color', css);
        });
    });

    wp.customize('viral_pro_blog_block_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-blog-section .ht-blog-excerpt, .ht-blog-section .ht-blog-footer{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_blog_block_text_color', css);
        });
    });

    wp.customize('viral_pro_blog_block_read_more_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-blog-section .ht-blog-read-more a{color:' + to + '}';
            css += '.ht-blog-section .style3 .ht-blog-date{background:' + to + '}';
            css += '.ht-blog-section .style3 .ht-blog-post{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_blog_block_read_more_color', css);
        });
    });

    wp.customize('viral_pro_blog_image_height', function (value) {
        value.bind(function (to) {
            var css = '.ht-blog-section .ht-blog-thumbnail{height:' + to + 'px}';
            viral_pro_dynamic_css('viral_pro_blog_image_height', css);
        });
    });

    wp.customize('viral_pro_highlight_fullwidth', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.ht-highlight-content').addClass('ht-fullwidth-container');
            } else {
                $('.ht-highlight-content').removeClass('ht-fullwidth-container');
            }
        });
    });

    wp.customize('viral_pro_cta_button1_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-cta-buttons a.ht-cta-button1{background:' + to + '}';
            css += '.ht-cta-buttons a.ht-cta-button2:hover{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_cta_button1_bg_color', css);
        });
    });

    wp.customize('viral_pro_cta_button1_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-cta-buttons a.ht-cta-button1{color:' + to + '}';
            css += '.ht-cta-buttons a.ht-cta-button2:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_cta_button1_text_color', css);
        });
    });

    wp.customize('viral_pro_cta_button2_bg_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-cta-buttons a.ht-cta-button2{background:' + to + '}';
            css += '.ht-cta-buttons a.ht-cta-button1:hover{background:' + to + '}';
            viral_pro_dynamic_css('viral_pro_cta_button2_bg_color', css);
        });
    });

    wp.customize('viral_pro_cta_button2_text_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-cta-buttons a.ht-cta-button2{color:' + to + '}';
            css += '.ht-cta-buttons a.ht-cta-button1:hover{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_cta_button2_text_color', css);
        });
    });

    wp.customize('viral_pro_cta_video_icon_color', function (value) {
        value.bind(function (to) {
            var css = '#cta-video .video-play-button:after{background-color:' + to + '}';
            css += '#cta-video .video-play-button:before{background-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_cta_video_icon_color', css);
        });
    });

    wp.customize('viral_pro_contact_title_color', function (value) {
        value.bind(function (to) {
            var css = '.ht-contact-section h1,.ht-contact-section h2,.ht-contact-section h3,.ht-contact-section h4,.ht-contact-section h5,.ht-contact-section h6{color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_contact_title_color', css);
        });
    });

    wp.customize('viral_pro_contact_form_field_color', function (value) {
        value.bind(function (to) {
            var css = '#ht-contact-section .ht-contact-form input[type="text"], #ht-contact-section .ht-contact-form input[type="email"], #ht-contact-section .ht-contact-form input[type="url"], #ht-contact-section .ht-contact-form input[type="password"], #ht-contact-section .ht-contact-form input[type="search"], #ht-contact-section .ht-contact-form input[type="number"], #ht-contact-section .ht-contact-form input[type="tel"], #ht-contact-section .ht-contact-form input[type="range"], #ht-contact-section .ht-contact-form input[type="date"], #ht-contact-section .ht-contact-form input[type="month"], #ht-contact-section .ht-contact-form input[type="week"], #ht-contact-section .ht-contact-form input[type="time"], #ht-contact-section .ht-contact-form input[type="datetime"], #ht-contact-section .ht-contact-form input[type="datetime-local"], #ht-contact-section .ht-contact-form input[type="color"],#ht-contact-section .ht-contact-form textarea, #ht-contact-section .ht-contact-form select{border-color:' + to + '}';
            viral_pro_dynamic_css('viral_pro_contact_form_field_color', css);
        });
    });

    wp.customize('viral_pro_contact_button_bg_color', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-form button, #ht-contact-section .ht-contact-form input[type='button'], #ht-contact-section .ht-contact-form input[type='reset'], #ht-contact-section .ht-contact-form input[type='submit']{background-color:" + to + ";border-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_contact_button_bg_color', css);
        });
    });

    wp.customize('viral_pro_contact_button_text_color', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-form button, #ht-contact-section .ht-contact-form input[type='button'], #ht-contact-section .ht-contact-form input[type='reset'], #ht-contact-section .ht-contact-form input[type='submit']{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_contact_button_text_color', css);
        });
    });

    wp.customize('viral_pro_contact_button_bg_color_hover', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-form button:hover, #ht-contact-section .ht-contact-form input[type='button']:hover, #ht-contact-section .ht-contact-form input[type='reset']:hover, #ht-contact-section .ht-contact-form input[type='submit']:hover{background-color:" + to + ";border-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_contact_button_bg_color_hover', css);
        });
    });

    wp.customize('viral_pro_contact_button_text_color_hover', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-form button:hover, #ht-contact-section .ht-contact-form input[type='button']:hover, #ht-contact-section .ht-contact-form input[type='reset']:hover, #ht-contact-section .ht-contact-form input[type='submit']:hover{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_contact_button_text_color_hover', css);
        });
    });

    wp.customize('viral_pro_social_icon_bg_color', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-social-icon a{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_social_icon_bg_color', css);
        });
    });

    wp.customize('viral_pro_social_icon_color', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-social-icon a{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_social_icon_color', css);
        });
    });

    wp.customize('viral_pro_social_icon_bg_color_hover', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-social-icon a:hover{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_social_icon_bg_color_hover', css);
        });
    });

    wp.customize('viral_pro_social_icon_color_hover', function (value) {
        value.bind(function (to) {
            var css = "#ht-contact-section .ht-contact-social-icon a:hover{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_social_icon_color_hover', css);
        });
    });

    wp.customize('viral_pro_portfolio_tab_text_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-cat-name-list .ht-portfolio-cat-name{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolio_tab_text_color', css);
        });
    });

    wp.customize('viral_pro_portfolio_activetab_text_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-cat-name-list .ht-portfolio-cat-name.active, .ht-portfolio-cat-name-list .ht-portfolio-cat-name:hover{color:" + to + "}";
            css += ".ht-portfolio-cat-name-list.style1 .ht-portfolio-cat-name:hover:after, .ht-portfolio-cat-name-list.style1 .ht-portfolio-cat-name.active:after, .ht-portfolio-cat-name-list.style2 .ht-portfolio-cat-name.active:after, .ht-portfolio-cat-name-list.style2 .ht-portfolio-cat-name:hover:after{background:" + to + "}"
            viral_pro_dynamic_css('viral_pro_portfolio_activetab_text_color', css);
        });
    });

    wp.customize('viral_pro_portfolio_activetab_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-cat-name-list.style4 .ht-portfolio-cat-name.active, .ht-portfolio-cat-name-list.style4 .ht-portfolio-cat-name:hover, .ht-portfolio-cat-name-list.style3 .ht-portfolio-cat-name.active, .ht-portfolio-cat-name-list.style3 .ht-portfolio-cat-name:hover{background:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolio_activetab_bg_color', css);
        });
    });

    wp.customize('viral_pro_portfolio_image_hover_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-caption:after, .ht-portfolio-cat-name-list.style3 .ht-portfolio-switch, .ht-portfolio-cat-name-list.style3 .ht-portfolio-cat-wrap{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolio_image_hover_bg_color', css);
        });
    });

    wp.customize('viral_pro_portfolio_title_icon_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-caption h5, .ht-portfolio-caption a{color:" + to + "}";
            css += ".ht-portfolio-caption h5:after{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolio_title_icon_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_tab_text_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-carousel-button .ht-portfolio-filter-btn{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_tab_text_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_activetab_text_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-carousel-button .ht-portfolio-filter-btn.btn-active, .ht-portfolio-carousel-button .ht-portfolio-filter-btn:hover,.ht-portfolio-carousel-button.style2 .ht-portfolio-filter-btn.btn-active, .ht-portfolio-carousel-button.style2 .ht-portfolio-filter-btn:hover{color:" + to + "}";
            css += ".ht-portfolio-carousel-button.style1 .ht-portfolio-filter-btn:after, .ht-portfolio-carousel-button.style1 .ht-portfolio-filter-btn:hover:after,.ht-portfolio-carousel-button.style2 .ht-portfolio-filter-btn.btn-active:after, .ht-portfolio-carousel-button.style2 .ht-portfolio-filter-btn:hover:after{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_activetab_text_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_activetab_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-carousel-button.style4 .ht-portfolio-filter-btn.btn-active, .ht-portfolio-carousel-button.style4 .ht-portfolio-filter-btn:hover, .ht-portfolio-carousel-button.style3 .ht-portfolio-filter-btn.btn-active,  .ht-portfolio-carousel-button.style3 .ht-portfolio-filter-btn:hover{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_activetab_bg_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_title_icon_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-carousel-image-wrap h5:before, .ht-portfolio-carousel-image-wrap .ht-portfolio-carousel-image, .ht-portfolio-carousel-image-wrap .ht-portfolio-carousel-link, .ht-portfolio-carousel-button.style3 .ht-portfolio-switch, .ht-portfolio-carousel-button.style3 .ht-portfolio-filter-wrap{background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_title_icon_bg_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_title_icon_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-carousel-image-wrap h5, .ht-portfolio-carousel-image-wrap .ht-portfolio-carousel-image, .ht-portfolio-carousel-image-wrap .ht-portfolio-carousel-link{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_title_icon_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_carousel_dot_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-carousel .owl-carousel .owl-dot{background:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_carousel_dot_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_carousel_arrow_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-slider .ht-owl-nav .owl-prev, .ht-portfolio-slider .ht-owl-nav .owl-next{background:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_carousel_arrow_bg_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_carousel_arrow_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-slider .ht-owl-nav .owl-prev, .ht-portfolio-slider .ht-owl-nav .owl-next{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_carousel_arrow_color', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_carousel_arrow_bg_color_hover', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-slider .ht-owl-nav .owl-prev:hover, .ht-portfolio-slider .ht-owl-nav .owl-next:hover{background:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_carousel_arrow_bg_color_hover', css);
        });
    });

    wp.customize('viral_pro_portfolioslider_carousel_arrow_color_hover', function (value) {
        value.bind(function (to) {
            var css = ".ht-portfolio-slider .ht-owl-nav .owl-prev:hover, .ht-portfolio-slider .ht-owl-nav .owl-next:hover{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_portfolioslider_carousel_arrow_color_hover', css);
        });
    });

    wp.customize('viral_pro_content_header_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-main-content h1, .ht-main-content h2, .ht-main-content h3, .ht-main-content h4, .ht-main-content h5, .ht-main-content h6{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_content_header_color', css);
        });
    });

    wp.customize('viral_pro_content_text_color', function (value) {
        value.bind(function (to) {
            var borderColor = viral_pro_convert_hex(to, 10);
            var css = ".ht-main-content{color:" + to + "}";
            css += ".ht-sidebar-style2 .widget-area .widget, .ht-sidebar-style2 .widget-area .widget-title, .ht-sidebar-style2 #reply-title, .ht-sidebar-style2 .comments-title, .ht-sidebar-style2 .viral-pro-related-post .related-post-title, .ht-sidebar-style3 .widget-area .widget{border-color:" + borderColor + "}";
            viral_pro_dynamic_css('viral_pro_content_text_color', css);
        });
    });

    wp.customize('viral_pro_content_link_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-main-content a{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_content_link_color', css);
        });
    });

    wp.customize('viral_pro_content_link_hov_color', function (value) {
        value.bind(function (to) {
            var css = ".ht-main-content a:hover{color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_content_link_hov_color', css);
        });
    });

    wp.customize('viral_pro_content_widget_title_color', function (value) {
        value.bind(function (to) {
            var css = ".widget-area .widget-title, #reply-title, #comments .comments-title, .viral-pro-related-post .related-post-title{color:" + to + "}";
            css += ".ht-sidebar-style1 .widget-area .widget-title:after, .ht-sidebar-style1 #reply-title:after, .ht-sidebar-style1 .comments-title:after, .ht-sidebar-style1 .viral-pro-related-post .related-post-title:after, .ht-sidebar-style3 .widget-area .widget-title:after,.ht-sidebar-style3 #reply-title:after.ht-sidebar-style3 .comments-title:after,.ht-sidebar-style3 .viral-pro-related-post .related-post-title:after {background-color:" + to + "}";
            viral_pro_dynamic_css('viral_pro_content_widget_title_color', css);
        });
    });

    wp.customize('viral_pro_sidebar_style', function (value) {
        value.bind(function (to) {
            $('body').removeClass('ht-sidebar-style1 ht-sidebar-style2 ht-sidebar-style3').addClass('ht-' + to);
        });
    });

})(jQuery);