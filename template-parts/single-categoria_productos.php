<?php
/**
*
*	@package saboresycolores_theme
*	--Single Product Categories Post Format
*
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'saboresycolores-format-categories' ); ?>>
	<?php if( has_post_thumbnail() ):
 		$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
 	?>		 
 	<header class="entry-header text-center background-image" style="background-image: url(<?php echo $featured_image; ?>);">
 	<?php endif; ?>	
 		<h1><?php the_title( ); ?></h1> 		
  	</header><!-- .entry-header -->
	<div class="stripe"></div>
	<div class="entry-content">		
		<div class="grid">		
			<?php the_content(); ?>			
		</div>			
	</div><!-- .entry-content -->	
</article>