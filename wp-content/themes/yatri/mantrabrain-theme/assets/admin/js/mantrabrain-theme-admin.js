var mantrabrain_theme_file_frame;
;(function ($) {

    var MantraBrainThemeAdminLib = {

        init: function () {

            this.initEvent();
        },
        initEvent: function () {

            var $this = this;
            $(document).on('click', 'button.media_upload', function (event) {
                event.preventDefault();
                $this.initWPImageUploader($(this));
            });
            $(document).ready(function () {
                $('#widgets-right .widget:has(.color-picker)').each(function () {
                    $this.initColorPicker($(this));
                });
            });

            $(document).on('widget-added widget-updated', function (event, widget) {

                $this.formUpdate($this, widget);
            });


            $(document).on('click', '.custom_media_preview button.remove', function (e) {
                e.preventDefault();
                $this.removeImage($(this));
            });

            $(document).on('click', '.mb-icon-picker-wrapper .toggle-icon', function (e) {
                e.preventDefault();
                $this.initIconPicker($(this));
            });

            $(document).on('click', '.mb-icon-picker-wrapper .mb-icon-list li.icon', function (e) {
                $this.pickIcon($(this));
            });

            $this.repeatorInit();
        },
        initWPImageUploader: function ($this) {

            var file_target_input = $this.parent().find('.custom_media_input');
            var file_target_preview = $this.parent().find('.media_preview_image');
            var remove_btn = $this.parent().find('.remove');

            var MantraBrainThemeImage = wp.media.controller.Library.extend({
                defaults: _.defaults({
                    id: 'mantrabrain-theme-insert-image',
                    title: $this.data('uploader_title'),
                    allowLocalEdits: false,
                    displaySettings: true,
                    displayUserSettings: false,
                    multiple: false,
                    library: wp.media.query({type: 'image'})
                }, wp.media.controller.Library.prototype.defaults)
            });

            // Create the media frame.
            mantrabrain_theme_file_frame = wp.media.frames.mantrabrain_theme_file_frame = wp.media({
                button: {
                    text: jQuery(this).data('uploader_button_text')
                },
                state: 'mantrabrain-theme-insert-image',
                states: [
                    new MantraBrainThemeImage()
                ],
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            mantrabrain_theme_file_frame.on('select', function () {

                // Get the attachment from the modal frame.
                var attachment = mantrabrain_theme_file_frame.state().get('selection').first().toJSON();
                // Initialize input and preview change.
                file_target_input.val(attachment.url).trigger('change');
                file_target_preview.css({display: 'none'});
                file_target_preview.attr('src', attachment.url).css({display: 'block'});
                remove_btn.show();

            });

            // Finally, open the modal
            mantrabrain_theme_file_frame.open();

        },
        initColorPicker: function (widget) {
            widget.find('.color-picker').wpColorPicker({
                change: _.throttle(function () { // For Customizer
                    $(this).trigger('change');
                }, 3000)
            });
        },
        removeImage: function ($this) {
            var image_field = $this.parent().find('.custom_media_input');
            image_field.val('');
            $this.parent().find('.media_preview_image').css({display: 'none'});
            image_field.trigger('change');
            $this.hide();
        },
        formUpdate: function ($this, widget) {
            $this.initColorPicker(widget);
        },
        initIconPicker($this) {
            $this.closest('.mb-icon-picker-wrapper').find('.mb-icon-list').slideToggle("slow");

        },
        pickIcon: function ($this) {
            var wrapper = $this.closest('.mb-icon-picker-wrapper');
            wrapper.find('.mb-icon-list ul li.active').removeClass('active');
            var value = $this.attr('data-icon');
            var old_value = wrapper.find('input.widefat').val();
            wrapper.find('input.widefat').val(value).trigger('change');
            wrapper.find('.selected-icon').removeClass('fa').removeClass(old_value).addClass('fa ' + value);
            $this.addClass('active');
        },
        repeatorInit: function () {

            $(document).on('click', '.mb-repeator-field .action-btn', function (e) {

                var container = $(this).closest('.mb-repeator-field-container');

                var number_of_repeator = container.data('repeator-num');

                var len = container.find('.mb-repeator-field').length;

                if ($(this).hasClass('add')) {

                    if (number_of_repeator > len) {

                        var repeator_tmpl_clone = container.find('.mb-repeator-field-tmpl').clone();

                        var repeator_tmpl_clone_html = repeator_tmpl_clone.html();

                        repeator_tmpl_clone_html = repeator_tmpl_clone_html.replace(/__mb_index__/ig, len);

                        container.append('<div class="mb-repeator-field">' + repeator_tmpl_clone_html + "</div>");

                    } else {
                        alert('Maximm repeator exceed');
                    }

                } else if ($(this).hasClass('remove')) {

                    if (len > 1) {

                        $(this).closest('.mb-repeator-field').remove();
                    }
                }
                container.find('.mb-repeator-field:not(:last-child)').find('.action-btn').removeClass('add').addClass('remove');

                if (number_of_repeator <= len) {
                    container.find('.mb-repeator-field:last-child').find('.action-btn').removeClass('add').addClass('remove');
                } else {
                    container.find('.mb-repeator-field:last-child').find('.action-btn').removeClass('remove').addClass('add');

                }

                container.find('input').trigger('change');


            });
            $(document).on('click', '.widget-content .mb-repeator-field .toggle-action', function () {
                var field = $(this).closest('.mb-repeator-field');
                if (field.hasClass('toggle-on')) {
                    field.removeClass('toggle-on');
                } else {
                    field.addClass('toggle-on');
                }
            });
        }
    };

    MantraBrainThemeAdminLib.init();


})(jQuery);