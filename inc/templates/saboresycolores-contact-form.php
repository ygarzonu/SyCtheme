<h1>Formulario de contacto Tema Sabores&Colores</h1>
<?php settings_errors(); ?>

<p>Usa este <strong>shortcode</strong> para activar el Formulario de Contacto dentro de úna Página o un Artículo</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="saboresycolores-general-form">
	<?php settings_fields('saboresycolores-contact-options'); ?>
	<?php do_settings_sections('ejc_saboresycolores_theme_contact'); ?>
	<?php submit_button(); ?>
</form>