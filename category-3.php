<?php get_header('internal'); ?>
	 <div class="contenido">
    <div class="products">
      <div class="row collapse">
        <div class="large-6 columns">
          <a href="#" class="active" id="sashimi-btn"><strong>Sashimi Quality Seafood</strong><br>Ultra frozen premium product</a>
        </div>
        <div class="large-6 columns">
          <a href="#" id="white-fish-btn"><strong>Quality of experience</strong><br>Pelagics and white fishing</a>
        </div>
      </div>
    </div>

    <div class="sashimi">
        <?php include TEMPLATEPATH . "/templates/nav_products.php" ?>
        <div class="tabs-content row collapse products-list">
            <?php 
$firstvisible=1;        
$descendant= array('child_of'=>3);
$categories = get_categories($descendant);
foreach($categories as $category) :
  ?>
<?php if($firstvisible){?>
<div class="content active" id="<?php echo $category->slug;?>">
  
  <?
  } else{?>
<div class="content" id="<?php echo $category->slug;?>">
<? } ?>
    <div class="product-title row">
            <h2><?php echo $category->name;?></h2>
            <p><?php echo $category->category_description;?></p>
    </div>
      <div class="row collapse">
            <?php rewind_posts(); ?>
            <?php query_posts('cat='.$category->term_id ); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <div class="large-4 columns end">
                    <a href="">
                      <?php the_post_thumbnail('full' ); ?>
                      <span class="item-title"><?php the_title(); ?></span>
                    </a>
                  </div>
            <?php endwhile; ?>
            <!-- post navigation -->
            <?php else: ?>
            <!-- no posts found -->
            <?php endif; ?>
      </div>
</div>
<?
$firstvisible=0;
endforeach;
?> 
          
          
        </div>
    </div>
</div>
<div class="white-fish" style="display:none;">
  <div class="row collapse">
   <?php rewind_posts(); ?>
  <?php query_posts('cat=4' ); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="large-4 columns end">
          <a href="">
            <?php the_post_thumbnail('full' ); ?>
            <?php 
                $titlepage=get_the_title(); 
                $titlespage = explode('|', $titlepage); ?>
                <span class="item-title"><?php echo $titlespage[0]; ?></span>
                <span class="item-cientific-title"><?php echo $titlespage[1]; ?></span>
          </a>
        </div>
  <?php endwhile; ?>
  <!-- post navigation -->
  <?php else: ?>
  <!-- no posts found -->
  <?php endif; ?>
        
    </div>
</div>
	</div>
 <?php get_footer(); ?>