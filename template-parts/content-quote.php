<?php
/*

	@package saboresycolores_theme
	--Quote Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'saboresycolores-format-quote' ); ?>>	

	<header class="entry-header Text-center">
		<div class="row">
			<div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
				<h1 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
				<?php the_title( '<h2 class="quote-author">', '</h2>'); ?>
			</div>
		</div>
	</header><!-- .entry-header -->
	<span class="stripe"></span>
	<div class="entry-content">		
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saboresycolores' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'saboresycolores' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->