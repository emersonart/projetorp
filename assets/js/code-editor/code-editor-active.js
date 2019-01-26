(function ($) {
 "use strict";

		var editor_one = CodeMirror.fromTextArea(document.getElementByClassName("CodeMirror"), {
					 lineNumbers: true,
					 matchBrackets: true,
					 styleActiveLine: true,
					 theme:"ambiance"
				 });

				 var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
					 lineNumbers: true,
					 matchBrackets: true,
					 styleActiveLine: true
				 });
		 
 
})(jQuery); 