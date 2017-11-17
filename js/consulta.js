$().ready(function() {
	$('#tabela').dataTable({
					        "bProcessing": true,
					        "bJQueryUI": true,
					        "sPaginationType": "full_numbers"
							});
} );

function editar(id){
	var x = chamar_ajax('php/define.php','filtro=IDPesquisa&varID=' + id, false, 'texto', null);
	window.location.href = "cadastro_pessoas.html";
}