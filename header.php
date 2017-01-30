<?php
/**
*	This is the template for the header
*
*	@package saboresycolores_theme
*
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo( 'name' ); wp_title(' | ', true, 'right'); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>		
		
		<?php wp_head(); ?>	

		<?php 
			$custom_css = esc_attr( get_option( 'saboresycolores_css' ) );
			if( !empty( $custom_css ) ):
				echo '<style>' . $custom_css . '</style>';
			endif;
		?>
	</head>

	<body <?php body_class(); ?>>
		<div class="site">			
		<?php if(is_home() || is_front_page()) : ?>
			<header id="menubar" class="saboresycolores-header header-main site-header ">
		<?php  else:  ?>
			<header id="menubar" class="saboresycolores-header-bar header-main site-header ">
		<?php endif; ?>			
			<div class="nav-container container-fluid">
				<div class="site-branding">
					<a class="custom-logo" href="<?= esc_url(home_url('/')); ?>"><?php the_custom_logo() ?></a>
				</div>
				<nav id="menubar" class="navbar-saboresycolores hidden-xs hidden-sm hidden-md" role="navigation" >
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
