<?php

	// <!-- CORE JS -->
	$_JS = [
			$dados->config_js_path,
			$dados->dice_js_path.'/dice.js',
			$dados->jspdf_js_path,
			$dados->jquery_js_path,
			$dados->bootstrap_js_path,
			$dados->bootstrap_select_js_path
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;