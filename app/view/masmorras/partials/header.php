<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . $language->DUNGEON_META_DESCRIPTION . '"');
        $tag->meta('name="keywords" content="' . $language->DUNGEON_META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $masmorras->masmorras_img_icon . 'mapa.png"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer($language->DUNGEON_UTILITIES);
        $tag->title;

        $_CSS = [
            $masmorras->bootstrap_css_path, 
            $masmorras->masmorras_css_path.'/dungeon.css', 
            $masmorras->index_css_path, 
            $masmorras->font_awesome_css_path, 
            $masmorras->bootstrap_select_css_path, 
            ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        