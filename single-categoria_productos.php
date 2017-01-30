<?php
/**
 * The template for displaying product categories.
 *
 * @package saboresycolores_theme
 *
 */

get_header(); ?>

		<div class="container">	
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/single-categoria_productos', 'page' );
			endwhile; // End of the loop.
			?>
		</div><!-- .container -->	

<?php
	get_footer();
