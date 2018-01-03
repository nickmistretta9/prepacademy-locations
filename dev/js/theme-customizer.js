(function( $ ) {

    wp.customize( 'phonenumber', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer .phone, .site-header .phone, .contact-content p' ).html( newval );
        });
    }); 

    wp.customize( 'franchise_name', function( value ) {
        value.bind( function( newval ) {
            $( '.site-header .location-info, .tutor-section h3, .site-footer .directions h3 span, .map-area .search p, .contact-content h2' ).html( newval );
        });
    });

    wp.customize( 'franchise_city', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer .directions span' ).html( newval );
        });
    });

    wp.customize( 'franchise_state', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer .directions span' ).html( newval );
        });
    });

})( jQuery );