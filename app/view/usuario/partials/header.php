<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . META_DESCRIPTION_PAGE_USERS . '"');
        $tag->meta('name="keywords" content="' . META_KEYWORDS_PAGE_USERS . '"');
        $tag->meta('name="author" content="' . META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $usuario->url->logo_icon_img_path.'"');
   
        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer(PAGE_USERS_TITLE);
        $tag->title;

        $_CSS = [
            $usuario->url->data_tables_bootstrap_css_path,
            $usuario->url->bootstrap_css_path, 
            $usuario->url->index_css_path,
            $usuario->url->font_awesome_css_path,
        ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        