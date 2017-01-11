<?php
	
	/*
		This is the template for the header

		@package saboresycolores_theme
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
		<div class="site">			
			<header id="menubar" class="saboresycolores-header header-main site-header ">				
			<div class="nav-container">
				<div class="site-branding">
					<a class="custom-logo" href="<?= esc_url(home_url('/')); ?>"><?php the_custom_logo() ?></a>
				</div>
				<nav id="menubar" class="navbar-saboresycolores" role="navigation" >
					<nav>
						<ul>
		   					<li>
							<?php 
								wp_nav_menu( array(
											'theme_location' 	=> 'primary',
											'container' 		=> false,
											'menu_class' 		=> 'nav navbar-nav',
											'walker' 			=> new SaboresyColores_Walker_Nav_Primary()
								) );
							?>
		  					</li>    
						</ul>
					</nav>				
				</nav>
			</div> 		
		</header>
		</div><!-- .container-fluid --> 

		<div id="content" class="site-content" role="main">
