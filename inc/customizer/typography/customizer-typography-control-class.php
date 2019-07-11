<?php

/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */
class Viral_Pro_Typography_Control extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'typography';

    /**
     * Array 
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $l10n = array();

    /**
     * Set up our control.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @param  string  $id
     * @param  array   $args
     * @return void
     */
    public function __construct($manager, $id, $args = array()) {
        // Let the parent class do its thing.
        parent::__construct($manager, $id, $args);
        // Make sure we have labels.
        $this->l10n = wp_parse_args(
                $this->l10n, array(
            'family' => esc_html__('Font Family', 'viral-pro'),
            'style' => esc_html__('Font Weight/Style', 'viral-pro'),
            'text_transform' => esc_html__('Text Transform', 'viral-pro'),
            'text_decoration' => esc_html__('Text Decoration', 'viral-pro'),
            'size' => esc_html__('Font Size', 'viral-pro'),
            'line_height' => esc_html__('Line Height', 'viral-pro'),
            'letter_spacing' => esc_html__('Letter Spacing', 'viral-pro'),
            'typocolor' => esc_html__('Font Color', 'viral-pro')
                )
        );
    }

    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {
        
    }

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function to_json() {
        parent::to_json();
        // Loop through each of the settings and set up the data for it.
        $this->json['inputAttrs'] = '';
        foreach ($this->input_attrs as $attr => $value) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
        }

        foreach ($this->settings as $setting_key => $setting_id) {
            $this->json[$setting_key] = array(
                'link' => $this->get_link($setting_key),
                'value' => $this->value($setting_key),
                'label' => isset($this->l10n[$setting_key]) ? $this->l10n[$setting_key] : ''
            );

            if ('family' === $setting_key) {
                $this->json[$setting_key]['google_choices'] = $this->get_google_font_families();
                $this->json[$setting_key]['standard_choices'] = $this->get_standard_font_families();
            } elseif ('style' === $setting_key) {
                $this->json[$setting_key]['choices'] = $this->get_font_weight_choices();
            } elseif ('text_transform' === $setting_key) {
                $this->json[$setting_key]['choices'] = $this->get_text_transform_choices();
            } elseif ('text_decoration' === $setting_key) {
                $this->json[$setting_key]['choices'] = $this->get_text_decoration_choices();
            }
        }
    }

    /**
     * Underscore JS template to handle the control's output.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function content_template() {
        ?>
        <# if ( data.label ) { #>
        <span class="customize-control-title">{{ data.label }}</span>
        <# } #>

        <# if ( data.description ) { #>
        <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <ul>
            <# if ( data.family && (data.family.standard_choices || data.family.google_choices) ) { #>
            <li class="typography-font-family">
                <# if ( data.family.label ) { #>
                <span class="customize-control-typo-title">{{ data.family.label }}</span>
                <# } #>

                <select {{{ data.family.link }}} id="{{ data.section }}" class="typography_face">

                    <# if ( data.family.standard_choices ) { #>
                    <optgroup label="Standard Fonts">
                        <# _.each( data.family.standard_choices, function( label, choice ) { #>
                        <option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                        <# } ) #>
                    </optgroup>
                    <# } #>

                    <# if ( data.family.google_choices ) { #>
                    <optgroup label="Google Fonts">
                        <# _.each( data.family.google_choices, function( label, choice ) { #>
                        <option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                        <# } ) #>
                    </optgroup>
                    <# } #>

                </select>
            </li>
            <# } #>

            <# if ( data.style && data.style.choices ) { #>
            <li class="typography-font-style">
                <# if ( data.style.label ) { #>
                <span class="customize-control-typo-title">{{ data.style.label }}</span>
                <# } #>
                <select {{{ data.style.link }}}>
                    <# _.each( data.style.choices, function( label, choice ) { #>
                    <option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.text_transform && data.text_transform.choices ) { #>
            <li class="typography-text-transform">
                <# if ( data.text_transform.label ) { #>
                <span class="customize-control-typo-title">{{ data.text_transform.label }}</span>
                <# } #>

                <select {{{ data.text_transform.link }}} class="typography_text_transform">

                    <# _.each( data.text_transform.choices, function( label, choice ) { #>

                    <option value="{{ choice }}" <# if ( choice === data.text_transform.value ) { #> selected="selected" <# } #>>{{ label }}</option>

                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.text_decoration && data.text_decoration.choices ) { #>
            <li class="typography-text-decoration">
                <# if ( data.text_decoration.label ) { #>
                <span class="customize-control-typo-title">{{ data.text_decoration.label }}</span>
                <# } #>

                <select {{{ data.text_decoration.link }}} class="typography_text_decoration">

                    <# _.each( data.text_decoration.choices, function( label, choice ) { #>

                    <option value="{{ choice }}" <# if ( choice === data.text_decoration.value ) { #> selected="selected" <# } #>>{{ label }}</option>

                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.size ) { #>

            <li class="typography-font-size">
                <# if ( data.size.label ) { #>
                <span class="customize-control-typo-title">{{ data.size.label }} </span>
                <# } #>

                <span class="slider-value-size" {{{ data.size.link }}} value="{{ data.size.value }}" ></span>px
                <div class="typo-slider-range slider-range-size" {{{ data.inputAttrs }}} ></div>
            </li>
            <# } #>

            <# if ( data.line_height ) { #>

            <li class="typography-line-height">
                <# if ( data.line_height.label ) { #>
                <span class="customize-control-typo-title">{{ data.line_height.label }}</span>
                <# } #>

                <span class="slider-value-line-height" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" ></span>
                <div class="typo-slider-range slider-range-line-height" ></div>             
            </li>
            <# } #>

            <# if ( data.letter_spacing ) { #>

            <li class="typography-letter-spacing">
                <# if ( data.letter_spacing.label ) { #>
                <span class="customize-control-typo-title">{{ data.letter_spacing.label }}</span>
                <# } #>

                <span class="slider-value-letter-spacing" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" ></span>
                <div class="typo-slider-range slider-range-letter-spacing" ></div>             
            </li>
            <# } #>

            <# if ( data.typocolor ) { #>
            <li class="typography-color">
                <# if ( data.typocolor.label ) { #>
                <span class="customize-control-typo-title">{{{ data.typocolor.label }}}</span>
                <# } #>

                <div class="customize-control-content">
                    <input class="color-picker-hex" type="text" maxlength="7" placeholder="<?php esc_attr_e('Hex Value', 'viral-pro'); ?>" {{{ data.typocolor.link }}} value="{{ data.typocolor.value }}"  />
                </div>
            </li>
            <# } #>

        </ul>
        <?php
    }

    /**
     * Returns the available Google font families.
     *
     * @todo Pull families from `get_google_font_families()`.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    function get_google_font_families() {

        $viral_pro_google_font = viral_pro_google_font_array();

        foreach ($viral_pro_google_font as $key => $value) {
            $font_family[$value['family']] = $value['family'];
        }
        return $font_family;
    }

    /**
     * Returns the available standard font families.
     *
     * @todo Pull families from `get_standard_font_families()`.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    function get_standard_font_families() {

        $viral_pro_standard_font = viral_pro_standard_font_array();

        foreach ($viral_pro_standard_font as $key => $value) {
            $font_family[$value['family']] = $value['family'];
        }
        return $font_family;
    }

    /**
     * Returns the available font weights.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function get_font_weight_choices() {
        if ($this->settings['family']->id) {
            $viral_pro_standard_font = viral_pro_standard_font_array();
            $viral_pro_google_font = viral_pro_google_font_array();

            $viral_pro_font = array_merge($viral_pro_standard_font, $viral_pro_google_font);

            $font_family_id = $this->settings['family']->id;
            $default_font_family = $this->settings['family']->default;
            $get_font_family = get_theme_mod($font_family_id, $default_font_family);

            $font_array = viral_pro_search_key($viral_pro_font, 'family', $get_font_family);

            $variants_array = $font_array['0']['variants'];
            return $variants_array;
        } else {
            return array(
                '400' => esc_html__('Normal', 'viral-pro'),
                '700' => esc_html__('Bold', 'viral-pro')
            );
        }
    }

    /**
     * Returns the available font text decoration.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function get_text_decoration_choices() {
        return array(
            'none' => esc_html__('None', 'viral-pro'),
            'underline' => esc_html__('Underline', 'viral-pro'),
            'line-through' => esc_html__('Line-through', 'viral-pro'),
            'overline' => esc_html__('Overline', 'viral-pro')
        );
    }

    /**
     * Returns the available font text transform.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function get_text_transform_choices() {
        return array(
            'none' => esc_html__('None', 'viral-pro'),
            'uppercase' => esc_html__('Uppercase', 'viral-pro'),
            'lowercase' => esc_html__('Lowercase', 'viral-pro'),
            'capitalize' => esc_html__('Capitalize', 'viral-pro')
        );
    }

}
