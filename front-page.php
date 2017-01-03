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
				<div class="col-md-4">
					<div class="about-company-thumbnail">
						<figure><?php the_post_thumbnail(); ?></figure>
					</div>
				</div>
				<div class="about-company col-md-8">
				  	<?php
				      	$query = new WP_Query( array('page_id'=>24));?>
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

		<section class="spices-blog">
			<div class="content">
				<div id="spices">
					<h3>Cuál escogerás hoy?</h3>
						<?php query_posts('post_per_page=2'); ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<h4 id="title_post"><?php the_title(); ?></h4>
							<?php the_post_thumbnail(); ?>
							<a id="read-more-link" class="read-more-link" href="<?php the_permalink(); ?>">Leer...</a>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
				</div>
			</div>
		</section>		
	</section><!-- .home-page -->

<?php get_footer(); ?>

