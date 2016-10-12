<?php
$tag->printer('<!DOCTYPE html>');
$tag->html();
	$tag->head();
	    $tag->meta('charset="UTF-8"');
	    $tag->meta('content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"');
	    $tag->meta('name="description" content="' . $login->descricao . '"');
        $tag->meta('name="keywords" content="' . $login->palavras_chave . '"');
        $tag->meta('name="author" content="' . $login->autor . '"');
        $tag->link('rel="shortcut icon" href="' . $login->login_img_icon.'usuario.png"');

	    $tag->title();
	    	$tag->printer($login->titulo);
	    $tag->title;
	    // <!-- Favicon-->
	    $tag->link('rel="icon" href="../../favicon.ico" type="image/x-icon"');

	    // <!-- Google Fonts -->
	    $tag->link('href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"');
	    $tag->link('href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"');

		$_CSS = [
	            $login->painel_css_path . '/plugins/bootstrap/css/bootstrap.css', 
	            $login->painel_css_path . '/plugins/node-waves/waves.css', 
	            $login->painel_css_path . '/plugins/animate-css/animate.css', 
	            $login->painel_css_path . '/style.css',
	            $login->login_css_path . '/login.css'
	        ];
	        // <!-- CORE CSS -->
	        foreach ($_CSS as $key => $value) {
	            $tag->link('href="' . $value . '" rel="stylesheet"');
	        }
	
	$tag->head;
	$tag->body('class="login-page"');

		require 'partials/form.html';

		$_JS = [
					$login->painel_js_path . '/plugins/jquery/jquery.min.js',
					$login->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
					$login->painel_js_path . '/plugins/node-waves/waves.js',
					$login->painel_js_path . '/plugins/jquery-validation/jquery.validate.js',
					$login->painel_js_path . '/admin.js',
					// $login->login_js_path . '/login.js',
				];
			foreach ($_JS as $key => $value) {
			    $tag->script('src="' . $value . '" rel="stylesheet"'); 
			    $tag->script;
			}
	$tag->body;
$tag->html;