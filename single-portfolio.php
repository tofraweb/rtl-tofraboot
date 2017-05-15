<?php get_header(); ?>

  <div class="container">

    <div class="page-header">

      <div class="row">

        <div class="col-xs-9">
          <h1><?php the_title(); ?></h1>
        </div>

      </div>

    </div>

    <div class="row">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <div class="col-sm-8 portfolio-image">
          <?php
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'large', true );
          ?>

          <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic"></a></p>

        </div>

        <div class="col-sm-4">

          <!-- Print the custom fields values -->


          <div class="bird-details">
          <?php $latin_name = get_post_meta( get_the_ID(), 'latin_name', true ); ?>
          <?php if ( $latin_name )  : ?>
            <div class="bird-name"><div class="bird-name-label">שם מדעי:</div><?php echo $latin_name; ?></div>
          <?php endif; ?>

          <?php $hungarian_name = get_post_meta( get_the_ID(), 'hungarian_name', true ); ?>
          <?php if ( $hungarian_name )  : ?>
            <div class="bird-name"><div class="bird-name-label">שם בהונגרית:</div><?php echo $hungarian_name; ?></div>
          <?php endif; ?>
          </div>


          <?php the_content(); ?>


          <!--<p><a class="btn btn-large btn-primary" href="<?php the_field('link'); ?>">View Final Piece <span class="glyphicon glyphicon-arrow-right"></span></a></p>-->
          <div class="prev-next">
            <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>' ); ?>
            <a href="<?php bloginfo('url'); ?>/portfolio"><span class="glyphicon glyphicon-th"></span></a>
            <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>' ); ?>
          </div>
        </div>


      <?php endwhile; else: ?>

        <div class="page-header">
          <h1>Oh no!</h1>
        </div>

        <p>No content is appearing for this page!</p>

      <?php endif; ?>



    </div>

<?php get_footer(); ?>
