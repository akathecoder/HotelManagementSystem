( function( $ ) {
	var yatri_tools_elementor_skillbar = function( $scope, $ ) {
		$scope.find( '.yte-skillbar' ).each( function() {
			$( this ).appear( function() {
				$( this ).find( '.yte-skillbar-bar' ).animate( {
					width: $( this ).attr( 'data-percent' )
				}, 800 );
			} );
		}, {
			accX : 0,
			accY : 0
		} );
	};
	
	// Make sure we run this code under Elementor
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/yte-skillbar.default', yatri_tools_elementor_skillbar );
	} );
} )( jQuery );