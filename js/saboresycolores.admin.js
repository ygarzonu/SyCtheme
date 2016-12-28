jQuery(document).ready( function($){

	var mediaUploader;

	$( '#upload-button' ).on('click',function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		//generation of the media uploader
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Elige una foto de perfil',
			button: {
				text: 'Elegir foto'
			},
			multiple: false  //user can't select multiple files
		});

		//check if something is been selected
		mediaUploader.on('select', function(){
			//navigate inside de mediaUploader
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			$('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});

	$( '#remove-picture' ).on('click',function(e){
		e.preventDefault();
		var answer = confirm("Estas segur@ que quieres eliminar la foto de perfil?");
		if (answer == true) {
			$('#profile-picture').val('');
			$('.saboresycolores-general-form').submit();
			//console.log('Si por favor, eliminarla!');
		} else {
			
			//console.log('OMG, No por favor!');
		}
		return;
	});
});