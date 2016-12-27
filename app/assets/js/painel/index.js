$(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

    initRealTimeChart();
    initDonutChart();
    initSparkline();
});

var realtime = 'on';
function initRealTimeChart() {
    //Real time ==========================================================================================
    var plot = $.plot('#real_time_chart', [getRandomData()], {
        series: {
            shadowSize: 0,
            color: 'rgb(0, 188, 212)'
        },
        grid: {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
        },
        lines: {
            fill: true
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            min: 0,
            max: 100
        }
    });

    function updateRealTime() {
        plot.setData([getRandomData()]);
        plot.draw();

        var timeout;
        if (realtime === 'on') {
            timeout = setTimeout(updateRealTime, 320);
        } else {
            clearTimeout(timeout);
        }
    }

    updateRealTime();

    $('#realtime').on('change', function () {
        realtime = this.checked ? 'on' : 'off';
        updateRealTime();
    });
    //====================================================================================================
}

function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}

function initDonutChart() {
    Morris.Donut({
        element: 'donut_chart',
        data: [{
            label: 'Chrome',
            value: 37
        }, {
            label: 'Firefox',
            value: 30
        }, {
            label: 'Safari',
            value: 18
        }, {
            label: 'Opera',
            value: 12
        },
        {
            label: 'Other',
            value: 3
        }],
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
        formatter: function (y) {
            return y + '%'
        }
    });
}

var data = [], totalPoints = 110;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
        if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

        data.push(y);
    }

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
    }

    return res;
}

//show profile

function display_profile(){
    $("#display_profile_box").show();
}

function hide_profile(){
    $("#display_profile_box").hide();
}

function deletar_url(url){
    $("#delete_url").attr("href", url);
}

function buscar_imagem(texto){
    var raca = $.ajax({
      type: 'post',
      dataType: 'html',
      url: URL_BASE + 'galeria/filtrar_imagem/' + texto,
      success: function(result){
        var json = (eval("(" + result + ")"));
            $( "#aniimated-thumbnials").empty();
            $( "#counter").empty();
            var img = '';
            for(var key in json){
                var array = json[key];
                img +='<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">';
                img += '<a href="'+json[key]['url_img']+'" data-sub-html="'+json[key]['descricao']+'">';
                img += '<img class="img-responsive thumbnail" src="'+json[key]['url_img']+'">';
                img += '</a>';
                img += '</div>';
            }
            $( "#aniimated-thumbnials").append(img);
        }
    });
}

function buscar_usuario(texto){
    var raca = $.ajax({
      type: 'post',
      dataType: 'html',
      url: URL_BASE + 'usuario/filtrar/' + texto,
      success: function(result){
        var json = (eval("(" + result + ")"));
            $( "#profiles").empty();
            var profiles = '';
            for(var key in json){
                var array = json[key];
                profiles +='<div class="col-sm-6 col-md-3">';
                profiles +='<div class="thumbnail">';
                profiles +='<a href="'+URL_BASE+'usuario/profile/'+json[key]['id']+'">';
                profiles +='<img src="'+json[key]['foto_link']+'" class="img-responsive img-profile">';
                profiles +='</a>';
                profiles += '<div class="caption center">';
                profiles += '<h5>';
                profiles += json[key]['login']+' Lv'+json[key]['nivel'];
                profiles += '</h5>';
                profiles += '</div>';
                profiles += '</div>';
                profiles += '</div>';
            }
            $( "#profiles").append(profiles);
        }
    });
}

function buscar_videos(texto){
    var raca = $.ajax({
      type: 'post',
      dataType: 'html',
      url: URL_BASE + 'videos/filtrar_videos/' + texto,
      success: function(result){
        var json = (eval("(" + result + ")"));
            $( "#videos_galery").empty();
            $( "#counter").empty();
            var img = '';
            for(var key in json){
                var array = json[key];

                var url = json[key]['link'];
                var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);

                img +='<div class="col-md-3">';
                img += '<a href="'+URL_BASE+'videos/visualizar/'+json[key]['id']+'" class="center">';
                img += '<p id="video_title">';
                img += json[key]['nome'];
                img += '</p>';
                img += '</a>';
                img += '<img src="http://img.youtube.com/vi/'+videoid[1]+'/0.jpg" width="200">';
                img += '</div>';
            }
            $( "#videos_galery").append(img);
        }
    });
}