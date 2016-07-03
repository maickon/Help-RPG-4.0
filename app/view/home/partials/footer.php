<?php

// <!-- CORE JS -->
$_JS = [JS_JQUERY,
		JS_BOOTSTRAP,
		JS_VEGAS,
		JS_EASING,
		JS_FANCYBOX,
		JS_ISOTOPE,
		JS_APPEAR,
		JS_ANIMATIONS,
		JS_CUSTOM];
foreach ($_JS as $key => $value) {
    $tag->script('src="' . $value . '" rel="stylesheet"'); 
    $tag->script;
}