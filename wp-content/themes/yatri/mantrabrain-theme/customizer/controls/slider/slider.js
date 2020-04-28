/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriSliderControl = {
        init: function () {


            this.initSlider();

        },
        initSlider: function ($el) {
            if ($(".yatri-slider", $el).length > 0) {
                $(".yatri-slider", $el).each(function () {
                    var slider = $(this);
                    var p = slider.parent();
                    var input = $("input", p);
                    var min = slider.data("min") || 0;
                    var max = slider.data("max") || 300;
                    var step = slider.data("step") || 1;
                    if (!_.isNumber(min)) {
                        min = 0;
                    }

                    if (!_.isNumber(max)) {
                        max = 300;
                    }

                    if (!_.isNumber(step)) {
                        step = 1;
                    }

                    var current_val = input.val();
                    slider.slider({
                        range: "min",
                        value: current_val,
                        step: step,
                        min: min,
                        max: max,
                        slide: function (event, ui) {
                            input.val(ui.value).trigger("data-change").trigger('change');
                        }
                    });

                    input.on("change", function () {
                        slider.slider("value", $(this).val()).trigger('change');
                    });

                    // Reset
                    var wrapper = slider.closest(
                        ".yatri-slider-control"
                    );
                    wrapper.on("click", ".yatri-slider-reset", function (e) {
                        e.preventDefault();
                        var d = slider.data("default");
                        $("input", wrapper).val(d).trigger('change');
                        slider.slider("option", "value", d);
                    });
                });
            }
        },


    };
    wp.customize.bind('ready', function () {

        yatriSliderControl.init();

    })

})(jQuery, wp.customize || null);