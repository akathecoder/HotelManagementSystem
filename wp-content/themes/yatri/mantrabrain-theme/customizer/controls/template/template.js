/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriTemplateControl = {
        init: function () {


            this.saveTemplate();
            this.removeTemplate();


        },
        removeTemplate: function () {

            $('body').on('click', '.yatri-remove-template', function () {
                var _that = $(this).closest('li');

                var tmpl_id = _that.attr('data-id');

                var uniqid = _that.attr('data-uniqid');

                if ("" != uniqid && "" != tmpl_id) {

                    var yatri_template_params = {

                        '_yatri_nonce': yatriTemplateParams._remove_template_nonce,

                        'uniqid': uniqid,

                        'template_id': tmpl_id,

                        'action': 'yatri_remove_header_template',

                    };
                    $.ajax({
                        type: "POST",
                        url: yatriTemplateParams.ajax_url,
                        data: yatri_template_params,
                        beforeSend: function () {

                        },
                        success: function (response) {

                            if (response.success === true) {

                                _that.remove();

                            }

                        },
                        complete: function () {

                        }
                    });

                }
            })

        },

        saveTemplate: function () {

            $('body').on('click', ".yatri-save-header-template", function () {
                var _that = $(this);
                var save_template_form = $(this).closest('.save-template-form');

                var template_name = save_template_form.find("input.yatri-template-name").val();

                var template_id = save_template_form.find("input.yatri-template-name").attr('data-template-id');

                var yatri_template_params = {

                    '_yatri_nonce': yatriTemplateParams._save_nonce,

                    'template_name': template_name,

                    'action': 'yatri_save_header_template',

                    'template_id': template_id

                };

                if ("" != (template_name)) {
                    $.ajax({
                        type: "POST",
                        url: yatriTemplateParams.ajax_url,
                        data: yatri_template_params,
                        beforeSend: function () {

                        },
                        success: function (response) {

                            if (response.success === true) {

                                var data = response.data;

                                var list = $('<li data-id="' + data.template_id + '" data-uniqid="' + data.uniqid + '"><span>' + data.template_name + '</span><a class="yatri-remove-template dashicons dashicons-trash" href="#"></a></li>');

                                _that.closest('.yatri-template-control').find('.save-template-form').find('input.yatri-template-name').val("");

                                _that.closest('.yatri-template-control').find('ul.template-list').append(list);
                            }

                        },
                        complete: function () {

                        }
                    });
                }
            });
        }


    };
    wp.customize.bind('ready', function () {

        yatriTemplateControl.init();

    })

})(jQuery, wp.customize || null);