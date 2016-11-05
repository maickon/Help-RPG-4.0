<?php
$tag->printer('<!DOCTYPE html>');
$tag->html();
	$tag->head();
	    $tag->meta('charset="UTF-8"');
	    $tag->meta('content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"');
	    $tag->meta('name="description" content="' . $language->ERROR_META_DESCRIPTION . '"');
        $tag->meta('name="keywords" content="' . $language->ERROR_META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $erro->logo_icon_img_path.'"');
    
	    $tag->title();
	    	$tag->printer($language->ERROR_TITLE);
	    $tag->title;
	    // <!-- Favicon-->
	    $tag->link('rel="icon" href="../../favicon.ico" type="image/x-icon"');

	    // <!-- Google Fonts -->
	    $tag->link('href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"');
	    $tag->link('href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"');

		$_CSS = [
	            $erro->painel_css_path . '/plugins/bootstrap/css/bootstrap.css', 
	            $erro->painel_css_path . '/plugins/node-waves/waves.css', 
	            $erro->painel_css_path . '/style.css',
	            $erro->erro_css_path . '/erro.css'
	        ];
	        // <!-- CORE CSS -->
	        foreach ($_CSS as $key => $value) {
	            $tag->link('href="' . $value . '" rel="stylesheet"');
	        }
	
	$tag->head;
	$tag->body('class="four-zero-four"');

		require 'partials/form.php';

		$_JS = [
					$erro->painel_js_path . '/plugins/jquery/jquery.min.js',
					$erro->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
					$erro->painel_js_path . '/plugins/node-waves/waves.js'
				];
			foreach ($_JS as $key => $value) {
			    $tag->script('src="' . $value . '" rel="stylesheet"'); 
			    $tag->script;
			}
	$tag->body;
$tag->html;