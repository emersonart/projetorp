$(document).ready(function ($) {
 "use strict";
	$('#summernote1').summernote({
		lang: 'pt-BR',
		minHeight: 200,
		fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['fontname',['fontname']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']]
		  ]
	});
	$('#summernote2').summernote({
		height: 200,
	});
	$('#summernote3').summernote({
		height: 200,
	});
	$('#summernote4').summernote({
		height: 200,
	});
	$('#summernote5').summernote({
		height: 400,
	});
	$('.summernote6').summernote({
		height: 300,
	});
 
})(jQuery); 