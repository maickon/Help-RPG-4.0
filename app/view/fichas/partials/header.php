<?php
$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . $language->SHEETS_META_DESCRIPTION_CHARACTER . '"');
        $tag->meta('name="keywords" content="' . $language->SHEETS_META_KEYWORDS_CHARACTER . '"');
        $tag->meta('name="author" content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $ficha->fichas_img_icon . 'ficha.png"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer($language->SHEETS_UTILITIES_CHARACTER);
        $tag->title;

        $_CSS = [
                $ficha->bootstrap_css_path, 
                $ficha->index_css_path,
                $ficha->font_awesome_css_path,
                $ficha->fichas_css_path.'/fichas.css',
                $ficha->bootstrap_select_css_path
                ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        