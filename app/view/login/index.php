<?php

$_CSS = [
            $login->bootstrap_css_path, 
            $login->login_css_path . '/login.css'
        ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }

require 'partials/form.html';

$_JS = [
			$login->jquery_js_path,
			$login->bootstrap_js_path,
			$login->login_js_path.'/login.js',
		];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}
	