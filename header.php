<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

  <meta charset="<?php echo esc_url( ( 'charset' ) ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php echo esc_url( home_url( 'pingback_url' ) ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head() ?>

  </head>

<body <?php body_class(); ?>>

<div class="page-container">

  <div class="main-header">

    <div class="section group">
      <div class="col span_4_of_12_menus">

        <?php if( get_theme_mod( 'manly_logo' ) != "" ): ?>
        <a href="<?php echo esc_url( home_url() ); ?>"><img id="logo" src="<?php echo get_theme_mod( 'manly_logo' ); ?>"></a>
        <?php endif; ?>

      </div>

  <!-- first menu -->

      <div class="col span_8_of_12_menus">

         <nav class="navbar navbar-default menu1">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="defaultNavbar1">
                        <?php
                        wp_nav_menu( array(
                          'menu'              => 'first-menu',
                          'theme_location'    => 'first-menu',
                          'depth'             => 2,
                          'container'         => 'false',
                          'container_class'   => 'collapse navbar-collapse',
                          'container_id'      => 'defaultNavbar1',
                          'menu_class'        => 'nav navbar-nav',
                          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                          'walker'            => new wp_bootstrap_navwalker())
                        );
                        ?>
                    </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>



  <!-- second menu -->


         <nav class="navbar navbar-default menu2">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar2" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="defaultNavbar2">
                        <?php
                        wp_nav_menu( array(
                          'menu'              => 'second-menu',
                          'theme_location'    => 'second-menu',
                          'depth'             => 2,
                          'container'         => 'false',
                          'container_class'   => 'collapse navbar-collapse',
                          'container_id'      => 'defaultNavbar2',
                          'menu_class'        => 'nav navbar-nav',
                          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                          'walker'            => new wp_bootstrap_navwalker())
                        );
                        ?>
                    </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

      </div>
      </div><!-- end of section group -->


  </div><!-- end of main header -->
</div><!-- end of page container -->