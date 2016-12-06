<?php get_header(); ?>

<div class="page-container">

  <div class="recipe-image-top">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
  </div>

  <div class="section group">

    <div class="col span_8_of_12">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id(); 
      $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
      $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);                
      ?>

      <div class="pages-header">
        <h1><?php the_title(); ?></h1>
      </div>      

      <p><em>
      Posted on <?php echo the_time('l, F jS, Y');?> in <?php the_category( ', ' ); ?> and <?php the_tags( 'tagged with: ', ', '); ?>.
      <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
      </em></p>

      <hr>

      <?php the_content(); ?>

      <div class="recipe-container">

        <div class="recipe-title">
          <?php the_field('recipe_title'); ?>
        </div> 

        <p class="recipe-details">
          <i class="fa fa-spoon"></i> Course: <?php the_field('course'); ?>&nbsp;&nbsp;
          <i class="fa fa-fire"></i> Cuisine: <?php the_field('cuisine'); ?>&nbsp;&nbsp;
          <i class="fa fa-hourglass-start"></i> Prep Time: <?php the_field('prep_time'); ?>&nbsp;&nbsp;
          <i class="fa fa-hourglass-end"></i> Cook Time: <?php the_field('cook_time'); ?>&nbsp;&nbsp;
          <i class="fa fa-check"></i> Servings: <?php the_field('servings'); ?>
        </p>

        <div class="recipe-ingredients">
          <h3><i class="fa fa-flask"></i> Ingredients</h3>
          <?php the_field('recipe_ingredients'); ?>
        </div> 

        <div class="recipe-directions">
          <h3><i class="fa fa-map-signs"></i> Directions</h3>
          <?php the_field('recipe_directions'); ?>
        </div> 

      </div> 

      <?php
        $defaults = array(
          'before'           => '<p>' . __( 'Pages:', 'manly-recipes' ),
          'after'            => '</p>',
          'link_before'      => '',
          'link_after'       => '',
          'next_or_number'   => 'number',
          'separator'        => ' ',
          'nextpagelink'     => __( 'Next page', 'manly-recipes' ),
          'previouspagelink' => __( 'Previous page', 'manly-recipes' ),
          'pagelink'         => '%',
          'echo'             => 1
        );
       
              wp_link_pages( $defaults );
      ?>
      
      <p>&nbsp;</p>
      <?php comments_template(); ?>
      <?php paginate_comments_links() ?>

      <?php endwhile; else: ?>

      <div class="page-header">
      <h1>Oh no!</h1>
      </div>

      <p>No content is appearing for this page!</p>

      <?php endif; ?>

    </div>

    <div class="col span_4_of_12">
      <?php get_sidebar( 'blog' ); ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>