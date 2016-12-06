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

    wp.customize( 'manly_h1_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1 a' ).css( 'color', to );
            $( 'h1' ).css( 'color', to );
            $( 'h2 a' ).css( 'color', to );
            $( 'h2' ).css( 'color', to );
            $( 'h3 a' ).css( 'color', to );
            $( 'h3' ).css( 'color', to );
            $( 'h4 a' ).css( 'color', to );
            $( 'h4' ).css( 'color', to );
            $( 'h5 a' ).css( 'color', to );
            $( 'h5' ).css( 'color', to );
            $( 'h6 a' ).css( 'color', to );
            $( 'h6' ).css( 'color', to );

        } );
    });

    wp.customize( 'manly_h1_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'h1' ).css( 'font-family', to );  
            $( 'h2' ).css( 'font-family', to );  
            $( 'h3' ).css( 'font-family', to );  
            $( 'h4' ).css( 'font-family', to );
            $( 'h5' ).css( 'font-family', to );
            $( 'h6' ).css( 'font-family', to );
        } );
    }); 

    wp.customize( 'manly_p_color', function( value ) {
        value.bind( function( to ) {
            $( 'p' ).css( 'color', to );
            $( 'li' ).css( 'color', to );
        } );
    });

    wp.customize( 'manly_p_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-size', to + 'px' ); 
            $( 'li' ).css( 'font-size', to + 'px' );         
        } );
    }); 

    wp.customize( 'manly_p_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-family', to ); 
            $( 'a' ).css( 'font-family', to );
            $( 'li' ).css( 'font-family', to );           
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