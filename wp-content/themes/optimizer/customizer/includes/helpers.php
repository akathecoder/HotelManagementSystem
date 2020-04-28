<?php

//-----------------------------------------SANITIZATION-----------------------
function optimizer_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function optimizer_sanitize_multicheck( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

function optimizer_sanitize_number( $value ) {
	return ( is_numeric( $value ) ) ? $value : intval( $value );
}

function optimizer_sanitize_choices( $input, $setting ) {
    $input = sanitize_key( $input );
	/*replace the optimizer[] from settings id becasue the control id != setting id*/
	$controlid = str_replace('optimizer[','', $setting->id);
	$controlid = str_replace(']','', $controlid);
	$control = $setting->manager->get_control( $controlid );

    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function optimizer_kses_html( $value ) {
	return wp_kses($value, wp_kses_allowed_html('entities')); 
}