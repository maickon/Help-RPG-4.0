<?php
session_start();
if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])) {
    header("Location: " . URL_BASE);
}

require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->br();
                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->printer('VOCÊ TEM CADASTRADO...');
                        $tag->h2;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->div('class="row"');
                            foreach ($counts as $key => $value) {
                                $tag->div('class="col-lg-3 col-md-3 col-sm-6 col-xs-12"');                             
                                    $tag->div('class="info-box-3 bg-red"');
                                        $tag->div('class="icon"');
                                            $tag->i('class="material-icons"');
                                                $tag->printer('done');
                                            $tag->i;
                                        $tag->div;
                                        $tag->div('class="content"');
                                            $tag->div('class="text"');
                                                $tag->printer($key);
                                            $tag->div;
                                            $tag->div('class="number count-to" data-from="0" data-to="'.$value.'" data-speed="1000" data-fresh-interval="20"');
                                                $tag->printer($value);
                                            $tag->div;
                                        $tag->div;
                                    $tag->div;
                                $tag->div;
                            }
                        $tag->div;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';