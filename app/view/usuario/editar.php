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
                            $tag->printer('EDITAR...');
                        $tag->h2;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->div('class="row"');
                            $tag->form('action="#" method="post"');
                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Nome</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="nome" class="form-control" placeholder="Nome"');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Nick</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="nick" class="form-control" placeholder="Nick"');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Url para foto de perfil</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="foto_link" class="form-control" placeholder="Selecione uma Url que exiba uma imagem para o seu perfil."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Url para foto de capa</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="capa_link" class="form-control" placeholder="Selecione uma Url que exiba uma imagem para a sua imagem de capa."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Seu Facebook</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="facebook_link" class="form-control" placeholder="Informe a sua Url para o Facebook. Pode ser seu perfil ou uma fanpage."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Seu Twitter</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="twitter_link" class="form-control" placeholder="Informe a sua Url para o Twitter."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Seu Google+</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="gplus_link" class="form-control" placeholder="Informe a sua Url para o Google+."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Um blog sobre RPG ou você</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="pagina_social" class="form-control" placeholder="Informe uma URL para algum blog sobre RPG ou etc."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Site Pessoal</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="pagina_social" class="form-control" placeholder="Informe uma URL para algum site pessoal."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-6"');
                                    $tag->h2('class="card-inside-title"');
                                        $tag->printer('<span class="font-bold">Email</span>');
                                    $tag->h2;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"');
                                            $tag->input('type="text" name="email" class="form-control" placeholder="Insira um endereço de email."');
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-12"');
                                    $tag->p();
                                        $tag->b();
                                            $tag->printer('Descrição');
                                        $tag->b;
                                    $tag->p;
                                    $tag->div('class="form-group"');
                                        $tag->div('class="form-line"'); 
                                            $tag->textarea('id="ckeditor" name="descricao"');
                                            $tag->textarea;
                                        $tag->div;
                                    $tag->div;
                                $tag->div;

                                $tag->div('class="col-sm-12"');
                                    $tag->input('type="submit" class="btn btn-primary waves-effect" name="submit" value="ATUALIZAR"');
                                    $tag->input;
                                $tag->div;
                            $tag->form;
                        $tag->div;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';