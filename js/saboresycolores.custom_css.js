jQuery(document).ready(function($){

	var updateCSS = function(){
		$("#saboresycolores_css").val( editor.getSession().getValue() );
	}

	$("saboresycolores_sanitize_custom_css").submit( updateCSS );

});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");

