(function ($, wpcustomize) {

    var yatriToolsPrebuiltHeaderTemplate = {

        openHeaderTemplate: function (node) {
            var prebuilt = $('#customize-preview').find('.yatri-prebuilt-template-wrap');
            if (node.hasClass('open')) {
                node.removeClass('open');
                prebuilt.removeClass('open');
                node.text('Open Templates');
                return;
            }

            node.text('Close');
            var templates = JSON.parse(node.attr('data-templates'));
            var listDiv = $('<div/>');
            for (var template_index in templates) {
                listDiv.append('<label class="template-list" data-json="' + templates[template_index].json + '">' +
                    '<button class="button yatri-tools-import-header-template"><span class="fas fa-download"></span> Import This Template</button> ' +
                    '<img src="' + templates[template_index].thumbnail + '"/>' +
                    '</label>');
            }
            listDiv.prepend('<a class="customize-controls-close yatri-close-builder-template " href="#">\n' +
                '                    <span class="screen-reader-text">Cancel</span>\n' +
                '                </a>');
            prebuilt.html(listDiv.html());
            node.addClass('open');
            prebuilt.addClass('open');


        },
        importThisTemplate: function (node) {

            var confirm = window.confirm('Are you sure want to import this header template? This will override all your current header settings and reload this page.');
            if (!confirm) {
                return;
            }
            node.text('Importing...');
            var json_url = node.closest('.template-list').attr('data-json');

            $.ajax({
                type: "POST",
                url: yatriToolsPrebuiltHeaderTemplateParams.ajax_url,
                data: {
                    nonce: yatriToolsPrebuiltHeaderTemplateParams.import_nonce,
                    json_url: json_url,
                    action: 'yatri_tools_import_header_template'
                },
                beforeSend: function () {

                },
                success: function (response) {

                    window.location.href = yatriToolsPrebuiltHeaderTemplateParams.auto_focus_url;


                },
                complete: function () {
                    window.location.href = yatriToolsPrebuiltHeaderTemplateParams.auto_focus_url;
                }
            });
        }


    };
    wp.customize.controlConstructor['yatri-prebuilt-header'] = wp.customize.Control.extend({

        ready: function () {

            'use strict';

            var control = this;

            var prebuilt_template = $('<div class="yatri-prebuilt-template-wrap"/>');

            if ($('#customize-preview').find('.yatri-prebuilt-template-wrap').length == 0) {

                $('#customize-preview').append(prebuilt_template);
            }


            // Change the value
            this.container.on('click', 'input', function (e) {
                e.preventDefault();
                control.setting.set(jQuery(this).val());
            });

            this.container.on('click', '.yatri-open-prebuilt-header-templates', function () {

                yatriToolsPrebuiltHeaderTemplate.openHeaderTemplate($(this));
            });

            $('body').on('click', '.yatri-tools-import-header-template', function () {
                yatriToolsPrebuiltHeaderTemplate.importThisTemplate($(this));
            });
            $('body').on('click', '.yatri-close-builder-template', function (e) {
                e.preventDefault();
                $('.yatri-open-prebuilt-header-templates').trigger('click');
            });
        }

    });


})(jQuery, wp.customize || null);