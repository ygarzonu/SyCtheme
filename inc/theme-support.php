<?php 

/*
@package sabores&colores theme

	======================
	THEME SUPPORT OPTIONS
	======================
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

	add_theme_support( 'post-thumbnails' );

	/* Activate Nav Menu Option */
	function saboresycolores_register_nav_menu(){
		register_nav_menu( 'primary', 'Primary Navigation Menu' );
	}
	add_action( 'after_setup_theme', 'saboresycolores_register_nav_menu' );


	/*
		============================
		LOGO FUNCTION
		============================
	*/
	function saboresycolores_logo($maxwidth = 200){
	$logo = '';
	$img_id = trim(saboresycolores_get_option('logo_img_id'));
	
	if(!empty($img_id)){
		$logo_img = wp_get_attachment_image_src($img_id, 'full');
		$w = $logo_img[1];
		$h = $logo_img[2];
		
		// need to check these because of jetpack plugin
		if(!empty($w) && !empty($h)){
			$k = $w / $h; //aspect ratio

			//check if width or height is outside of predefined max width and height
			if($w > $maxwidth){
				$w = $maxwidth;
				$h = round($w / $k);
			}
		}else{
			$w = $maxwidth;
			$h = '';
		}
		$logo = '<img src="'. $logo_img[0] .'" alt="'. get_bloginfo('name') .'" ';
		
		if( !empty($w) && !empty($h) ){
			$logo .= 'width="'. $w .'" height="'. $h .'" ';
		}
		
		$logo .= '" />';		
	}
	elseif( '' != trim(saboresycolores_get_option('text_logo')) ){
		$logo = '<span id="logo-text">' . esc_html(stripslashes(saboresycolores_get_option('text_logo'))) . '</span>';
	}//if all else fails, return set blog name as logo
	else{
		$logo = '<span id="logo-text">' . get_bloginfo('name') . '</span>';
	}

	echo $logo;
}


function saboresycolores_get_options_name(){
		$opt_sufix = '';

		// set options name suffix if WPML is activated
		if(defined('ICL_LANGUAGE_CODE')){
			global $sitepress;
			$default_lng = $sitepress->get_default_language();
			if($default_lng != ICL_LANGUAGE_CODE){
				$opt_sufix .= '_' . ICL_LANGUAGE_CODE;
			}
		}
		return saboresycolores_OPTIONS_NAME . $opt_sufix;
	}


	/**
	 * Returns theme option by option name.
	 *
	 * @since saboresycolores 1.0
	 *
	 * @param string $key Option name
	 * @return mixed
	 */
	function saboresycolores_get_option($key){
		$options_name = saboresycolores_get_options_name();
		$values = get_option($options_name);
		
		return (!empty($values[$key])) ? $values[$key] : saboresycolores_get_option_default($key);
	}
	
	/**
	 * Returns theme option by option name.
	 *
	 * @since saboresycolores 1.0.7
	 *
	 * @param string $key Option name
	 * @return mixed
	 */
	function saboresycolores_get_option_default($key){
		global $saboresycolores_theme_option_pages;
		global $saboresycolores_options_list;
		
		if(empty($saboresycolores_options_list)){
			foreach($saboresycolores_theme_option_pages['saboresycolores_theme_settings_page']['tabs'] as $tab){
				foreach($tab['fields'] as $field){
					if(!empty($field['default']) && !empty($field['id'])){
						$saboresycolores_options_list[$field['id']] = $field['default'];
					}
				}
			}
		}
		
		if(!empty($saboresycolores_options_list[$key])){
			return $saboresycolores_options_list[$key];
		}
		
		return '';
	}

	/**
	 * Set single option in theme settings
	 *
	 * @since saboresycolores 1.0
	 *
	 * @param string $key Option name
	 * @param mixed $value Option value
	 */
	function saboresycolores_set_option($key, $value){

		if (trim($key) == '')
				return;

		$options_name = saboresycolores_get_options_name();
		$saboresycolores_values = get_option($options_name);
		$saboresycolores_values[$key] = $value;

		update_option($options_name, $saboresycolores_values);
	}

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
			$comments = '<a href="' . get_comments_link() . '">' . $comments . '<span class="saboresycolores-icon saboresycolores-comment"></span></a>';
		} else {
			$comments = __( 'Los comentarios están desabilitados' );
		}
		return '<div clas="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">' . get_the_tag_list('<div class="tags-list"><span class="saboresycolores-icon saboresycolores-tag"></span>', ' ', '</div>') . '</div><div class="col-xs-12 col-sm-6">' . $comments . '</div>';
	}