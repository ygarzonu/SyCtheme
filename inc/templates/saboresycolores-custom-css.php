<h1>Personalizar Hoja de estilos del tema Sabores&Colores</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="saboresycolores-general-form">
	<?php settings_fields('saboresycolores-custom-css-options'); ?>
	<?php do_settings_sections('ejc_saboresycolores_css'); ?>
	<?php submit_button(); ?>
</form>