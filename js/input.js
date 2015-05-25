(function ( $ ) {

    function initialize_field( $el ) {

        //$el.doStuff();

    }

    if ( typeof acf.add_action !== 'undefined' ) {

        /*
         *  ready append (ACF5)
         *
         *  These are 2 events which are fired during the page load
         *  ready = on page load similar to $(document).ready()
         *  append = on new DOM elements appended via repeater field
         *
         *  @type	event
         *  @date	20/07/13
         *
         *  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
         *  @return	n/a
         */

        acf.add_action( 'ready append', function ( $el ) {

            // search $el for fields of type 'FIELD_NAME'
            acf.get_fields( {type: 'categories'}, $el ).each( function () {

                initialize_field( $( this ) );

                jQuery( '.cat-toggle-btn' ).click( function () {
                    var $catContainer = jQuery( this ).parent().parent().find( '.cat-container' );
                    var $catToggle    = jQuery( this ).parent().find( '.cat-toggle-btn' );
                    $catContainer.slideToggle( 300, function () {
                        if ( $catContainer.is( ':hidden' ) ) {
                            $catToggle.html( '+ Show Categories' );
                        } else {
                            $catToggle.html( '- Hide Categories' );
                        }
                    } );

                    return false;
                } );

                jQuery( this ).find( '.select-all' ).click( function () {
                    var $acfCheckbox = jQuery( this ).parent().parent().find( '.cat-categories-check' );
                    $acfCheckbox.attr( 'checked', 'checked' );

                    return false;
                } );

                jQuery( '.deselect-all' ).click( function () {
                    var $acfCheckbox = jQuery( this ).parent().parent().find( '.cat-categories-check' );
                    $acfCheckbox.removeAttr( 'checked' );

                    return false;
                } );

                jQuery( '.select-main' ).click( function () {
                    var $acfCheckbox = jQuery( this ).parent().parent().find( '.cat-categories-check' );
                    var $acfMainCat  = jQuery( this ).parent().parent().find( '.cat-categories-check' ).not( '.cat-subcategories-check' );
                    $acfCheckbox.removeAttr( 'checked' );
                    $acfMainCat.attr( 'checked', 'checked' );

                    return false;
                } );

            } );

        } );

    } else {


        /*
         *  acf/setup_fields (ACF4)
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
         *  @return	n/a
         */

        $( document ).on( 'acf/setup_fields', function ( e, postbox ) {

            $( postbox ).find( '.field[data-field_type="categories"]' ).each( function () {

                initialize_field( $( this ) );

            } );

        } );

    }

})( jQuery );
