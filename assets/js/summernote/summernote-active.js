$(document).ready(function ($) {

	$('.summernote').summernote({
		lang: 'pt-BR',
		disableDragAndDrop: true,
		minHeight: 200,
		disableUpload: true,
		fontNames: ['Roboto','Arial', 'Arial Black', 'Courier New'],
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['fontname',['fontname']],
		    ['color', ['color']],
		    [ 'insert', [ 'link','table'] ],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['help',['help']],
		    
		  ]
	});

	$('.summernote1').summernote({
		lang: 'pt-BR',
		disableDragAndDrop: true,
		minHeight: 200,
		disableUpload: true,
		fontNames: ['Roboto','Arial', 'Arial Black', 'Courier New'],
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['fontname']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    [ 'insert', [ 'link','table'] ],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['help',['help']],
		    
		  ]
	});

  $('div.note-group-select-from-files').remove();
}); 