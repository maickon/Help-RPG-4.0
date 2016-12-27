<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->printer('PESSOAS QUE ESTÃO NO HELP RPG');
                        $tag->h2;
                    $tag->div;
                    $tag->div('class="col-sm-8"');
                    $tag->div;
                    $tag->div('class="col-sm-4"');
                        $tag->div('class="form-group"');
                            $tag->div('class="form-line"');
                                $tag->input('type="text" onkeydown="buscar_usuario(this.value)" name="nome" value="" class="form-control" placeholder="Pesquisar..."');
                            $tag->div;
                        $tag->div;
                    $tag->div;
                    $tag->div('class="body"');
                       $tag->div('class="row" id="profiles"');
                            foreach ($usuarios as $key => $value) {
                                $tag->div('class="col-md-3"');
                                    $tag->div('class="thumbnail"');
                                        $tag->a('href="'.URL_BASE.'usuario/profile/'.$value->id.'"');
                                           if (empty($value->foto_link)) {
                                                $tag->img('src="'.$usuario->url->social_img_path.'/profle.png." class="img-responsive img-profile"');
                                            } else {
                                                $tag->img('src="'.$value->foto_link.'" class="img-responsive img-profile"');
                                            }
                                        $tag->a;
                                        $tag->div('class="caption center"');
                                            $tag->h5('id="user_name"');
                                                $tag->printer("{$value->login} Lv {$value->nivel}");
                                            $tag->h5;
                                        $tag->div;
                                    $tag->div;
                                $tag->div;
                            }
                        $tag->div;
                    $tag->div;

                    $tag->div('class="footer center" id="counter"');
                        $tag->ul('class="pagination"');
                            if ($params > 1) {
                                $tag->li('class=""');
                                    $indice_menos = $params - 1;
                                    $tag->a('href="'.URL_BASE.'usuario/listar/'.($indice_menos).'"');
                                        $tag->printer('<i class="material-icons">chevron_left</i>');
                                    $tag->a;
                                $tag->li;
                            }
                            for ($i=1; $i < $numero_usuarios +1; $i++) {
                                $ativo = ($i == $params) ? 'active' : '';
                                $tag->printer('<li class="'.$ativo.'"><a href="'.URL_BASE.'usuario/listar/'.$i.'" class="waves-effect">'.$i.'</a></li>');
                            }
                            if ($params < $numero_usuarios) {
                                $tag->li();
                                    $indice_mais = $params + 1;
                                    $tag->a('href="'.URL_BASE.'usuario/listar/'.$indice_mais.'" class="waves-effect"');
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