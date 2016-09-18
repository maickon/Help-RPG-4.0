<?php
	// <!-- CORE JS -->
	$_JS = [
			// $masmorras->jquery_js_path,
			$masmorras->prototype_js_path,
			$masmorras->masmorras_js_path.'/prng.js',
			$masmorras->masmorras_js_path.'/generator.js',
			$masmorras->masmorras_js_path.'/name.js',
			$masmorras->masmorras_js_path.'/gen_data.js',
			$masmorras->canvas_js_path,
			$masmorras->masmorras_js_path.'/dungeon.js',
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	