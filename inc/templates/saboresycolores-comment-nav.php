<nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="post-link-nav">
				<span class="saboresycolores-icon saboresycolores-chevron-left" aria-hidden="true"></span> 
				<?php previous_comments_link( esc_html__( 'Comentarios antiguos', 'saboresycolorestheme' ) ) ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 text-right">
			<div class="post-link-nav">
				<?php next_comments_link( esc_html__( 'Comentarios Recientes', 'saboresycolorestheme' ) ) ?>
				<span class="saboresycolores-icon saboresycolores-chevron-right" aria-hidden="true"></span>
			</div>
		</div>
	</div><!-- .row -->
</nav>