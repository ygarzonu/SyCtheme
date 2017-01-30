<?php
/**
 * The Template for displaying all single posts
 *
 * @package saboresycolores_theme
 */
get_header(); ?>	
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-10 col-lg-8">
				<?php 
				if( have_posts() ):
					while( have_posts() ): the_post();						
						get_template_part( 'template-parts/single', get_post_format() );
						the_post_navigation();

						if ( comments_open() ):
							comments_template();				
						endif;
					endwhile;						
				endif;                
				?>		
			</div><!-- .col-xs-12 .col-sm-8 .col-md-10 .col-lg-8 -->	
		</div><!-- .row -->
		<div class="saboresycolores-sidebar col-sm-4 col-md-2 col-lg-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-sm-4 -->
	</div><!-- .container -->			
	
	
	

	
	</div><!-- .site-content -->
	
<?php get_footer(); ?>



