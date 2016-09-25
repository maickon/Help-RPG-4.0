<?php

	// <!-- CORE JS -->
	$_JS = [$tempo->jquery_js_path,
			$tempo->config_js_path,
			$tempo->bootstrap_js_path,
			$tempo->tempo_js_path.'/tempo.js',
			$tempo->jspdf_js_path,
			$tempo->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	