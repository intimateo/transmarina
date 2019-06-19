<?php get_header(); ?>
<body>
  <header>
    <?php include TEMPLATEPATH."/templates/header_slideshow.php" ?>
    <div class="row">
      <?php include TEMPLATEPATH . "/templates/nav_left.php" ?> 
      <div class="branding row">
        <div class="large-7 columns">
          <a href="/"><img src="<?php bloginfo('template_directory');?>/img/transmarina_logo_new.png" alt="Transmarina"></a>
          <div class="slogan">
            Quality in the fish market is our business
          </div>
        </div>
        <div class="large-5 columns rightside">
                   
        </div>
        
      </div>
    </div>
    <?php include TEMPLATEPATH . "/templates/nav.php" ?>
    
  </header>

	<div class="contenido">
    <section class="row products_select">
      <div class="large-6 columns pone">
      <img src="<?php bloginfo('template_directory');?>/img/sashimi_transmarina_intro.jpg" alt="">
      <p></p>
      <strong>Sashimi Quality<br>Seafood</strong><p>Ultra frozen premium product</p>
      <p><a href="/category/products/sashimi/#sashimi" class="button blue">View Products</a></p>
      </div>
      <div class="large-6 columns ptwo">
      <img src="<?php bloginfo('template_directory');?>/img/pelagics_transmarina_intro.jpg" alt="">
      <p></p>
      <strong>Quality of<br>experience</strong><p>Pelagics and white fishing</p><p>
      <a href="category/products/sashimi/#whitefish" class="button blue">View Products</a></p></div>
    </section>


    <section class="gray-section">
    <div class="row">
      <div class="large-12 columns">
        <h1 class="title">NEWS &amp; PUBLICATIONS</h1>
        <div class="row" id="news">
        <?php rewind_posts(); ?>
	<?php query_posts('cat=2' ); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="large-4 columns end">
			<a class="a_news" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('news-size' ); ?>
				<h4><?php the_title(); ?></h4>
				<div class="news_text"><?php the_excerpt(); ?></div>
			</a> 
		</div>
	<!-- post -->
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
          
        </div>
      </div>
    </div>
    </section>
    <section>
    <?php dynamic_sidebar( 'certifications' ); ?>
    </section>
    
  <!-- END OF CONTENT -->
  </div>


	

<?php get_footer(); ?>