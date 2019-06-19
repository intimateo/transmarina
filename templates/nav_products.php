<?php 
		$args = array(
			'theme_location' => 'menu-productos',
			'items_wrap' => '<ul class="tabs row reset-padding" data-tab>%3$s</ul>',
			'menu_class' => 'menu-item',
			'walker' => new description_walker()
		);
	
		wp_nav_menu( $args );
 ?>