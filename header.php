<?php
	
	/*
		This is the template for the header

		@package sabores&colores_theme
	*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo( 'name' ); wp_title('|', true, 'right'); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>		
		
		<?php wp_head(); ?>	
	</head>

	<body <?php body_class(); ?>>
		<div class="container-fluid">			
			<header class="header-main">					
				<div class="col-xs-6 col-md-4">
					<a href="<?php echo home_url(); ?>" id="logo"><?php echo "empresa"; ?></a>
	   			</div>
	   			<div class="col-xs-12 col-sm-6 col-md-8">
					<nav class="navbar navbar-saboresycolores">
					<?php 
						wp_nav_menu( array(
										'theme_location' => 'primary',
										'container' => false,
										'menu_class' => 'nav navbar-nav',
										'walker' => new SaboresyColores_Walker_Nav_Primary()
						) );
					?>
					</nav>
				</div>					
			</header>			
		</div><!-- .container-fluid --> 

		<div id="content" class="site-content">
