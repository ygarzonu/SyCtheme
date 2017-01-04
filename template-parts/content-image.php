<?php
/*

	@package saboresycolores_theme
	--Image Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'saboresycolores-format-image' ); ?>>
	

	<header class="entry-header Text-center background-image"  style="background-image: url(<?php echo saboresycolores_get_attatchment();?>);">
		<h1><?php the_title( ); ?></h1>
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