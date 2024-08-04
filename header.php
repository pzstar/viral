<?php
/**
 * @package Viral
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <?php
        $viral_full_width_menu_bar = get_theme_mod('viral_full_width_menu_bar', false);
        $viral_disable_menu_shadow = get_theme_mod('viral_disable_menu_shadow', false);
        $navigation_class = $viral_full_width_menu_bar ? 'vl-full-width-navigation' : '';
        $header_class = $viral_disable_menu_shadow ? 'vl-no-header-shadow' : '';
        ?>
        <div id="vl-page">
            <a class="skip-link screen-reader-text" href="#sq-content"><?php esc_html_e('Skip to content', 'viral'); ?></a>
            <header id="vl-masthead" class="vl-site-header <?php echo esc_attr($header_class); ?>" <?php echo viral_get_schema_attribute('header'); ?>>
                <div class="vl-top-header">
                    <div class="vl-container vl-clearfix">
                        <div class="vl-top-left-header">
                            <?php
                            /*
                             * Left Header Hook
                             * @hooked - viral_show_date - 10
                             * @hooked - viral_header_text - 10
                             * @hooked - viral_top_menu - 10
                             */
                            do_action('viral_left_header_content')
                                ?>
                        </div>

                        <div class="vl-top-right-header">
                            <?php
                            /*
                             * Right Header Hook
                             * @hooked - viral_social_links - 10
                             */
                            do_action('viral_right_header_content')
                                ?>
                        </div>
                    </div>
                </div>

                <div class="vl-header">
                    <div class="vl-container">
                        <?php
                        if (!is_active_sidebar('viral-header-ads')) {
                            $branding_class = 'vl-center-logo';
                        } else {
                            $branding_class = '';
                        }
                        ?>
                        <div id="vl-site-branding" class="<?php echo esc_attr($branding_class); ?>" <?php echo viral_get_schema_attribute('logo'); ?>>
                            <?php
                            if (function_exists('has_custom_logo') && has_custom_logo()):
                                the_custom_logo();
                            else:
                                if (is_front_page()):
                                    ?>
                                    <h1 class="vl-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php else: ?>
                                    <p class="vl-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                <?php endif; ?>
                                <p class="vl-site-description"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('description'); ?></a></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->

                        <?php if (is_active_sidebar('viral-header-ads')) { ?>
                            <div class="vl-header-ads">
                                <?php dynamic_sidebar('viral-header-ads'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if (viral_is_amp()) { ?>
                    <nav id="vl-site-navigation" class="vl-main-navigation <?php echo esc_attr($navigation_class); ?>" <?php echo viral_get_schema_attribute('navigation'); ?>>
                        <div class="vl-container">
                            <span class="vl-toggle-menu" aria-expanded="false" <?php viral_amp_menu_toggle(); ?>><span></span></span>

                            <div id="vl-amp-navigation" <?php viral_amp_menu_is_toggled(); ?>>
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'vl-menu vl-clearfix',
                                        'menu_class' => 'vl-clearfix',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </nav>
                <?php } else { ?>
                    <nav id="vl-site-navigation" class="vl-main-navigation <?php echo esc_attr($navigation_class); ?>">
                        <div class="vl-container">
                            <a href="#" class="vl-toggle-menu"><span></span></a>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container_class' => 'vl-menu vl-clearfix',
                                    'menu_class' => 'vl-clearfix',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                )
                            );
                            ?>
                        </div>
                    </nav>
                <?php } ?>
                <?php if (!$viral_disable_menu_shadow) { ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/shadow.png'); ?>" alt="<?php esc_attr_e('Shadow', 'viral'); ?>">
                <?php } ?>
            </header>

            <div id="vl-content" class="vl-site-content">