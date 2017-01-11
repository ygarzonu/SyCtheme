<?php
/*

	@package saboresycolores_theme
	--Single Product Categories Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	
	<div class="entry-content">		
		
		<?php if( saboresycolores_get_attachment() ): ?>
			
			<a class="standard-featured-link" href="<?php the_permalink(); ?>">
				<div class="standard-featured background-image" style="background-image: url(<?php echo $featured_image; ?>);"></div>
			</a>
		<?php endif; ?>
		
		<?php the_content(); ?>
		
		</div>		
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php echo saboresycolores_posted_footer(); ?>
	</footer>
	
</article>