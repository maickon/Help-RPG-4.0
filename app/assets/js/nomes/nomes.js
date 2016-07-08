/*
  Gerador de nomes
  @author Maickon Rangel
  @copyright Help RPG - 2016
*/

function download_para_pdf(){
  var doc = new jsPDF();
  var specialElementHandlers = {
      '#editor': function (element, renderer) {
          return true;
      }
  };
  doc.fromHTML($('#content').html(), 15, 15, {
      'width': 170,
          'elementHandlers': specialElementHandlers
  });
  doc.save('sample-file.pdf');
}

function rand_nomes(){
    var selecionado = $("#select").val();
    if(!$('#disable_mode_draw').is(':checked')) {
      var intervalo = window.setInterval(function(){
         var raca = $.ajax({
            type: 'post',
            dataType: 'html',
            url: JS_SERVICE_NAME_PATH,
            data: {select: selecionado},
            success: function(result){
              var json = (eval("(" + result + ")"));
              var attr = [
                        'nome-1',
                        'nome-2',
                        'nome-3',
                        'nome-4',
                        'nome-5',
                        'nome-6',
                        'nome-7',
                        'nome-8',           
                        'nome-9'           
                        ];
                        
              for(var i=0; i<attr.length; i++){
                  $( "#"+attr[i] ).empty();
                  $( "#"+attr[i] ).append(json[i]);
                } 
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
          url: JS_SERVICE_NAME_PATH,
          data: {select: selecionado},
          success: function(result){
            var json = (eval("(" + result + ")"));
            var attr = [
                      'nome-1',
                      'nome-2',
                      'nome-3',
                      'nome-4',
                      'nome-5',
                      'nome-6',
                      'nome-7',
                      'nome-8',           
                      'nome-9'           
                      ];
                      
            for(var i=0; i<attr.length; i++){
                $( "#"+attr[i] ).empty();
                $( "#"+attr[i] ).append(json[i]);
              } 
            }
        });
    }
}