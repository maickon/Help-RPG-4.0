<?php

$tag->printer('<!DOCTYPE html>');
$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . META_DESCRIPTION_DICE . '"');
        $tag->meta('name="keywords" content="' . META_KEYWORDS_DICE . '"');
        $tag->meta('name="author" content="' . META_AUTHOR . '"');
        $tag->link('rel="icon" href=" ' . $dados->dados_img_icon.'dados.png' . '" sizes="32x32"');
        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer(UTILITIES_DICE);
        $tag->title;

        $_CSS = [
                    $dados->bootstrap_css_path,
                    $dados->dice_css_path.'/dice.css', 
                    $dados->bootstrap_select_css_path
                ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->body();
        
            