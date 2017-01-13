<?php
/**
 * The template for displaying product categories.
 *
 * @package saboresycolores_theme
 *
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">	
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/single-categoria_productos', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</div><!-- .container -->
	</main>
</div>
<?php

get_footer();
