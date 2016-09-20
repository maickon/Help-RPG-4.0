<?php
	// <!-- CORE JS -->
	$_JS = [
			$personalidades->config_js_path,
			$personalidades->personalidades_js_path.'/personalidades.js',
			$personalidades->jspdf_js_path,
			$personalidades->jquery_js_path,
			$personalidades->bootstrap_js_path,
			$personalidades->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	