<?php 

/*
@package saboresycolores theme

	======================
	THEME CUSTOM POST TYPES
	======================
*/

	/* PRODUCT CUSTOM POST TYPE */
	function saboresycolores_product_custom_post_type(){
		$labels = array(
			'name'					=> __( 'Productos' ),
			'singular_name'			=> __( 'Producto' ),
			'all_items' 			=> __( 'Todos los productos' ),
			'add_new_item'  		=> __( 'Agregar Nuevo Producto' ),
			'edit_item'     		=> __( 'Editar Producto' ),
			'parent_item'       	=> __( 'Parent Categoria' ),
			'parent_item_colon' 	=> __( 'Parent Categoria:' ),
			'view_item'             => __( 'Ver Producto' ),
			'view_items'            => __( 'Ver Productos' ),
			'insert_into_item'      => __( 'Insertar dentro del producto' ),
			'uploaded_to_this_item' => __( 'Cargado a este elemento' )
			);

		$args = array(
			'labels'		=>	$labels,
			'hierarchical'  =>  true,
			'show_ui' 		=> 	true,
			'menu_position' => 	5,			
			'public'		=>	true,
			'has_archive'	=> 	true,
			'rewrite'		=>	array( 'slug'	=>	'productos' ),
			'menu_icon'		=>  'dashicons-store',
			'supports'		=>  array( 'title', 'editor', 'thumbnail', 'post-formats', 'page-attributes', 'excerpt', 'custom-fields')
			);
		//register_post_type(name of the custome post type, array)
		register_post_type( 'cat_producto', $args );
		add_post_type_support( 'page', 'post-formats' );
		register_taxonomy_for_object_type('category', 'cat_producto');
		register_taxonomy_for_object_type('post_tag', 'cat_producto');
	}
	
	//Hook this custom post type function into the Sabores & Colores theme
	add_action( 'init', 'saboresycolores_product_custom_post_type' );



//--------------------------------------------------------------------------------------------
	
	$contact = get_option( 'activate_contact' );
	if ( isset($contact) == 1) {
		add_action( 'init', 'saboresycolores_contact_custom_post_type' );

		//add_filter( 'manage_yourcustomposttype_posts_column', '' );
		add_filter( 'manage_syc-contact_posts_columns', 'saboresycolores_set_contact_columns' );
		//add_action( 'action name', 'callback function', priority to execution, number of arguments );
		add_action( 'manage_syc-contact_posts_custom_column', 'saboresycolores_contact_custom_column', 10, 2 );

		add_action( 'add_meta_boxes', 'saboresycolores_contact_add_meta_box' );
		add_action( 'save_post', 'saboresycolores_save_contact_email_data' );
	}


	/* CONTACT CUSTOM POST TYPE */
	function saboresycolores_contact_custom_post_type(){
		$labels = array(
			'name' 				=> 'Mensajes',
			'singular_name' 	=> 'Mensaje',
			'menu_name'			=> 'Mensajes',
			'name_admin_bar'	=> 'Mensaje',
			'add_new_item'  	=> 'Agregar nuevo Mensaje'
		);

		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 26,
			'menu_icon'			=> 'dashicons-email-alt',
			'supports'			=> array( 'title', 'editor', 'author')
		);

		register_post_type( 'syc-contact', $args );
	}

	function saboresycolores_set_contact_columns( $columns ){
		$newcolumns = array();
		$newcolumns['title'] = 'Nombre completo';
		$newcolumns['message'] = 'Mensaje';
		$newcolumns['email'] = 'Email';
		$newcolumns['date'] = 'Fecha';
		return $newcolumns;

		//unset( $columns['author']);
		//return $columns;
	}

	function saboresycolores_contact_custom_column( $column, $post_id ){
		switch ( $column ) {
			case 'message':
				//message column
				echo get_the_excerpt();
				break;

			case 'email':
				//email column
				$email = get_post_meta( $post_id, '_contact_email_value_key', true );
				echo '<a href="mailto:'.$email.'">'.$email.'</a>';
				break;
		}
	}

	/* CONTACT META BOXES */
	function saboresycolores_contact_add_meta_box(){
		//add_meta_box(id, title, callback, screen, context, priority)
		add_meta_box( 'contact_email', 'Cuenta de correo (Usuario)', 'saboresycolores_contact_email_callback', 'syc-contact', 'side' );
	}

	function saboresycolores_contact_email_callback( $post ){
		wp_nonce_field( 'saboresycolores_save_contact_email_data', 'saboresycolores_contact_email_meta_box_nonce' );

		$value = get_post_meta( $post->ID, '_contact_email_value_key', true );

		echo '<label for="saboresycolores_contact_email_field">Email de usuario: </label>';
		echo '<input type="email" id="saboresycolores_contact_email_field" name="saboresycolores_contact_email_field" value=" ' . esc_attr( $value ) . '" size = "25" />';
	}

	function saboresycolores_save_contact_email_data( $post_id ) {
		if ( ! isset( $_POST['saboresycolores_contact_email_meta_box_nonce'] ) ) {
				return;
		}

		if ( ! wp_verify_nonce( $_POST['saboresycolores_contact_email_meta_box_nonce'], 'saboresycolores_save_contact_email_data' ) ) {
			return;
		}

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! isset( $_POST['saboresycolores_contact_email_field'] ) ) {
			return;
		}

		$my_data = sanitize_text_field( $_POST['saboresycolores_contact_email_field'] );

		update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	}
