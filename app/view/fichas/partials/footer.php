<?php

	// <!-- CORE JS -->
	$_JS = [
			$ficha->config_js_path,
			$ficha->jspdf_js_path,
			$ficha->jquery_js_path,
			$ficha->bootstrap_js_path,
			$ficha->bootstrap_select_js_path,
			$ficha->fichas_js_path.'/fichas.js'
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	