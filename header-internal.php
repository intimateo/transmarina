<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name' );?> | <?php if(is_category()){ echo single_cat_title();}else{ echo the_title( );}?></title>
	<meta name="description" content="<?php bloginfo('description' ); ?>">
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/fonts.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?php bloginfo(stylesheet_url) ?>">
    <script src="<?php echo bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/app.js"></script>
    <?php wp_head(); ?>
</head>
<body>
<?php if(is_category()) {   $category = get_query_var('cat');$current_cat = get_category($cat);}else{global $post;$post_slug=$post->post_name;}
?>
<header class="internal">
    <?php if(is_category()){ ?>
         <?php if ( post_is_in_descendant_category( 19 )  ) {
            $productscat = get_category(19);
            ?>
            <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/hero-<? echo $productscat->slug;?>.jpg');"></div>
        <? }else{?>
            <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/hero-<? echo $current_cat->slug;?>.jpg');"></div>
        <? } ?>
    <? }else{ ?>
        <div class="banner" style="background-image: url('<?php echo get_template_directory_uri();?>/img/hero-<? echo $post_slug;?>.jpg');"></div>
    <? } ?>
    <div class="row">
    <?php include TEMPLATEPATH . "/templates/nav_left.php" ?>
      <div class="branding row">
        <div class="large-7 columns">
          <a href="/"><img src="<?php echo bloginfo('template_directory');?>/img/transmarina_logo_new.png" alt="Transmarina"></a>
          <div class="hero">
          <? if(is_category()){?>
            <?php if ( post_is_in_descendant_category( 19 )  ) {
                $productscat = get_category(19);
                ?>
                <h1><?php echo $productscat->name; ?></h1>
                <p><?php echo $productscat->description; ?></p>
                <?
            }else{
            ?>
            <h1><?php echo single_cat_title(); ?></h1>
            <p><?php echo category_description(); ?></p>
            <? }}else{ ?>
                <?php 
                $titlepage=get_the_title();    
                $titlespage = explode('|', $titlepage); ?>
                <h1><?php echo $titlespage[0]; ?></h1>
                <p><?php echo $titlespage[1]; ?></p>
            <? } ?>
          </div>
        </div>
        <div class="large-5 columns rightside">
       
        </div>
        
      </div>
    </div>
    <?php include TEMPLATEPATH . "/templates/nav.php" ?>
  </header>