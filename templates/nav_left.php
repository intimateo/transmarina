<?php 
		$args = array(
			'theme_location' => 'menu-left',
			'menu' => 'nav',
			'menu_class' => 'row',
			'container_class' => 'secondary-links',
			'items_wrap' => '%3$s',
		);
	
		wp_nav_menu( $args );
 ?>