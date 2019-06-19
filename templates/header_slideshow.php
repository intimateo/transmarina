	<div class="stage-wrapper">
      <div class="stages">
      <?php rewind_posts(); ?>
	<?php query_posts('cat=9' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$url = $thumb['0'];
?>

        <div style="background:url('<?php echo $url; ?>')"></div>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>
      </div>
    </div>
