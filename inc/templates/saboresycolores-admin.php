<h1>Opciones de la barra lateral del tema Sabores&Colores</h1>
<?php settings_errors(); ?>

<?php  
	
	$picture = esc_attr(get_option('profile_picture'));
	$companyName = esc_attr(get_option('company_name'));
	$description = esc_attr(get_option('company_description'));

?>

<div class="saboresycolores-sidebar-preview">
	<div class="saboresycolores-sidebar">
		<div class="image-container">
			<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);">
			</div>
		</div>
		<h1 class="saboresycolores-username">
			<?php print $companyName; ?>
		</h1>
		<h2 class="saboresycolores-description">
			<?php print $description; ?>
		</h2>
		<div class="icons-wrapper">
			<?php if( !empty( $twitter_icon ) ): ?>
				<span class="saboresycolores-icon-sidebar dashicons dashicons-twitter"></span>
			<?php endif; 
			if( !empty( $instagram_icon ) ): ?>
				<span class="saboresycolores-icon-sidebar saboresycolores-before icon-instagram"></span>
			<?php endif; 
			if( !empty( $facebook_icon ) ): ?>
				<span class="saboresycolores-icon-sidebar saboresycolores-before icon-facebook"></span>
			<?php endif; ?>
		</div>
	</div>
</div>

<form method="post" action="options.php" class="saboresycolores-general-form">
	<?php settings_fields('saboresycolores-settings-group'); ?>
	<?php do_settings_sections('ejc_saboresycolores') ?>
	<?php submit_button( 'Guardar cambios', 'primary', 'btnSubmit' ); ?>
</form>