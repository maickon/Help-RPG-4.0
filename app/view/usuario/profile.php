<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->span('class="font-bold col-default"');
                                $tag->printer($usuario->login);
                            $tag->span;
                            $tag->span('class="font-bold col-orange"');
                                $tag->printer('Nível ');
                                $tag->printer($usuario->nivel);
                            $tag->span;
                            $tag->span('class="font-bold col-teal"');
                                $tag->printer($usuario->xp);
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
                                    $tag->img('src="'.$usuario->foto_link.'" class="img-responsive"');
                                $tag->a;

                                for ($i=0; $i < $usuario->estrelas; $i++) {
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

                                if ($usuario->estrelas < 5) {
                                    $estrelas_faltantes = 5 - $usuario->estrelas;
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
                        
                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Nome</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->nome);
                                $tag->p;
                            $tag->div;

                            $img_size = 64;

                            $tag->div('class="col-md-1"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->facebook_link.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/facebook_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-1"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->twitter_link.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/twitter_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-1"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->gplus_link.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/google_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-1"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->pagina_social.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/blogger_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-1"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->site_pessoal.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/link_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-1"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->youtube_link.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/youtube_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;
                            
                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Sexo</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $sexo = ['m'=>USUARIO_LABEL_SEXO_MASCULINO, 'f'=>USUARIO_LABEL_SEXO_FEMININO];
                                    $tag->printer($sexo[$usuario->sexo]);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Idade</span>');
                                $tag->h2;
                                $idade = date('Y')-explode('/', $usuario->data_nascimento)[2];
                                $tag->p('class="font-18"');
                                    $tag->printer("{$idade} anos");
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">País</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->pais);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Cidade</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->cidade);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Estado</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->estado);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">WhatsApp</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->whats_app);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Skype</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->skype);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Rpgs preferido</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->rpgs_preferido);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Classe preferida</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->classe_preferida);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Raça preferida</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->raca_preferida);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">É mestre e tem experiência?</span>');
                                $tag->h2;
                                $resposta = ['s'=>USUARIO_LABEL_SIM,'n'=>USUARIO_LABEL_NAO];
                                $tag->p('class="font-18"');
                                    $tag->printer($resposta[$usuario->e_mestre]);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-6"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Uma frase favorita</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->frase_preferida);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-12"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Sobre</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->descricao);
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