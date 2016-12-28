<?php
/*

	@package sabores&colores_theme
	--Standard Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo saboresycolores_posted_meta(); ?>
		</div>
	</header>

	<div class="entry-content">
		<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		?>
			
			<a class="standard-featured-link" href="<?php the_permalink(); ?>">
				<div class="standard-featured background-image" style="background-image: url(<?php echo $featured_image; ?>);"></div>
			</a>
		<?php endif; ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .entry-excerpt -->
		<div class="button-container">
			<a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e( 'Leer más...' ) ?></a>
		</div><!-- .button-container -->
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php echo saboresycolores_posted_footer(); ?>
	</footer>

</article>