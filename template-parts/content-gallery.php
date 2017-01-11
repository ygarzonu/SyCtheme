<?php
/*

	@package saboresycolores_theme
	--Gallery Post Format

*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'saboresycolores-format-gallery' ); ?>>
	<header class="entry-header text-center">		
		<?php if( saboresycolores_get_attachment() ): 
			$attachments = saboresycolores_get_attachment(7);
			//var_dump($attachments);
		?>			
			<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">				
				<div class="carousel-inner" role="listbox">					
					<?php 
						$i = 0;
						for( $i = 0; $i < count($attachments); $i++ ): 
						$active = ( $i == 0 ? ' active' : '' );
					?>					
						<div class="item<?php echo $active; ?> background-image standard-featured" style="background-image: url( <?php echo wp_get_attachment_url( $attachment[$i]->ID ); ?> );"></div>					
					<?php 
						
						endfor; 
					?>					
				</div><!-- .carousel-inner -->
				
				<a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				</a>
				
			</div><!-- .carousel -->			
		<?php endif; ?>
		
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo saboresycolores_posted_meta(); ?>
		</div>		
	</header>
	
	<div class="entry-content">
		
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e( 'Leer Más' ); ?></a>
		</div>
		
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php echo saboresycolores_posted_footer(); ?>
	</footer>
	
</article>