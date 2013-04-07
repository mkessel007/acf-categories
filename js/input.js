(function( $ ) {


	/*
	 *  acf/setup_fields
	 *
	 *  This event is triggered when ACF adds any new elements to the DOM.
	 *
	 *  @type	function
	 *  @since	1.0.0
	 *  @date	01/01/12
	 *
	 *  @param	event		e: an event object. This can be ignored
	 *  @param	Element		postbox: An element which contains the new HTML
	 *
	 *  @return	N/A
	 */

	$( document ).live( 'acf/setup_fields', function( e, postbox ) {
		$( '.chzn-select' ).chosen();

		$( '.select-all' ).click( function() {
			$( '.chzn-select option' ).prop( 'selected', true );
			$( '.chzn-select' ).trigger( 'liszt:updated' );

			return false;
		} );

		$( '.deselect-all' ).click( function() {
			$( '.chzn-select option' ).prop( 'selected', false );
			$( '.chzn-select' ).trigger( 'liszt:updated' );

			return false;
		} );

		$( postbox ).find( '.my-field-class' ).each( function() {

			// initiate JS on my field!
			// $(this).add_awesome_stuff();

		} );

	} );

})( jQuery );
