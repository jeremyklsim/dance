console.log('Thank you for using Dance');

wp.customize( 'tcx_background_image', function( value ) {
    value.bind( function( to ) {
 
        0 === $.trim( to ).length ?
            $( 'body' ).css( 'background-image', '' ) :
            $( 'body' ).css( 'background-image', 'url( ' + to + ')' );
 
    });
});