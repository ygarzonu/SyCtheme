<?php
/*

	@package saboresycolores_theme
	--Page Template

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center">	
			<?php the_title( '<h1></h1>'); ?>		
	</header>
	
	<div class="entry-content clearfix">		
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	
</article>

