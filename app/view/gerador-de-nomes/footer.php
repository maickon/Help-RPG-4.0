<?php

	// <!-- CORE JS -->
	$_JS = [JS_CONFIG,
			JS_NAME,
			JS_PDF,
			JS_JQUERY,
			JS_BOOTSTRAP,
			JS_BOOTSTRAP_SELECT
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
$tag->html;