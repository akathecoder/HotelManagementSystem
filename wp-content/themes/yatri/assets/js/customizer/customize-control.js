(function (api) {
    'use strict';

    // Add callback for when the header_textcolor setting exists.
    api('yatri_theme_options[show_top_header]', function (setting) {
        var isHeaderTextDisplayed, linkSettingValueToControlActiveState;

        /**
         * Determine whether the site title and tagline should be displayed.
         *
         * @returns {boolean} Is displayed?
         */
        isHeaderTextDisplayed = function () {


            return setting.get();
        };

        /**
         * Update a control's active state according to the header_textcontrol setting's value.
         *
         * @param {wp.customize.Control} control Site Title or Tagline Control.
         */
        linkSettingValueToControlActiveState = function (control) {
            var setActiveState = function () {
                control.active.set(isHeaderTextDisplayed());
            };

            // FYI: With the following we can eliminate all of our PHP active_callback code.
            control.active.validate = isHeaderTextDisplayed;

            // Set initial active state.
            setActiveState();

            /*
             * Update activate state whenever the setting is changed.
             * Even when the setting does have a refresh transport where the
             * server-side active callback will manage the active state upon
             * refresh, having this JS management of the active state will
             * ensure that controls will have their visibility toggled
             * immediately instead of waiting for the preview to load.
             * This is especially important if the setting has a postMessage
             * transport where changing the setting wouldn't normally cause
             * the preview to refresh and thus the server-side active_callbacks
             * would not get invoked.
             */
            setting.bind(setActiveState);
        };

        // Call linkSettingValueToControlActiveState on the site title and tagline controls when they exist.
        api.control('yatri_theme_options[top_header_visibility]', linkSettingValueToControlActiveState);
        api.control('yatri_theme_options[top_header_design]', linkSettingValueToControlActiveState);
    });

}(wp.customize));