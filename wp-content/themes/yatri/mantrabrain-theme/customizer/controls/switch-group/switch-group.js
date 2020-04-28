/**
 * Extend Customizer Panel
 *
 * @package Mantrabrain
 */
(function ($, wpcustomize) {

    var api = wp.customize;

    var $document = $(document);

    var yatriControlSwitchGroup = {
        init: function () {


            this.initSwitchGroup();
            this.initToggle();

        },
        initSwitchGroup: function () {

            var instance = this;

            var values = {};

            $document.on('change', '.mb-switch-group-control-wrap input[type="checkbox"]', function () {

                $(this).closest('.mb-switch-group-control-wrap').find('input[type="checkbox"]').each(function () {

                    var id = $(this).attr("data-id");

                    if (typeof id !== 'undefined') {

                        var value = !!$(this).is(":checked");

                        values[id] = value;

                    }
                });

                var input = $(this).closest('.mb-switch-group-control-wrap').find('.customize-control-switch-group-value');
                input.val(JSON.stringify(values)).trigger('change');
            });
        },
        initToggle: function () {
            $('body').on('click', '.mb-switch-group-control-wrap .switch-group-toggle', function () {
                var _that = $(this);
                if (!$(this).closest('.mb-switch-group-control-wrap').hasClass('open')) {
                    _that.closest('.mb-switch-group-control-wrap').addClass('open');


                } else {

                    _that.closest('.mb-switch-group-control-wrap').removeClass('open');


                }
            });
        }


    };
    $document.ready(function () {
        yatriControlSwitchGroup.init();

    })

})(jQuery, wp.customize || null);