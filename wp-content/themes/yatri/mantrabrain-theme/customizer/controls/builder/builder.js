/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document1 = $(document);

    var yatriBuilder = {

        init: function () {

            this.$el = $('.yatri-builder-control', $document1);

            this.initEvents();
            this.initDraggableDropable();
            this.removeDroppedItem();
            this.widthValidate();
            this.renderData();

        },
        hasTotalSum: function (builder_area, total) {

            var total_sum = 0

            var is_empty = true;

            var total_column = builder_area.find('.grid input.column-width').length;

            var count_filled_column = 0;

            $.each(builder_area.find('.grid input.column-width'), function () {

                if ($(this).val() !== '') {

                    total_sum = total_sum + parseFloat($(this).val());

                    count_filled_column++;

                    is_empty = false;
                }
            });

            total_sum = parseFloat(total_sum).toFixed(2);

            console.log('Total Sum is ' + total_sum);

            if (is_empty) {

                return true;
            }
            if (!is_empty) {

                if (total_sum === parseFloat(total).toFixed(2) && count_filled_column === total_column) {

                    return true;
                }
            }
            return false;
        },
        initEvents: function () {

            var _that = this;

            $('body').on('change keypress', '.yatri-builder-control .yatri-builder-drop-area .grid input.column-width', function (event) {

                var builder_area = $(this).closest('.yatri-builder-drop-area');

                if (!_that.hasTotalSum(builder_area, 100)) {

                    $(this).closest('.yatri-builder-drop-area').find('.grid input.column-width').addClass('warning');

                    console.log('Total sum of width must be 100 or you can leave each field blank');

                    return;
                }

                $(this).closest('.yatri-builder-drop-area').find('.grid input.column-width').removeClass('warning');

                $(this).trigger('yatri_render_builder_data');
            });
        },
        renderData: function () {

            var _that = this;

            $('body').on('yatri_render_builder_data', function (event) {

                var target = $(event.target);

                var control = target.closest('.yatri-builder-control');

                var content_area = control.find('.yatri-builder-drop-area');

                var field_data = new Array();

                var has_total_sum = false;

                if (_that.hasTotalSum(content_area, 100)) {

                    has_total_sum = true;
                }

                $.each(content_area.find('.grid'), function () {

                    var grid_data = {};

                    var width = $(this).find('input.column-width').val();

                    grid_data.width = '';

                    if ($.isNumeric(width) && has_total_sum) {

                        grid_data.width = width;
                    }
                    var section = $(this).find('.item');

                    grid_data.section = '';
                    if (section.length > 0) {
                        grid_data.section = section.eq(0).attr('data-section-key');
                    }

                    field_data.push(grid_data);
                });

                var value_string = JSON.stringify(field_data);

                var result_node = target.closest('.yatri-builder-content-wrap').find('input.yatri_customizer_builder_minified_results');

                result_node.val(value_string).trigger('change');

                console.log(field_data);
            });

        },
        initDraggableDropable: function () {

            var _that = this;

            $(".yatri-builder-sections .item, .yatri-builder-drop-area .grid-content .item").draggable({
                helper: "clone",
                revert: "invalid",
                //containment: '.yatri-builder-content-wrap',
                start: function (ev, ui) {
                    $(ui.helper).closest('.yatri-builder-content-wrap').find(".yatri-builder-drop-area").addClass('dropping');
                    $.each($(ui.helper).closest('.yatri-builder-content-wrap').find(".yatri-builder-drop-area .grid-content"), function () {
                        if ($(this).find('.item').length < 1) {
                            $(this).addClass('allow');
                        }
                    });
                },
                stop: function (ev, ui) {
                    $(ui.helper).closest('.yatri-builder-content-wrap').find(".yatri-builder-drop-area").removeClass('dropping');
                    $(ui.helper).closest('.yatri-builder-content-wrap').find(".yatri-builder-drop-area .grid-content").removeClass('allow');
                }

            });

            $(".yatri-builder-drop-area .grid-content").droppable({

                accept: ".yatri-builder-sections .item, .yatri-builder-drop-area .grid-content .item",

                drop: function (event, ui) {

                    if ($(ui.draggable).parent().hasClass('yatri-builder-sections')) {
                        if ($(this).find('.item').length > 0) {
                            alert('Sorry you cant add more than one item in one grid');
                            return;
                        } else {
                            $(this).append($(ui.draggable));
                        }

                    } else {

                        var grid = $(this).closest('.grid');

                        _that.moveElement(grid, $(ui.draggable));
                    }

                    _that.initDraggableDropable();


                    setTimeout(function () {
                        $(".yatri-builder-drop-area .grid-content").promise().done(function (event, ui) {
                            $(this).trigger('yatri_render_builder_data');
                        });
                    }, 100);
                },
            });
            //$(this).trigger('yatri_render_builder_data');

        },

        moveElement: function (current_grid, dragged_item, loop_count = 0) {

            var _that = this;

            var next_grid = current_grid.next('.grid');

            next_grid = (next_grid.length) ? next_grid : current_grid.prevAll('.grid').last();

            if (current_grid.find('.grid-content').find('.item').length === 1) {

                loop_count++;

                _that.moveElement(next_grid, current_grid.find('.grid-content').find('.item'), loop_count);

                current_grid.find('.grid-content').find('.item').find('.delete-icon').trigger('click');

                current_grid.find('.grid-content').append(dragged_item);

                if (loop_count >= 3) {

                    current_grid.trigger('yatri_render_builder_data');

                    return;
                }
            } else {
                current_grid.find('.grid-content').append(dragged_item);

                current_grid.trigger('yatri_render_builder_data');


            }
            if (loop_count >= 3) {

                current_grid.trigger('yatri_render_builder_data');

                return;
            }

        },


        validateNum: function (raw_num) {
            var numRegex = /^(100(?:\.00)?|0(?:\.\d\d)?|\d?\d(?:\.\d\d)?)$/;
            var return_num = numRegex.test(raw_num);
            return return_num;
        },
        setInputFilter: function (selector) {
            var _that = this;
            $(selector).bind("keypress drop", function (event) {

                var $this = $(this);
                if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                    ((event.which < 48 || event.which > 57) &&
                        (event.which != 0 && event.which != 8))) {
                    event.preventDefault();
                }
                var text = $(this).val();

                if ((event.which == 46) && (text.indexOf('.') == -1)) {
                    setTimeout(function () {
                        if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                            $this.val(_that.validateNum($this.val().substring(0, $this.val().indexOf('.') + 3)));
                        }
                    }, 1);
                }

                if ((text.indexOf('.') != -1) &&
                    (text.substring(text.indexOf('.')).length > 2) &&
                    (event.which != 0 && event.which != 8) &&
                    ($(this)[0].selectionStart >= text.length - 2)) {
                    event.preventDefault();
                }

                if (text.length == 2 && (text.indexOf('.') == -1)) {
                    if ((event.which != 46)) {
                        event.preventDefault();
                    }
                }

            });

            $(selector).bind("paste", function (e) {
                var text = e.originalEvent.clipboardData.getData('Text');
                if ($.isNumeric(text)) {
                    if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
                        e.preventDefault();
                        $(this).val(_that.validateNum(text.substring(0, text.indexOf('.') + 3)));
                    } else {
                        if (text.length > 2) {
                            $(this).val(text.substring(0, 2));
                            e.preventDefault();
                        }
                    }

                }
                else {
                    e.preventDefault();
                }
            });
        },
        widthValidate: function () {
            var _that = this;

            _that.setInputFilter('.yatri-builder-content-wrap input.column-width')


        },

        removeDroppedItem: function () {
            var _that = this;
            $('body').on('click', '.yatri-draggable-item .delete-icon', function () {
                var item = $(this).closest('.yatri-draggable-item').clone();
                $(this).closest('.yatri-draggable-item').closest('.yatri-builder-content-wrap').find('.yatri-builder-sections').append(item);
                $(this).closest('.yatri-draggable-item').remove();
                _that.initDraggableDropable();
                item.trigger('yatri_render_builder_data');


            });
        }


    };

    $(window).load(function () {
        yatriBuilder.init();
    });

})(jQuery, wp.customize || null);