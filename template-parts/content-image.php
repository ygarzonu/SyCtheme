<?php
/*

	@package saboresycolores_theme
	--Image Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'saboresycolores-format-image' ); ?>>
	<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	?>
	<?php endif; ?>
	<header class="entry-header Text-center background-image"  style="background-image: url(<?php echo $featured_image; ?>);">
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="responsive">
	  <div class="img">
	    <a target="_blank" href="">
	      <img src="" alt="" width="300" height="200">
	    </a>
	    <div class="desc">Add a description of the image here</div>
	  </div>
	</div>

	<footer class="entry-footer">
		<?php echo saboresycolores_posted_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->