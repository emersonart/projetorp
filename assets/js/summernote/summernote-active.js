$(document).ready(function ($) {

	$('.summernote').summernote({
		lang: 'pt-BR',
		disableDragAndDrop: true,
		minHeight: 200,
		fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['fontname',['fontname']],
		    ['color', ['color']],
		    [ 'insert', [ 'link'] ],
		    ['para', ['ul', 'ol', 'paragraph']]
		  ]
	});

  $('div.note-group-select-from-files').remove();
})(jQuery); 