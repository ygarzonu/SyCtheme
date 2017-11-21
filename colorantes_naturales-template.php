<?php
/*
 * Template Name: Colorantes Naturales Template
 * Description: Page template to display product custom post types 
 * underneath the page content
 */
 


get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      <header class="entry-header text-center">
		<div class="featured_single" style="background-image: url(<?php echo saboresycolores_get_attachment(); ?>);">	
			<h1 class="featured-title"><?php the_title(); ?></h1>
		</div><!-- .featured_single -->
		<span class="stripe"></span>			
	</header>

      <div class="entry-content">
        <?php the_content(); ?>
        
        <?php
		  $args = array(
		  	'post_type'        	=> 'cat_producto', // enter custom post type
		    'category_name'    	=> 'colorantes-naturales', 
		    'orderby' 			=> 'date',
		    'order' 			=> 'ASC'
		  );
		   
		  $loop = new WP_Query( $args );
		  if( $loop->have_posts() ): 
		?>
		<div id="color_type">
		  	<ul class="colorantes_list">
		  		
			<?php
			  while( $loop->have_posts() ): $loop->the_post(); global $post;
			    echo '<li id="colorante">';
			    echo '<h3>' . get_the_title() . '</h3>';
			    echo '<div class="colorante-image">'. get_the_post_thumbnail( $id ).'</div>';
			    echo '</li>';		   	
			  endwhile;
		  	?>
		  		
		 	</ul>
		</div><!-- #color_type -->

		
		<?php
		  while( $loop->have_posts() ): $loop->the_post(); global $post;
		    echo '<div id="description_color_type">'. get_the_content().'</div>';		       	
		  endwhile;
		  endif;
		?>
			
		
		
	  </div><!-- .entry-content -->
      
      <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>

  </div><!-- #content -->
</div><!-- #primary -->


<?php get_footer(); ?>