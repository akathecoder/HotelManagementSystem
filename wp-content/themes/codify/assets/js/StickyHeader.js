/**
 *
 * Sticky Header Js
 *
 */
 jQuery(document).ready(function ($) {
    //Sticky header 
    jQuery(window).scroll(function($) {            
	    var header_ht = jQuery( '.top-header' ).height();
	    if (jQuery(this).scrollTop() > header_ht){          
	        jQuery('.main-header').addClass('sticky-header');             
	    }else{          
	        jQuery('.main-header').removeClass('sticky-header');  
	    }  
	});     
});