<?php
/**
 * @package Viral
 */

add_action('widgets_init', 'viral_pro_register_advertisement');

function viral_pro_register_advertisement() {
    register_widget('viral_pro_advertisement');
}

class Viral_Pro_advertisement extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'viral_pro_advertisement', 'Viral : Advertisement', array(
                'description' => __('A widget to display Advertisement', 'viral-pro')
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
                'viral_pro_widgets_name' => 'title',
                'viral_pro_widgets_title' => __('Title', 'viral-pro'),
                'viral_pro_widgets_field_type' => 'text',
            ),
            'image' => array(
                'viral_pro_widgets_name' => 'image',
                'viral_pro_widgets_title' => __('Advertisement Banner', 'viral-pro'),
                'viral_pro_widgets_field_type' => 'upload',
            ),
            'link' => array(
                'viral_pro_widgets_name' => 'link',
                'viral_pro_widgets_title' => __('Advertisement Link', 'viral-pro'),
                'viral_pro_widgets_field_type' => 'url',
            ),
            'newtab' => array(
                'viral_pro_widgets_name' => 'newtab',
                'viral_pro_widgets_title' => __('Open in new tab', 'viral-pro'),
                'viral_pro_widgets_field_type' => 'checkbox',
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

        $title = isset( $instance['title'] ) ? $instance['title'] : '' ;
        $image = isset( $instance['image'] ) ? $instance['image'] : '' ;
        $link = isset( $instance['link'] ) ? $instance['link'] : '' ;
        $newtab = isset( $instance['newtab'] ) ? $instance['newtab'] : '' ;
        $target = '_self';

        if($newtab){
            $target = '_blank';
        }

        echo $before_widget;
        ?>
        <div class="vl-advertisment">
            <?php
            if (!empty($title)):
                echo $before_title . esc_html($title) . $after_title;
            endif;

            if (!empty($image)):
                echo '<div class="vl-ads-image">';
                
                if(!empty($link)){
                    echo '<a href="'.esc_url($link).'" target="'.$target.'">';
                }
                echo '<img alt="Advertisement" src="'.esc_url($image).'"/>';
                
                if(!empty($link)){
                    echo '</a>';
                }
                echo '</div>';
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
     * @uses	viral_pro_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$viral_pro_widgets_name] = viral_pro_widgets_updated_field_value($widget_field, $new_instance[$viral_pro_widgets_name]);
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
     * @uses	viral_pro_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $viral_pro_widgets_field_value = !empty($instance[$viral_pro_widgets_name]) ? esc_attr($instance[$viral_pro_widgets_name]) : '';
            viral_pro_widgets_show_widget_field($this, $widget_field, $viral_pro_widgets_field_value);
        }
    }

}
