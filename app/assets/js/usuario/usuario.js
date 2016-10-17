function filtrar_usuario(filtro){
	// console.log(location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro);
	var raca = $.ajax({
	    type: 'post',
	    dataType: 'html',
	    url: location.origin + '/help-rpg-teste/usuario/filtrar/' + filtro,
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