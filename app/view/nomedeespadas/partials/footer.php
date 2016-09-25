<?php

	// <!-- CORE JS -->
	$_JS = [$nomedeespadas->jquery_js_path,
			$nomedeespadas->config_js_path,
			$nomedeespadas->bootstrap_js_path,
			$nomedeespadas->nomedeespadas_js_path.'/nomedeespadas.js',
			$nomedeespadas->jspdf_js_path,
			$nomedeespadas->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	