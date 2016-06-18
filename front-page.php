<?php get_header(); ?>

           
<div class="full-container">

<!-- bootstrap carousel -->

    <div id="manlyCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#manlyCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#manlyCarousel" data-slide-to="1"></li>
        <li data-target="#manlyCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?php echo get_theme_mod( 'slide_1_img' ); ?>" alt="<?php echo get_theme_mod( 'slide_1_headline' ); ?>">
          <div class="container">
            <div class="carousel-caption">
              <h1 id="headline-1"><?php echo get_theme_mod( 'slide_1_headline' ); ?></h1>
              <span id="slide-text-1"><?php echo get_theme_mod( 'slide_1_text' ); ?></span>
              <a href="<?php echo get_theme_mod( 'slide_1_button_link' ); ?>"><button><?php echo get_theme_mod( 'slide_1_button_text' ); ?></button></a>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="<?php echo get_theme_mod( 'slide_2_img' ); ?>" alt="<?php echo get_theme_mod( 'slide_2_headline' ); ?>">
          <div class="container">
            <div class="carousel-caption">
              <h1 id="headline-2"><?php echo get_theme_mod( 'slide_2_headline' ); ?></h1>
              <span id="slide-text-2"><?php echo get_theme_mod( 'slide_2_text' ); ?></span>
              <a href="<?php echo get_theme_mod( 'slide_2_button_link' ); ?>"><button><?php echo get_theme_mod( 'slide_2_button_text' ); ?></button></a>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="<?php echo get_theme_mod( 'slide_3_img' ); ?>" alt="<?php echo get_theme_mod( 'slide_3_headline' ); ?>">
          <div class="container">
            <div class="carousel-caption">
              <h1 id="headline-3"><?php echo get_theme_mod( 'slide_3_headline' ); ?></h1>
              <span id="slide-text-3"><?php echo get_theme_mod( 'slide_3_text' ); ?></span>
              <a href="<?php echo get_theme_mod( 'slide_3_button_link' ); ?>"><button><?php echo get_theme_mod( 'slide_3_button_text' ); ?></button></a>
            </div>
          </div>
        </div>
      </div>

    </div>
</div><!-- end of carousel -->


</div><!-- end of full container -->



<div class="page-container">

  <div class="section group">

    <div class="col span_7_of_12">

    <!-- WP LOOP -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'manly-recipes-free' ); ?></p>

        <?php endif; ?> 

        <!-- show most recent blog post -->

              <?php
              $args = array( 'posts_per_page' => 1, 'orderby' => 'date' );
              $postslist = get_posts( $args );
              foreach ( $postslist as $post ) :
              setup_postdata( $post ); ?> 

                <h3 class="most-recent-posts"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="most-recent-posts">Posted on <?php echo the_time('l, F jS, Y');?> in <?php the_category( ', ' ); ?> with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>
                <a class="most-recent-posts" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>

                <a href="<?php the_permalink(); ?>"><button class="recent-excerpt">Read More</button></a>

                <p><?php the_excerpt(); ?></p>

                <?php
                endforeach; 
                wp_reset_postdata();
                ?>

    </div>

    <div class="col span_5_of_12">

    <!-- about box -->

      <?php if ( ! dynamic_sidebar( 'about-box') ): ?>
        <h3>About Box Setup</h3>
        <p>Go to Appearance > Widgets and add the "About Box" widget to this section.</p>
      <?php endif; ?>

    <!-- social media box -->

      <?php if ( ! dynamic_sidebar( 'social-icons') ): ?>
        <h3>Social Icons Setup</h3>
        <p>Go to Appearance > Widgets and add the "Social Media Icons" widget to this section.</p>
      <?php endif; ?>

    </div>

  </div>

<hr class="post-separator">

<h2 class="home-titles">Latest Recipes</h2>

    <div class="section group">

        <!-- WP LOOP -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'manly-recipes-free' ); ?></p>

        <?php endif; ?>

        <!-- show 4 recipe posts -->

          <?php
          $args = array( 'posts_per_page' => 4, 'post_type' => 'recipe', 'orderby' => 'date' );
          $postslist = get_posts( $args );
          foreach ( $postslist as $post ) :
          setup_postdata( $post ); ?> 

          <div class="col span_3_of_12 four-more-posts">

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
            <p>Posted on <?php echo the_time('l, F jS, Y');?> in <?php the_category( ', ' ); ?> with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>
            <a href="<?php the_permalink(); ?>"><button>Read More</button></a>

          </div>

            <?php
            endforeach; 
            wp_reset_postdata();
            ?>
      
    </div>

</div><!-- end of page container -->
</div><!-- end of full container -->

<?php get_footer(); ?>