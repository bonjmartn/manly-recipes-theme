<?php get_header(); ?>

<div class="page-container">

      <div class="pages-header">
        <h1><?php wp_title(''); ?></h1>
      </div>

            <ul class="blog-grid clearfix">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

             <li>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <p><em>
                Posted on <?php echo the_time('l, F jS, Y');?><br>
                in <?php the_category( ', ' ); ?><br>
                with <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                </em></p>            

                <p><?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                <?php endif; ?></p>

                <?php the_excerpt(); ?>

                <a href="<?php the_permalink(); ?>"><button>Read More</button></a>

                <hr class="post-separator">

            </li>

                <?php endwhile; ?>
                <?php endif; ?>

            </ul>
            

        <p>&nbsp;</p>

        <div class="pagination">

            <?php the_posts_pagination( array( 
            'mid_size' => 2,
            'type' => 'list',
            )); ?>

        </div>

        <p>&nbsp;</p>
        
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
     

  </div>


<?php get_footer(); ?>