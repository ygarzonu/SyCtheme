<?php 

/*
@package sabores&colores_theme

	======================
	ADMIN PAGE
	======================
*/

function saboresycolores_add_admin_page(){

	//Generate Sabores&Colores Admin Page
	add_menu_page( 'SaboresyColores Theme Options', 'Sabores&Colores', 'manage_options', 'ejc_saboresycolores', 'saboresycolores_theme_create_page', 'dashicons-carrot', 110);

	//Generate Sabores&Colores Admin Subpages
	add_submenu_page('ejc_saboresycolores','SaboresyColores Sidebar Options', 'Barra lateral', 'manage_options', 'ejc_saboresycolores', 'saboresycolores_theme_create_page');

	add_submenu_page('ejc_saboresycolores','SaboresyColores Theme Options', 'Opciones de tema', 'manage_options', 'ejc_saboresycolores_theme', 'saboresycolores_theme_support_page');

	add_submenu_page('ejc_saboresycolores','SaboresyColores Contact Form', 'Formulario de contacto', 'manage_options', 'ejc_saboresycolores_theme_contact', 'saboresycolores_contact_form_page');
	
	add_submenu_page('ejc_saboresycolores','SaboresyColores CSS Options', 'Personalizar CSS', 'manage_options', 'ejc_saboresycolores_css', 'saboresycolores_theme_settings_page');	

	//Activate custom settings
	add_action( 'admin_init', 'saboresycolores_custom_settings');
}

add_action( 'admin_menu', 'saboresycolores_add_admin_page' );

function saboresycolores_custom_settings(){
	//Sidebar options
	register_setting('saboresycolores-settings-group', 'profile_picture');
	register_setting('saboresycolores-settings-group', 'company_name');
	register_setting('saboresycolores-settings-group', 'company_description');
	register_setting('saboresycolores-settings-group', 'twitter_handler', 'saboresycolores_sanitize_twitter_handler');
	register_setting('saboresycolores-settings-group', 'facebook_handler');

	add_settings_section('saboresycolores-sidebar-options', 'Opciones de la barra lateral', 'saboresycolores_sidebar_options', 'ejc_saboresycolores');

	add_settings_field('sidebar-profile-picture', 'Foto de perfil',  'saboresycolores_sidebar_profile', 'ejc_saboresycolores', 'saboresycolores-sidebar-options');
	add_settings_field('sidebar-name', 'Empresa',  'saboresycolores_sidebar_name', 'ejc_saboresycolores', 'saboresycolores-sidebar-options');
	add_settings_field('sidebar-description', 'Descripción',  'saboresycolores_sidebar_description', 'ejc_saboresycolores', 'saboresycolores-sidebar-options');
	add_settings_field('sidebar-twitter', 'Cuenta de Twitter',  'saboresycolores_sidebar_twitter', 'ejc_saboresycolores', 'saboresycolores-sidebar-options');
	add_settings_field('sidebar-facebook', 'Cuenta de Facebook',  'saboresycolores_sidebar_facebook', 'ejc_saboresycolores', 'saboresycolores-sidebar-options');

	//Theme Support Options
	//register_setting(optionGroup, option, callback function)
	register_setting('saboresycolores-theme-support', 'post_formats');
	register_setting('saboresycolores-theme-support', 'custom_header');
	register_setting('saboresycolores-theme-support', 'custom_background');

	//Section to collect all the information at the print
	add_settings_section('saboresycolores-theme-options', 'Opciones del tema', 'saboresycolores_theme_options', 'ejc_saboresycolores_theme');

	add_settings_field('post-formats', 'Formatos de post', 'saboresycolores_post_formats', 'ejc_saboresycolores_theme', 'saboresycolores-theme-options');
	add_settings_field('custom-header', 'Personalizar encabezado', 'saboresycolores_custom_header', 'ejc_saboresycolores_theme', 'saboresycolores-theme-options');
	add_settings_field('custom-background', 'Personalizar fondo', 'saboresycolores_custom_background', 'ejc_saboresycolores_theme', 'saboresycolores-theme-options');

	//Contact Form Options
	register_setting('saboresycolores-contact-options', 'activate_contact');

	add_settings_section('saboresycolores-contact-section', 'Formulario de Contacto', 'saboresycolores_contact_section', 'ejc_saboresycolores_theme_contact');

	add_settings_field('activate-form', 'Activar Formulario de Contacto', 'saboresycolores_activate_contact', 'ejc_saboresycolores_theme_contact', 'saboresycolores-contact-section');

	//Custom CSS Options
	register_setting( 'saboresycolores-custom-css-options', 'saboresycolores_css', 'saboresycolores_sanitize_custom_css' );

	add_settings_section( 'saboresycolores-custom-css-section', 'CSS Personalizado', 'saboresycolores_custom_css_section_callback', 'ejc_saboresycolores_css' );

	add_settings_field( 'custom-css', 'Inserta tu hoja de estilos personalizada', 'saboresycolores_custom_css_callback', 'ejc_saboresycolores_css', 'saboresycolores-custom-css-section' );
}

function saboresycolores_custom_css_section_callback(){
	echo 'Personaliza el tema Sabores&Colores con tu propio CSS';
}

function saboresycolores_custom_css_callback(){
	$css = get_option( 'saboresycolores_css' );
	$css = ( empty($css) ? '/* CSS de tema Sabores&Colores personalizado */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="saboresycolores_css" name="saboresycolores_css" style="display:none; visibility:hidden"'.$css.'</textarea>';
}


function saboresycolores_theme_options(){
	echo 'Activar y desactivar opciones específicas del tema';
}

function saboresycolores_contact_section(){
	echo 'Activar y desactivar el formulario de contacto';

}

function saboresycolores_post_formats(){
	$options = get_option( 'post_formats' );
	//Default WordPress Post Formats
	$formats = get_post_format_slugs();
	//array( 'aside', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ) {
		$checked = ( isset($options[$format] ) && $options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function saboresycolores_custom_header(){
	$options = get_option( 'custom_header' );
	$checked = ($options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activar el encabezado personalizado </label>';
}

function saboresycolores_activate_contact(){
	$options = get_option( 'activate_contact' );
	$checked = ($options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

function saboresycolores_custom_background(){
	$options = get_option( 'custom_background' );
	$checked = ( $options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activar el fondo personalizado </label>';
}

//Sidebar Options Functions
function saboresycolores_sidebar_options(){
	echo 'Personaliza tu información de la barra lateral';
}

function saboresycolores_sidebar_profile(){
	$picture = esc_attr(get_option('profile_picture'));
	if ( empty($picture) ) {
		echo '<input type="button" class="button button-secondary" value="Cargar foto de perfil" id="upload-button" ><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Remplazar foto de perfil" id="upload-button" ><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Eliminar foto de perfil" id="remove-picture">';
	}
	
}

function saboresycolores_sidebar_name(){
	$companyName = esc_attr(get_option('company_name'));
	echo '<input type="text" name="company_name" value="'.$companyName.'" placeholder="Nombre de la empresa" />';
}

function saboresycolores_sidebar_description(){
	$description = esc_attr(get_option('company_description'));
	echo '<input type="text" name="company_description" value="'.$description.'" placeholder="Descripción de la empresa" />';
}

function saboresycolores_sidebar_twitter(){
	$twitter = esc_attr(get_option('twitter_handler'));

	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="cuenta de twitter" /><p class="description">Ingresa el usuario de twitter de Sabores & Colores sin el caracter @ .</p>';
}

function saboresycolores_sidebar_facebook(){
	$facebook = esc_attr(get_option('facebook_handler'));

	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="cuenta de facebook" />';
}

//Sanitization settings
function saboresycolores_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function saboresycolores_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

//Template submenu functions
function saboresycolores_theme_create_page() {
	require_once( get_template_directory() . "/inc/templates/saboresycolores-admin.php");
}

function saboresycolores_theme_support_page(){
	require_once( get_template_directory() . "/inc/templates/saboresycolores-theme-support.php");
}

function saboresycolores_contact_form_page(){
	require_once( get_template_directory() . "/inc/templates/saboresycolores-contact-form.php");
}

function saboresycolores_theme_settings_page() {
	require_once( get_template_directory() . "/inc/templates/saboresycolores-custom-css.php");
}