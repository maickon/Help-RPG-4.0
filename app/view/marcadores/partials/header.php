<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . META_DESCRIPTION_HIGHLIGHTER . '"');
        $tag->meta('name="keywords" content="' . META_KEYWORDS_HIGHLIGHTER . '"');
        $tag->meta('name="author" content="' . META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $marcadores->marcadores_img_icon . 'marcador.png"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer(UTILITIES_HIGHLIGHTER);
        $tag->title;
   
        $_CSS = [
            $marcadores->bootstrap_css_path, 
            $marcadores->marcadores_css_path.'/marcadores.css', 
            $marcadores->font_awesome_css_path, 
            $marcadores->bootstrap_select_css_path, 
            ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;
        