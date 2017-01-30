<?php
/**
 * This is the template for the footer
 *
 * @package saboresycolores_theme
 *
 */

if ( !is_active_sidebar( 'saboresycolores-footer' )  ) {
		return;
	}

?>

	<footer> 
		<div class="saboresycolores-footer">
			<?php dynamic_sidebar( 'saboresycolores-footer' ); ?>
		</div>
		<div class="credits">
			<ul>
				<li><span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></li>
				<li><small>Diseñado y Desarrollado con ❤ por <span><a href="http://www.yeinygarzon.com/">Yeiny Garzón</a></span></small></li>
			</ul>			
		</div>	
	</footer>

	<?php wp_footer(); ?>
</body>
</html>