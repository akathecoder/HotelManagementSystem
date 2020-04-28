/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);
    var YatriMedia = {
        setAttachment: function (attachment) {
            this.attachment = attachment;
        },
        addParamsURL: function (url, data) {
            if (!$.isEmptyObject(data)) {
                url += (url.indexOf("?") >= 0 ? "&" : "?") + $.param(data);
            }
            return url;
        },
        getThumb: function (attachment) {
            var control = this;
            if (typeof attachment !== "undefined") {
                this.attachment = attachment;
            }
            var t = new Date().getTime();
            if (typeof this.attachment.sizes !== "undefined") {
                if (typeof this.attachment.sizes.medium !== "undefined") {
                    return control.addParamsURL(
                        this.attachment.sizes.medium.url,
                        {t: t}
                    );
                }
            }
            return control.addParamsURL(this.attachment.url, {t: t});
        },
        getURL: function (attachment) {
            if (typeof attachment !== "undefined") {
                this.attachment = attachment;
            }
            var t = new Date().getTime();
            return this.addParamsURL(this.attachment.url, {t: t});
        },
        getID: function (attachment) {
            if (typeof attachment !== "undefined") {
                this.attachment = attachment;
            }
            return this.attachment.id;
        },
        getInputID: function (attachment) {
            $(".attachment-id", this.preview).val();
        },
        setPreview: function ($el) {
            this.preview = $el;
        },
        insertImage: function (attachment) {
            if (typeof attachment !== "undefined") {
                this.attachment = attachment;
            }

            var url = this.getURL();
            var id = this.getID();
            var mime = this.attachment.mime;
            $(".yatri-image-preview", this.preview)
                .addClass("yatri--has-file")
                .html('<img src="' + url + '" alt="">');

            $(this.preview).closest('.yatri-field-wrap').find('.yatri-image-properties').removeClass('yatri-hide');
            $(".attachment-url", this.preview).val(this.toRelativeUrl(url));
            $(".attachment-mime", this.preview).val(mime);
            $(".attachment-id", this.preview)
                .val(id)
                .trigger("change");
            this.preview.addClass("attachment-added");
            this.showChangeBtn();
        },
        toRelativeUrl: function (url) {
            return url;

        },
        showChangeBtn: function () {
            $(".yatri--add", this.preview).addClass("yatri--hide");
            $(".yatri--change", this.preview).removeClass(
                "yatri--hide"
            );
            $(".yatri--remove", this.preview).removeClass(
                "yatri--hide"
            );

            var wrap = $(this.preview).closest('.yatri-field-wrap');
            wrap.find('.yatri-change-by-js.image_size').find('option[value="cover"]').prop('selected', 'selected');
            wrap.find('.yatri-change-by-js.image_position').find('option[value="center"]').prop('selected', 'selected');
            wrap.find('.yatri-change-by-js.image_repeat').find('option[value="no-repeat"]').prop('selected', 'selected');
            wrap.find('.yatri-change-by-js.parallax_image').find('option[value="scroll"]').prop('selected', 'selected').trigger('change');
        },
        insertVideo: function (attachment) {
            if (typeof attachment !== "undefined") {
                this.attachment = attachment;
            }

            var url = this.getURL();
            var id = this.getID();
            var mime = this.attachment.mime;
            var html =
                '<video width="100%" height="" controls><source src="' +
                url +
                '" type="' +
                mime +
                '">Your browser does not support the video tag.</video>';
            $(".yatri-image-preview", this.preview)
                .addClass("yatri--has-file")
                .html(html);
            $(".attachment-url", this.preview).val(this.toRelativeUrl(url));
            $(".attachment-mime", this.preview).val(mime);
            $(".attachment-id", this.preview)
                .val(id)
                .trigger("change");
            this.preview.addClass("attachment-added");
            this.showChangeBtn();
        },
        insertFile: function (attachment) {
            if (typeof attachment !== "undefined") {
                this.attachment = attachment;
            }
            var url = attachment.url;
            var mime = this.attachment.mime;
            var basename = url.replace(/^.*[\\\/]/, "");

            $(".yatri-image-preview", this.preview)
                .addClass("yatri--has-file")
                .html(
                    '<a href="' +
                    url +
                    '" class="attachment-file" target="_blank">' +
                    basename +
                    "</a>"
                );
            $(this.preview).closest('.yatri-field-wrap').find('.yatri-image-properties').removeClass('yatri-hide');
            $(".attachment-url", this.preview).val(this.toRelativeUrl(url));
            $(".attachment-mime", this.preview).val(mime);
            $(".attachment-id", this.preview)
                .val(this.getID())
                .trigger("change");
            this.preview.addClass("attachment-added");
            this.showChangeBtn();
        },
        remove: function ($el) {
            if (typeof $el !== "undefined") {
                this.preview = $el;
            }
            $(".yatri-image-preview", this.preview)
                .removeAttr("style")
                .html("")
                .removeClass("yatri--has-file");
            $(".attachment-url", this.preview).val("");
            $(".attachment-mime", this.preview).val("");
            $(".attachment-id", this.preview)
                .val("")
                .trigger("change");
            this.preview.removeClass("attachment-added");

            $(".yatri--add", this.preview).removeClass("yatri--hide");
            $(".yatri--change", this.preview).addClass("yatri--hide");
            $(".yatri--remove", this.preview).addClass("yatri--hide");
            $(this.preview).closest('.yatri-field-wrap').find('.yatri-image-properties').addClass('yatri-hide');
        }
    };

    YatriMedia.controlMediaImage = wp.media({
        title: wp.media.view.l10n.addMedia,
        multiple: false,
        library: {type: "image"}
    });

    YatriMedia.controlMediaImage.on("select", function () {
        var attachment = YatriMedia.controlMediaImage
            .state()
            .get("selection")
            .first()
            .toJSON();
        YatriMedia.insertImage(attachment);
    });

    YatriMedia.controlMediaVideo = wp.media({
        title: wp.media.view.l10n.addMedia,
        multiple: false,
        library: {type: "video"}
    });

    YatriMedia.controlMediaVideo.on("select", function () {
        var attachment = YatriMedia.controlMediaVideo
            .state()
            .get("selection")
            .first()
            .toJSON();
        YatriMedia.insertVideo(attachment);
    });

    YatriMedia.controlMediaFile = wp.media({
        title: wp.media.view.l10n.addMedia,
        multiple: false
    });

    YatriMedia.controlMediaFile.on("select", function () {
        var attachment = YatriMedia.controlMediaFile
            .state()
            .get("selection")
            .first()
            .toJSON();
        YatriMedia.insertFile(attachment);
    });

    var yatriModalControl = {
        init: function () {

            this.initEvents();
            //this.initColorPicker();
            this.initMedia();
            this.initTabs();
            this.intRularLink();
            this.initAlignment();
            this.renderFieldValue();
            this.initSlider();

        },
        initAlignment: function () {

            $document.on("click", ".customize-control .yatri-input-alignment li", function (e) {
                var ul = $(this).closest('ul');
                ul.find('li').removeClass('active');
                $(this).addClass('active');
                var value = $(this).attr('data-alignment');
                $(this).closest('.yatri-input-alignment').find('input').val(value).trigger('change');

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

                            input.val(ui.value).trigger("data-change").trigger('change');
                        }
                    });
                    input.on("change", function () {
                        slider.slider("value", $(this).val()).trigger('change');
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
        renderFieldValue: function () {

            var _that = this;

            $document.on('change', '.yatri-change-by-js', function () {

                var all_field_value_object = {};

                var model = $(this).closest('.yatri-modal-settings');

                _that.updateRularValue($(this));
                _that.updateFontProperty($(this));

                $.each(model.find('.yatri-change-by-js'), function () {

                    var field_wrap = $(this).closest('.yatri-field-wrap');
                    var field_type = field_wrap.attr('data-field-type');
                    var field_name = field_wrap.attr('data-field-name');
                    var device = field_wrap.attr('data-device');
                    var field_key = $(this).attr('data-field-key');
                    try {

                        var single_value;
                        if (field_type !== undefined && field_name !== undefined && field_key !== undefined) {
                            switch (field_type) {
                                case "padding":
                                    single_value = {};
                                    single_value.value = $(this).val();
                                    single_value.unit = field_wrap.find('.yatri--css-unit').find('input[name="padding_unit"]').val();
                                    break;
                                case "margin":
                                    single_value = {};
                                    single_value.value = $(this).val();
                                    single_value.unit = field_wrap.find('.yatri--css-unit').find('input[name="margin_unit"]').val();
                                    break;
                                case "range":
                                    single_value = {};
                                    single_value.value = $(this).val();
                                    if (!field_wrap.find('.yatri--css-unit').hasClass('no-unit')) {
                                        single_value.unit = field_wrap.find('.yatri--css-unit').find('input[name="range_unit"][checked="checked"]').val();
                                    }
                                    break;
                                case "color":
                                case "text":
                                case "number":
                                case "overlay":
                                case "font":
                                case "alignment":
                                    single_value = $(this).val();
                                    break;
                                case "select":
                                case "font_weight":
                                    single_value = $(this).val();
                                    break;
                                case "image":
                                    var attachment_id = field_wrap.find('input[data-field-key="value"]').val();
                                    single_value = {};
                                    single_value.attachment_id = attachment_id;
                                    single_value.attachment_url = field_wrap.find('input.attachment-url').val();
                                    single_value.attachment_mime = field_wrap.find('input.attachment-mime').val();
                                    if (attachment_id !== '') {
                                        single_value.image_size = field_wrap.find('select.image_size').val();
                                        single_value.image_position = field_wrap.find('select.image_position').val();
                                        single_value.image_repeat = field_wrap.find('select.image_repeat').val();
                                        single_value.parallax_image = field_wrap.find('select.parallax_image').val();
                                    }
                                    break;
                                case "border":
                                    var border_style = field_wrap.find('select.border_style').val();
                                    single_value = {};
                                    single_value.style = border_style;

                                    single_value.border_top = field_wrap.find('input.border_top').val();
                                    single_value.border_right = field_wrap.find('input.border_right').val();
                                    single_value.border_bottom = field_wrap.find('input.border_bottom').val();
                                    single_value.border_left = field_wrap.find('input.border_left').val();
                                    single_value.border_color = field_wrap.find('input.border_color').val();

                                    single_value.border_radius_top = field_wrap.find('input.border_radius_top').val();
                                    single_value.border_radius_right = field_wrap.find('input.border_radius_right').val();
                                    single_value.border_radius_bottom = field_wrap.find('input.border_radius_bottom').val();
                                    single_value.border_radius_left = field_wrap.find('input.border_radius_left').val();

                                    single_value.box_shadow_color = field_wrap.find('input.box_shadow_color').val();
                                    single_value.box_shadow_x = field_wrap.find('input.box_shadow_x').val();
                                    single_value.box_shadow_y = field_wrap.find('input.box_shadow_y').val();
                                    single_value.box_shadow_blur = field_wrap.find('input.box_shadow_blur').val();
                                    single_value.box_shadow_spread = field_wrap.find('input.box_shadow_spread').val();
                                    single_value.box_shadow_inset = field_wrap.find('input.box_shadow_inset').is(':checked') ? 1 : 0;

                                    break;
                                case "checkbox":
                                case "font_languages":
                                    single_value = new Array();
                                    single_value = $(this).closest(".list-subsets").find("input:checkbox:checked").map(function () {
                                        return $(this).val();
                                    }).get();
                                    break;

                            }


                            if (typeof device !== 'undefined') {

                                if (typeof all_field_value_object[field_name] === "undefined") {
                                    all_field_value_object[field_name] = {};
                                }
                                if (typeof all_field_value_object[field_name][device] === "undefined") {
                                    all_field_value_object[field_name][device] = {};
                                }
                                all_field_value_object[field_name][device][field_key] = single_value;

                            } else {
                                if (typeof all_field_value_object[field_name] === "undefined") {
                                    all_field_value_object[field_name] = {};
                                }
                                all_field_value_object[field_name][field_key] = single_value;
                            }
                        }


                    } catch (e) {

                    }


                });

                var value_string = JSON.stringify(all_field_value_object);

                var result_node = $(this).closest('li.customize-control').find('.yatri--settings-wrapper').find('.yatri-field-settings-inner').find('.yatri_customizer_minified_results');

                result_node.val(value_string).trigger('change');

                _that.setLocalStorate($(this));
                //console.log(value_string);

            });
        },
        setLocalStorate: function ($instance) {

            var _that = this;
            var field_group = $instance.closest('.yatri--group-field');
            var field_id = field_group.attr('data-field-id');
            var css_selector = field_group.attr('data-field-selector');
            var additional_css_mobile = field_group.attr('data-field-additional-css-mobile');
            var additional_css_tablet = field_group.attr('data-field-additional-css-tablet');
            var additional_css_desktop = field_group.attr('data-field-additional-css-desktop');
            var additional_css_all = field_group.attr('data-field-additional-css-all');
            var css_property = field_group.attr('data-field-css-property');
            var wrap = field_group.find('.yatri-field-wrap');
            var all_css_code_for_js = '';
            wrap.each(function () {
                var device = $(this).attr('data-device');
                var data_field_key = $instance.attr('data-field-key');
                device = typeof device == undefined || typeof device == "undefined" || '' == device ? 'all' : device;

                var field_type = $(this).attr('data-field-type');
                var data_field_name = $(this).attr('data-field-name');
                var devicewise_css_text = '';
                switch (field_type) {
                    case "color":
                        var value = $(this).find('.yatri-change-by-js.yatri-color-picker').val();
                        value = '' == value ? 'initial' : value;
                        devicewise_css_text = '' == value ? '' : css_property.replace(/{{value}}/g, value);
                        break;
                    case "overlay":
                        var value = $(this).find('.yatri-change-by-js.yatri-color-picker').val();
                        var selector_array = css_selector.split(",");
                        var new_css_selector = selector_array.join(':before, ') + ':before';
                        var body = $("body").find('iframe').contents();

                        if ('' == value) {
                            body.find(css_selector).removeClass('yatri-overlay');
                        } else {
                            body.find(css_selector).addClass('yatri-overlay');
                        }
                        css_selector = new_css_selector;
                        devicewise_css_text = '' == value ? '' : css_property.replace(/{{value}}/g, value);
                        break;

                    case "alignment":
                        var value = $(this).find('.yatri-input-alignment input.yatri-change-by-js').val();
                        devicewise_css_text = '' == value ? '' : css_property.replace(/{{value}}/g, value);
                        break;
                    case "range":
                        var value = $(this).find('.yatri--slider-input.yatri-change-by-js').val();
                        var unit = $(this).find('.yatri--css-unit').find('input[name="' + field_type + '_unit"]').val();
                        if ('' !== value) {
                            var single_css = css_property.replace(/{{value}}/g, value);
                            devicewise_css_text += single_css.replace(/{{unit}}/g, unit);
                        }
                        break;
                    case "padding":
                    case "margin":
                        var unit = $(this).find('.yatri--css-unit').find('input[name="' + field_type + '_unit"]').val();
                        var top = $(this).find('input.' + field_type + '_top').val();
                        var right = $(this).find('input.' + field_type + '_right').val();
                        var bottom = $(this).find('input.' + field_type + '_bottom').val();
                        var left = $(this).find('input.' + field_type + '_left').val();
                        if ('' !== top) {
                            devicewise_css_text = field_type + '-top:' + top + unit + ';';
                        }
                        if ('' !== right) {
                            devicewise_css_text += field_type + '-right:' + right + unit + ';';
                        }
                        if ('' !== bottom) {
                            devicewise_css_text += field_type + '-bottom:' + bottom + unit + ';';
                        }
                        if ('' !== left) {
                            devicewise_css_text += field_type + '-left:' + left + unit + ';';
                        }

                        break;
                    case "border":

                        var border_type = $(this).find('select.border_style').val();
                        var top = $(this).find('input.border_top').val();
                        var right = $(this).find('input.border_right').val();
                        var left = $(this).find('input.border_left').val();
                        var bottom = $(this).find('input.border_bottom').val();
                        var border_color = $(this).find('.yatri-change-by-js.yatri-color-picker.border_color').val();
                        var box_shadow_color = $(this).find('.yatri-change-by-js.yatri-color-picker.box_shadow_color').val();
                        var radius_top = $(this).find('input.border_radius_top').val();
                        var radius_right = $(this).find('input.border_radius_right').val();
                        var radius_bottom = $(this).find('input.border_radius_bottom').val();
                        var radius_left = $(this).find('input.border_radius_left').val();
                        var box_shadow_x = $(this).find('input.box_shadow_x').val();
                        var box_shadow_y = $(this).find('input.box_shadow_y').val();
                        var box_shadow_blur = $(this).find('input.box_shadow_blur').val();
                        var box_shadow_spread = $(this).find('input.box_shadow_spread').val();
                        var box_shadow_inset = $(this).find('input.box_shadow_inset').is(":checked");
                        if ('' !== border_type) {
                            devicewise_css_text = "border-style:" + border_type + ";";
                            devicewise_css_text += "border-top-width:" + top + "px;";
                            devicewise_css_text += "border-right-width:" + right + "px;";
                            devicewise_css_text += "border-left-width:" + left + "px;";
                            devicewise_css_text += "border-bottom-width:" + bottom + "px;";
                            devicewise_css_text += "border-color:" + border_color + ";";
                        }
                        devicewise_css_text += "border-top-left-radius:" + radius_top + "px;";
                        devicewise_css_text += "border-top-right-radius:" + radius_right + "px;";
                        devicewise_css_text += "border-bottom-right-radius:" + radius_bottom + "px;";
                        devicewise_css_text += "border-bottom-left-radius:" + radius_left + "px;";


                        var box_shadow_inset_text = "";
                        if (box_shadow_inset) {
                            box_shadow_inset_text = "inset ";
                        }
                        var box_shadow = "box-shadow:" + box_shadow_inset_text + box_shadow_x + "px " + box_shadow_y + "px " + box_shadow_y + "px " + box_shadow_spread + "px " + box_shadow_color + ";";
                        devicewise_css_text += box_shadow;


                        break;
                    case "image":
                        var url = $(this).find('.attachment-url').val();
                        var image_size = $(this).find('select.image_size').val();
                        var image_position = $(this).find('select.image_position').val();
                        var image_repeat = $(this).find('select.image_repeat').val();
                        var parallax_image = $(this).find('select.parallax_image').val();

                        devicewise_css_text = 'background-size: ' + image_size + ';\n' +
                            '    background-image: url(' + url + ');\n' +
                            '    background-repeat: ' + image_repeat + ';\n' +
                            '    background-position: ' + image_position + ';\n' +
                            '    background-attachment: ' + parallax_image + ';'


                        break;
                    case "font":
                        var font_name = $(this).find('.yatri-typo-input').val();
                        var font_weight = _that.getFontWeight($(this));
                        var subset = _that.getFontSubset($(this));
                        var font_field_id = _that.getTypoFieldID($(this));
                        _that.fontLoader(font_name, field_id, font_weight, subset);
                        font_name = '' == font_name ? 'initial' : font_name;
                        devicewise_css_text = '' == font_name ? '' : css_property.replace(/{{value}}/g, font_name);

                        break;


                    case "font_weight":
                        var value = $(this).find('select.yatri-change-by-js').val();
                        var font_family = _that.getFontFamily($(this));
                        var subset = _that.getFontSubset($(this));
                        _that.fontLoader(font_family, field_id, value, subset);
                        value = '' == value ? 'initial' : value;
                        devicewise_css_text = '' == value ? '' : css_property.replace(/{{value}}/g, value);
                        break;
                    case "checkbox":
                    case "font_languages":
                        // font Font Languages
                        if ($(this).find('.list-subsets').length) {
                            var font_family = _that.getFontFamily($(this));
                            var font_weight = _that.getFontWeight($(this));
                            var subset = _that.getFontSubset($(this));
                            _that.fontLoader(font_family, field_id, font_weight, subset);
                        }
                        break;
                    case "select":
                        var value = $(this).find('.yatri-change-by-js').val();
                        value = '' == value ? 'initial' : value;
                        devicewise_css_text = '' == value ? '' : css_property.replace(/{{value}}/g, value);
                        break;

                }
                all_css_code_for_js += _that.getResponsive(devicewise_css_text, device, css_selector);
            });
            var all_additional_css_code = '';
            all_additional_css_code += _that.getResponsive(additional_css_mobile, 'mobile');
            all_additional_css_code += _that.getResponsive(additional_css_tablet, 'tablet');
            all_additional_css_code += _that.getResponsive(additional_css_desktop, 'desktop');
            all_additional_css_code += additional_css_all;
            var object = {

                css_code: all_css_code_for_js,
                additional_css: all_additional_css_code,
                field_id: field_id
            };
            window.localStorage.removeItem("yatriCustomizerChanges");

            window.localStorage.setItem("yatriCustomizerChanges", JSON.stringify(object));

        },
        getTypoFieldID: function ($instance) {
            var node = $instance.closest('.yatri-modal-settings--fields').find('.yatri--group-field.ft--font[data-field-name="font"]');
            var family = node.find(".yatri-field-wrap").find('select.yatri-typo-input').val();
            return family;
        },
        getFontFamily: function ($instance) {
            var node = $instance.closest('.yatri-modal-settings--fields').find('.yatri--group-field.ft--font');
            var family = node.find(".yatri-field-wrap").find('select.yatri-typo-input').val();
            return family;
        },
        getFontWeight: function ($instance) {
            var node = $instance.closest('.yatri-modal-settings--fields').find('.yatri--group-field.ft--font_weight');
            var weight = node.find(".yatri-field-wrap").find('select.yatri-modal-input').val();
            return weight;
        },
        getFontSubset: function ($instance) {
            var subset_string = '';
            var node = $instance.closest('.yatri-modal-settings--fields').find('.yatri--group-field.ft--font_languages');
            var subsets = node.find(".yatri-field-wrap").find('.list-subsets');
            subsets.find('input[type="checkbox"]').each(function () {
                if ($(this).prop('checked')) {
                    if (subset_string == '') {
                        subset_string += $(this).val();
                    } else {
                        subset_string += ',' + $(this).val();
                    }

                }

            });

            return subset_string;
        },
        fontLoader: function (font_name, field_id, font_weight, subset) {
            /* if (typeof window.yatriLoadedFontFromJs == "undefined" || typeof window.yatriLoadedFontFromJs == undefined) {
                 window.yatriLoadedFontFromJs = new Array();
             }
             if (!window.yatriLoadedFontFromJs.includes(font_name)) {
                 window.yatriLoadedFontFromJs.push(font_name);
             }*/
            var html_node_id = 'head';
            var rel_type = 'stylesheet';
            var yatri_node_type= 'text/css';
            field_id = field_id.replace("_font_family", "");
            field_id = field_id.replace("_font_weight", "");
            field_id = field_id.replace("_font_languages", "");
            if (font_name) {
                /** @type {string} */
                var idfirst = (font_name.trim().toLowerCase().replace(" ", "-"), field_id);
                var google_font_url = font_name.replace(" ", "%20");
                google_font_url = google_font_url.replace(",", "%2C");
                /** @type {string} */
                if (font_weight == '' || font_weight === '' || font_weight == null || font_weight == "undefined" || font_weight == undefined) {

                    font_weight = ':regular';

                } else {
                    font_weight = ':' + font_weight;
                }
                google_font_url = "https://fonts.googleapis.com/css?family=" + font_name + font_weight;
                if ('' !== subset) {
                    google_font_url += "&subset=" + subset;
                }
                var body = $("body").find('iframe').contents();
                if (body.find("#" + idfirst).length) {
                    body.find("#" + idfirst).attr("href", google_font_url);
                } else {
                    var node_id = 'link';
                    var link_js = '<' + node_id + ' id="' + idfirst + '" rel="'+rel_type+'" type="'+yatri_node_type+'" href="' + google_font_url + '"/>';
                    body.find(html_node_id).append(link_js);
                }
            }
        },

        getResponsive: function (css, device, selector) {
            if (css == '' || typeof css != 'string' || typeof device == "undefined" || '' == device || typeof device == undefined) {
                return '';
            }

            var css_code = typeof selector == "string" && '' !== selector ? selector + ' { ' + css + ' }' : css;
            if (device == 'all') {
                return css_code;
            }

            var all_css = '';
            switch (device) {
                case "mobile":
                    all_css = "@media screen and (max-width: 568px) {" + css_code + "}";
                    break;
                case "tablet":
                    all_css = "@media screen and (min-width: 569px) and (max-width: 1024px) {" + css_code + "}";
                    break;
                case "desktop":
                    all_css = "@media screen and (min-width: 1025px) {" + css_code + "}";
                    break;
                default:
                    all_css = css_code;
                    break;
            }
            return all_css;

        },

        updateRularValue: function (__obj) {
            if (__obj.closest(".yatri--css-ruler").length > 0) {
                if (__obj.closest(".yatri--css-ruler").find('.yatri--css-ruler-link').hasClass('yatri--label-active')) {
                    var val = __obj.val();
                    __obj.closest(".yatri--css-ruler").find('input[type="number"]:enabled').val(val);
                }
            }
        },

        updateFontProperty: function (__obj) {
            var field_wrap = __obj.closest('.yatri-field-wrap');
            var field_type = field_wrap.attr('data-field-type');
            if (field_type !== "font") {
                return;
            }
            if (typeof yatriAllFonts == "undefined") {
                return;
            }
            var current_selected_font = __obj.val();
            var mapping_fields = __obj.attr('data-mapping-fields');
            if (mapping_fields == 'undefined') {
                return;
            }
            var mapping_field_obj = JSON.parse(mapping_fields);
            var weight_field = mapping_field_obj.weight;
            var language_field = mapping_field_obj.language;

            var varients = yatriAllFonts["varients"];
            var subset = new Array();
            var varient_html = $('<select/>');
            var subset_html = $('<div/>');
            varient_html.append('<option value="" data-default="yes">Theme Default</option>');
            if (yatriAllFonts["google"][current_selected_font] !== undefined) {

                var varient = typeof yatriAllFonts["google"][current_selected_font]["variants"] !== undefined ? yatriAllFonts["google"][current_selected_font]["variants"] : new Array();

                subset = typeof yatriAllFonts["google"][current_selected_font]["subsets"] !== undefined ? yatriAllFonts["google"][current_selected_font]["subsets"] : new Array();

                for (var subi = 0; subi < subset.length; subi++) {

                    subset_html.append('<p><label><input type="checkbox" data-field-key="value" class="yatri-typo-input yatri-change-by-js" name="' + language_field + '_' + subi + '" value="' + subset[subi] + '">' + subset[subi] + '</label></p>');
                }


                for (var vari = 0; vari < varient.length; vari++) {

                    varient_html.append('<option value="' + varient[vari] + '">' + varient[vari] + '</option>');
                }

            } else {
                for (var v_key in yatriAllFonts["varients"]) {
                    varient_html.append('<option value="' + v_key + '">' + yatriAllFonts["varients"][v_key] + '</option>');
                }
            }
            var weight_node = __obj.closest('.yatri-modal-settings--fields').find('.yatri--group-field[data-field-name="' + weight_field + '"]');
            weight_node.find('select.yatri-modal-input.yatri-change-by-js').html(varient_html.html())
            var language_node = __obj.closest('.yatri-modal-settings--fields').find('.yatri--group-field.ft--font_languages[data-field-name="' + language_field + '"]');
            if (subset.length > 0) {
                language_node.find('div.list-subsets').html(subset_html.html());
                language_node.removeClass('yatri-hide');
            } else {
                language_node.addClass('yatri-hide');
            }

        },
        initEvents: function () {
            var _that = this;
            $document.on("click", ".yatri--settings-fields .action--edit", function (e) {
                e.preventDefault();

                var control_wrap = $(this).closest('.yatri--settings-wrapper').closest('li.customize-control');

                if (!control_wrap.hasClass('yatri-open')) {
                    control_wrap.addClass('yatri-open');
                } else {
                    control_wrap.removeClass('yatri-open');
                }
            });

            $document.on("click", ".yatri--settings-fields .action--reset", function (e) {
                var confirm_box = confirm("Are you sure want to reset this settings ? Reset changes will apply only after page refresh.");
                if (confirm_box !== true) {
                    return;
                }

                e.preventDefault();

                var modal_wrap = $(this).closest('li.customize-control').find('.yatri-modal-settings');
                modal_wrap.find('.yatri-field-wrap').each(function () {
                    var field_type = $(this).attr("data-field-type");
                    var input_field = $(this).find('.yatri-change-by-js');
                    switch (field_type) {
                        case "font":
                        case "font_weight":
                        case "select":
                            input_field.find('option[data-default="yes"]').prop('selected', 'selected');
                            break;
                        case "range":
                            input_field = $(this).find('.yatri-change-by-js.yatri--slider-input');
                            input_field.val("");
                            break;
                        case "color":
                        case "overlay":
                            input_field = $(this).find('.yatri-change-by-js.yatri-color-picker');
                            $(this).find('.color-alpha').css({'background': 'none'});
                            input_field.val("");
                            break;
                        case "padding":
                        case "margin":
                            input_field = $(this).find('.yatri-change-by-js.yatri-input-css');
                            input_field.val("");
                            break;
                        case "border":
                            $(this).find('.yatri-change-by-js.yatri-color-picker').val("");
                            $(this).find('.color-alpha').css({'background': 'none'});
                            $(this).find('.yatri-change-by-js.yatri-input-css').val("");
                            $(this).find('.yatri-change-by-js.box_shadow_inset').prop('checked', false);
                            $(this).find('option[data-default="yes"]').prop('selected', 'selected');
                            break;
                        case "image":
                            $(this).find('.button.yatri--remove').trigger('click');
                            break;
                        case "checkbox":
                        case "font_languages":
                            $(this).find('input[type="checkbox"]').prop('checked', false);
                            break;
                        case "alignment":
                            $(this).find('li[data-default="yes"]').trigger('click');
                            break;
                    }
                    $(this).find('.yatri-change-by-js').trigger('change');
                });
                $(this).closest('.yatri--settings-fields').find('input.yatri_customizer_minified_results').trigger('change');
            });
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

            // initColorPicker
            $document.on('click', '.yatri-picker-result', function () {

                var dummy_container = $(this).closest('.yatri-picker-container').hide();
                _that.initColorPicker($(this).closest('.yatri-input-color'), dummy_container);

            });

        },
        initMedia: function ($el) {
            // When add/Change
            $document.on(
                "click",
                ".yatri--media .yatri--add, .yatri--media .yatri--change, .yatri--media .yatri-image-preview",
                function (e) {
                    e.preventDefault();
                    var p = $(this).closest(".yatri--media");
                    YatriMedia.setPreview(p);
                    YatriMedia.controlMediaImage.open();
                }
            );

            // When add/Change
            $document.on("click", ".yatri--media .yatri--remove", function (
                e
            ) {
                e.preventDefault();
                var p = $(this).closest(".yatri--media");
                YatriMedia.remove(p);
            });
        },
        initColorPicker: function (colorInput, dummy_container) {

            //$.each($('.yatri-input-color'), function () {
            //var colorInput = $(this);
            var df = colorInput.data("default") || "";
            var current_val = $(
                ".yatri-color-picker",
                colorInput
            ).val();
            // data-alpha="true"
            $(".yatri-color-picker", colorInput).attr(
                "data-alpha",
                "true"
            );
            $(".yatri-color-picker", colorInput).wpColorPicker({
                defaultColor: df,
                change: function (event, ui) {
                    var new_color = ui.color.toString();
                    $(".yatri-color-picker", colorInput).val(new_color);
                    if (ui.color.toString() !== current_val) {
                        current_val = new_color;
                        $(".yatri-color-picker", colorInput).trigger(
                            "change"
                        );
                    }
                },
                clear: function (event, ui) {
                    $(".yatri-color-picker", colorInput).val("");
                    $(".yatri-color-picker", colorInput).trigger(
                        "data-change"
                    );
                }
            });
            dummy_container.remove();
            colorInput.find('button.wp-color-result').trigger('click');
            colorInput.find("input.yatri-color-picker").removeClass('hidden');
            //});
            /*$('.yatri-color-picker').wpColorPicker({
                change: function (event, ui) {
                    var element = event.target;
                    var color = ui.color.toString();
                    $(element).val(color).trigger('change');

                    // Add your code here
                },
            });*/
        },
        initLib: function () {
            if (typeof $().select2 !== 'undefined') {
                $('.yatri-select2').select2();
            }
        },
        initTabs: function () {
            $document.on("click", ".modal--tabs span.modal--tab", function (e) {
                e.preventDefault();
                var modal_settings = $(this).closest('.yatri-modal-settings--fields');

                if (!$(this).hasClass('active')) {
                    $(this).closest('.modal--tabs').find('span.modal--tab').removeClass('active');
                    modal_settings.find('.modal-tab-content').removeClass('active');

                    $(this).addClass('active');
                    var tab = $(this).attr('data-tab');
                    modal_settings.find('.modal-tab-content.modal-tab--' + tab).addClass('active');

                }
            });

        },
        intRularLink: function () {
            $document.on("click", ".yatri--field-inputs label.yatri--css-ruler-link", function (e) {

                if ($(this).find('input').is(':checked')) {

                    $(this).removeClass('yatri--label-active');
                    $(this).find('input').prop('checked', false);

                } else {

                    $(this).addClass('yatri--label-active');
                    $(this).find('input').prop('checked', true);

                }
            });
        }


    };
    wp.customize.bind('ready', function () {
        yatriModalControl.init();
    });

})(jQuery, wp.customize || null);