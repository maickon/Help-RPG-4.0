<?php
session_start();
if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])) {
    header("Location: " . URL_BASE);
}

require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');

        $tag->div('class="block-header"');
            $tag->h2();
                $tag->printer('SEUS DADOS');
            $tag->h2;
        $tag->div;

        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->br();
                    $tag->div('class="body"');
                        $tag->div('class="row"');
                            $tag->div('class="col-md-3"');
                                $tag->a('href="javascript:void(0);" class="thumbnail"');
                                    $tag->img('src="https://scontent.fgig3-1.fna.fbcdn.net/v/t1.0-9/1463149_604240096309885_1617269446_n.jpg?oh=6638166e3e8253452a0b6234e887cbc7&oe=58AD2D60" class="img-responsive"');
                                $tag->a;
                            $tag->div;
                        
                            $tag->div('class="col-md-4"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Nome</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario['nome']);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-4"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Nick</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario['login']);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-4"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Facebook</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario['facebook_link'].'" target="blank"');
                                       $tag->printer($usuario['facebook_link']);
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-4"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Twitter</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario['twitter_link'].'"');
                                       $tag->printer($usuario['twitter_link']);
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-4"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Google+</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario['gplus_link'].'"');
                                       $tag->printer($usuario['gplus_link']);
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-4"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Blog</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario['pagina_social'].'"');
                                       $tag->printer($usuario['pagina_social']);
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Site Pessoal</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario['site_pessoal'].'"');
                                       $tag->printer($usuario['site_pessoal']);
                                    $tag->a;
                                $tag->p;
                            $tag->div;
                            
                            $tag->div('class="col-md-12"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Descrição</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario['descricao']);
                                $tag->p;
                            $tag->div;
                        $tag->div;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';