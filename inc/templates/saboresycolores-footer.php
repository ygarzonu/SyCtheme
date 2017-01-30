<h1>Opciones del pie de página del tema Sabores&Colores</h1>
<?php settings_errors(); ?>

<?php  
	
	$address = esc_attr(get_option('company_address'));
	$phone = esc_attr(get_option('company_phonenumber'));
	$celphone = esc_attr(get_option('company_celphone'));
	$city = esc_attr(get_option('company_city'));

?>

<div class="saboresycolores-footer-preview">
	<div class="saboresycolores-footer">
	<h2>Dónde nos encuentras?</h2>
		<ul>
			<li class="saboresycolores-address">
				<?php print $address; ?>				
			</li>
			<li class="saboresycolores-phone">
				<?php print $phone; ?>				
			</li>
			<li class="saboresycolores-celphone">
				<?php print $celphone; ?>	
			</li>
			<li class="saboresycolores-city">
				<?php print $city; ?>	
			</li>
		</ul>
	</div>
</div>

<form method="post" action="options.php" class="saboresycolores-general-form">
	<?php settings_fields('saboresycolores-footer-group'); ?>
	<?php do_settings_sections('ejc_saboresycolores_footer') ?>
	<?php submit_button( 'Guardar cambios', 'primary', 'btnSubmit' ); ?>
</form>