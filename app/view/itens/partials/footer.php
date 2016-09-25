<?php

	// <!-- CORE JS -->
	$_JS = [$itens->jquery_js_path,
			$itens->config_js_path,
			$itens->bootstrap_js_path,
			$itens->itens_js_path.'/itens.js',
			$itens->jspdf_js_path,
			$itens->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	