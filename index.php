<?php 

/*	
*	@package saboresycolores_theme
*/

get_header(); ?>
	
	<div class="container">
		<?php 
		if( have_posts() ):
			while( have_posts() ): the_post();						
				get_template_part( 'template-parts/content', get_post_format() );						
			endwhile;						
		endif;                
		?>				
	</div><!-- .container -->			
		
<?php get_footer(); ?>
