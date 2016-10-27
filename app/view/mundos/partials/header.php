<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . $language->WORLDMAP_META_DESCRIPTION . '"');
        $tag->meta('name="keywords" content="' . $language->WORLDMAP_META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $mundos->mundos_img_icon . 'mapa.png"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer($language->WORLDMAP_UTILITIES);
        $tag->title;

        $_CSS = [
            $mundos->bootstrap_css_path, 
            $mundos->index_css_path, 
            $mundos->font_awesome_css_path, 
            $mundos->bootstrap_select_css_path, 
            ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        