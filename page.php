<?php get_header('internal'); ?>
   <div class="contenido">
   <div class="row">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php 
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    $url = $thumb['0']; 
    ?>
    <div class="row">
    <h1 class="title"><?php the_title(); ?></h1>
   </div>
    <div class="row item-list <?php echo($post->post_name);  ?>" style="background:url('<?php echo $url; ?>')">
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