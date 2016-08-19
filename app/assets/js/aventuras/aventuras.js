function rand_aventuras(){
    var selecionado = $("#select").val();
    if(!$('#disable_mode_draw').is(':checked')) {
      var intervalo = window.setInterval(function(){
         var raca = $.ajax({
            type: 'post',
            dataType: 'html',
            url: JS_SERVICE_ADVENTURE_PATH + '/' + selecionado,
            data: {select: selecionado},
            success: function(result){
              var json = (eval("(" + result + ")"));
              $("#aventura-titulo-objetivo").text(json[0]['titulo-objetivo']);
              $("#aventura-conteudo-objetivo").text(json[0]['conteudo-objetivo']);

              $("#aventura-titulo-local").text(json[1]['titulo-local']);
              $("#aventura-conteudo-local").text(json[1]['conteudo-local']);

              $("#aventura-titulo-antagonista").text(json[2]['titulo-antagonista']);
              $("#aventura-conteudo-antagonista").text(json[2]['conteudo-antagonista']);

              $("#aventura-titulo-coadjuvante").text(json[3]['titulo-coadjuvante']);
              $("#aventura-conteudo-coadjuvante").text(json[3]['conteudo-coadjuvante']);

              $("#aventura-titulo-complicaco").text(json[4]['titulo-complicaco']);
              $("#aventura-conteudo-complicaco").text(json[4]['conteudo-complicaco']);

              $("#aventura-titulo-recompensa").text(json[5]['titulo-recompensa']);
              $("#aventura-conteudo-recompensa").text(json[5]['conteudo-recompensa']);
            }
          });



      }, speed);

       window.setTimeout(function() {
          clearInterval(intervalo);
      }, time);
    } else if ($('#disable_mode_draw').is(':checked')){
        var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: JS_SERVICE_ADVENTURE_PATH + '/' + selecionado,
          data: {select: selecionado},
          success: function(result){
            var json = (eval("(" + result + ")"));
              $("#aventura-titulo-objetivo").text(json[0]['titulo-objetivo']);
              $("#aventura-conteudo-objetivo").text(json[0]['conteudo-objetivo']);

              $("#aventura-titulo-local").text(json[1]['titulo-local']);
              $("#aventura-conteudo-local").text(json[1]['conteudo-local']);

              $("#aventura-titulo-antagonista").text(json[2]['titulo-antagonista']);
              $("#aventura-conteudo-antagonista").text(json[2]['conteudo-antagonista']);

              $("#aventura-titulo-coadjuvante").text(json[3]['titulo-coadjuvante']);
              $("#aventura-conteudo-coadjuvante").text(json[3]['conteudo-coadjuvante']);

              $("#aventura-titulo-complicaco").text(json[4]['titulo-complicaco']);
              $("#aventura-conteudo-complicaco").text(json[4]['conteudo-complicaco']);

              $("#aventura-titulo-recompensa").text(json[5]['titulo-recompensa']);
              $("#aventura-conteudo-recompensa").text(json[5]['conteudo-recompensa']);
            }
        });
    }
}