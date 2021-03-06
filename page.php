<?php
/* Template Name: Right Sidebar
*/
?>
<?php get_header(); ?>

<div class="page-container">

  <div class="section group">

    <div class="col span_8_of_12">
      
      <div class="pages-header">
        <h1><?php the_title(); ?></h1>
      </div>

      <!-- WP LOOP -->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php the_content(); ?>

      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'manly-recipes' ); ?></p>
      <?php endif; ?> 

    </div>

    <div class="col span_4_of_12">
      <?php get_sidebar( 'page' ); ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>
