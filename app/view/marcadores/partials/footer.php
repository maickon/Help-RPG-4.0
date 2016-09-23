<?php
	// <!-- CORE JS -->
	$_JS = [
			$marcadores->jquery_js_path,
			$marcadores->bootstrap_js_path,
			$marcadores->marcadores_js_path.'/RGraph.js',
			$marcadores->marcadores_js_path.'/RGraph_dynamic.js',
			$marcadores->marcadores_js_path.'/RGraph_meter.js',
			$marcadores->marcadores_js_path.'/marcadores.js',
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	