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
                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->span('class="font-bold col-default"');
                                $tag->printer($usuario['login']);
                            $tag->span;
                            $tag->span('class="font-bold col-orange"');
                                $tag->printer('Nível ');
                                $tag->printer($usuario['nivel']);
                            $tag->span;
                            $tag->span('class="font-bold col-teal"');
                                $tag->printer($usuario['xp']);
                                $tag->printer('Xp ');
                            $tag->span;
                        $tag->h2;
                        $tag->ul('class="header-dropdown m-r--5"');
                            $tag->li('class="dropdown"');
                                $tag->a('href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"');
                                    $tag->i('class="material-icons"');
                                        $tag->printer('more_vert');
                                    $tag->i;
                                $tag->a;
                                $tag->ul('class="dropdown-menu pull-right"');
                                    $tag->li();
                                        $tag->a('href="'.URL_BASE.'usuario/editar" class="waves-effect waves-block"');
                                            $tag->printer('Editar');
                                        $tag->a;
                                    $tag->li;
                                    $tag->li();
                                        $tag->a('href="javascript:void(0);" class="waves-effect waves-block"');
                                            $tag->printer('Alterar Senha');
                                        $tag->a;
                                    $tag->li;
                                    $tag->li();
                                        $tag->a('href="javascript:void(0);" class="waves-effect waves-block"');
                                            $tag->printer('Deletar Conta');
                                        $tag->a;
                                    $tag->li;
                                $tag->ul;
                            $tag->li;
                        $tag->ul;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->div('class="row"');
                            $tag->div('class="col-md-3"');
                                $tag->a('href="javascript:void(0);" class="thumbnail"');
                                    $tag->img('src="'.$usuario['foto_link'].'" class="img-responsive"');
                                $tag->a;

                                for ($i=0; $i < $usuario['estrelas']; $i++) {
                                    if ($i == 4) {
                                         $tag->div('class="col-lg-4 col-md-4 col-sm-4 col-xs-4"');
                                            $tag->i('class="material-icons bg-yellow radius"');
                                                $tag->printer('stars');
                                            $tag->i;
                                        $tag->div;
                                     } else {
                                        $tag->div('class="col-lg-2 col-md-2 col-sm-2 col-xs-2"');
                                            $tag->i('class="material-icons bg-yellow radius"');
                                                $tag->printer('stars');
                                            $tag->i;
                                        $tag->div;
                                     }
                                }

                                if ($usuario['estrelas'] < 5) {
                                    $estrelas_faltantes = 5 - $usuario['estrelas'];
                                    for ($i=0; $i < $estrelas_faltantes; $i++) { 
                                        if ($i == ($estrelas_faltantes-1)) {
                                            $tag->div('class="col-lg-4 col-md-4 col-sm-4 col-xs-4"');
                                                $tag->i('class="material-icons"');
                                                    $tag->printer('stars');
                                                $tag->i;
                                            $tag->div;
                                        } else {
                                            $tag->div('class="col-lg-2 col-md-2 col-sm-2 col-xs-2"');
                                                $tag->i('class="material-icons"');
                                                    $tag->printer('stars');
                                                $tag->i;
                                            $tag->div;
                                        }
                                    }
                                }
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