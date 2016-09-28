<?php

// <!-- CORE JS -->
$_JS = [$home->jquery_js_path,
		$home->bootstrap_js_path,
		$home->login_js_path.'/login.js',
		$home->vegas_js_path.'/jquery.vegas.min.js',
		$home->jquery_easing_js_path,
		$home->source_js_path.'/jquery.fancybox.js',
		$home->jquery_isotope_js_path,
		$home->appear_js_path,
		$home->animations_js_path,
		$home->custom_js_path];
foreach ($_JS as $key => $value) {
    $tag->script('src="' . $value . '" rel="stylesheet"'); 
    $tag->script;
}

$tag->html;