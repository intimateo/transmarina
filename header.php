<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name' );?></title>
	<meta name="description" content="<?php bloginfo('description' ); ?>">
	<link rel="stylesheet" href="<?php bloginfo(stylesheet_url) ?>">
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/fonts.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.css">
    <script src="<?php echo bloginfo('template_directory'); ?>/js/vendor/jquery.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/foundation.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/app.js"></script>
    <?php wp_head(); ?>
</head>