$(document).ready(function ($) {

	$('.summernote').summernote({
		lang: 'pt-BR',
		disableDragAndDrop: true,
		minHeight: 200,
		shortcuts: false,
		disableUpload: true,
		codemirror: {
			mode: 'text/html',
			htmlMode: true,
			lineNumbers: true,
			theme: 'ambiance',
			matchBrackets: true,
			styleActiveLine: true
		},
		fontNames: ['Roboto','Arial', 'Arial Black', 'Courier New'],
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['fontname',['fontname']],
		    ['color', ['color']],
		    [ 'insert', [ 'link','table','hr'] ],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['misc',['undo','redo','codeview']],
		    
		  ]
		
	});

	$('.summernote1').summernote({
		lang: 'pt-BR',
		disableDragAndDrop: true,
		shortcuts: true,
		minHeight: 200,
		disableUpload: true,
		fontNames: ['Roboto','Arial', 'Arial Black', 'Courier New'],
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['fontname']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    [ 'insert', ['table'] ],
		    ['para', ['ul', 'ol', 'paragraph']],
		    
		  ]
	});
  $('div.note-group-select-from-files').remove();
}); 