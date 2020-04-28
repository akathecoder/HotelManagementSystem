/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriCustomizerApp = {
        init: function () {

            this.listenEvent();
            this.initLib();
            var slider_el = $('.yatri--group-field.ft--slider');
            this.initSlider(slider_el);
            this.populateValue();
        },
        initLib: function () {
            if (typeof $().select2 !== 'undefined') {
                $('.yatri-select2').select2();
            }
        },
        listenEvent: function () {
            $document.on("click", ".yatri--settings-fields .action--edit", function (e) {
                e.preventDefault();
                var wrap = $(this).closest('.yatri--settings-wrapper');
                if (!$(this).hasClass('open')) {
                    $(this).addClass('open');
                } else {
                    $(this).removeClass('open');
                }
                wrap.find('.yatri-modal-settings').toggle();
            });
            $document.on("change", ".yatri-select2", function (e) {
                if ($(this).closest('select').hasClass('yatri-typo-input')) {
                    var subsets = $(this).find('option:selected').attr('data-subsets');
                    var varient = $(this).find('option:selected').attr('data-varient');
                    var language = $(this).closest('.yatri-modal-settings--fields').find('.yatri--group-field[data-field-name="languages"]');
                    var weight = $(this).closest('.yatri-modal-settings--fields').find('.yatri--group-field[data-field-name="font_weight"]');
                    var varient_option_node = $('<select/>');

                    var varient_obj = JSON.parse(varient);
                    var lang_obj = JSON.parse(subsets);
                    $.each(varient_obj, function (key) {
                        var value = varient_obj[key];
                        varient_option_node.append('<option value="' + varient_obj[key] + '">' + varient_obj[key] + '</option>');

                    });
                    weight.find('select.font-weight').html(varient_option_node.html()).trigger('change');
                    $document.trigger('yatri_font_family_changed');

                    var lang_subset_node = $('<div/>');
                    var has_subset = false;
                    var lang_id = 0;
                    $.each(lang_obj, function (lang_key) {
                        lang_id++;
                        has_subset = true;
                        var lang_value = lang_obj[lang_key];
                        lang_subset_node.append('<p><label><input type="checkbox" class="yatri-typo-input yatri-value-by-js" data-name="font_languages" name="language_' + lang_id + '"  value="' + lang_obj[lang_key] + '">' + lang_obj[lang_key] + '</label></p>');

                    });
                    language.find('.list-subsets').html(lang_subset_node.html());
                    $document.trigger('yatri_font_subsets_changed');
                    if (has_subset) {
                        language.removeClass('yatri-hide');
                    } else {
                        language.addClass('yatri-hide');
                    }
                }


            });
            // Devices Switcher
            $document.on("click", ".yatri-devices button", function (e) {
                e.preventDefault();
                var device = $(this).attr("data-device") || "";
                //console.log('Device', device);
                $(
                    '#customize-footer-actions .devices button[data-device="' +
                    device +
                    '"]'
                ).trigger("click");
            });
        },
        initSlider: function ($el) {
            if ($(".yatri-input-slider", $el).length > 0) {
                $(".yatri-input-slider", $el).each(function () {
                    var slider = $(this);
                    var p = slider.parent();
                    var input = $(".yatri--slider-input", p);
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
                            input.val(ui.value).trigger("data-change");
                        }
                    });

                    input.on("change", function () {
                        slider.slider("value", $(this).val());
                    });

                    // Reset
                    var wrapper = slider.closest(
                        ".yatri-input-slider-wrapper"
                    );
                    wrapper.on("click", ".reset", function (e) {
                        e.preventDefault();
                        var d = slider.data("default");
                        if (!_.isObject(d)) {
                            d = {
                                unit: "px",
                                value: ""
                            };
                        }

                        $(".yatri--slider-input", wrapper).val(d.value);
                        slider.slider("option", "value", d.value);
                        $(
                            '.yatri--css-unit input.yatri-input[value="' +
                            d.unit +
                            '"]',
                            wrapper
                        ).trigger("click");
                        $(".yatri--slider-input", wrapper).trigger(
                            "change"
                        );
                    });
                });
            }
        },
        populateValue: function () {

            $document.on('change', '.yatri-value-by-js', function () {

                var value_object = {};
                var model = $(this).closest('.yatri--settings-wrapper');
                var input = model.find('.yati_customizer_minified_values');
                var _that = $(this);
                $.each(model.find('.yatri-value-by-js'), function () {

                    var field_type = $(this).attr('data-name');
                    try {

                        var decoded_value = decodeURIComponent(input.val());

                        switch (field_type) {

                            case "font_weight":
                            case "font_family":
                            case "font_style":
                            case "text_decoration":
                            case "text_transform":
                                var value = $(this).val();
                                value_object[field_type] = value;
                                break;
                            case "font_languages":
                                var value = new Array();
                                value = $(this).closest(".list-subsets").find("input:checkbox:checked").map(function () {
                                    return $(this).val();
                                }).get();
                                value_object[field_type] = value;
                                break;
                            case "font_size":
                            case "line_height":
                            case "letter_spacing":
                                var params = {};
                                var device = $(this).attr('data-device');
                                var unit = $(this).closest('.yatri-field-settings-inner').find('input[data-name="unit"]').val();
                                params.value = $(this).val();
                                params.unit = unit;
                                if (typeof value_object[field_type] === "undefined") {
                                    value_object[field_type] = {};
                                }
                                value_object[field_type][device] = params;
                                break;

                        }


                    } catch (e) {

                    }


                });
                var value_string = JSON.stringify(value_object);

                var value_encoded = encodeURIComponent(value_string);
                input.val(value_encoded).trigger('change');

            });
        }

    };
    $document.ready(function () {
        //yatriCustomizerApp.init();

    })

})(jQuery, wp.customize || null);