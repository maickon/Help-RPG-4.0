
var speed = 50;
var time = 2200;

function rand_item_aleatorio(){
  var item = $("#select").val();
  var qtd = $("#select_qtd").val();
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        url: JS_SERVICE_ITENS_PATH + '/' + item + '/' + qtd,
        success: function(result){
          var json = (eval("(" + result + ")"));
              for(var key in json){
                if (Array.isArray(json[key])) {
                  var array = json[key];
                  $( "#"+key ).empty();
                  $( "#"+key ).append('<ul>');
                  for(var i in array){
                    $( "#"+key ).append('<li>'+array[i]+'</li>');
                  }
                  $( "#"+key ).append('</ul>');
                } else {
                  $( "#"+key ).empty();
                  $( "#"+key ).append(json[key]); 
                }
              } 
          }
      });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_item_comum_aleatorio(){
  var intervalo = window.setInterval(function(){
     var raca = $.ajax({
        type: 'post',
        dataType: 'html',
        data: {item: tipo_item},
        url: '../gerador/itens-comuns.php',
        success: function(result){
          var json = (eval("(" + result + ")"));
          var attr = [
                      'poder_arma',
                      'poder_armadura',
                      'material',
                      'aprimoramento',
                      'arma',
                      'armadura',
                      'titulo',
                      'titulo_poder',
                      'titulo_material',
                      'titulo_aprimoramento'         
                      ];
          for(var i=0; i<attr.length; i++){
              $( "#"+attr[i] ).empty();
              $( "#"+attr[i] ).append(json[attr[i]]);
            } 
          }
      });
    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}