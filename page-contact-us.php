<?php get_header('internal'); ?>
   <div class="contenido white-content">
   <div class="row contact-form">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="large-4 columns">
          <i class="fa fa-location-arrow"></i><h4>Adress</h4>
          <div class="data-contact">
            <?php echo get_post_meta( $post->ID, 'meta-box-address', true ); ?>
          </div>
          <i class="fa fa-phone"></i><h4>Phone</h4>
          <div class="data-contact">
            <?php echo get_post_meta( $post->ID, 'meta-box-phone', true ); ?>
          </div>

          <i class="fa fa-user"></i> <h4>Customer Service</h4>
          <div class="data-contact">
            <?php echo get_post_meta( $post->ID, 'meta-box-service', true ); ?>
            </div>
          <i class="fa fa-envelope"></i><h4>Contact Sales</h4>
          <div class="data-contact">
            <?php echo get_post_meta( $post->ID, 'meta-box-sales', true ); ?>
          </div>

          <i class="fa fa-user"></i> <h4>Purchasing Department</h4>
          <div class="data-contact">
            <?php echo get_post_meta( $post->ID, 'meta-box-purchasing', true ); ?>
          </div>
          

          <i class="fa fa-users"></i> <h4>Human Resources</h4>
          <div class="data-contact">
          <?php echo get_post_meta( $post->ID, 'meta-box-rrhh', true ); ?>
        </div>
        </div>
        <div class="large-8 columns">
          <?php the_content(); ?>
        </div>
        
        
   <?php endwhile; ?>
   <!-- post navigation -->
   <?php else: ?>
   <!-- no posts found -->
   <?php endif; ?>
 
      </div>
  </div>
  <?php get_footer(); ?>