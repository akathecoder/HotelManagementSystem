jQuery(document).ready(function ($) {

    var at_document = $(document);

    $('.yatri-plugin-install-notice-wrap a.button').click(function (e) {
        e.preventDefault();

        $(this).addClass('updating-message');
        $(this).text(yatri_about_obj.button_text);
        var params = {
            data: {
                action: yatri_about_obj.starter_site_install_action,
                security: yatri_about_obj.nonce,
                request: 1
            },
            ajax_url: ajaxurl,

            success_callback: function (response, extra_params) {

                if (typeof response.redirect != "undefined") {

                    window.location.href = response.redirect;
                } else {
                    if ('' !== yatri_about_obj.redirect) {
                        window.location.href = yatri_about_obj.redirect;
                    }
                }
            }

        };
        yatri_install_recommanded_plugins(params);
    });

    $('#plugin-filter .box-plugins').on('click', '.activate-now', function (e) {
        e.preventDefault();
        var button = $(this);
        button.addClass('button installing updating-message');
        var params = {
            data: {
                action: yatri_about_obj.starter_site_install_action,
                security: yatri_about_obj.nonce,
                request: 1,
                redirect: 'no'
            },
            ajax_url: ajaxurl,
            extra_params: {
                button: button
            },

            success_callback: function (response, extra_params) {
                var button = extra_params.button;
                var sites_url = button.closest('.rcp').attr('data-sites-url');
                var view_sites = button.closest('.rcp').attr('data-view-site-text');
                $('.rcp .plugin-detail').hide();
                button.attr('href', sites_url);
                button.attr('class', 'view-site-library');
                button.text(view_sites);
            }

        };
        yatri_install_recommanded_plugins(params);
    });

    function yatri_install_recommanded_plugins(params) {
        var data = params.data;
        var success_callback = typeof params.success_callback != "undefined" ? params.success_callback : '';
        var extra_params = typeof params.extra_params != "undefined" ? params.extra_params : '';
        $.ajax({
            type: "POST",
            url: params.ajax_url,
            data: data,
            success: function (response) {

                if (typeof success_callback == "function") {

                    success_callback(response, extra_params);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
            }
        });
    }

});
