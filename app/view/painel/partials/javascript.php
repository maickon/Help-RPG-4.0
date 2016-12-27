
<?php 
	$_JS = [$painel->url->painel_js_path . '/plugins/jquery/jquery.min.js',
			$painel->url->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
			$painel->url->painel_js_path . '/plugins/bootstrap-select/js/bootstrap-select.js',
			$painel->url->painel_js_path . '/plugins/jquery-slimscroll/jquery.slimscroll.js',
			$painel->url->painel_js_path . '/plugins/node-waves/waves.js',
			$painel->url->painel_js_path . '/plugins/jquery-countto/jquery.countTo.js',
			$painel->url->painel_js_path . '/plugins/raphael/raphael.min.js',
			$painel->url->painel_js_path . '/plugins/morrisjs/morris.js',
			$painel->url->painel_js_path . '/plugins/chartjs/Chart.bundle.js',
			$painel->url->painel_js_path . '/plugins/flot-charts/jquery.flot.js',
			$painel->url->painel_js_path . '/plugins/flot-charts/jquery.flot.resize.js',
			$painel->url->painel_js_path . '/plugins/flot-charts/jquery.flot.pie.js',
			$painel->url->painel_js_path . '/plugins/flot-charts/jquery.flot.categories.js',
			$painel->url->painel_js_path . '/plugins/flot-charts/jquery.flot.time.js',
			$painel->url->painel_js_path . '/plugins/jquery-sparkline/jquery.sparkline.js',
			$painel->url->painel_js_path . '/admin.js',
			$painel->url->config_js_path,
			$painel->url->painel_js_path . '/index.js',
			$painel->url->painel_js_path . '/demo.js',
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
?>