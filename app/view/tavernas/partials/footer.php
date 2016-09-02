<?php

	// <!-- CORE JS -->
	$_JS = [$taverna->config_js_path,
			$taverna->tavernas_js_path.'/tavernas.js',
			$taverna->jspdf_js_path,
			$taverna->jquery_js_path,
			$taverna->bootstrap_js_path,
			$taverna->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	