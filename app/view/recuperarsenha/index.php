<?php
$tag->printer('<!DOCTYPE html>');
$tag->html();
	$tag->head();
	    $tag->meta('charset="UTF-8"');
	    $tag->meta('content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"');
	    $tag->meta('name="description" content="' . $language->RECOVER_PASSWORD_META_DESCRIPTION . '"');
        $tag->meta('name="keywords" content="' . $language->RECOVER_PASSWORD_META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $recuperar_senha->recuperarsenha_img_icon.'usuario.png"');

	    $tag->title();
	    	$tag->printer($language->RECOVER_PASSWORD_TITLE);
	    $tag->title;
	    // <!-- Favicon-->
	    $tag->link('rel="icon" href="../../favicon.ico" type="image/x-icon"');

	    // <!-- Google Fonts -->
	    $tag->link('href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"');
	    $tag->link('href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"');

		$_CSS = [
	            $recuperar_senha->painel_css_path . '/plugins/bootstrap/css/bootstrap.css', 
	            $recuperar_senha->painel_css_path . '/plugins/node-waves/waves.css', 
	            $recuperar_senha->painel_css_path . '/plugins/animate-css/animate.css', 
	            $recuperar_senha->painel_css_path . '/style.css',
	            $recuperar_senha->recuperarsenha_css_path . '/recuperarsenha.css'
	        ];
	        // <!-- CORE CSS -->
	        foreach ($_CSS as $key => $value) {
	            $tag->link('href="' . $value . '" rel="stylesheet"');
	        }
	
	$tag->head;
	$tag->body('class="fp-page"');

		require 'partials/form.php';

		$_JS = [
					$recuperar_senha->painel_js_path . '/plugins/jquery/jquery.min.js',
					$recuperar_senha->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
					$recuperar_senha->painel_js_path . '/plugins/node-waves/waves.js',
					$recuperar_senha->painel_js_path . '/plugins/jquery-validation/jquery.validate.js',
					$recuperar_senha->painel_js_path . '/admin.js',
					$recuperar_senha->recuperarsenha_js_path . '/recuperarsenha.js',
				];
			foreach ($_JS as $key => $value) {
			    $tag->script('src="' . $value . '" rel="stylesheet"'); 
			    $tag->script;
			}
	$tag->body;
$tag->html;