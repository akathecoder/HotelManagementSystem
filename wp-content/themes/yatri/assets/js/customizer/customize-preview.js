(function ($, api, _) {

    var yatriCustomizerPreview = {

        loadStyle: function () {


            var yatriCustomizerChanges = JSON.parse(window.localStorage.getItem("yatriCustomizerChanges"));

            var id = yatriCustomizerChanges.field_id;

            var css_code = yatriCustomizerChanges.css_code;
            css_code += yatriCustomizerChanges.additional_css;

            this.add_dynamic_css(id, css_code);


        },
        add_dynamic_css: function (id, css_code) {

            var style_node_id = 'yatri_dynamic_css_for_' + id;

            var style_node = $('<style type="text/css" id="' + style_node_id + '"/>');

            $('#' + style_node_id).remove();

            style_node.append(css_code);
            style_node.insertAfter('.yatri-dynamic-css');
        },
        update_sidebar_width: function (to, selector, both_sidebar_class, id) {

            var sidebar_width = to;

            var content_wrapper_width = '';

            if (!$('body').hasClass(selector)) {
                return;
            }
            content_wrapper_width = 100 - sidebar_width;
            if (sidebar_width > 0 && sidebar_width !== 33 && sidebar_width <= 50) {

                if ($('body').hasClass(both_sidebar_class)) {

                    sidebar_width = sidebar_width > 35 ? 100 : sidebar_width;

                    content_wrapper_width = sidebar_width > 35 ? 100 : 100 - (sidebar_width * 2);

                }

                var css = '@media (min-width: 768px) {body.' + selector + ' .yatri-sidebar{\n' +
                    '                    -ms-flex: 0 0 ' + sidebar_width + '%;\n' +
                    '                    -webkit-box-flex: 0;\n' +
                    '                    -webkit-flex: 0 0 ' + sidebar_width + '%;\n' +
                    '                    -moz-box-flex: 0;\n' +
                    '                    flex: 0 0 ' + sidebar_width + '%;\n' +
                    '                    max-width: ' + sidebar_width + '%;\n' +
                    '                }\n' +
                    '                      body.' + selector + ' .yatri-main-wrap{\n' +
                    '                    -ms-flex: 0 0 ' + content_wrapper_width + '%;\n' +
                    '                    -webkit-box-flex: 0;\n' +
                    '                    -webkit-flex: 0 0 ' + content_wrapper_width + '%;\n' +
                    '                    -moz-box-flex: 0;\n' +
                    '                    flex: 0 0 ' + content_wrapper_width + '%;\n' +
                    '                    max-width: ' + content_wrapper_width + '%;\n' +
                    '                    \n' +
                    '                    }\n' +
                    '                };';
                yatriCustomizerPreview.add_dynamic_css(id, css);
            }
        }


    };
    var yatri_customizer_modal_keys = typeof yatriCustomizerPreviewObject.post_message_modal_keys !== "undefined" && typeof yatriCustomizerPreviewObject.post_message_modal_keys !== undefined ? yatriCustomizerPreviewObject.post_message_modal_keys : {};

    for (var yt_property in yatri_customizer_modal_keys) {

        if (yatri_customizer_modal_keys.hasOwnProperty(yt_property)) {

            var id = yatri_customizer_modal_keys[yt_property];

            if (id !== '' && id !== undefined && id !== "undefined") {

                var control_id = 'yatri_theme_options[' + id + ']';
                api(control_id, function (value) {
                    value.bind(function (to) {
                        yatriCustomizerPreview.loadStyle();

                    });
                });
            }
        }
    }

    api('yatri_theme_options[container_width]', function (value) {
        value.bind(function (to) {
            var boxed_layout = 'yatri-global-layout-boxed';
            var width = parseInt(to);
            var css = '';
            if ($('body').hasClass(boxed_layout) || (!$('body').hasClass(boxed_layout) && width !== 1140)) {
                var css = '@media (min-width: 768px) {\n' +
                    '                    body.yatri-global-layout-boxed .site{width:' + width + 'px; max-width:100%}\n' +
                    '                    body.yatri-global-layout-boxed .site .yat-container{width:' + width + 'px; max-width:100%}\n' +
                    '                    body.yatri-global-layout-full_width .yat-container{width:' + width + 'px; max-width:100%}\n' +
                    '                }';
            }
            yatriCustomizerPreview.add_dynamic_css('yatri_theme_options_global_container_width', css);
        });
    });

    api('yatri_theme_options[breadcrumb_home_text]', function (value) {
        value.bind(function (to) {
            $('body').find(".breadcrumb-trail").find('li').eq(0).find('a span').text(to);
        });
    });
    api('blogname', function (value) {
        value.bind(function (to) {
            $('body').find(".site-header").find(".site-title a").text(to);
        });
    });
    api('blogdescription', function (value) {
        value.bind(function (to) {
            $('body').find(".site-header").find(".site-description").text(to);
        });
    });
    //Top Header Part

    api('yatri_theme_options[top_header_button_icon]', function (value) {
        value.bind(function (to) {
            $('body').find(".top-header").find(".yatri-section-button .yatri-button").find('.yatri-button-icon').remove();
            $('body').find(".top-header").find(".yatri-section-button .yatri-button").prepend('<i class="yatri-button-icon ' + to + '"></i>');
        });
    });
    //Button Link
    api('yatri_theme_options[top_header_button_link]', function (value) {
        value.bind(function (to) {
            $('body').find(".top-header").find(".yatri-section-button .yatri-button").attr('href', to);
        });
    });

    api('yatri_theme_options[top_header_button_label]', function (value) {
        value.bind(function (to) {
            $('body').find(".top-header").find(".yatri-section-button .yatri-button").find('span').remove();
            $('body').find(".top-header").find(".yatri-section-button .yatri-button").append('<span>' + to + '</span>');
        });
    });
    // Custom HTML
    api('yatri_theme_options[top_header_custom_html_content]', function (value) {
        value.bind(function (to) {
            $('body').find(".top-header").find(".yatri-section-custom-html").html(to);

        });
    });


    //Mid Heder
    api('yatri_theme_options[mid_header_button_icon]', function (value) {
        value.bind(function (to) {
            $('body').find(".yatri-mid-header").find(".yatri-section-button .yatri-button").find('.yatri-button-icon').remove();
            $('body').find(".yatri-mid-header").find(".yatri-section-button .yatri-button").prepend('<i class="yatri-button-icon ' + to + '"></i>');
        });
    });
    //Button Link
    api('yatri_theme_options[mid_header_button_link]', function (value) {
        value.bind(function (to) {
            $('body').find(".yatri-mid-header").find(".yatri-section-button .yatri-button").attr('href', to);
        });
    });

    api('yatri_theme_options[mid_header_button_label]', function (value) {
        value.bind(function (to) {
            $('body').find(".yatri-mid-header").find(".yatri-section-button .yatri-button").find('span').remove();
            $('body').find(".yatri-mid-header").find(".yatri-section-button .yatri-button").append('<span>' + to + '</span>');
        });
    });
    // Custom HTML
    api('yatri_theme_options[mid_header_custom_html_content]', function (value) {
        value.bind(function (to) {
            $('body').find(".yatri-mid-header").find(".yatri-section-custom-html").html(to);

        });
    });

    //Mid Heder
    api('yatri_theme_options[bottom_header_button_icon]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-header").find(".yatri-section-button .yatri-button").find('.yatri-button-icon').remove();
            $('body').find(".bottom-header").find(".yatri-section-button .yatri-button").prepend('<i class="yatri-button-icon ' + to + '"></i>');
        });
    });
    //Button Link
    api('yatri_theme_options[bottom_header_button_link]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-header").find(".yatri-section-button .yatri-button").attr('href', to);
        });
    });

    api('yatri_theme_options[bottom_header_button_label]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-header").find(".yatri-section-button .yatri-button").find('span').remove();
            $('body').find(".bottom-header").find(".yatri-section-button .yatri-button").append('<span>' + to + '</span>');
        });
    });
    // Custom HTML
    api('yatri_theme_options[bottom_header_custom_html_content]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-header").find(".yatri-section-custom-html").html(to);

        });
    });

    //Blog Archive Page
    api('yatri_theme_options[blog_archive_sidebar_width]', function (value) {
        value.bind(function (to) {

            yatriCustomizerPreview.update_sidebar_width(to, 'yatri-blog-archive-page', 'yatri_both_sidebar_layout', 'yatri_theme_options_blog_archive_sidebar_width');

        });

    });

    api('yatri_theme_options[blog_archive_page_meta_content_separator]', function (value) {
        value.bind(function (to) {


            var selector = 'yatri-blog-archive-page';

            if (!$('body').hasClass(selector)) {
                return;
            }
            $('body').find('.site-content').find('.meta.yatri-content-item').find(".sep").text(to);


        });

    });

    api('yatri_theme_options[blog_archive_page_meta_content_separator_width]', function (value) {
        value.bind(function (to) {


            var selector = 'yatri-blog-archive-page';

            if (!$('body').hasClass(selector)) {
                return;
            }
            var margin = to / 2;
            $('body').find('.site-content').find('.meta.yatri-content-item').find(".sep").css({
                'margin-right': margin + 'px',
                'margin-left': margin + 'px'
            });


        });

    });

    api('yatri_theme_options[blog_archive_page_readmore_text]', function (value) {
        value.bind(function (to) {


            var selector = 'yatri-blog-archive-page';

            if (!$('body').hasClass(selector)) {
                return;
            }

            var span = $('body').find('.site-content').find('.learn-more-btn a.button-text').find('span');
            var div = $('<div/>');
            div.append(to);
            div.append(span);
            $('body').find('.site-content').find('.learn-more-btn a.button-text').html(div.html());


        });

    });

    api('yatri_theme_options[blog_archive_page_readmore_text_icon]', function (value) {
        value.bind(function (to) {


            var selector = 'yatri-blog-archive-page';

            if (!$('body').hasClass(selector)) {
                return;
            }

            $('body').find('.site-content').find('.learn-more-btn a.button-text').find('span').remove();

            $('body').find('.site-content').find('.learn-more-btn a.button-text').append('<span class="' + to + '"></span>');


        });

    });

    // Single Post
    api('yatri_theme_options[single_post_sidebar_width]', function (value) {
        value.bind(function (to) {

            yatriCustomizerPreview.update_sidebar_width(to, 'yatri-single-post', 'yatri_both_sidebar_layout', 'yatri_theme_options_single_post_sidebar_width');

        });

    });

    // Single Page
    api('yatri_theme_options[page_sidebar_width]', function (value) {
        value.bind(function (to) {

            yatriCustomizerPreview.update_sidebar_width(to, 'yatri-single-page', 'yatri_both_sidebar_layout', 'yatri_theme_options_page_sidebar_width');

        });

    });

    // Bottom Footer

    api('yatri_theme_options[bottom_footer_button_icon]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-footer").find(".yatri-section-button .yatri-button").find('.yatri-button-icon').remove();
            $('body').find(".bottom-footer").find(".yatri-section-button .yatri-button").prepend('<i class="yatri-button-icon ' + to + '"></i>');
        });
    });
    //Button Link
    api('yatri_theme_options[bottom_footer_button_link]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-footer").find(".yatri-section-button .yatri-button").attr('href', to);
        });
    });

    api('yatri_theme_options[bottom_footer_button_label]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-footer").find(".yatri-section-button .yatri-button").find('span').remove();
            $('body').find(".bottom-footer").find(".yatri-section-button .yatri-button").append('<span>' + to + '</span>');
        });
    });
    // Custom HTML
    api('yatri_theme_options[bottom_footer_custom_html_content]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-footer").find(".yatri-section-custom-html").html(to);

        });
    });

    //Copyright
    api('yatri_theme_options[bottom_footer_copyright_content]', function (value) {
        value.bind(function (to) {
            $('body').find(".bottom-footer").find(".yatri-section-copyright").html(to);

        });
    });


}(jQuery, wp.customize, _));