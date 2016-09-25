<?php

	// <!-- CORE JS -->
	$_JS = [$sorte->jquery_js_path,
			$sorte->config_js_path,
			$sorte->bootstrap_js_path,
			$sorte->sorte_js_path.'/sorte.js',
			$sorte->jspdf_js_path,
			$sorte->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	