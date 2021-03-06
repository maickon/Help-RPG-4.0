<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . $language->PERSONALITY_META_DESCRIPTION . '"');
        $tag->meta('name="keywords" content="' . $language->PERSONALITY_META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $personalidades->personalidades_img_icon . 'personalidades.png"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer($language->PERSONALITY_UTILITIES);
        $tag->title;
        
        $_CSS = [
            $personalidades->bootstrap_css_path, 
            $personalidades->index_css_path, 
            $personalidades->font_awesome_css_path, 
            $personalidades->bootstrap_select_css_path,
            $personalidades->docs_css_path 
            ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        