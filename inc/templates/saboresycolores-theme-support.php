<h1>Soporte del tema Sabores & Colores</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="saboresycolores-general-form">
	<?php settings_fields('saboresycolores-theme-support'); ?>
	<?php do_settings_sections('ejc_saboresycolores_theme'); ?>
	<?php submit_button(); ?>
</form>