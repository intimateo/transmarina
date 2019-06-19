<?php get_header(); ?>
<?php get_header(); ?>
<body>
	<?php rewind_posts(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_title(); ?>
		<?php the_excerpt(); ?>
		<?php the_date(); ?>
		<?php the_post_thumbnail('news-size' ); ?>
		<a href="<?php the_permalink(); ?>"> hola</a> 
	<!-- post -->
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
	
<?php get_footer(); ?>