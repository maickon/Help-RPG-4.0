<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . $language->CITIES_META_DESCRIPTION . '"');
        $tag->meta('name="keywords" content="' . $language->CITIES_META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $cidade->cidades_img_icon . '/cidades.png"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer($language->CITIES_UTILITIES);
        $tag->title;

        $_CSS = [
                $cidade->bootstrap_css_path, 
                $cidade->index_css_path, 
                $cidade->nomes_css_path.'/nomes.css', 
                $cidade->font_awesome_css_path, 
                $cidade->bootstrap_select_css_path, 
                $cidade->docs_css_path];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        