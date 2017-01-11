<?php
/*

	@package saboresycolores_theme
	--Link Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'saboresycolores-format-link' ); ?>>	

	<header class="entry-header text-center">
		<?php 
			$link = saboresycolores_grab_url();
			the_title( '<h1 class="entry-title"><a href="' . $link . '" target="_blank"', '<div class="link-icon"><span class="glyphicon glyphicon-link"></span></div></a></h1>' ) 
			?> 
</article><!-- #post-## -->