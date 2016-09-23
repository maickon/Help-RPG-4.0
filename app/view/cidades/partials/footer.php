<?php

	// <!-- CORE JS -->
	$_JS = [$cidade->config_js_path,
			$cidade->cidades_js_path.'/cidades.js',
			$cidade->jspdf_js_path,
			$cidade->jquery_js_path,
			$cidade->bootstrap_js_path,
			$cidade->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	