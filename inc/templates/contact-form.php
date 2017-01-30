<form id="saboresycoloresContactForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Tu nombre" id="name" name="name" required="required">
	</div>
	<div class="form-group">
		<input type="email" class="form-control" placeholder="Tu correo electrónico" id="email" name="email" required="required">
	</div>
	<div class="form-group">
		<textarea name="message" id="message" class="form-control" required="required" placeholder="Tu mensaje"></textarea>
	</div>

	<button type="submit" class="btn btn-default">Enviar</button>
</form>