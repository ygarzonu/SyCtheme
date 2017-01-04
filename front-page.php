<?php
/**
 * The template for displaying the homepage
 */

get_header(); ?>

	<section>
		<div class="header-container background-image" style="background-image: url(<?php header_image(); ?>);">
			<div class="header-content table">
				<div class="table-cell">
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>				
				</div><!-- .table-cell -->				
			</div><!-- .header-content -->
		</div><!-- .header-container -->

		<section class="category-products">
			<div class="content">
			  	<div class="product-pages">
			  		<div id="products" class="cf">
			  			<div class="wrapper">			  										  		
					   	    <?php query_posts('post_type=categoria_productos&posts_per_page=3'); ?>
					   	    <?php while ( have_posts() ) : the_post();
					   	    $description_category = get_field('descripcion_categoria'); ?>
					   	    <div class="product-box">
								<h2><?php the_title(); ?></h2>
						       	<div class="product-categorie-thumbnail">
						       		<?php the_post_thumbnail(); ?>
						       	</div>
						       	<h5><?php echo $description_category; ?></h5><br/>
						       	<a class="button button_highlight button_small" href="<?php the_permalink(); ?>">Ver Alacena <span>&rsaquo;</span></a>
					      	</div><!-- product -->
					        <?php endwhile; ?> 
					    <?php wp_reset_query(); ?>					     		
				    	</div><!-- wrapper -->
			    	</div><!-- #products -->
			   	</div><!-- .product-pages -->
			</div><!-- .content -->
		</section><!-- .category-products -->

		<section class=" container company">
			<div class="content">
				<div class="about-company-thumbnail col-md-4">
					<figure><?php the_post_thumbnail(); ?></figure>
				</div><!-- .about-company-thumbnail -->				
				<div class="about-company col-md-8">
				  	<?php $query = new WP_Query( array('page_id'=>24));?>
				    <?php while ( $query->have_posts() ) : $query->the_post();
			            $second_title = get_field('titulo_alterno');
			            $short_description = get_field('descripcion_corta');?>
				        <h2 class="title"><?php echo $second_title; ?></h2>
				        <div class="short-description">
					        <h5><?php echo $short_description; ?></h5>
					        <a href="<?php the_permalink(); ?>">Acerca de SyC</a>
				    	</div><!-- .short-description -->        			
				    <?php endwhile; ?>
				    <?php wp_reset_query(); ?>
			    </div><!-- .about-company -->				
			</div><!-- .content -->			
		</section><!-- .company -->
		
		<?php if ( have_posts() ): ?>
		<section class="spices-blog">			
				<h2>Cuál escogerás hoy?</h2>
				<div class="cf">
					<div class="wrapper">	
						<?php query_posts('post_per_page=2'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<div id="spices-post" class="post-box">
						<?php if( has_post_thumbnail() ): 
							$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
						?>
						<?php endif; ?>	
						<figure class="post-blog" style="background-image: url(<?php echo $featured_image; ?>)";>						
							
							<h4><?php the_title( ); ?></h4><br/>
							<a id="read-more-link" class="read-more-link" href="<?php the_permalink(); ?>">Leer...</a>				
							
						</figure>						
						</div>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div><!-- .wrapper -->
				</div><!-- .cf -->
			
		</section><!-- .spices-blog -->
		<?php endif; ?>

		<section class=" container contact">
			
				<div class="contact-form">
				  	<?php $query = new WP_Query( array('page_id'=>24));?>
				    <?php while ( $query->have_posts() ) : $query->the_post();
			            $second_title = get_field('titulo_alterno');
			            $short_description = get_field('descripcion_corta');?>
				        <h2 class="title"><?php echo $second_title; ?></h2>
				        <div class="short-description">
					        <h5><?php echo $short_description; ?></h5>
					        <a href="<?php the_permalink(); ?>">Acerca de SyC</a>
				    	</div><!-- .short-description -->        			
				    <?php endwhile; ?>
				    <?php wp_reset_query(); ?>
			    </div><!-- .about-company -->				
				
		</section><!-- .company -->

	</section><!-- .home-page -->

<?php get_footer(); ?>

