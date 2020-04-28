/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriIconPicker = {
        init: function () {

            this.icons = yatriAllIcons;

            this.initPicker();
            this.initSearch();
            this.initIconType();
            this.initClosePickerPanel();
            this.clearIcon();

        },
        clearIcon: function () {
            $document.on('click', '.yatri-icon-picker-control-field .icon-clear', function () {
                var wrap = $(this).closest('.yatri-icon-picker-control-field');
                wrap.find('.customize-control-icon-picker-value').val('').trigger('change');
                wrap.find('.icon-show').attr('class', 'icon-show');

            });
        },
        initClosePickerPanel: function () {
            $document.on('click', '.picker-header .customize-controls-icon-close', function () {
                var wrap = $(this).closest('.yatri-icon-picker-control-field');
                wrap.find('#yatri-customizer-icon-picker').removeClass('picker-active');

            });
        },
        pickIcon: function () {
            $document.on('click', '.yatri-icon-picker-control-field .yatri-icon-list-ul li', function () {
                var wrap = $(this).closest('.yatri-icon-picker-control-field');
                var icon = $(this).attr('data-icon');
                wrap.find('.customize-control-icon-picker-value').val(icon).trigger('change');
                wrap.find('.icon-show').attr('class', 'icon-show ' + icon);
                wrap.find('#yatri-customizer-icon-picker').removeClass('picker-active');

            });
        },
        initIconType: function () {
            $document.on("change", "#yatri-icon-type", function () {
                var wrap = $(this).closest('.yatri-icon-picker-control-field');
                var type = $(this).val();
                if (!type || type == "all") {
                    wrap.find("#yatri-icon-browser ul.yatri-icon-list-ul").show();
                } else {
                    wrap.find("#yatri-icon-browser ul.yatri-icon-list-ul").hide();
                    wrap.find(
                        '#yatri-icon-browser ul.yatri-icon-list-ul[data-icon-type="' + type + '"]'
                    ).show();
                }
            });
        },
        initSearch: function () {
            $document.on("keyup", "#yatri-icon-search-input", function (e) {
                var v = $(this).val();
                v = v.trim();
                var wrap = $(this).closest('.yatri-icon-picker-control-field');
                if (v) {

                    wrap.find('#yatri-icon-browser li').hide();

                    wrap.find(
                        "#yatri-icon-browser li[data-icon*='" + v + "']"
                    ).show();
                } else {
                    wrap.find('#yatri-icon-browser li').show();
                }
            });
        },
        initPicker: function () {


            var instance = this;
            instance.pickIcon();

            $document.on('click', ".customize-control-icon-picker-value, .yatri-icon-picker-control-field .icon-show", function () {
                var width_customizer = $(this).closest('#customize-controls');

                var wrap = $(this).closest('.yatri-icon-picker-control-field');
                var picker_wrap = wrap.find('#yatri-customizer-icon-picker');

                if (picker_wrap.hasClass('picker-active')) {
                    picker_wrap.removeClass('picker-active')
                        .css({
                            'left': width_customizer.width() + 'px'
                        });
                } else {
                    instance.lodIcons(picker_wrap);
                    picker_wrap.addClass('picker-active')
                        .css({
                            'left': width_customizer.width() + 'px'
                        });
                }


            });
        },
        lodIcons: function (wrap) {
            var icon_wrap = wrap.find('#yatri-icon-browser');
            var icon_select = wrap.closest('#yatri-customizer-icon-picker').find('select#yatri-icon-type');
            var icon = this.icons;
            if (icon_select.find('option').length < 2) {
                var icon_select_node = $('<select/>');
                var all_icon_list = $('<div/>');

                for (var icon_key  in icon) {

                    var icon_list_node = $('<ul class="yatri-icon-list-ul" data-icon-type="' + icon_key + '"/>');
                    var icon_prefix = '';
                    switch (icon_key) {
                        case "font_awesome":

                            break;
                    }
                    if (typeof icon_key != undefined) {

                        var title = typeof icon[icon_key].title != undefined ? icon[icon_key].title : icon_key;
                        var all_icons = typeof icon[icon_key].icons != undefined ? icon[icon_key].icons : {};
                        icon_select_node.append('<option value="' + icon_key + '">' + title + '</option>');


                        for (var all_icon_key in all_icons) {
                            icon_list_node.append('<li title="' + all_icon_key + '" data-type="' + icon_key + '" data-icon="' + icon_prefix + ' ' + all_icon_key + '" style="display: list-item;"><span class="icon-wrapper"><i class="' + icon_prefix + ' ' + all_icon_key + '"></i></span></li>');
                        }
                    }
                    all_icon_list.append(icon_list_node);


                }

                icon_select.append(icon_select_node.html());
                icon_wrap.append(all_icon_list.html());
            }

        }


    };
    wp.customize.bind('ready', function () {

        yatriIconPicker.init();

    })

})(jQuery, wp.customize || null);