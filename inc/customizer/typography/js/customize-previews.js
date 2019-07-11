jQuery(document).ready(function () {

    wp.customize(
            'body_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{font-family:' + to + '}';
                            viral_pro_dynamic_css('body_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'body_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('body_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'body_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{text-transform:' + to + '}';
                            viral_pro_dynamic_css('body_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'body_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('body_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'body_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('body_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'body_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{line-height:' + to + '}';
                            viral_pro_dynamic_css('body_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'body_color',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'html, body, button, input, select, textarea, .megamenu-category .mega-post-title{color:' + to + '}';
                            viral_pro_dynamic_css('body_color', css);
                        }
                );
            }
    );

    /*=== Menu ===*/
    wp.customize(
            'menu_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = '.ht-main-navigation, .ht-menu > ul > li > a, a.ht-header-bttn{font-family:' + to + ';font-weight:normal;font-style:normal}';
                            viral_pro_dynamic_css('menu_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'menu_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = '.ht-menu > ul > li > a, a.ht-header-bttn{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('menu_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'menu_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-menu > ul > li > a, a.ht-header-bttn{text-transform:' + to + '}';
                            viral_pro_dynamic_css('menu_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'menu_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-menu > ul > li > a, a.ht-header-bttn{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('menu_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'menu_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-main-navigation, .ht-menu > ul > li > a, a.ht-header-bttn{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('menu_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'menu_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-menu > ul > li > a, a.ht-header-bttn{line-height:' + to + '}';
                            viral_pro_dynamic_css('menu_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'menu_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-menu > ul > li > a, a.ht-header-bttn{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('menu_letter_spacing', css);
                        }
                );
            }
    );

    /*=== Page Title ===*/
    wp.customize(
            'page_title_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = '.ht-main-title{font-family:' + to + ';font-weight:normal;font-style:normal}';
                            viral_pro_dynamic_css('page_title_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'page_title_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = '.ht-main-title{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('page_title_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'page_title_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-main-title{text-transform:' + to + '}';
                            viral_pro_dynamic_css('page_title_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'page_title_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-main-title{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('page_title_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'page_title_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-main-title{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('page_title_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'page_title_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-main-title{line-height:' + to + '}';
                            viral_pro_dynamic_css('page_title_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'page_title_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-main-title{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('page_title_letter_spacing', css);
                        }
                );
            }
    );

    /*=== Section Title ===*/
    wp.customize(
            'section_title_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = '.ht-section-title{font-family:' + to + '}';
                            viral_pro_dynamic_css('section_title_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'section_title_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = '.ht-section-title{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('section_title_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'section_title_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-section-title{text-transform:' + to + '}';
                            viral_pro_dynamic_css('section_title_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'section_title_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-section-title{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('section_title_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'section_title_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-section-title{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('section_title_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'section_title_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-section-title{line-height:' + to + '}';
                            viral_pro_dynamic_css('section_title_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'section_title_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-section-title{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('section_title_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h> === */
    wp.customize(
            'h_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{font-family:' + to + '}';
                            viral_pro_dynamic_css('h_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var $header_font_size = parseInt(to);
                            var $font_size = $header_font_size - 16;
                            var $font_increment = parseInt($font_size / 6);
                            var $h2_font_size = $header_font_size - $font_increment;
                            var $h3_font_size = $header_font_size - $font_increment * 2;
                            var $h4_font_size = $header_font_size - $font_increment * 3;
                            var $h5_font_size = $header_font_size - $font_increment * 4;
                            var $h6_font_size = $header_font_size - $font_increment * 5;
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{font-size:' + $header_font_size + 'px}';
                            css += 'h2{font-size:' + $h2_font_size + 'px}';
                            css += 'h3{font-size:' + $h3_font_size + 'px}';
                            css += 'h4{font-size:' + $h4_font_size + 'px}';
                            css += 'h5{font-size:' + $h5_font_size + 'px}';
                            css += 'h6{font-size:' + $h6_font_size + 'px}';
                            viral_pro_dynamic_css('h_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'h_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{line-height:' + to + '}';
                            viral_pro_dynamic_css('h_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title, h2, h3, h4, h5, h6{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h1> === */
    wp.customize(
            'h1_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{font-family:' + to + '}';
                            viral_pro_dynamic_css('h1_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h1_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h1_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h1_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h1_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h1_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h1_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h1_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('h1_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'h1_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{line-height:' + to + '}';
                            viral_pro_dynamic_css('h1_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h1_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1, .ht-site-title, .entry-header div.entry-title{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h1_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h2> === */
    wp.customize(
            'h2_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h2{font-family:' + to + '}';
                            viral_pro_dynamic_css('h2_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h2_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h2{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h2_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h2_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h1{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h2_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h2_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h2{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h2_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h2_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h2{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('h2_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'h2_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h2{line-height:' + to + '}';
                            viral_pro_dynamic_css('h2_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h2_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h2{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h2_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h3> === */
    wp.customize(
            'h3_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h3{font-family:' + to + '}';
                            viral_pro_dynamic_css('h3_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h3_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h3{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h3_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h3_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h3{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h3_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h3_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h3{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h3_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h3_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h3{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('h3_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'h3_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h3{line-height:' + to + '}';
                            viral_pro_dynamic_css('h3_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h3_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h3{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h3_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h4> === */
    wp.customize(
            'h4_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h4{font-family:' + to + '}';
                            viral_pro_dynamic_css('h4_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h4_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h4{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h4_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h4_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h4{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h4_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h4_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h4{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h4_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h4_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = '.ht-section-title{line-height:' + to + '}';
                            viral_pro_dynamic_css('h4_font_size', css);
                            jQuery('body h4').css('font-size', to + 'px');
                        }
                );
            }
    );

    wp.customize(
            'h4_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h4{line-height:' + to + '}';
                            viral_pro_dynamic_css('h4_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h4_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h4{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h4_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h5> === */
    wp.customize(
            'h5_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h5{font-family:' + to + '}';
                            viral_pro_dynamic_css('h5_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h5_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h5{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h5_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h5_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h5{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h5_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h5_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h5{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h5_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h5_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h5{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('h5_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'h5_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h5{line-height:' + to + '}';
                            viral_pro_dynamic_css('h5_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h5_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h5{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h5_letter_spacing', css);
                        }
                );
            }
    );

    /* === <h6> === */
    wp.customize(
            'h6_font_family',
            function (value) {
                value.bind(
                        function (to) {
                            if (to != 'Courier' && to != 'Times' && to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica') {
                                WebFont.load({
                                    google: {
                                        families: [to]
                                    }
                                });
                            }
                            var css = 'h6{font-family:' + to + '}';
                            viral_pro_dynamic_css('h6_font_family', css);
                        }
                );
            }
    );

    wp.customize(
            'h6_font_style',
            function (value) {
                value.bind(
                        function (to) {
                            var weight = to.replace(/\D/g, '');
                            var style = to.replace(/\d+/g, '');
                            if ('' == style) {
                                style = 'normal';
                            }
                            var css = 'h6{font-weight:' + weight + ';font-style:' + style + '}';
                            viral_pro_dynamic_css('h6_font_style', css);
                        }
                );
            }
    );

    wp.customize(
            'h6_text_transform',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h6{text-transform:' + to + '}';
                            viral_pro_dynamic_css('h6_text_transform', css);
                        }
                );
            }
    );

    wp.customize(
            'h6_text_decoration',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h6{text-decoration:' + to + '}';
                            viral_pro_dynamic_css('h6_text_decoration', css);
                        }
                );
            }
    );

    wp.customize(
            'h6_font_size',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h6{font-size:' + to + 'px}';
                            viral_pro_dynamic_css('h6_font_size', css);
                        }
                );
            }
    );

    wp.customize(
            'h6_line_height',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h6{line-height:' + to + '}';
                            viral_pro_dynamic_css('h6_line_height', css);
                        }
                );
            }
    );

    wp.customize(
            'h6_letter_spacing',
            function (value) {
                value.bind(
                        function (to) {
                            var css = 'h6{letter-spacing:' + to + 'px}';
                            viral_pro_dynamic_css('h6_letter_spacing', css);
                        }
                );
            }
    );


}); // jQuery( document ).ready
