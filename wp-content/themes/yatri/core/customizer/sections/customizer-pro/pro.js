( function( api ) {

	// Extends our custom "yatri-pro" section.
	api.sectionConstructor['yatri-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );