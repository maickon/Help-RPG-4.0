function fazer_amizade(de, para){
	// console.log(location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro);
	$.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/amizades/pedido/' + de + '/' + para,
	    success: function(result){
	     	$("#fazer_amizade").empty();
	     	$("#fazer_amizade").append('Aguardando resposta');
	    } 
	});
}

function desfazer_amizade(de, para){
	// console.log(location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro);
	$.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/amizades/desfazer/' + de + '/' + para,
	    success: function(result){
	     	$("#fazer_amizade").empty();
	     	$("#fazer_amizade").append('Fazer pedido de amizade');
	     	$("li.desfazer").empty();
	    } 
	});
}

function aceitar_amizade(de, para){
	$.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/amizades/aceitar_amizade/' + de + '/' + para,
	    success: function(result){
	     	$("#aceitar_amizade").empty();
	     	$("#aceitar_amizade").append('Amizade aceita');
	    } 
	});
}

function filtrar_amizade(filtro){
	// console.log(location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro);
	$.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/amizades/filtrar/' + filtro,
	    success: function(result){
	      var json = (eval("(" + result + ")"));
	      $("#usuarios").empty();
	      for(var key in json){
	      		var usuario = '<div class="col-sm-6 col-md-4">' +
		      		'<div class="thumbnail">' +
		      			'<a href="' + location.origin + '/help-rpg-teste/usuario/profile/' + json[key]['id'] + '">';
		      			if (json[key]['foto_link'] == '') {
		      				usuario += '<img src="' + location.origin + '/help-rpg-teste/app/assets/img/social/profle.png." class="img-circle" height="128" width="128">';
		      			} else {
		      				usuario += '<img src="' + json[key]['foto_link'] + '" class="img-circle" height="128" width="128">';
		      			}
		      			usuario += '</a>';
		      			usuario += '<div class="caption">' +
		      							'<h3 class="align-center">' + json[key]['login'] + '</h3>' +
		      							'<p class="align-center font-10">' + json[key]['email'] + '</p>' +
		      						'</div>' +
		      		'</div>' +
	      		'</div>'
			$("#usuarios").append(usuario);
	      }
	    } 
	});
}