<?php
/**
 * The template for displaying the homepage
 */

get_header(); ?>

	<section class="banner">
		<div class="headerslider"> <?php echo do_shortcode('[sp_responsiveslider cat_id="8" limit="-1" pagination="false" design="design-2"]'); ?></div>
	</section><!-- .banner -->

	<section id="products" class="sheet sheet--products">
		<div class="category-products">
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
					       	<h5><?php echo $description_category; ?></h5>
					       	<a class="button button_highlight" href="<?php the_permalink(); ?>">Ver Alacena <span>&rsaquo;</span></a>
				      	</div><!-- product -->
				        <?php endwhile; ?> 
				    <?php wp_reset_query(); ?>					     		
			    	</div><!-- wrapper -->
		    	</div><!-- #products -->
		   	</div><!-- .product-pages -->
		</div><!-- .category-products -->
	</section><!-- .sheet.products -->

	<section id="company" class="sheet sheet--company">
	<div class="row">
	
		<div class="col-md-4 ">			
				<div class="company_love" style="background-image: url(<?php echo saboresycolores_get_attachment(); ?>);"></div>	
				<?php echo get_the_post_thumbnail( 'full' ); ?>
			
		</div><!-- .col-md-4 -->				
		
		<div class="col-md-8 historia">
		  	<?php $query = new WP_Query( array('page_id'=>7));?>
		    <?php while ( $query->have_posts() ) : $query->the_post();
		        $second_title = get_field('titulo_alterno');
		        $short_description = get_field('descripcion_corta');?>
		        <h2 class="title"><?php echo $second_title; ?></h2>				        
			    <h5><?php echo $short_description; ?></h5>
			    <div class="button-container text-center">
					<a href="<?php the_permalink(); ?>" class="btn-saboresycolores"><?php _e( 'Acerca de SyC' ); ?></a>
				</div>
		    <?php endwhile; ?>
		    
	    </div><!-- .col-md-8 .historia -->	
	    <?php wp_reset_query(); ?>			
	    </div>
	</section><!-- .sheet.company -->
		
	<?php if ( have_posts() ): ?>
	<section id="articles" class="sheet sheet--articles">			
		<h2>Cuál escogerás hoy?</h2>
		<div id="blogpost" class="cf">
			<div class="wrapper">	
				<?php query_posts('post_per_page=2'); ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div id="spices-post" class=" post-box">
					<div class="post-blog" style="background-image: url(<?php echo saboresycolores_get_attachment(); ?>);">
						<div class="title-post">
							<h4><?php the_title( ); ?></h4><br/>
							<a id="read-more-link" class="read-more-link" href="<?php the_permalink(); ?>">Leer...</a>			
						</div><!-- .title-post -->	
					</div><!-- .post-blog -->									
				</div><!-- .post-box -->
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div><!-- .wrapper -->
		</div><!-- .cf -->
	</section><!-- .sheet.articles -->
	<?php endif; ?>

	<section class=" container contact">
			
		<div class="contact-form">
		  	<div class="contactus">
		  	<h2>Contacto</h2>
		  		<a href="<?php echo site_url('/contacto/'); ?>" class="btn btn-saboresycolores">Me interesa</a>
		  	</div>
		</section>				
				
	</div><!-- .saboresycolores-content -->
		


<?php get_footer(); ?>

