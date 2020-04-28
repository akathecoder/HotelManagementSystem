/**
 * Getting Started
 */
jQuery( document ).ready( function ( $ ) {

	$( '.cosmoswp-gsm-btn' ).click( function ( e ) {
		e.preventDefault();

		// Show updating gif icon.
        $( this ).addClass( 'updating-message' );

		// Change button text.
        $( this ).text( cosmoswp_adi_install.btn_text );

		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: {
                action     : 'cosmoswp_getting_started',
                security : cosmoswp_adi_install.nonce
            },
			success:function( response ) {
                var extra_uri, redirect_uri, dismiss_nonce;

                if ( $( '.cosmoswp-gsm-close' ).length ) {
					dismiss_nonce = $( '.cosmoswp-gsm-close' ).attr( 'href' ).split( 'cosmoswp_gsm_admin_notice_nonce=' )[1];
					extra_uri     = '&cosmoswp_gsm_admin_notice_nonce=' + dismiss_nonce;
				}
				redirect_uri         = response.data.redirect + extra_uri;
                window.location.href = redirect_uri;
			},
			error: function( xhr, ajaxOptions, thrownError ){
				console.log(thrownError);
			}
		});
	} );
	$( '.cwp-card-header a' ).click( function ( e ) {
		e.preventDefault();
		let thisLink = $(this),
			cwpHref = thisLink.attr('href');
		$('.cwp-card-body-wrap').addClass('hidden');
		$(cwpHref).removeClass('hidden');
	} );
} );
