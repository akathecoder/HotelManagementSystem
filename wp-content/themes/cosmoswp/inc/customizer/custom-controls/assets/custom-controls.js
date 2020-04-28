/**
 * Buttonset JS
 */
wp.customize.controlConstructor['cosmoswp-buttonset'] = wp.customize.Control.extend({
    ready: function () {

        'use strict';

        var control = this;

        // Change the value
        this.container.on('click', 'input', function () {
            control.setting.set(jQuery(this).val());
        });
    }
});

/**
 * Responsive ButtonSet JS
 * */

wp.customize.controlConstructor['cosmoswp-responsive-buttonset'] = wp.customize.Control.extend({
    ready: function () {

        'use strict';

        var control = this;

        this.container.on('click', 'input',function(e){
            control.updateValue();
        });
    },

    /**
     * Update
     */
    updateValue: function () {
        'use strict';
        var control = this;

        var valueToPush = {};
        control.container.find('.cosmoswp-responsive-buttonset-device-wrap').each(function(){
            var $ = jQuery;
            var device = $(this).attr('data-device');
            var inputname = $(this).attr('data-inputname');
            var dataValue = $(this).find('input[name='+inputname+']:checked').val();

            valueToPush[device] = dataValue;
        });
        var collector = jQuery( control ).find( '.cosmoswp-responsive-buttonset-collection-value' );
        collector.val( JSON.stringify( valueToPush ) );
        control.setting.set(JSON.stringify(valueToPush));
    },
});



/**
 * Alpha Color Picker JS
 *
 * This file includes several helper functions and the core control JS.
 */

/**
 * Override the stock color.js toString() method to add support for
 * outputting RGBa or Hex.
 */
Color.prototype.toString = function( flag ) {

	// If our no-alpha flag has been passed in, output RGBa value with 100% opacity.
	// This is used to set the background color on the opacity slider during color changes.
	if ( 'no-alpha' == flag ) {
		return this.toCSS( 'rgba', '1' ).replace( /\s+/g, '' );
	}

	// If we have a proper opacity value, output RGBa.
	if ( 1 > this._alpha ) {
		return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
	}

	// Proceed with stock color.js hex output.
	var hex = parseInt( this._color, 10 ).toString( 16 );
	if ( this.error ) { return ''; }
	if ( hex.length < 6 ) {
		for ( var i = 6 - hex.length - 1; i >= 0; i-- ) {
			hex = '0' + hex;
		}
	}
	return '#' + hex;
};

/**
 * Given an RGBa, RGB, or hex color value, return the alpha channel value.
 */
function acp_get_alpha_value_from_color( value ) {
	var alphaVal;

	// Remove all spaces from the passed in value to help our RGBa regex.
	value = value.replace( / /g, '' );

	if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
		alphaVal = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1] ).toFixed(2) * 100;
		alphaVal = parseInt( alphaVal );
	} else {
		alphaVal = 100;
	}

	return alphaVal;
}

/**
 * Force update the alpha value of the color picker object and maybe the alpha slider.
 */
 function acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, update_slider ) {
	var iris, colorPicker, color;

	iris = $control.data( 'a8cIris' );
	colorPicker = $control.data( 'wpWpColorPicker' );

	// Set the alpha value on the Iris object.
	iris._color._alpha = alpha;

	// Store the new color value.
	color = iris._color.toString();

	// Set the value of the input.
	$control.val( color );


    // Update the background color of the color picker.
	colorPicker.toggler.css({
		'background-color': color
	});

	// Maybe update the alpha slider itself.
	if ( update_slider ) {
		acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
	}

	// Update the color value of the color picker object.
	$control.wpColorPicker( 'color', color );
}

/**
 * Update the slider handle position and label.
 */
function acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider ) {
	$alphaSlider.slider( 'value', alpha );
	$alphaSlider.find( '.ui-slider-handle' ).text( alpha.toString() );
}

function cwp_alpha_color_control( wrap, $ ){
    // Loop over each control and transform it into our color picker.
    wrap.find( '.cwp-alpha-color-control' ).each( function() {

        // Scope the vars.
        var $control, startingColor, showOpacity, defaultColor, colorPickerOptions,
            $container, $alphaSlider, alphaVal, sliderOptions;

        // Store the control instance.
        $control = $( this );

        // Get a clean starting value for the option.
        startingColor = $control.val().replace( /\s+/g, '' );

        // Get some data off the control.
        showOpacity  = $control.attr( 'data-show-opacity' );
        defaultColor = $control.attr( 'data-default-color' );

        // Set up the options that we'll pass to wpColorPicker().
        colorPickerOptions = {

            change: _.throttle( function(event, ui) { // For Customizer
                var key, value, alpha, $transparency;

                key = $control.attr( 'data-customize-setting-link' );
                value = $control.wpColorPicker( 'color' );

                // Set the opacity value on the slider handle when the default color button is clicked.
                if ( defaultColor == value ) {
                    alpha = acp_get_alpha_value_from_color( value );
                    $alphaSlider.find( '.ui-slider-handle' ).text( alpha );
                }

                // Send ajax request to wp.customize to trigger the Save action.
                wp.customize( key, function( obj ) {
                    obj.set( value );
                });

                $transparency = $container.find( '.transparency' );

                // Always show the background color of the opacity slider at 100% opacity.
                $transparency.css( 'background-color', ui.color.toString( 'no-alpha' ) );

                $control.trigger('change');
            }, 3000 ),
            palettes: cosmoswpLocalize.colorPalettes // Use the passed in palette.
        };

        // Create the colorpicker.
        $control.wpColorPicker( colorPickerOptions );

        $container = $control.parents( '.wp-picker-container:first' );

        // Insert our opacity slider.
        $( '<div class="alpha-color-picker-container">' +
            '<div class="min-click-zone click-zone"></div>' +
            '<div class="max-click-zone click-zone"></div>' +
            '<div class="alpha-slider"></div>' +
            '<div class="transparency"></div>' +
            '</div>' ).appendTo( $container.find( '.wp-picker-holder' ) );

        $alphaSlider = $container.find( '.alpha-slider' );

        // If starting value is in format RGBa, grab the alpha channel.
        alphaVal = acp_get_alpha_value_from_color( startingColor );

        // Set up jQuery UI slider() options.
        sliderOptions = {
            create: function( event, ui ) {
                var value = $( this ).slider( 'value' );

                // Set up initial values.
                $( this ).find( '.ui-slider-handle' ).text( value );
                $( this ).siblings( '.transparency ').css( 'background-color', startingColor );
            },
            value: alphaVal,
            range: 'max',
            step: 1,
            min: 0,
            max: 100,
            animate: 300
        };

        // Initialize jQuery UI slider with our options.
        $alphaSlider.slider( sliderOptions );

        // Maybe show the opacity on the handle.
        if ( 'true' == showOpacity ) {
            $alphaSlider.find( '.ui-slider-handle' ).addClass( 'show-opacity' );
        }

        // Bind event handlers for the click zones.
        $container.find( '.min-click-zone' ).on( 'click', function() {
            acp_update_alpha_value_on_color_control( 0, $control, $alphaSlider, true );
        });
        $container.find( '.max-click-zone' ).on( 'click', function() {
            acp_update_alpha_value_on_color_control( 100, $control, $alphaSlider, true );
        });

        // Bind event handler for clicking on a palette color.
        $container.find( '.iris-palette' ).on( 'click', function() {
            var color, alpha;

            color = $( this ).css( 'background-color' );
            alpha = acp_get_alpha_value_from_color( color );

            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );

            // Sometimes Iris doesn't set a perfect background-color on the palette,
            // for example rgba(20, 80, 100, 0.3) becomes rgba(20, 80, 100, 0.298039).
            // To compensante for this we round the opacity value on RGBa colors here
            // and save it a second time to the color picker object.
            if ( alpha != 100 ) {
                color = color.replace( /[^,]+(?=\))/, ( alpha / 100 ).toFixed( 2 ) );
            }

            $control.wpColorPicker( 'color', color );
        });

        // Bind event handler for clicking on the 'Clear' button.
        $container.find( '.button.wp-picker-clear' ).on( 'click', function() {
            var key = $control.attr( 'data-customize-setting-link' );
            // The #fff color is delibrate here. This sets the color picker to white instead of the
            // defult black, which puts the color picker in a better place to visually represent empty.
            $control.wpColorPicker( 'color', '' );

            // Set the actual option value to empty string.
            wp.customize( key, function( obj ) {
                obj.set( '' );
            });

            acp_update_alpha_value_on_alpha_slider( 100, $alphaSlider );
        });

        // Bind event handler for clicking on the 'Default' button.
        $container.find( '.button.wp-picker-default' ).on( 'click', function() {
            var alpha = acp_get_alpha_value_from_color( defaultColor );

            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
        });

        // Bind event handler for typing or pasting into the input.
        $control.on( 'input', function() {
            var value = $( this ).val();
            var alpha = acp_get_alpha_value_from_color( value );

            acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
        });

        // Update all the things when the slider is interacted with.
        $alphaSlider.slider().on( 'slide', function( event, ui ) {
            var alpha = parseFloat( ui.value ) / 100.0;

            acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, false );

            // Change value shown on slider handle.
            $( this ).find( '.ui-slider-handle' ).text( ui.value );
        });

    });
}

/**
 * Initialization trigger.
 */
jQuery( document ).ready( function( $ ) {
    cwp_alpha_color_control( $('body'), $ );
});



/**
 * CssBox JS
 */
wp.customize.controlConstructor['cosmoswp-cssbox'] = wp.customize.Control.extend({
    ready: function () {

        'use strict';

        var control = this;

        this.container.on('change keyup input', '.cssbox-field',function(e){
            e.preventDefault();
            var $ = jQuery;
            var cssbox_field = $(this);

            if( !cssbox_field.hasClass('cssbox_link') ){
                var dataValue = cssbox_field.val(),
                    device_wrap = cssbox_field.closest('.cssbox-device-wrap');

                if( device_wrap.find('.cssbox_link').is(':checked') ){
                    device_wrap.find('.cssbox-field').each(function(){
                        $(this).val(dataValue);
                    });
                }
            }
            control.updateValue();
        });
    },

    /**
     * Update
     */
    updateValue: function () {
        'use strict';
        var control = this;

        var valueToPush = {};
        control.container.find('.cssbox-field').each(function(){

            var $ = jQuery;
            var device = $(this).attr('data-device'),
                dataName = $(this).attr('data-single-name');

            if(typeof valueToPush[device] === 'undefined') {
                valueToPush[device] = {};
            }
            if( $(this).attr('type') === 'checkbox'){
                if($(this).is(':checked')){
                    var dataValue = 1;
                }
                else {
                    var dataValue = '';
                }
            }
            else{
                var dataValue = $(this).val();
            }
            valueToPush[device][dataName] = dataValue;
        });
        var collector = jQuery( control ).find( '.cssbox-collection-value' );
        collector.val( JSON.stringify( valueToPush ) );
        control.setting.set(JSON.stringify(valueToPush));
    },
});

/**
 * File responsive.js
 */
wp.customize.controlConstructor[ 'responsive-range' ] = wp.customize.Control.extend( {

    // When we're finished loading continue processing.
    ready: function () {
        'use strict';

        var control = this;

        /**
         * Save on change / keyup / paste
         */
        this.container.on( 'change keyup input', 'input.responsive-range--input, select.responsive-range--select', function () {
            control.updateValue();
        } );

        this.container.on( 'click touchstart', '.reset-number-input', function () {
            control.resetValues();
        } );
    },

    /**
     * Reset
     */
    resetValues: function () {
        'use strict';
        this.container.find( '.responsive-range--input' ).each( function () {
            jQuery( this ).val( jQuery( this ).data( 'default' ) );
        } );

        this.container.find( '.responsive-range--select' ).each( function () {
            jQuery( this ).find( 'option' ).removeAttr( 'selected' );
            jQuery( this ).find( 'option[value=' + jQuery( this ).data( 'default' ) + ']' ).attr( 'selected', 'selected' );
        } );

        this.updateValue();
    },

    /**
     * Update
     */
    updateValue: function () {
        'use strict';

        var control = this,
            newValue = {
                suffix: {}
            };

        // Set the spacing container.
        control.container.find( '.control-wrap' ).each( function () {
            var controlValue = jQuery( this ).find( 'input' ).val();
            var controlUnit = jQuery( this ).find( 'select' ).val();
            var query = jQuery( this ).find( 'input' ).data( 'query' );

            newValue[ query ] = controlValue;
            if ( typeof controlUnit !== 'undefined' ) {
                newValue.suffix[ query ] = controlUnit;
            }
        } );

        var collector = jQuery( control ).find( '.responsive-range-collector' );
        collector.val( JSON.stringify( newValue ) );
        control.setting.set( JSON.stringify( newValue ) );
    },
} );



/**
 * Group JS
 * */
( function( $ ) {
    /*Drag and drop to change order*/
    $(document).ready(function () {
        var customize_theme_controls = $(document);

        function refresh_group_cssbox_values( control_cssbox_wrap ){
            var valueToPush = {};
            control_cssbox_wrap.find('.groupcssbox-field').each(function(){

                var device = $(this).attr('data-device'),
                    dataName = $(this).attr('data-cssbox-name');

                if(typeof valueToPush[device] === 'undefined') {
                    valueToPush[device] = {};
                }
                if( $(this).attr('type') === 'checkbox'){
                    if($(this).is(':checked')){
                        var dataValue = 1;
                    }
                    else {
                        var dataValue = '';
                    }
                }
                else{
                    var dataValue = $(this).val();
                }
                valueToPush[device][dataName] = dataValue;
            });

            return valueToPush;
        }


        function refresh_group_values( control_wrap ){
            var valueToPush = {};
            control_wrap.find('[data-single-name]').each(function(){
                if( $(this).attr('type') === 'checkbox'){
                    if($(this).is(':checked')){
                        var dataValue = 1;
                    }
                    else {
                        var dataValue = '';
                    }
                }
                else{
                    var dataValue = $(this).val();
                }
                var dataName = $(this).attr('data-single-name');
                valueToPush[dataName] = dataValue;
            });
            control_wrap.find('.responsive-switchers-fields').each(function(){
                var responsiveValue = {},
                    responsive_wrap = $(this),
                    desktop_value = responsive_wrap.find('.group-desktop').val(),
                    tablet_value = responsive_wrap.find('.group-tablet').val(),
                    mobile_value = responsive_wrap.find('.group-mobile').val();

                responsiveValue['desktop']= desktop_value;
                responsiveValue['tablet']= tablet_value;
                responsiveValue['mobile']= mobile_value;

                var dataName = responsive_wrap.attr('data-responsive-name');
                valueToPush[dataName] = responsiveValue;

            });

            control_wrap.find('.responsive-switchers-cssboxfields').each(function(){
                var responsive_wrap = $(this);
                var dataName = responsive_wrap.attr('data-responsive-name');
                valueToPush[dataName] = refresh_group_cssbox_values( responsive_wrap );

            });
            control_wrap.next('.cosmoswp-group-collection').val(JSON.stringify(valueToPush)).trigger('change');
        }

        customize_theme_controls.on('click','.accordion-section-title',function(){
            var this_field_title =  $(this),
                group_field_control = this_field_title.closest('.group-field-control');

            group_field_control.toggleClass('expanded');
            group_field_control.find('.group-fields').slideToggle();
            group_field_control.find('.group-fields').trigger('cosmoswp_group_slide_toggle');
        });
        customize_theme_controls.on('click', '.group-field-close', function(){
            $(this).closest('.group-fields').slideUp();
            $(this).closest('.group-field-control').toggleClass('expanded');
        });


        customize_theme_controls.on('keyup change', '.group-field-control-wrap [data-single-name], .group-field-control-wrap [data-cssbox-name], .responsive-range',function(){

            var group_field = $(this),
                control_wrap = $(this).closest(".group-field-control-wrap");
            
            if( group_field.hasClass('groupcssbox-field') ){
                if( !group_field.hasClass('groupcssbox_link') ){
                    var dataValue = group_field.val(),
                        device_wrap = group_field.closest('.groupcssbox-device-wrap');

                    if( device_wrap.find('.groupcssbox_link').is(':checked') ){
                        device_wrap.find('.groupcssbox-field').each(function(){
                            $(this).val(dataValue);
                        });
                    }
                }
            }
            
            refresh_group_values(control_wrap);
            return false;
        });

        function cosmoswp_group_field_border_style_control(group_field){

            var selectParent        = group_field.parent(),
                select_data_attr    = group_field.attr('data-single-name');
            if(select_data_attr === 'border-style'){
                var selected_val = group_field.find(":selected").val();
                if(selected_val === 'none'){
                    selectParent.siblings().find('.responsive-switchers-cssboxfields').each(function () {
                        var width = $(this).data('responsive-name');
                        if (width === 'border-width') {
                            $(this).parent().hide();
                        }
                    });
                    selectParent.siblings().find('.customize-control-alpha-color').each(function () {
                        var color = $(this).data('color-single-name');
                        if (color === 'border-color') {
                            $(this).parent().hide();
                        }
                    });
                }
                else{
                    selectParent.siblings().show();
                }
            }
        }

        function cosmoswp_group_field_check_overlay_color_control(group_field){

            var selectParent        = group_field.parent().closest(".single-field"),
                select_data_attr    = group_field.attr('data-single-name'),
                control_wrap        = $(this).closest(".group-field-control-wrap"),
                image_preview_wrap   = selectParent.siblings().find('.img-preview-wrap');

            if( select_data_attr === 'enable-overlay' ){
                var img = image_preview_wrap.find("img"),
                    img_len = img.length,
                    image_src = '';
                if( img_len > 0 ){
                    image_src = img.attr("src") ;
                }
                else{
                    image_src = false;
                }
                var selected_val = group_field.is(":checked");
                if(selected_val && image_src){
                    selectParent.siblings().find('.customize-control-alpha-color').each(function () {
                        var color = $(this).data('color-single-name');
                        if (color === 'background-overlay-color') {
                            $(this).parent().show();
                        }
                    });
                }
                else{
                    selectParent.siblings().find('.customize-control-alpha-color').each(function () {
                        var color = $(this).data('color-single-name');
                        if (color === 'background-overlay-color') {
                            $(this).parent().hide();
                        }
                    });
                }
            }
        }

        customize_theme_controls.on('change', '.group-field-control-wrap select[data-single-name]',function(){
            cosmoswp_group_field_border_style_control($(this))
        });

        customize_theme_controls.find('.group-field-control-wrap select[data-single-name]').each(function(){
            cosmoswp_group_field_border_style_control($(this))
        });

        customize_theme_controls.on('change', '.group-field-control-wrap input[type="checkbox"]',function(){
            cosmoswp_group_field_check_overlay_color_control($(this))
        });

        customize_theme_controls.find('.group-field-control-wrap input[type="checkbox"]').each(function(){
            cosmoswp_group_field_check_overlay_color_control($(this))
        });


        /*Image*/
        customize_theme_controls.on('click','.cosmoswp-image-upload', function(e){

            // Prevents the default action from occuring.
            e.preventDefault();
            var media_image_upload = $(this);
            var media_title = $(this).data('title');
            var media_button = $(this).data('button');
            var media_input_val = $(this).siblings('.image-value-url');
            var media_image_url = $(this).siblings('.img-preview-wrap');
            var media_image_url_value = media_image_url.children('img');


            var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                title: media_title,
                button: { text:  media_button },
                library: { type: 'image' }
            });

            // Opens the media library frame.
            meta_image_frame.open();
            // Runs when an image is selected.
            meta_image_frame.on('select', function(){

                // Grabs the attachment selection and creates a JSON representation of the model.
                var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

                // Sends the attachment URL to our custom image input field.
                media_input_val.val(media_attachment.url).trigger('change');
                if( media_image_url_value !== null ){
                    media_image_url_value.attr( 'src', media_attachment.url );
                    media_image_url.show();
                }
            });
        });
        
        // Runs when the image button is clicked.
        customize_theme_controls.on('click','.cosmoswp-image-remove', function(e){
            $(this).siblings('.img-preview-wrap').hide();
            $(this).prev().prev().val('');
            $(this).parent().siblings().find('.customize-control-alpha-color').each(function () {
                var color = $(this).data('color-single-name');
                if (color === 'background-overlay-color') {
                    $(this).parent().hide();
                }
            });
        });
    })
} )( jQuery );



/**
 * Multicheck JS
 * */
wp.customize.controlConstructor['cosmoswp-multicheck'] = wp.customize.Control.extend({

	// When we're finished loading continue processing.
	ready: function() {

		'use strict';

		var control = this;

		// Save the value
		control.container.on( 'change', 'input', function() {
			var value = [],
			    i = 0;

			// Build the value as an object using the sub-values from individual checkboxes.
			jQuery.each( control.params.choices, function( key, subValue ) {
				if ( control.container.find( 'input[value="' + key + '"]' ).is( ':checked' ) ) {
					value[ i ] = key;
					i++;
				}
			});

			// Update the value in the customizer.
			control.setting.set( value );

		});
	}
});



/**
 * Range JS
 *
 * This file includes several helper functions and the core control JS.
 */
wp.customize.controlConstructor['cosmoswp-range'] = wp.customize.Control.extend({

    ready: function () {

        'use strict';

        var control = this,
            range,
            range_input,
            value,
            this_input,
            input_default,
            changeAction,
            cosmoswp_range_input_number_timeout;

        // Update the text value
        jQuery('input[type=range]').on('mousedown', function () {

            range = jQuery(this);
            range_input = range.parent().children('.cosmoswp-range-input');
            value = range.attr('value');

            range_input.val(value);

            range.mousemove(function () {
                value = range.attr('value');
                range_input.val(value);
            });

        });

        // Auto correct the number input
        function cosmoswp_autocorrect_range_input_number(input_number, timeout) {

            var range_input = input_number,
                range = range_input.parent().find('input[type="range"]'),
                value = parseFloat(range_input.val()),
                reset = parseFloat(range.attr('data-reset_value')),
                step = parseFloat(range_input.attr('step')),
                min = parseFloat(range_input.attr('min')),
                max = parseFloat(range_input.attr('max'));

            clearTimeout(cosmoswp_range_input_number_timeout);

            cosmoswp_range_input_number_timeout = setTimeout(function () {

                if (isNaN(value)) {
                    range_input.val(reset);
                    range.val(reset).trigger('change');
                    return;
                }

                if (step >= 1 && value % 1 !== 0) {
                    value = Math.round(value);
                    range_input.val(value);
                    range.val(value);
                }

                if (value > max) {
                    range_input.val(max);
                    range.val(max).trigger('change');
                }

                if (value < min) {
                    range_input.val(min);
                    range.val(min).trigger('change');
                }

            }, timeout);

            range.val(value).trigger('change');

        }

        // Change the text value
        jQuery('input.cosmoswp-range-input').on('change keyup', function () {

            cosmoswp_autocorrect_range_input_number(jQuery(this), 1000);

        }).on('focusout', function () {

            cosmoswp_autocorrect_range_input_number(jQuery(this), 0);

        });

        // Handle the reset button
        jQuery('.cosmoswp-reset-slider').on('click', function () {

            this_input = jQuery(this).closest('label').find('input');
            input_default = this_input.data('reset_value');

            this_input.val(input_default);
            this_input.change();

        });

        if ('postMessage' === control.setting.transport) {
            changeAction = 'mousemove change';
        } else {
            changeAction = 'change';
        }

        // Change the value
        this.container.on(changeAction, 'input', function () {
            control.setting.set(jQuery(this).val());
        });
    }
});



/**
 * Customizer Repeater JS
 */

wp.customize.controlConstructor['cosmoswp-repeater'] = wp.customize.Control.extend({
    ready: function () {

        'use strict';

        var control = this;

        this.container.on('click', '.accordion-section-title',function(e){
            var $ = jQuery;
            if( e.target.type && e.target.type === 'checkbox' ){
                return true;
            }
            var this_field_title =  $(this),
                repeater_field_control = this_field_title.closest('.repeater-field-control');

            repeater_field_control.toggleClass('expanded');
            repeater_field_control.find('.repeater-fields').slideToggle();
        });

        this.container.on('click', '.repeater-field-close', function(){
            var $ = jQuery;
            $(this).closest('.repeater-fields').slideUp();
            $(this).closest('.repeater-field-control').toggleClass('expanded');
        });
        this.container.on("click",'.cosmoswp-repeater-add-control-field', function(){
            var $ = jQuery;
            var $this = $(this).parent();
            if(typeof $this !== 'undefined') {
                var field = $this.find(".cosmoswp-repeater-field-control-generator").html();
                field = $($.parseHTML(field));
                if(typeof field !== 'undefined'){
                    field.find("input[type='text'][data-single-name]").each(function(){
                        var defaultValue = $(this).attr('data-default');
                        $(this).val(defaultValue);
                    });
                    field.find("textarea[data-single-name]").each(function(){
                        var defaultValue = $(this).attr('data-default');
                        $(this).val(defaultValue);
                    });
                    field.find("select[data-single-name]").each(function(){
                        var defaultValue = $(this).attr('data-default');
                        $(this).val(defaultValue);
                    });

                    field.find('.single-field').show();

                    $this.find('.cosmoswp-repeater-field-control-wrap').append(field);

                    field.addClass('expanded').find('.repeater-fields').show();
                    $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                    alpha_color_control( field, $);

                    control.updateValue();
                }
            }
            return false;
        });

        this.container.on("click", ".repeater-field-remove",function(){
            var $ = jQuery;
            if( typeof	$(this).parent() !== 'undefined'){
                $(this).closest('.repeater-field-control').slideUp('normal', function(){
                    $(this).remove();
                    control.updateValue();
                });
            }
            return false;
        });
        this.container.on('change keyup input', '[data-single-name]',function(e){
            e.preventDefault();

            control.updateValue();
        });

        this.container.find(".cosmoswp-repeater-field-control-wrap").sortable({
            orientation: "vertical",
            update: function( event, ui ) {
                control.updateValue();
            }
        });
    },

    /**
     * Update
     */
    updateValue: function () {
        'use strict';
        var control = this,
            values = [];
        control.container.find(".repeater-field-control").each(function(){
            var $ = jQuery;
            var valueToPush = {};
            $(this).find('[data-single-name]').each(function(){
                if( $(this).attr('type') === 'checkbox'){
                    if($(this).is(':checked')){
                        var dataValue = 1;
                    }
                    else {
                        var dataValue = '';
                    }
                }
                else{
                    var dataValue = $(this).val();
                }
                var dataName = $(this).attr('data-single-name');
                valueToPush[dataName] = dataValue;
            });
            values.push(valueToPush);
        });
        var collector = jQuery( control ).find( '.cosmoswp-repeater-collection' );
        collector.val( JSON.stringify( values ) );
        control.setting.set(JSON.stringify(values));
    },
});



/**
 * Slider JS
 *
 * This file includes several helper functions and the core control JS.
 */
wp.customize.controlConstructor['cosmoswp-slider'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this,
            control_container 		= control.container,
			desktop_slider 			= control_container.find( '.cosmoswp-slider.desktop-slider' ),
			desktop_slider_input 	= desktop_slider.next( '.cosmoswp-slider-input' ).find( 'input.desktop-input' ),
			tablet_slider 			= control_container.find( '.cosmoswp-slider.tablet-slider' ),
			tablet_slider_input 	= tablet_slider.next( '.cosmoswp-slider-input' ).find( 'input.tablet-input' ),
			mobile_slider 			= control_container.find( '.cosmoswp-slider.mobile-slider' ),
			mobile_slider_input 	= mobile_slider.next( '.cosmoswp-slider-input' ).find( 'input.mobile-input' ),
			slider_input,
			$this,
			val;

		function set_value(){
			var $ = jQuery;
            var valueToPush = {};
            control_container.find('.slider-input').each(function () {
                var device = $(this).attr('data-device');
                if(typeof valueToPush[device] === 'undefined') {
                    valueToPush[device] = {};
                }
                var dataValue = $(this).val();
                valueToPush[device] = dataValue;
            });
            control.setting.set( JSON.stringify(valueToPush) );
		}

		// Desktop slider
		desktop_slider.slider( {
			range: 'min',
			value: desktop_slider_input.val(),
			min: +desktop_slider_input.attr( 'min' ),
			max: +desktop_slider_input.attr( 'max' ),
			step: +desktop_slider_input.attr( 'step' ),
			slide: function( event, ui ) {
				desktop_slider_input.val( ui.value ).keyup();
			},
	        change: function( event, ui ){
                set_value()
	        }
		} );

		// Tablet slider
		tablet_slider.slider( {
			range: 'min',
			value: tablet_slider_input.val(),
			min: +tablet_slider_input.attr( 'min' ),
			max: +tablet_slider_input.attr( 'max' ),
			step: +desktop_slider_input.attr( 'step' ),
			slide: function( event, ui ) {
				tablet_slider_input.val( ui.value ).keyup();
			},
	        change: function( event, ui ){
                set_value();
	        }
		} );

		// Mobile slider
		mobile_slider.slider( {
			range: 'min',
			value: mobile_slider_input.val(),
			min: +mobile_slider_input.attr( 'min' ),
			max: +mobile_slider_input.attr( 'max' ),
			step: +desktop_slider_input.attr( 'step' ),
			slide: function( event, ui ) {
				mobile_slider_input.val( ui.value ).keyup();
			},
	        change: function( event, ui ){
                set_value();
	        }
		} );

		// Update the slider when the number value change
		jQuery( 'input.desktop-input' ).on( 'change keyup', function() {
			$this 			= jQuery( this );
			val 			= $this.val();
			slider_input 	= $this.parent().prev( '.cosmoswp-slider.desktop-slider' );

			slider_input.slider( 'value', val );
		} );

		jQuery( 'input.tablet-input' ).on( 'change keyup', function() {
			$this 			= jQuery( this );
			val 			= $this.val();
			slider_input 	= $this.parent().prev( '.cosmoswp-slider.tablet-slider' );

			slider_input.slider( 'value', val );
		} );

		jQuery( 'input.mobile-input' ).on( 'change keyup', function() {
			$this 			= jQuery( this );
			val 			= $this.val();
			slider_input 	= $this.parent().prev( '.cosmoswp-slider.mobile-slider' );

			slider_input.slider( 'value', val );
		} );

		// Save the values
        control_container.on( 'change keyup', '.desktop input', function() {
            set_value();
		} );

        control_container.on( 'change keyup', '.tablet input', function() {
            set_value();
		} );

        control_container.on( 'change keyup', '.mobile input', function() {
            set_value();
		} );
	}
});



/**
 * Sortable JS
 * */
wp.customize.controlConstructor['cosmoswp-sortable'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		// Set the sortable container.
		control.sortableContainer = control.container.find( 'ul.sortable' ).first();

		// Init sortable.
		control.sortableContainer.sortable({

			// Update value when we stop sorting.
			stop: function() {
				control.updateValue();
			}
		}).disableSelection().find( 'li' ).each( function() {

			// Enable/disable options when we click on the eye of Thundera.
			jQuery( this ).find( 'i.visibility' ).click( function() {
				jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
			});
		}).click( function() {

			// Update value on click.
			control.updateValue();
		});
	},

	/**
	 * Updates the sorting list
	 */
	updateValue: function() {

		'use strict';

		var control = this,
		    newValue = [];

		this.sortableContainer.find( 'li' ).each( function() {
			if ( ! jQuery( this ).is( '.invisible' ) ) {
				newValue.push( jQuery( this ).data( 'value' ) );
			}
		});

		control.setting.set( newValue );
	}
});



/**
 * Tabs JS
 * */
( function( $ ) {
    /*Drag and drop to change order*/
    $(document).ready(function () {
        var customize_theme_controls = $(document);

        function refresh_tabs_cssbox_values( control_cssbox_wrap ){
            var valueToPush = {};
            control_cssbox_wrap.find('.tabscssbox-field').each(function(){

                var device = $(this).attr('data-device'),
                    dataName = $(this).attr('data-cssbox-name');

                if(typeof valueToPush[device] === 'undefined') {
                    valueToPush[device] = {};
                }
                if( $(this).attr('type') === 'checkbox'){
                    if($(this).is(':checked')){
                        var dataValue = 1;
                    }
                    else {
                        var dataValue = '';
                    }
                }
                else{
                    var dataValue = $(this).val();
                }
                valueToPush[device][dataName] = dataValue;
            });

            return valueToPush;
        }
        function refresh_tabs_values( control_wrap ){
            var valueToPush = {};
            control_wrap.find('[data-single-name]').each(function(){
                if( $(this).attr('type') === 'checkbox'){
                    if($(this).is(':checked')){
                        var dataValue = 1;
                    }
                    else {
                        var dataValue = '';
                    }
                }
                else{
                    var dataValue = $(this).val();
                }
                var dataName = $(this).attr('data-single-name');
                valueToPush[dataName] = dataValue;
            });
            control_wrap.find('.responsive-switchers-fields').each(function(){
                var responsiveValue = {},
                    responsive_wrap = $(this),
                    desktop_value = responsive_wrap.find('.tabs-desktop').val(),
                    tablet_value = responsive_wrap.find('.tabs-tablet').val(),
                    mobile_value = responsive_wrap.find('.tabs-mobile').val();

                responsiveValue['desktop']= desktop_value;
                responsiveValue['tablet']= tablet_value;
                responsiveValue['mobile']= mobile_value;

                var dataName = responsive_wrap.attr('data-responsive-name');
                valueToPush[dataName] = responsiveValue;

            });

            control_wrap.find('.responsive-switchers-cssboxfields').each(function(){
                var responsive_wrap = $(this);
                var dataName = responsive_wrap.attr('data-responsive-name');
                valueToPush[dataName] = refresh_tabs_cssbox_values( responsive_wrap );

            });
            control_wrap.next('.cosmoswp-tabs-collection').val(JSON.stringify(valueToPush)).trigger('change');
        }

        function select_parent_type_result(mode,parent,selected_val){
            if(selected_val === 'none'){
                parent.siblings().find('.customize-control-cosmoswp-cssbox').each(function () {
                    var width = $(this).data('single-name');
                    if (width === mode+'-border-width') {
                        $(this).parent().hide();
                    }
                });
                parent.siblings().find('.customize-control-alpha-color').each(function () {
                    var color = $(this).data('single-name');
                    if (color === mode+'-border-color') {
                        $(this).parent().hide();
                    }
                });
            }
            else{
                parent.siblings().show();
            }
        }

        function cosmoswp_tab_field_border_style_control(group_field){
            group_field.each(function () {
                var selectParent        = $(this).parent(),
                    select_data_attr    = $(this).attr('data-single-name'),
                     selected_val       = $(this).find(":selected").val();
            if(select_data_attr === 'normal-border-style'){
                select_parent_type_result('normal',selectParent,selected_val)
            }
            else if (select_data_attr === 'hover-border-style'){
                select_parent_type_result('hover',selectParent,selected_val)
            }
            else if (select_data_attr === 'active-border-style'){
                select_parent_type_result('active',selectParent,selected_val)
            }
            });
        }

        customize_theme_controls.on('keyup change', '.tabs-field-control-wrap [data-single-name], .tabs-field-control-wrap .responsive-range, .tabscssbox-field',function(e){

            e.preventDefault();

            var tabs_field = $(this),
                control_wrap = $(this).closest(".tabs-field-control-wrap");

            if( tabs_field.hasClass('tabscssbox-field') ){
                if( !tabs_field.hasClass('tabscssbox_link') ){
                    var dataValue = tabs_field.val(),
                        device_wrap = tabs_field.closest('.tabscssbox-device-wrap');

                    if( device_wrap.find('.tabscssbox_link').is(':checked') ){
                        device_wrap.find('.tabscssbox-field').each(function(){
                            $(this).val(dataValue);
                        });
                    }
                }
            }

            
            refresh_tabs_values(control_wrap);
            return false;
        });

        customize_theme_controls.on('change', '.tabs-field-control-wrap select[data-single-name]',function(){
            cosmoswp_tab_field_border_style_control($(this))
        });

        customize_theme_controls.find('.tabs-field-control-wrap select[data-single-name]').each(function(){
            cosmoswp_tab_field_border_style_control($(this))
        });

        $('.tabs-field-control').on('click','.tab-trigger',function () {
            var tab_trigger = $(this),
                tabs_field_control = tab_trigger.closest('.tabs-field-control');

            tabs_field_control.find('.tabs li').removeClass('active');
            tab_trigger.parent('li').addClass('active');
            tabs_field_control.find('.fields-tabs-content').removeClass('active');
            tabs_field_control.find('.fields-tabs-content.'+tab_trigger.data('id')).addClass('active');
        })
    })
} )( jQuery );



/**
 * Global JS
 * */

jQuery(document).ready( function($) {
    var customize_theme_controls = $(document);
    $( '.customize-control .responsive-switchers button' ).on( 'click', function(  ) {

		// Set up variables
		var $this 		= $( this ),
			$switchers 	= $( '.responsive-switchers' ),
            $control 	= $( '.customize-control.has-switchers' ),
			$device 	= $this.data( 'device' );

		// Button class
		$switchers.find( 'button' ).removeClass( 'active' );
		$switchers.find( 'button.preview-' + $device ).addClass( 'active' );

        // Control class
        $control.find( '.control-wrap' ).removeClass( 'active' );
        $control.find( '.control-wrap.' + $device ).addClass( 'active' );
        $control.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + $device );

        $(
            '#customize-footer-actions .devices button[data-device="' +
            $device +
            '"]'
        ).trigger("click");
	} );

    // If panel footer buttons clicked
    $( '#customize-footer-actions .devices button' ).on( 'click', function( event ) {

        // Set up variables
        var $this 		= $( this ),
            $devices 	= $( '.customize-control.has-switchers .responsive-switchers' ),
            $device 	= $( event.currentTarget ).data( 'device' );

        // Button class
        $devices.find( 'button' ).removeClass( 'active' );
        $devices.find( 'button.preview-' + $device ).addClass( 'active' );
    } );

    /**
     * Script for Customizer icons
     */
    customize_theme_controls.on('click', '.customize-icons .single-icon', function() {
        var single_icon = $(this),
            cwp_customize_icons = single_icon.closest( '.customize-icons' ),
            icon_value = single_icon.children('i').attr('data-class'),
            icon_class = single_icon.children('i').attr('class');

        single_icon.siblings().removeClass('selected');
        single_icon.addClass('selected');
        cwp_customize_icons.find('.cosmoswp-icon-value').val( icon_value );
        cwp_customize_icons.find('.icon-preview').html('<i class="' + icon_class + '"></i>');
        cwp_customize_icons.find('.cosmoswp-icon-value').trigger('change');
    });

    customize_theme_controls.on('click', '.customize-icons .icon-toggle ,.customize-icons .icon-preview', function() {
        var icon_toggle = $(this),
            cwp_customize_icons = icon_toggle.closest( '.customize-icons' ),
            icons_list_wrapper = cwp_customize_icons.find( '.icons-list-wrapper' ),
            dashicons = cwp_customize_icons.find( '.dashicons' );

        if ( icons_list_wrapper.is(':hidden') ) {
            icons_list_wrapper.slideDown();
            dashicons.removeClass('dashicons-arrow-down');
            dashicons.addClass('dashicons-arrow-up');
        } else {
            icons_list_wrapper.slideUp();
            dashicons.addClass('dashicons-arrow-down');
            dashicons.removeClass('dashicons-arrow-up');
        }
    });

    customize_theme_controls.on('keyup', '.customize-icons .icon-search', function() {
        var text = $(this),
            value = this.value,
            cwp_customize_icons = text.closest( '.customize-icons' ),
            icons_list_wrapper = cwp_customize_icons.find( '.icons-list-wrapper' );

        icons_list_wrapper.find('i').each(function () {
            if ($(this).attr('class').search(value) > -1) {
                $(this).parent('.single-icon').show();
            }
            else {
                $(this).parent('.single-icon').hide();
            }
        });
    });

    /*focus selected panel or section customize */
    var cwp_body = $('body');
    cwp_body.on('click','.cosmoswp-customizer', function(evt){
        evt.preventDefault();
        var section = $(this).data('section'),
            panel = $(this).data('panel');

        if ( section ) {
            wp.customize.section( section ).focus();
        }
        if ( panel ) {
            wp.customize.panel( panel ).focus();
        }
    });

    //check background image loaded or not
    // if loaded then display image setting
    var backgound_image = $(".customize-control-group .single-field.type-image .img-preview-wrap > img");
    backgound_image.on('load', function(){
        image_src = $(this).attr("src");
        if ((typeof(image_src) !== 'undefined' && image_src != null ) ){
            $(this).closest( ".customize-control-group" ).addClass("bg-image-loaded");
            var image_parent = $(this).closest('.single-field'),
                overlay_checkbox = image_parent.siblings().find('input[type="checkbox"]'),
                overlay_checkbox_attr  = overlay_checkbox.attr('data-single-name');
            if(overlay_checkbox_attr === 'enable-overlay') {
                var selected_val = overlay_checkbox.is(":checked");
                if (selected_val) {
                    image_parent.siblings().find('.customize-control-alpha-color').each(function () {
                        var color = $(this).data('color-single-name');
                        if (color === 'background-overlay-color') {
                            $(this).parent().show();
                        }
                    });
                }
            }
        }
        $(".customize-control-group .cosmoswp-image-remove").click(function(){
            var this_remove = $(this),
                parent_control = this_remove.closest('.customize-control-group');
            parent_control.removeClass("bg-image-loaded");
            parent_control.find(".image-value-url").val("");
            parent_control.find(".image-value-url").trigger('change');
            this_remove.parent().siblings().find('.customize-control-alpha-color').each(function () {
                var color = $(this).data('color-single-name');
                if (color === 'background-overlay-color') {
                    $(this).parent().hide();
                }
            });
        });
    });

    /*font family*/

    /**
     * Google Font List
     * @type {array}
     */
    var google_webfonts_json_data_items = [];

    /**
     * System Font List
     * @type {array}
     */
    var systemFontTypeList  = [
        {
            family: 'Arial'
        },
        {
            family: 'Tahoma'
        },
        {
            family: 'Verdana'
        },
        {
            family: 'Helvetica'
        },
        {
            family: 'Times New Roman'
        },
        {
            family: 'Trebuchet MS'
        },
        {
            family: 'Georgia'
        }
    ];

    var defaultFontWeight  = [
        {
            weight: 100
        },
        {
            weight: 200
        },
        {
            weight: 300
        },
        {
            weight: 400
        },
        {
            weight: 500
        },
        {
            weight: 600
        },
        {
            weight: 700
        },
        {
            weight: 800
        }
        ,
        {
            weight: 900
        }
    ];

    function load_default_font_weight( parent_group_fields ) {

        var select_font_weight = parent_group_fields.find("select[data-single-name='font-weight']"),
            selected_font_weight = select_font_weight.data('value');

        var options_html = '',
            selected;

        $.map( defaultFontWeight, function( item, i ) {
            selected = '';
            if ( selected_font_weight == item.weight ) {
                selected = ' selected="selected" ';
            }
            options_html += '<option' + selected + ' value="' + item.weight + '">' + item.weight + '</option>';
        });
        select_font_weight.empty().append(options_html);
    }

    function load_google_font_weight( parent_group_fields, selected_google_font ){
        var select_font_weight = parent_group_fields.find("select[data-single-name='font-weight']"),
            selected_font_weight = select_font_weight.data('value'),
            font_weight_data = [];

        var options_html = '',
            selected,
            font_family;

        if( google_webfonts_json_data_items.length ){
            $.map( google_webfonts_json_data_items, function( item, i ) {
                selected = '';
                font_family = item.family;
                if ( selected_google_font == font_family ) {
                    font_weight_data = item.variants;
                    return false;
                }
            });

            if( font_weight_data.length ){
                $.map( font_weight_data, function( item, i ) {
                    selected = '';
                    if ( selected_font_weight == item ) {
                        selected = ' selected="selected" ';
                    }
                    options_html += '<option' + selected + ' value="' + item + '">' + item + '</option>';
                });
                select_font_weight.empty().append(options_html);
            }
            else{
                load_default_font_weight( parent_group_fields );
            }

        }
        else{
            load_default_font_weight( parent_group_fields );
        }
    }

    function load_fonts( parent_group_fields, font_type ){

        var system_fonts = parent_group_fields.children('.single-field').eq(1),
            google_fonts_loader = parent_group_fields.children('.single-field').eq(2),
            custom_fonts = parent_group_fields.children('.single-field').eq(3);

        system_fonts.addClass('hidden');
        google_fonts_loader.addClass('hidden');
        custom_fonts.addClass('hidden');

        switch (font_type) {
            case 'system':
                system_fonts.removeClass('hidden');
                var select_system_font = system_fonts.find('select'),
                    selected_system_font = select_system_font.data('value');
                if( !system_fonts.hasClass('cwp-system-fonts-loaded')){
                   
                    var options_html = '',
                        selected,
                        font_family;
                    $.map( systemFontTypeList, function( item, i ) {
                        selected = '';
                        font_family = item.family;
                        if ( selected_system_font == font_family ) {
                            selected = ' selected="selected" ';
                        }
                        options_html += '<option' + selected + ' value="' + font_family + '">' + font_family + '</option>';
                    });
                    select_system_font.empty().append(options_html);
                    system_fonts.addClass('cwp-system-fonts-loaded');
                }
                load_default_font_weight( parent_group_fields );
                break;

            case 'google':
                google_fonts_loader.removeClass('hidden');
                var select_google_font = google_fonts_loader.find('select'),
                    selected_google_font = select_google_font.data('value');

                if( !google_fonts_loader.hasClass('cwp-google-fonts-loaded')){


                    if( google_webfonts_json_data_items.length ){
                        $.map( google_webfonts_json_data_items, function( item, i ) {
                            selected = '';
                            font_family = item.family;
                            if ( selected_google_font == font_family ) {
                                selected = ' selected="selected" ';
                            }
                            options_html += '<option' + selected + ' value="' + font_family + '">' + font_family + '</option>';
                        });
                        select_google_font.empty().append(options_html);
                        google_fonts_loader.addClass('cwp-google-fonts-loaded');
                        load_google_font_weight( parent_group_fields, selected_google_font );
                    }
                    else{
                        $.ajax({
                            type: 'POST',
                            url: cwp_general.ajaxurl,
                            data: {
                                'action':'cosmoswp_customizer_ajax_google_fonts'
                            }
                        }).done (function ( data ) {
                            if( data.success ){
                                var options_html = '',
                                    selected,
                                    font_family;

                                google_webfonts_json_data_items = data.data['items'];

                                $.map( google_webfonts_json_data_items, function( item, i ) {
                                    selected = '';
                                    font_family = item.family;
                                    if ( selected_google_font == font_family ) {
                                        selected = ' selected="selected" ';
                                    }
                                    options_html += '<option' + selected + ' value="' + font_family + '">' + font_family + '</option>';
                                });
                                select_google_font.empty().append(options_html);
                                google_fonts_loader.addClass('cwp-google-fonts-loaded');
                                load_google_font_weight( parent_group_fields, selected_google_font );
                            }

                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                        });
                    }
                }
                else{
                    load_google_font_weight( parent_group_fields, selected_google_font );
                }

                break;

            case 'custom':
                custom_fonts.removeClass('hidden');
                load_default_font_weight( parent_group_fields );
                break;
        }
    }

    $("select[data-single-name='font-type']").on("change rightnow",function() {
        var this_font = $(this),
            this_val     = this_font.val(),
            parent_group_fields    = this_font.closest('.group-fields');

        load_fonts(parent_group_fields,this_val);
    });

    $('.group-fields').on( "cosmoswp_group_slide_toggle", function() {
        var parent_group_fields = $(this),
            this_val = parent_group_fields.find("select[data-single-name='font-type']").val();

        if( this_val ){
            load_fonts( parent_group_fields,this_val );
        }
    });

    $("select[data-single-name='google-font']").on("change rightnow",function() {

        var this_font = $(this),
            this_val     = this_font.val(),
            parent_single_field    = this_font.closest('.single-field'),
            parent_group_fields    = this_font.closest('.group-fields');

        if( parent_single_field.hasClass('cwp-google-fonts-loaded')){
            load_google_font_weight( parent_group_fields, this_val );
        }
    });
} );