jQuery(document).ready(function($){

	$('.post-blog').data('bgcolor', '#e51c24').hover(function(){
    var $this = $(this);
    var newBgc = $this.data('bgcolor');
    $this.data('bgcolor', $this.css('background-color')).css('background-color', newBgc);
  	});

	/* init functions */
	revearPosts();
	
	function revearPosts(){
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	}

	/* sidebar functions */
	$(document).on('click', '.js-toggleSidebar', function() {
    	$( '.saboresycolores-sidebar' ).toggleClass( 'sidebar-closed' );
    	$( 'body' ).toggleClass( 'no-scroll' );
    	$( '.sidebar-overlay' ).fadeToggle( 320 );
    });

	/* Contact Form Submission */
	$('#saboresycoloresContactForm').on('submit', function(e){
		e.preventDefault();

		var form = $(this),
			name = form.find('#name').val(),
			email = form.find('#email').val(),
			message = form.find('#message').val(),
			ajaxurl = form.data('url');

		if ( name === '' || email == '' || message == '' ) {
			console.log('Campos requeridos están vacios.');
			return;
		}

		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				name : name,
				email : email,
				message : message,
				action: 'saboresycolores_save_user_contact_form'
				
			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){
				if( response == 0 ){
					console.log('No es posible guardar tu mensaje, Por favor intenta de nuevo');
				} else {
					console.log('Mensaje guardado, Gracias!');
				}
			}
			
		});

	});

});