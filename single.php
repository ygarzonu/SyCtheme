<?php
/**
 * The Template for displaying all single posts
 *
 * @package saboresycolores_theme
 */
get_header(); ?>

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-md-9 col-lg-8">
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
				</div>	
				</div>	
			</div><!-- .container -->			
		</main>
	</div><!-- #primary -->
	
<?php get_footer(); ?>



