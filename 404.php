<?php
/**
*	This is the template for the header
*
*	@package saboresycolores_theme
*
*/
?>

<?php get_header(); ?>
<div class="content-wrap">
	<article id="post-0" class="post no-results not-found">
		<div class="row "">
			<div class="col-md-7 col-sm-12 img-responsive">
				<figure class="error-page"></figure>
			</div >
			<div class="error-message col-md-5 col-sm-12">
				<p><?php _e( 'Te ofrecemos disculpas, pero no se encontraron resultados sobre lo que estás buscando.  Quizas, quieras intentar buscar y así encontrar un tema relacionado.' ); ?></p>
				<?php get_search_form(); ?>
			</div>			
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
</div>

								
			
<?php get_footer();
