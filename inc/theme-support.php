<?php 

/**
* @package saboresycolores_theme
*
*	======================
*	THEME SUPPORT OPTIONS
*	======================
*/

	$options = get_option( 'post_formats' );
	$formats = get_post_format_slugs();
	$output = array();
	foreach ( $formats as $format ) {
		$output[] = ( isset($options[$format] ) && $options[$format] == 1 ? $format : '' );
	}
	if( !empty($options)){
		add_theme_support( 'post-formats', $output );
	}

	$header = get_option( 'custom_header' );
	if ( $header == 1) {
		add_theme_support( 'custom-header' );
	}

	$background = get_option( 'custom_background' );
	if ( $background == 1) {
		add_theme_support( 'custom-background' );
	}

	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 338,
		'flex-height' => true,
		'flex-width'  => true,
    	'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_theme_support( 'post-thumbnails' );

/**
 * Add Product Name to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */
	function product_attachment_field( $form_fields, $post ) {
    $form_fields['product-name'] = array(
        'label' => 'Nombre del producto',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'product_name', true ),
        'helps' => 'Si se proporciona, el nombre del producto será mostrado',
    );

	return $form_fields;
	}

	add_filter( 'attachment_fields_to_edit', 'product_attachment_field', 10, 2 );

/**
* Save values of Product Name in media uploader
*
* @param $post array, the post data for database
* @param $attachment array, attachment fields from $_POST form
* @return $post array, modified post data
*/

	function product_attachment_field_save( $post, $attachment ) {
	    if( isset( $attachment['product-name'] ) )
	        update_post_meta( $post['ID'], 'product_name', $attachment['product-name'] );
	   
	    return $post;
	}

	add_filter( 'attachment_fields_to_save', 'product_attachment_field_save', 10, 2 );


/** Activate Nav Menu Option */
	function saboresycolores_register_nav_menu(){
	
		register_nav_menu( 'primary', 'Header Navigation Menu' );
		register_nav_menu( 'secondary', 'Footer Navigation Menu' );
	}
	add_action( 'after_setup_theme', 'saboresycolores_register_nav_menu' );

	/* Activate HTML5 features */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


	/*
		============================
		SIDEBAR FUNCTIONS
		============================
	*/

		function saboresycolores_sidebar_init() {
			register_sidebar(
				array(
					'name'				=>	esc_html__( 'Barra lateral Sabores y Colores', 'saboresycolorestheme' ),
					'id'				=>	'saboresycolores-sidebar',
					'description'		=>	'Barra Derecha Lateral Dinámica',
					'before_widget'		=>	'<section id="%1$s" class="saboresycolores-widget %2$s">',
					'after-widget'		=>	'</section>',
					'before_title'		=>	'<h2 class="saboresycolores-widget-title">',
					'after-title'		=>	'</h2>'	
					)
				);

			register_sidebar(
				array(
					'name'				=>	esc_html__( 'Footer Sabores y Colores', 'saboresycolorestheme' ),
					'id'				=>	'saboresycolores-footer',
					'description'		=>	'Barra inferior Dinámica',
					'before_widget'		=>	'<section id="%1$s" class="saboresycolores-widget %2$s">',
					'after-widget'		=>	'</section>',
					'before_title'		=>	'<h2 class="saboresycolores-widget-title">',
					'after-title'		=>	'</h2>'	
					)
				);
		}

		add_action( 'widgets_init', 'saboresycolores_sidebar_init' );


	/*
		============================
		BLOG LOOP CUSTOM FUNCTIONS
		============================
	*/

	function saboresycolores_posted_meta(){
		$posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );
		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		$i = 1;

		if( !empty($categories) ):
			foreach ( $categories as $category ) {
				if( $i > 1 ): $output .= $separator; endif;
				$output .= '<a href="' . esc_url( get_category_link( $category->term_id) ) . '" alt="' . esc_attr( 'Ver todos los artículos in%s', $category->name ) .'">' . esc_html( $category->name ) . '</a>';
				$i++;
			}
		endif;

		return '<span class="posted-on">Publicado hace <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</span> / <span class="posted-in">' . $output . '</span>';
	}

	function saboresycolores_posted_footer(){
		$comments_num = get_comments_number();
		if ( comments_open() ) {
			//get comments link
			if( $comments_num == 0 ){
				$comments = __( 'No hay comentarios' );
			} elseif ( $comments_num > 1 ) {
				$comments = $comments_num . __( ' Comentarios' );
			}else{
				$comments = __( '1 Comentario' );
			}
			$comments = '<div class="comments-link"><a href="' . get_comments_link() . '">' . $comments . '<span class="glyphicon glyphicon-comment"></span></a></div>';
		} else {
			$comments = __( 'Los comentarios están desabilitados' );
		}
		return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">' . get_the_tag_list('<div class="tags-list"><span class="glyphicon glyphicon-tag"></span>', ' ', '</div>') . '</div><div class="col-xs-12 col-sm-6">' . $comments . '</div>';
	}

	function saboresycolores_get_attachment( $num = 1 ){	
		$output = '';
		if( has_post_thumbnail() && $num == 1 ): 
			$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		else:
			$attachments = get_posts( array( 
				'post_type' => 'attachment',
				'posts_per_page' => $num,
				'post_parent' => get_the_ID()
			) );
			if( $attachments && $num == 1 ):
				foreach ( $attachments as $attachment ):
					$output = wp_get_attachment_url( $attachment->ID );
				endforeach;
			elseif( $attachments && $num > 1 ):
				$output = $attachments;
			endif;
			
			wp_reset_postdata();
			
		endif;
		
		return $output;
	}

	function saboresycolores_grab_url(){
		if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
		return false;
	}
	return esc_url_raw( $links[1] );
}

/*
	========================
		SINGLE POST CUSTOM FUNCTIONS
	========================
*/
function saboresycolores_post_navigation(){
	
	$nav = '<div class="row">';
	
	$prev = get_previous_post_link( '<div class="post-link-nav"><span class="saboresycolores icon-left" aria-hidden="true"></span> %link</div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6">' . $prev . '</div>';
	
	$next = get_next_post_link( '<div class="post-link-nav">%link <span class="saboresycolores icon-right" aria-hidden="true"></span></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';
	
	$nav .= '</div>';
	
	return $nav;
	
}

function saboresycolores_share_this( $content ){
	
	if( is_single() ){
	
		$content .= '<div class="saboresycolores-sharethis"><h4>Comparte!</h4>';
				
		$title = get_the_title();
		$permalink = get_permalink();
		
		$twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );
		
		$twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
		$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
		$google = 'https://plus.google.com/share?url=' . $permalink;
			
		$content .= '<ul>';
		$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="dashicons dashicons-twitter"></span></a></li>';
		$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="dashicons dashicons-facebook"></span></a></li>';
		$content .= '<li><a href="' . $google . '" target="_blank" rel="nofollow"><span class="dashicons dashicons-googleplus"></span></a></li>';
		$content .= '</ul></div><!-- .saboresycolores-share -->';
		
		return $content;
	
	} else {
		return $content;
	}
	
}
add_filter( 'the_content', 'saboresycolores_share_this' );

function saboresycolores_get_post_navigation(){
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): 
		require( get_template_directory() . '/inc/templates/saboresycolores-comment-nav.php' );
	endif;
}