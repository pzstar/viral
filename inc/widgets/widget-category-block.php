<?php
/**
 * @package Viral
 */
add_action('widgets_init', 'viral_register_category_block');

function viral_register_category_block() {
    register_widget('viral_category_block');
}

class viral_category_block extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'viral_category_block', 'Viral : Category Block', array(
                'description' => esc_html__('A widget to display posts filtered by category', 'viral')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $categories = get_categories();
        $cat = array();
        $cat['-1'] = esc_html__('Latest Posts', 'viral');

        foreach ($categories as $category) {
            $cat[$category->term_id] = $category->name;
        }
        $fields = array(
            'title' => array(
                'viral_widgets_name' => 'title',
                'viral_widgets_title' => esc_html__('Title', 'viral'),
                'viral_widgets_field_type' => 'text',
                'viral_widgets_default' => esc_html__('Title', 'viral')
            ),
            'category' => array(
                'viral_widgets_name' => 'category',
                'viral_widgets_title' => esc_html__('Select Category', 'viral'),
                'viral_widgets_field_type' => 'select',
                'viral_widgets_field_options' => $cat
            ),
            'post_no' => array(
                'viral_widgets_name' => 'post_no',
                'viral_widgets_title' => esc_html__('No of Posts', 'viral'),
                'viral_widgets_field_type' => 'number',
                'viral_widgets_default' => 5,
            )
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);

        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Title', 'viral');
        $category = isset($instance['category']) ? $instance['category'] : '';
        $post_no = isset($instance['post_no']) ? $instance['post_no'] : '';

        echo $before_widget;
        ?>
        <div class="vl-category_block">
            <?php
            if (!empty($title)):
                echo $before_title . esc_html($title) . $after_title;
            endif;

            if (empty($post_no) || !is_int($post_no)):
                $post_no = 5;
            endif;

            if (!empty($category)):

                $args = array(
                    'posts_per_page' => $post_no
                );

                if ($category != '-1') {
                    $args['cat'] = $category;
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

            endif;
            ?>
        </div>
        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	viral_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            $new = isset($new_instance[$viral_widgets_name]) ? $new_instance[$viral_widgets_name] : '';
            // Use helper function to get updated field values
            $instance[$viral_widgets_name] = viral_widgets_updated_field_value($widget_field, $new);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	viral_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $viral_widgets_field_value = !empty($instance[$viral_widgets_name]) ? esc_attr($instance[$viral_widgets_name]) : '';
            viral_widgets_show_widget_field($this, $widget_field, $viral_widgets_field_value);
        }
    }

}
