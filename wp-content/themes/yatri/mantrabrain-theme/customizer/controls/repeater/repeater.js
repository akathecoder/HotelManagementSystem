/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriRepeater = {

        init: function () {

            this.$el = $('.yatri-repeater-control-field', $document);

            this.initActions();
            this.initAddNew();
            this.initTitleChange();
            this.changeByJs();
            this.initRepeaterUpdate();
            this.initSortable();

        },
        initSortable: function () {
            var instance = this;
            $(".repeater-wrap-container").sortable({
                connectWith: ".repeater-wrap-container",
                stop: function (event, ui) {
                    var target = $(event.target);
                    target.closest('.yatri-repeater-control-field').trigger('yatri_repeater_item_update');


                }
            }).disableSelection();

        },
        changeByJs: function () {
            $document.on("change keyup", '.repeater-change-js', function (e, ui) {
                $(this).closest('.yatri-repeater-control-field').trigger('yatri_repeater_item_update');
            });
        },
        initRepeaterUpdate: function () {
            $document.on("yatri_repeater_item_update", function (e, ui) {
                var target = $(e.target);
                var repeater_data = new Array();
                $.each(target.find('.repeater-wrap'), function () {
                    var single_item_data = {};
                    $.each($(this).find('.repeater-fields .repeater-item'), function () {
                        var field_type = $(this).attr('data-field-type');
                        var field_id = $(this).attr('data-id');
                        switch (field_type) {
                            case "text":
                            case "url":
                            case "icon":
                                single_item_data[field_id] = $(this).find('input').val();
                                break;
                            case "checkbox":
                                single_item_data[field_id] = $(this).find('input').is(":checked") ? 1 : 0;
                                break;
                        }
                    });
                    repeater_data.push(single_item_data);
                });
                var value_string = JSON.stringify(repeater_data);

                var result_node = target.closest('.yatri-repeater-control').find('.customize-control-repeater-value');

                result_node.val(value_string).trigger('change');

                console.log(value_string);

            });
        },
        initActions: function () {
            var _that = this;
            $document.on("click", ".yatri-repeater-control-field .toggle", function (e) {
                var item_wrap = $(this).closest('.repeater-wrap');
                item_wrap.siblings('.repeater-wrap.open').find('.repeater-fields').slideUp();
                item_wrap.siblings('.repeater-wrap.open').removeClass('open');
                if (item_wrap.hasClass('open')) {
                    item_wrap.find('.repeater-fields').slideUp();
                    item_wrap.removeClass('open');
                } else {
                    item_wrap.find('.repeater-fields').slideDown();
                    item_wrap.addClass('open');
                }
            });
            $document.on("click", ".yatri-repeater-control-field .trash", function (e) {
                var control_field = $(this).closest('.yatri-repeater-control-field');
                $(this).closest('.repeater-wrap').remove();
                control_field.trigger('yatri_repeater_item_update');
            });
        },
        initAddNew: function () {
            var _that = this;
            _that.$el.find('.add-new').on('click', function () {
                var container = $(this).closest('.yatri-repeater-control-field').find('.repeater-wrap-container');
                var repeater_tmpl = container.find('script.repeater-control');
                container.append(repeater_tmpl.html());
                container.find('.repeater-wrap:last-child').find('.toggle').trigger('click');
                $(this).closest('.yatri-repeater-control-field').trigger('yatri_repeater_item_update');
            });

        },
        initTitleChange: function () {
            $document.on("keyup change", '.yatri-repeater-control-field .repeater-item[data-title="1"]  input', function (e) {
                var item_value = $(this).val();
                var item_wrap = $(this).closest('.repeater-wrap');
                item_wrap.find('.repeater-header').find('p').html(item_value);

            });
        }


    };
    wp.customize.bind('ready', function () {


        yatriRepeater.init();

    })

})(jQuery, wp.customize || null);