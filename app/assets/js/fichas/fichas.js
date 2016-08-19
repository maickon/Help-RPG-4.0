/*
  Gerador de Fichas
  @author Maickon Rangel
  @copyright Help RPG - 2016
*/

var rpg = 'ded';
$.ajax({
    type: 'get',
    url: JS_FICHAS_PATH + '/' + rpg,
    success: function(result){
      $( "#ficha" ).empty();
      $( "#ficha" ).append(result);        
    }
  });
  
$( "select" ).change(function() {
  var rpg = $("#select").val();
  var ficha = $.ajax({
    type: 'get',
    url: JS_FICHAS_PATH + '/' + rpg,
    success: function(result){
      $( "#ficha" ).empty();
      $( "#ficha" ).append(result);        
    }
  });
});

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

function rand_ficha_npc(type){
    var selecionado = $("#select").val();
    if(!$('#disable_mode_draw').is(':checked')) {
      var intervalo = window.setInterval(function(){
         var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: JS_SERVICE_NPC_DED + '_' + type,
          data: {select: selecionado},
          success: function(result){
            var json = (eval("(" + result + ")"));         
            for(var key in json){
              $( "#"+key ).empty();
              $( "#"+key ).append(json[key]); 
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
          url: JS_SERVICE_NPC_DED + '_' + type,
          data: {select: selecionado},
          success: function(result){
            var json = (eval("(" + result + ")"));           
            for(var key in json){
              $( "#"+key ).empty();
              $( "#"+key ).append(json[key]); 
            }  
          }
        });
    }
}

