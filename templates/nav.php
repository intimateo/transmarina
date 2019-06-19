<?php 
		$args = array(
			'theme_location' => 'menu-header',
			'menu' => 'nav',
			'menu_class' => 'row',
			'container_class' => 'navigation',
			'items_wrap' => '<nav id = "%1$s" class = "%2$s">%3$s</nav>',
		);
	
		wp_nav_menu( $args );
 ?>