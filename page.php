<?php
/**
 * The template for displaying all pages.
 *
 */

get_header(); ?>	
	
	<div class="container">
		<?php 
		if( have_posts() ):
			while( have_posts() ): the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile;
		endif;
    	?>
	</div><!-- .container -->

<?php get_footer(); ?>
