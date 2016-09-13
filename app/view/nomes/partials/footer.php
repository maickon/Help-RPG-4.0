<?php

	// <!-- CORE JS -->
	$_JS = [$name->config_js_path,
			$name->nomes_js_path.'/nomes.js',
			$name->jspdf_js_path,
			$name->jquery_js_path,
			$name->bootstrap_js_path,
			$name->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	