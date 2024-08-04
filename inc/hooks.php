<?php
/**
 * @package Viral
 */
add_action('viral_top_section', 'viral_top_section_style1');
add_action('viral_top_section', 'viral_top_section_style2');
add_action('viral_top_section', 'viral_top_section_style3');
add_action('viral_top_section', 'viral_top_section_style4');
add_action('viral_middle_section', 'viral_middle_section_style1');
add_action('viral_middle_section', 'viral_middle_section_style2');
add_action('viral_middle_section', 'viral_middle_section_style3');
add_action('viral_middle_section', 'viral_middle_section_style4');
add_action('viral_bottom_section', 'viral_bottom_section_style1');
add_action('viral_bottom_section', 'viral_bottom_section_style2');


if (!function_exists('viral_top_section_style1')) {

    function viral_top_section_style1($args) {
        $layout = $args['layout'];
        $cat = $args['cat'];
        if ($layout != 'style1')
            return;
        ?>
        <div class="vl-top-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <div class="vl-half-container">
                <?php
                $args = array(
                    'cat' => $cat,
                    'posts_per_page' => 1,
                    'ignore_sticky_posts' => true
                );
                $query = new WP_Query($args);

                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-big-thumb">
                        <div class="vl-thumb-inner">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600')
                                        ?>
                                    <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]); ?>" />
                                <?php } ?>
                            </a>

                            <?php echo get_the_category_list(); ?>

                            <div class="vl-title-container">
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php echo viral_post_date(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div class="vl-half-container">
                <?php
                $args = array(
                    'cat' => $cat,
                    'posts_per_page' => 1,
                    'ignore_sticky_posts' => true,
                    'offset' => 1
                );
                $query = new WP_Query($args);

                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-medium-thumb">
                        <div class="vl-thumb-inner">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600')
                                        ?>
                                    <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]); ?>" />
                                <?php } ?>
                            </a>

                            <?php viral_post_primary_category(); ?>

                            <div class="vl-title-container">
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php echo viral_post_date(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();

                $args = array(
                    'cat' => $cat,
                    'posts_per_page' => 2,
                    'ignore_sticky_posts' => true,
                    'offset' => 2
                );
                $query = new WP_Query($args);

                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-small-thumb">
                        <div class="vl-thumb-inner">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600')
                                        ?>
                                    <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]); ?>" />
                                <?php } ?>
                            </a>

                            <?php viral_post_primary_category(); ?>

                            <div class="vl-title-container">
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php echo viral_post_date(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('viral_top_section_style2')) {

    function viral_top_section_style2($args) {
        $layout = $args['layout'];
        $cat = $args['cat'];
        if ($layout != 'style2')
            return;
        ?>
        <div class="vl-top-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <div class="vl-half-container">
                <?php
                $args = array(
                    'cat' => $cat,
                    'posts_per_page' => 1,
                    'ignore_sticky_posts' => true
                );
                $query = new WP_Query($args);

                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-big-thumb">
                        <div class="vl-thumb-inner">
                            <a class="" href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600')
                                        ?>
                                    <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]); ?>" />
                                <?php } ?>
                            </a>

                            <?php echo get_the_category_list(); ?>

                            <div class="vl-title-container">
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php echo viral_post_date(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div class="vl-half-container">
                <?php
                $args = array(
                    'cat' => $cat,
                    'posts_per_page' => 4,
                    'ignore_sticky_posts' => true,
                    'offset' => 1
                );
                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="vl-small-thumb">
                            <div class="vl-thumb-inner">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600')
                                            ?>
                                        <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]); ?>" />
                                    <?php } ?>
                                </a>

                                <?php viral_post_primary_category(); ?>

                                <div class="vl-title-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3><?php the_title(); ?></h3>
                                        <?php echo viral_post_date(); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('viral_top_section_style3')) {

    function viral_top_section_style3($args) {
        $layout = $args['layout'];
        $cat = $args['cat'];
        if ($layout != 'style3')
            return;
        ?>
        <div class="vl-top-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <?php
            $args = array(
                'cat' => $cat,
                'posts_per_page' => 4,
                'ignore_sticky_posts' => true
            );
            $query = new WP_Query($args);

            while ($query->have_posts()):
                $query->the_post();
                ?>
                <div class="vl-big-thumb">
                    <div class="vl-thumb-inner">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600')
                                    ?>
                                <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]); ?>" />
                            <?php } ?>
                        </a>

                        <?php viral_post_primary_category(); ?>

                        <div class="vl-title-container">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <?php echo viral_post_date(); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php
    }

}

if (!function_exists('viral_top_section_style4')) {

    function viral_top_section_style4($args) {
        $layout = $args['layout'];
        $cat = $args['cat'];
        if ($layout != 'style4')
            return;
        ?>
        <div class="vl-top-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <?php
            $args = array(
                'cat' => $cat,
                'posts_per_page' => 3,
                'ignore_sticky_posts' => true,
            );
            $query = new WP_Query($args);

            while ($query->have_posts()):
                $query->the_post();
                ?>
                <div class="vl-post-item vl-clearfix">
                    <div class="vl-post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <div class="vl-thumb-container">
                                <?php
                                if (has_post_thumbnail()) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-150x150');
                                    ?>
                                    <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                <?php }
                                ?>
                            </div>
                        </a>
                    </div>

                    <div class="vl-post-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php echo viral_post_date(); ?>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php
    }

}

if (!function_exists('viral_middle_section_style1')) {

    function viral_middle_section_style1($args) {
        $cat = $args['cat'];
        $layout = $args['layout'];
        $title = $args['title'];
        if ($layout != 'style1')
            return;
        ?>
        <div class="vl-middle-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <?php if ($title) { ?>
                <h2 class="vl-block-title"><span><?php echo esc_html($title); ?></span></h2>
            <?php } ?>
            <div class="vl-clearfix vl-big-small-block">
                <?php
                $args = array(
                    'posts_per_page' => 1,
                    'ignore_sticky_posts' => true
                );

                if ($cat != '-1') {
                    $args['cat'] = $cat;
                }

                $query = new WP_Query($args);

                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-big-block">
                        <div class="vl-post-item vl-clearfix">
                            <div class="vl-post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="vl-thumb-container">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-600x600');
                                            ?>
                                            <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                        <?php }
                                        ?>
                                    </div>
                                </a>
                            </div>

                            <div class="vl-post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php echo viral_post_date(); ?>
                                <div class="vl-excerpt">
                                    <?php echo viral_excerpt(get_the_content(), 200); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
                <div class="vl-small-block">
                    <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'ignore_sticky_posts' => true,
                        'offset' => 1
                    );

                    if ($cat != '-1') {
                        $args['cat'] = $cat;
                    }

                    $query = new WP_Query($args);

                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="vl-post-item vl-clearfix">
                            <div class="vl-post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="vl-thumb-container">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-150x150');
                                            ?>
                                            <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                        <?php }
                                        ?>
                                    </div>
                                </a>
                            </div>

                            <div class="vl-post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php echo viral_post_date(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('viral_middle_section_style2')) {

    function viral_middle_section_style2($args) {
        $cat = $args['cat'];
        $layout = $args['layout'];
        $title = $args['title'];
        if ($layout != 'style2')
            return;

        $args = array(
            'posts_per_page' => 6,
            'ignore_sticky_posts' => true
        );

        if ($cat != '-1') {
            $args['cat'] = $cat;
        }

        $query = new WP_Query($args);
        ?>
        <div class="vl-middle-block <?php echo esc_attr($layout); ?>">
            <?php if ($title) { ?>
                <h2 class="vl-block-title"><span><?php echo esc_html($title); ?></span></h2>
            <?php } ?>
            <div class="vl-grid-blocks">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-grid-block">
                        <div class="vl-grid-block-inner">
                            <div class="vl-post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="vl-thumb-container">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-400x400');
                                            ?>
                                            <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                        <?php }
                                        ?>
                                    </div>

                                    <div class="vl-post-content">
                                        <h3><?php the_title(); ?></h3>
                                        <?php echo viral_post_date(); ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('viral_middle_section_style3')) {

    function viral_middle_section_style3($args) {
        $cat = $args['cat'];
        $layout = $args['layout'];
        $title = $args['title'];
        if ($layout != 'style3')
            return;
        ?>
        <div class="vl-middle-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <?php if ($title) { ?>
                <h2 class="vl-block-title"><span><?php echo esc_html($title); ?></span></h2>
            <?php } ?>
            <div class="vl-double-small-block">
                <?php
                $args = array(
                    'posts_per_page' => 8,
                    'ignore_sticky_posts' => true,
                );

                if ($cat != '-1') {
                    $args['cat'] = $cat;
                }

                $query = new WP_Query($args);

                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-post-item vl-clearfix">
                        <div class="vl-post-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <div class="vl-thumb-container">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-150x150');
                                        ?>
                                        <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                    <?php }
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class="vl-post-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php echo viral_post_date(); ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('viral_middle_section_style4')) {

    function viral_middle_section_style4($args) {
        $cat = $args['cat'];
        $layout = $args['layout'];
        $title = $args['title'];
        if ($layout != 'style4')
            return;

        $args = array(
            'posts_per_page' => 3,
            'ignore_sticky_posts' => true
        );

        if ($cat != '-1') {
            $args['cat'] = $cat;
        }

        $query = new WP_Query($args);
        ?>
        <div class="vl-middle-block <?php echo esc_attr($layout); ?>">
            <?php if ($title) { ?>
                <h2 class="vl-block-title"><span><?php echo esc_html($title); ?></span></h2>
            <?php } ?>

            <div class="vl-alternate-block">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="vl-alt-post-item vl-post-item vl-clearfix">
                        <div class="vl-post-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <div class="vl-thumb-container">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-400x400');
                                        ?>
                                        <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                    <?php }
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class="vl-post-content">
                            <div class="vl-post-content-inner">
                                <div class="vl-post-content-wrap">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php echo viral_post_date(); ?>
                                    <div class="vl-excerpt">
                                        <?php echo viral_excerpt(get_the_content(), 120); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('viral_bottom_section_style1')) {

    function viral_bottom_section_style1($args) {
        $cat1 = $args['cat1'];
        $cat2 = $args['cat2'];
        $cat3 = $args['cat3'];
        $layout = $args['layout'];
        if ($layout != 'style1')
            return;

        $cats = array($cat1, $cat2, $cat3);
        ?>
        <div class="vl-bottom-block vl-clearfix <?php echo esc_attr($layout); ?>">
            <?php
            foreach ($cats as $cat) {
                ?>
                <div class="vl-clearfix vl-three-column-block">
                    <?php
                    if ($cat) {
                        $cat_name = ($cat != -1) ? get_cat_name($cat) : esc_html__('Latest', 'viral');
                        ?>
                        <h2 class="vl-block-title"><span><?php echo esc_html($cat_name); ?></span></h2>

                        <?php
                        $args = array(
                            'posts_per_page' => 1,
                            'ignore_sticky_posts' => true
                        );

                        if ($cat != '-1') {
                            $args['cat'] = $cat;
                        }

                        $query = new WP_Query($args);
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="vl-big-post-item vl-clearfix">
                                <div class="vl-post-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="vl-thumb-container">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-400x400');
                                                ?>
                                                <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                            <?php }
                                            ?>
                                        </div>

                                        <div class="vl-post-content">
                                            <h3><?php the_title(); ?></h3>
                                            <?php echo viral_post_date(); ?>
                                            <div class="vl-post-excerpt">
                                                <?php echo viral_excerpt(get_the_content(), 60); ?>
                                            </div>
                                        </div>
                                    </a>

                                </div>


                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();

                        $args = array(
                            'posts_per_page' => 4,
                            'ignore_sticky_posts' => true,
                            'offset' => 1
                        );

                        if ($cat != '-1') {
                            $args['cat'] = $cat;
                        }

                        $query = new WP_Query($args);
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="vl-post-item vl-clearfix">
                                <div class="vl-post-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="vl-thumb-container">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-150x150');
                                                ?>
                                                <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                            <?php }
                                            ?>
                                        </div>
                                    </a>
                                </div>

                                <div class="vl-post-content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php echo viral_post_date(); ?>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    } else {
                        echo esc_html_e('Select the Category', 'viral');
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

}

if (!function_exists('viral_bottom_section_style2')) {

    function viral_bottom_section_style2($args) {
        $cat = $args['cat1'];
        $layout = $args['layout'];
        if ($layout != 'style2')
            return;

        if ($cat) {
            $cat_name = ($cat != -1) ? get_cat_name($cat) : esc_html__('Latest', 'viral')
                ?>
            <div class="vl-bottom-block vl-clearfix <?php echo esc_attr($layout); ?>">
                <h2 class="vl-block-title"><span><?php echo esc_html($cat_name); ?></span></h2>
                <div class="vl-four-column-block">
                    <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'ignore_sticky_posts' => true
                    );

                    if ($cat != '-1') {
                        $args['cat'] = $cat;
                    }

                    $query = new WP_Query($args);
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="vl-post-item vl-clearfix">
                            <div class="vl-post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="vl-thumb-container">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'viral-400x400');
                                            ?>
                                            <img alt="<?php echo esc_attr(get_the_title()) ?>" src="<?php echo esc_url($image[0]) ?>">
                                        <?php }
                                        ?>
                                    </div>
                                </a>
                            </div>

                            <div class="vl-post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php echo viral_post_date(); ?>
                                <div class="vl-post-excerpt">
                                    <?php echo viral_excerpt(get_the_content(), 120); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }
    }

}