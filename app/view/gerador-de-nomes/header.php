<?php
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];

$tag->printer('<!DOCTYPE html>');

$tag->html();
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description" content="' . META_DESCRIPTION_NAME . '"');
        $tag->meta('name="keywords" content="' . META_KEYWORDS . '"');
        $tag->meta('name="author" content="' . META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . IMG_SHORTCUT_ICON . '"');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer(UTILITIES_NAME);
        $tag->title;

        $_CSS = [CSS_BOOTSTRAP, CSS_FONT_AWESOM, CSS_DICE, CSS_BOOTSTRAP_SELECT];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    $tag->head;

    $tag->div(['class'=>'container']);
        $tag->div(['class'=>'row']);
            $tag->div(['class'=>'col-md-12']);
                $tag->h2();
                    $tag->printer(UTILITIES_NAME);
                $tag->h2;
                $tag->printer('|');
                $tag->a(['href'=>'../index.php']);
                    $tag->printer('Home');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'lugares.php']);
                    $tag->printer('Lugares');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'classes.php']);
                    $tag->printer('Classes');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'../nomes/']);
                    $tag->printer('Raças');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'culturais.php']);
                    $tag->printer('Culturais');
                $tag->a;
                $tag->printer('|');
                 $tag->a(['href'=>'outros.php']);
                    $tag->printer('Outros');
                $tag->a;
                $tag->printer('|');
                $tag->printer('Criado por Maickon Rangel - ');
                 $tag->a(['href'=>'ROOTPATHURL']);
                    $tag->printer('helprpg.com.br');
                $tag->a;
            $tag->div;
            $tag->hr();
        $tag->div;