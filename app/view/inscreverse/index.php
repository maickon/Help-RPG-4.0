<?php
$tag->printer('<!DOCTYPE html>');
$tag->html();
	$tag->head();
	    $tag->meta('charset="UTF-8"');
	    $tag->meta('content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"');
	    $tag->meta('name="description" content="' . $inscreverse->descricao . '"');
        $tag->meta('name="keywords" content="' . $inscreverse->palavras_chave . '"');
        $tag->meta('name="author" content="' . $inscreverse->autor . '"');
        $tag->link('rel="shortcut icon" href="' . $inscreverse->inscreverse_img_icon.'usuario.png"');

	    $tag->title();
	    	$tag->printer($inscreverse->titulo);
	    $tag->title;
	    // <!-- Favicon-->
	    $tag->link('rel="icon" href="../../favicon.ico" type="image/x-icon"');

	    // <!-- Google Fonts -->
	    $tag->link('href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"');
	    $tag->link('href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"');

		$_CSS = [
	            $inscreverse->painel_css_path . '/plugins/bootstrap/css/bootstrap.css', 
	            $inscreverse->painel_css_path . '/plugins/node-waves/waves.css', 
	            $inscreverse->painel_css_path . '/plugins/animate-css/animate.css', 
	            $inscreverse->painel_css_path . '/style.css',
	            $inscreverse->inscreverse_css_path . '/inscreverse.css'
	        ];
	        // <!-- CORE CSS -->
	        foreach ($_CSS as $key => $value) {
	            $tag->link('href="' . $value . '" rel="stylesheet"');
	        }
	
	$tag->head;
	$tag->body('class="signup-page"');

		require 'partials/form.php';

		$_JS = [
					$inscreverse->painel_js_path . '/plugins/jquery/jquery.min.js',
					$inscreverse->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
					$inscreverse->painel_js_path . '/plugins/node-waves/waves.js',
					$inscreverse->painel_js_path . '/plugins/jquery-validation/jquery.validate.js',
					$inscreverse->painel_js_path . '/admin.js',
					$inscreverse->inscreverse_js_path . '/inscreverse.js',
				];
			foreach ($_JS as $key => $value) {
			    $tag->script('src="' . $value . '" rel="stylesheet"'); 
			    $tag->script;
			}
	$tag->body;
$tag->html;