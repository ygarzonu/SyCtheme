<?php
/*

	@package saboresycolores_theme
	--Single Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center">	
		<div class="featured_single" style="background-image: url(<?php echo saboresycolores_get_attachment(); ?>);">	
			<h1 class="featured-title"><?php the_title(); ?></h1>
		</div><!-- .featured_single -->
		<span class="stripe"></span>		
		<div class="entry-meta">
				<?php echo saboresycolores_posted_meta(); ?>
		</div><!-- .entry-meta -->		
	</header>
	
	<div class="entry-content clearfix">		
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->	
	
</article>

<footer class="entry-footer">
	<?php echo saboresycolores_posted_footer(); ?>
</footer><!-- .entry-footer -->