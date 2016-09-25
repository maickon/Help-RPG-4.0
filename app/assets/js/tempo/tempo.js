
function sortear_tempo(){
  var item = $("#select").val();
  var qtd = $("#select_qtd").val();
  if(!$('#disable_mode_draw').is(':checked')) {
    var intervalo = window.setInterval(function(){
       var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: JS_SERVICE_TIME_PATH + '/' + item + '/' + qtd,
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
  } else if ($('#disable_mode_draw').is(':checked')){
      var raca = $.ajax({
          type: 'post',
          dataType: 'html',
          url: JS_SERVICE_TIME_PATH + '/' + item + '/' + qtd,
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
  }

}