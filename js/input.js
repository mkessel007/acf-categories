(function( jQuery ) {


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

	jQuery( document ).live( 'acf/setup_fields', function( e, postbox ) {

		jQuery( postbox ).find( '.acf-categories' ).each( function() {

			jQuery( this ).find( '.chzn-select' ).chosen();

			jQuery( this ).find( '.select-all' ).click( function() {
				jQuery( this ).parent().parent().find( '.chzn-select option' ).prop( 'selected', true );
				jQuery( this ).parent().parent().find( '.chzn-select' ).trigger( 'liszt:updated' );

				return false;
			} );

			jQuery( '.deselect-all' ).click( function() {
				jQuery( this ).parent().parent().find( '.chzn-select option' ).prop( 'selected', false );
				jQuery( this ).parent().parent().find( '.chzn-select' ).trigger( 'liszt:updated' );

				return false;
			} );

		} );


		jQuery( '.add-row-end' ).on( 'click', function() {
			var clonedInput = jQuery( this ).parent().parent().parent().find( '.acf-input-table tr' ).last();

			clonedInput.find( 'div.chzn-container' ).remove();
			clonedInput.find( '.chzn-select' ).show();
			clonedInput.find( '.chzn-select' ).removeAttr( 'id' );
			clonedInput.find( '.chzn-select' ).removeAttr( 'data-placeholder' );
			clonedInput.find( '.chzn-select' ).removeClass( 'chzndone' );
			clonedInput.find( '.chzn-select' ).chosen();
		} );
	} );

})( jQuery );
