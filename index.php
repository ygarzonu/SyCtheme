<?php
/*

	@package saboresycolores_theme

*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<div class="container">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('template-parts/content.php', get_post_format()); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	
	</main>
</div>

<?php get_footer(); ?>
