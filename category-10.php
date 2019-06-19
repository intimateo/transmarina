<?php get_header('internal'); ?>
	 <div class="contenido">
	 <div class="row">
        <h1 class="title"><?php echo single_cat_title(); ?></h1>
      </div>
      <div class="row">
      <?php 
      $posPost = 1;
      if ( have_posts() ) : while ( have_posts() ) : the_post(); 
      ?>
      		<?php if($posPost%2!=0){ ?>
      		<div class="row item-list">
		        <div class="large-5 columns">
					<?php the_post_thumbnail('full'); ?>
		        </div>
		        <div class="large-7 columns">
		        <h2 class="primary-color reset-margin title-line"><strong><?php the_title(); ?></strong></h2>
					<?php the_content(); ?>
		        </div>
      		</div>
      		<?php 
      		}
      		else{
  			?>
			<div class="row item-list">
		        <div class="large-7 columns">
		        <h2 class="primary-color reset-margin title-line"><strong><?php the_title(); ?></strong></h2>
		          <?php the_content(); ?>
		        </div>
		        <div class="large-5 columns">
		          <?php the_post_thumbnail('full'); ?>
		        </div>
		      </div>
      			<?
      			} ?>
      <?php 
      	$posPost++;
      	endwhile; ?>
      <!-- post navigation -->
      <?php else: ?>
      	<h1 class="title">NDER CONSTRUCTION</h1>
      <?php endif; ?>
      </div>
    </div>
 <?php get_footer(); ?>