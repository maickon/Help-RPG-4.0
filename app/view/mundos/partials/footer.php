<?php
	// <!-- CORE JS -->
	$_JS = [
			$mundos->jquery_js_path,
			$mundos->mundos_js_path.'/world_configuration.js',
			$mundos->prototype_js_path,
			$mundos->mundos_js_path.'/prng.js',
			$mundos->canvas_js_path,
			$mundos->mundos_js_path.'/mundos.js',
			$mundos->jspdf_js_path,
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	