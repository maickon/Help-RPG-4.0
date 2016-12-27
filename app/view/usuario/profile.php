<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-md-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                            $tag->img('align="left" class="thumbnail fb-image-lg" src="'.$usuario->capa_link.'" alt="Profile image example"');
                            $tag->img('align="left" class="fb-image-profile thumbnail" src="'.$usuario->foto_link.'" alt="Profile image example"');
                            $tag->div('class="fb-profile-text"');
                                $tag->h1();
                                    $tag->span('class="font-bold col-default"');
                                        $tag->printer($usuario->login);
                                    $tag->span;
                                    $tag->span('class="font-bold col-orange"');
                                        $tag->printer($language->USER_LABEL_LEVEL);
                                        $tag->printer($usuario->nivel);
                                    $tag->span;
                                    $tag->span('class="font-bold col-teal"');
                                        $tag->printer($usuario->xp);
                                        $tag->printer($language->USER_LABEL_XP);
                                    $tag->span;
                                $tag->h1;
                                $tag->p();
                                    $tag->printer($usuario->descricao);
                                $tag->p;
                            $tag->div;
                    $tag->div;

                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->printer('Mídias socias');
                        $tag->h2;
                        if ($usuario->id == $_SESSION['id']) {
                            $tag->ul('class="header-dropdown m-r--5"');
                                $tag->li('class="dropdown"');
                                    $tag->a('href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"');
                                        $tag->i('class="material-icons"');
                                            $tag->printer('more_vert');
                                        $tag->i;
                                    $tag->a;
                                    $tag->ul('class="dropdown-menu pull-right"');
                                        $tag->li();
                                            $tag->a('href="'.URL_BASE.'usuario/editar" class="waves-effect waves-block"');
                                                $tag->printer($language->USER_LABEL_EDIT);
                                            $tag->a;
                                        $tag->li;
                                        $tag->li();
                                            $tag->a('href="#" class="waves-effect waves-block"');
                                                $tag->printer($language->USER_LABEL_CHANGE_PASSWORD);
                                            $tag->a;
                                        $tag->li;
                                        $tag->li();
                                            $tag->a('href="#" class="waves-effect waves-block"');
                                                $tag->printer($language->USER_LABEL_DELETE_ACOUNT);
                                            $tag->a;
                                        $tag->li;
                                    $tag->ul;
                                $tag->li;
                            $tag->ul;
                        } else {
                        }
                    $tag->div;

                    $tag->div('class="body"');
                        $tag->div('class="row"');
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

                            $tag->div('class="col-md-4"');
                                $tag->p('class="font-18"');
                                    $tag->a('href="'.$usuario->youtube_link.'" target="blank"');
                                        $tag->img('class="media-object" height="'.$img_size.'" width="'.$img_size.'" src="'.$usuario_modelo->url->social_img_path.'/youtube_social_media.png"');
                                    $tag->a;
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
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

                            $tag->div('class="row"');
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Sexo</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->sexo);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-3"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Idade</span>');
                                $tag->h2;
                                if (!empty($usuario->data_nascimento)) {
                                    $idade = date('Y')-explode('/', $usuario->data_nascimento)[2];
                                    $tag->p('class="font-18"');
                                        $tag->printer("{$idade} anos");
                                    $tag->p;
                                }
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
                                $resposta = [''=>'','s'=>$language->USER_LABEL_YES,'n'=>$language->USER_LABEL_NO];
                                $tag->p('class="font-18"');
                                    $tag->printer($resposta[$usuario->e_mestre]);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="col-md-12"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Uma frase favorita</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->frase_preferida);
                                $tag->p;
                            $tag->div;

                            $tag->div('class="row"');
                            $tag->div;

                            $tag->div('class="col-md-12"');
                                $tag->h2('class="card-inside-title"');
                                    $tag->printer('<span class="font-bold">Rpgs preferido</span>');
                                $tag->h2;
                                $tag->p('class="font-18"');
                                    $tag->printer($usuario->rpgs_preferido);
                                $tag->p;
                            $tag->div;
                        $tag->div;
                    $tag->div;

                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->a('name="title" class="ancora"');
                                $tag->printer('Postagens...');
                            $tag->a;
                        $tag->h2;
                    $tag->div;

                    $tag->div('class="body"');
                        foreach ($postagens as $key => $value) {
                            $tag->h5();
                                $tag->a('href="'.URL_BASE.$value['modulo'].'/visualizar/'.$value['id'].'"');
                                    $tag->printer($value['nome']);
                                $tag->a;
                            $tag->h5;
                        }
                    $tag->div;

                    $tag->div('class="footer center" id="counter"');
                        $tag->ul('class="pagination"');
                            if ($pagina_atual > 1) {
                                $tag->li('class=""');
                                    $indice_menos = $pagina_atual - 1;
                                    $tag->a('href="'.URL_BASE.'usuario/profile/'.$id.'/'.($indice_menos).'#title"');
                                        $tag->printer('<i class="material-icons">chevron_left</i>');
                                    $tag->a;
                                $tag->li;
                            }
                            for ($i=1; $i < $contador +1; $i++) {
                                $ativo = ($i == $pagina_atual) ? 'active' : '';
                                $tag->printer('<li class="'.$ativo.'"><a href="'.URL_BASE.'usuario/profile/'.$id.'/'.$i.'#title" class="waves-effect">'.$i.'</a></li>');
                            }
                            if ($pagina_atual < $contador) {
                                $tag->li();
                                    $indice_mais = $pagina_atual + 1;
                                    $tag->a('href="'.URL_BASE.'usuario/profile/'.$id.'/'.$indice_mais.'#title" class="waves-effect"');
                                        $tag->printer('<i class="material-icons">chevron_right</i>');
                                    $tag->a;
                                $tag->li;
                            }
                        $tag->ul;
                    $tag->div;

                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';