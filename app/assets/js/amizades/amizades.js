function fazer_amizade(id_requisitante, id_requisitado){
	// console.log(location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro);
	var raca = $.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/amizades/pedido/' + id_requisitante + '/' + id_requisitado,
	    success: function(result){
	     	$("#fazer_amizade").empty();
	     	$("#fazer_amizade").append('Aguardando resposta');
	    } 
	});
}

function desfazer_amizade(id_requisitante, id_requisitado){
	// console.log(location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro);
	var raca = $.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/amizades/desfazer/' + id_requisitante + '/' + id_requisitado,
	    success: function(result){
	     	$("#fazer_amizade").empty();
	     	$("#fazer_amizade").append('Fazer pedido de amizade');
	     	$("li.desfazer").empty();
	    } 
	});
}