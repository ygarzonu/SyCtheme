<?php
/*
	@package saboresycolorestheme

	===================================
		AJAX FUNCTIONS
	===================================
*/

add_action( 'wp_ajax_nopriv_saboresycolores_save_user_contact_form', 'saboresycolores_save_contact' );
add_action( 'wp_ajax_saboresycolores_save_user_contact_form', 'saboresycolores_save_contact' );

function saboresycolores_save_contact(){
	$title = wp_strip_all_tags($_POST['name']);
	$email = wp_strip_all_tags($_POST['email']);
	$message = wp_strip_all_tags($_POST['message']);
	$args = array(
		'post_title' => $title,
		'post_content' => $message,
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'syc-contact',
		'meta_input' => array(
			'contact_email' => $email,
		),
	);
	$postID = wp_insert_post( $args, $wp_error );
	echo $postID;
	die();
}

