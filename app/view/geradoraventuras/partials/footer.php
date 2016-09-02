<?php

	// <!-- CORE JS -->
	$_JS = [$aventura->config_js_path,
			$aventura->aventuras_js_path.'/aventuras.js',
			$aventura->jspdf_js_path,
			$aventura->jquery_js_path,
			$aventura->bootstrap_js_path,
			$aventura->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	