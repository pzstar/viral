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
        <div id="vl-page">
            <header id="vl-masthead" class="vl-site-header">
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
                        <div id="vl-site-branding">
                            <?php
                            if (function_exists('has_custom_logo') && has_custom_logo()) :
                                the_custom_logo();
                            else :
                                if (is_front_page()) :
                                    ?>
                                    <h1 class="vl-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php else : ?>
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

                <nav id="vl-site-navigation" class="vl-main-navigation">
                    <div class="vl-toggle-menu"><span></span></div>
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
                </nav>
                <img src="<?php echo get_template_directory_uri(); ?>/images/shadow.png" alt="<?php esc_attr_e('Shadow', 'viral'); ?>">
            </header>

            <div id="vl-content" class="vl-site-content">