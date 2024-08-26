<?php
/**
 * @package Viral
 */
add_action('widgets_init', 'viral_register_contact_info');

function viral_register_contact_info() {
    register_widget('viral_contact_info');
}

class viral_contact_info extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'viral_contact_info', 'Viral : Contact Info', array(
                'description' => esc_html__('A widget to display Contact Information', 'viral')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'title' => array(
                'viral_widgets_name' => 'title',
                'viral_widgets_title' => esc_html__('Title', 'viral'),
                'viral_widgets_field_type' => 'text',
            ),
            'phone' => array(
                'viral_widgets_name' => 'phone',
                'viral_widgets_title' => esc_html__('Phone', 'viral'),
                'viral_widgets_field_type' => 'text',
            ),
            'contact_info_email' => array(
                'viral_widgets_name' => 'email',
                'viral_widgets_title' => esc_html__('Email', 'viral'),
                'viral_widgets_field_type' => 'text',
            ),
            'website' => array(
                'viral_widgets_name' => 'website',
                'viral_widgets_title' => esc_html__('Website', 'viral'),
                'viral_widgets_field_type' => 'text',
            ),
            'address' => array(
                'viral_widgets_name' => 'address',
                'viral_widgets_title' => esc_html__('Contact Address', 'viral'),
                'viral_widgets_field_type' => 'textarea',
                'viral_widgets_row' => '4'
            ),
            'time' => array(
                'viral_widgets_name' => 'time',
                'viral_widgets_title' => esc_html__('Contact Time', 'viral'),
                'viral_widgets_field_type' => 'textarea',
                'viral_widgets_row' => '3'
            ),
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

        $title = isset($instance['title']) ? $instance['title'] : '';
        $phone = isset($instance['phone']) ? $instance['phone'] : '';
        $email = isset($instance['email']) ? $instance['email'] : '';
        $website = isset($instance['website']) ? $instance['website'] : '';
        $address = isset($instance['address']) ? $instance['address'] : '';
        $time = isset($instance['time']) ? $instance['time'] : '';

        echo $before_widget;
        ?>
        <div class="vl-contact-info">
            <?php
            if (!empty($title)):
                echo $before_title . esc_html($title) . $after_title;
            endif;
            ?>

            <ul>
                <?php if (!empty($phone)): ?>
                    <li><i class="mdi-cellphone-iphone"></i><?php echo esc_html($phone); ?></li>
                <?php endif; ?>

                <?php if (!empty($email)): ?>
                    <li><i class="mdi-email"></i><?php echo esc_html($email); ?></li>
                <?php endif; ?>

                <?php if (!empty($website)): ?>
                    <li><i class="mdi-earth"></i><?php echo esc_html($website); ?></li>
                <?php endif; ?>

                <?php if (!empty($address)): ?>
                    <li><i class="mdi-map-marker"></i><?php echo wpautop(esc_html($address)); ?></li>
                <?php endif; ?>

                <?php if (!empty($time)): ?>
                    <li><i class="mdi-clock-time-three"></i><?php echo wpautop(esc_html($time)); ?></li>
                <?php endif; ?>
            </ul>
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
