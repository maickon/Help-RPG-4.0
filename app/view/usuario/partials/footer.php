<?php

	// <!-- CORE JS -->
	$_JS = [$usuario->url->jquery_js_path,
			$usuario->url->bootstrap_js_path,
			$usuario->url->data_table_call_js_path,
			$usuario->url->jquery_data_tables_js_path,
			$usuario->url->data_tables_bootstrap_js_path,
			$usuario->url->usuario_js_path.'/usuario.js',
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;	