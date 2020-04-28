(function ($, wpcustomize) {
    
    wp.customize.controlConstructor['yatri_editor_control'] = wp.customize.Control.extend({

        initYatriControlDone: function () {
            'use strict';
            var control = this,
                element = control.container.find('textarea'),
                editor, control_id;


        },

    });


})(jQuery, wp.customize || null);