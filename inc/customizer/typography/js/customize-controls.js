jQuery(document).ready(function ($) {
    // Chosen JS
    $(".hs-chosen-select, .customize-control-typography select").chosen({
        width: "100%"
    });
    
    $(document).on('change', '.typography_face', function () {
        var font_family = $(this).val();
        var $this = $(this);
        $.ajax({
            url: ajaxurl,
            data: {
                action: 'get_google_font_variants',
                font_family: font_family,
            },
            beforeSend: function () {
                $this.parent('.typography-font-family').next('.typography-font-style').addClass('typography-loading');
            },
            success: function (response) {
                $this.parent('.typography-font-family').next('.typography-font-style').removeClass('typography-loading');
                $this.parent('.typography-font-family').next('.typography-font-style').children('select').html(response).trigger("chosen:updated").trigger('change');
            }
        });
    });

    $('.typography-color .color-picker-hex').wpColorPicker({
        change: function (event, ui) {
            var setting = $(this).attr('data-customize-setting-link');
            var hexcolor = $(this).wpColorPicker('color');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(hexcolor);
            });
        }
    });

    $(".slider-range-size").each(function () {
        $(this).slider({
            range: "min",
            value: 18,
            min: parseInt($(this).attr('min')),
            max: parseInt($(this).attr('max')),
            step: parseInt($(this).attr('step')),
            slide: function (event, ui) {
                $(this).prev(".slider-value-size").text(ui.value);

                var setting = $(this).prev(".slider-value-size").attr('data-customize-setting-link');

                // Set the new value.
                wp.customize(setting, function (obj) {
                    obj.set(ui.value);
                });
            }
        });
    });

    $(".slider-range-size").each(function () {
        $(this).slider('value', $(this).prev(".slider-value-size").attr('value'));
    });


    $(".slider-range-line-height").slider({
        range: "min",
        value: 1.5,
        min: 0.8,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).prev(".slider-value-line-height").text(ui.value);
            var setting = $(this).prev(".slider-value-line-height").attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $(".slider-range-line-height").each(function () {
        $(this).slider('value', $(this).prev(".slider-value-line-height").attr('value'));
    });

    $(".slider-range-letter-spacing").slider({
        range: "min",
        value: 0,
        min: -5,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $(this).prev(".slider-value-letter-spacing").text(ui.value);
            var setting = $(this).prev(".slider-value-letter-spacing").attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $(".slider-range-letter-spacing").each(function () {
        $(this).slider('value', $(this).prev(".slider-value-letter-spacing").attr('value'));
    });

});


(function (api) {

    api.controlConstructor['typography'] = api.Control.extend({
        ready: function () {
            var control = this;

            control.container.on('change', '.typography-font-family select',
                    function () {
                        control.settings['family'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.typography-font-style select',
                    function () {
                        control.settings['style'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.typography-text-transform select',
                    function () {
                        control.settings['text_transform'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.typography-text-decoration select',
                    function () {
                        control.settings['text_decoration'].set(jQuery(this).val());
                    }
            );

        }
    });

})(wp.customize);
