<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . META_DESCRIPTION_CHARACTER_SHEETS . '"');
        $tag->meta('name="keywords" content="' . META_KEYWORDS_CHARACTER_SHEETS . '"');
        $tag->meta('name="author" content="' . META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . IMG_SHEET . '"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer(UTILITIES_CHARACTER_SHEETS);
        $tag->title;

        $_CSS = [CSS_BOOTSTRAP, CSS_INDEX, CSS_NAME_FONT, CSS_FONT_AWESOM, CSS_DICE, CSS_BOOTSTRAP_SELECT];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        