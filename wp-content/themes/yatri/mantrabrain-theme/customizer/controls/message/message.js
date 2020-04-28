/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriControlMesage = {

        init: function () {

            this.initRedirectTo();
        },
        initRedirectTo: function () {
            $('body').on('click', '.yatri-control-message-wrapper', function () {

                var section = $(this).attr('data-click-autofocus');
                if (typeof section !== 'undefined') {
                    wp.customize.control(section).focus()
                }
            });
        }


    };
    $document.ready(function () {

        yatriControlMesage.init();

    })

})(jQuery, wp.customize || null);