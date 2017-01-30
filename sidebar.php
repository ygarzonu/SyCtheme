<?php
	
	/*
		This is the template for the sidebar

		@package saboresycolores_theme
	*/


	if ( !is_active_sidebar( 'saboresycolores-sidebar' )  ) {
		return;
	}

?>

<aside class="sidebar widget-area" role="complementary">
	<div class="visible-xs visible-sm visible-md">
	<?php 
		wp_nav_menu( array(
			'theme_location' 	=> 'primary',
			'container' 		=> false,
			'menu_class' 		=> 'nav navbar-nav navbar-collapse',
			'walker' 			=> new SaboresyColores_Walker_Nav_Primary()
		) );
	?>
	</div>
	<?php dynamic_sidebar( 'saboresycolores-sidebar' ); ?>
</aside><!-- .sidebar .widget-area -->