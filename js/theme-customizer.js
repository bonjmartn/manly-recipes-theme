(function( $ ) {

    wp.customize( 'manly_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });    

    wp.customize( 'manly_accent_color', function( value ) {
        value.bind( function( to ) {
            $( '.navbar-default .navbar-nav > li > a:hover' ).css( 'background-color', to );
            $( '.navbar-default .navbar-nav > li > a:focus' ).css( 'background-color', to );
            $( '.navbar-default .navbar-nav > .active > a' ).css( 'background-color', to );
            $( '.navbar-default .navbar-nav > .active > a:hover' ).css( 'background-color', to );
            $( '.navbar-default .navbar-nav > .active > a:focus' ).css( 'background-color', to );
            $( '.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover' ).css( 'background-color', to );
            $( '.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus' ).css( 'background-color', to );
            $( 'a' ).css( 'color', to );
            $( 'a:visited' ).css( 'color', to );
            $( 'a:hover' ).css( 'color', to );
            $( 'a:focus' ).css( 'color', to );
            $( 'a:active' ).css( 'color', to );
            $( '.social-icons a:hover' ).css( 'color', to );
            $( 'button' ).css( 'background-color', to );
            $( 'html input[type="button"]' ).css( 'background-color', to );
            $( 'input[type="reset"]' ).css( 'background-color', to );
            $( 'input[type="submit"]' ).css( 'background-color', to );
            $( 'button' ).css( 'border-color', to );
            $( 'html input[type="button"]' ).css( 'border-color', to );
            $( 'input[type="reset"]' ).css( 'border-color', to );
            $( 'input[type="submit"]' ).css( 'border-color', to );
            $( '.fa' ).css( 'color', to );
            $( '.footer-social .fa:hover' ).css( 'color', to );
            $( '.footer-social a:hover' ).css( 'color', to );
            $( 'button:hover' ).css( 'color', to );
            $( 'html input[type="button"]:hover' ).css( 'color', to );
            $( 'input[type="reset"]:hover' ).css( 'color', to );
            $( 'input[type="submit"]:hover' ).css( 'color', to );
            $( 'button:hover' ).css( 'border-color', to );
            $( 'html input[type="button"]:hover' ).css( 'border-color', to );
            $( 'input[type="reset"]:hover' ).css( 'border-color', to );
            $( 'input[type="submit"]:hover' ).css( 'border-color', to );
            $( '.carousel-caption button:hover' ).css( 'color', to );
            $( '.carousel-caption button:hover' ).css( 'border', to );
            $( '.carousel-caption button' ).css( 'background-color', to );
            $( '.menu2' ).css( 'border-color', to );
            $( '.recipe-container h3' ).css( 'color', to );
            $( '.recipe-container .fa' ).css( 'color', to );
            $( '.recipe-title' ).css( 'color', to );

         } );
    });


})( jQuery );