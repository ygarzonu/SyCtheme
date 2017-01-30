<?php
/**
 * The template for displaying the category products archive page.
 *
 */

get_header(); ?>	
	
	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<p>is this working?</p>
		<?php endwhile; ?>
	</div><!-- .container -->

<?php get_footer(); ?>
