/*
  Gerador de cidades
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

function rand_cidades(){
    if(!$('#disable_mode_draw').is(':checked')) {
      var intervalo = window.setInterval(function(){
         var raca = $.ajax({
            type: 'post',
            dataType: 'html',
            url: JS_SERVICE_CITIES_PATH,
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
          url: JS_SERVICE_CITIES_PATH,
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