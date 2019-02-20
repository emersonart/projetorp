

$(document).ready(function () {

 		 $('#listaresposta').DataTable( {
                    "order": [[ 1, "asc" ]],
                    "lengthMenu": [[10, 20, 30, 50, 75, -1], [10,20, 30, 50, 75,"Todos"]],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                    }
                } );
		var $table = $('#table');
				$('#toolbar').find('select').change(function () {
					$table.bootstrapTable('destroy').bootstrapTable({
						exportDataType: $(this).val()
					});
				});
 
}); 

