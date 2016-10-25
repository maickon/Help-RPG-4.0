<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->br();
                    $tag->div('class="header"');
                        $tag->div('class="col-md-8"');   
                            $tag->h2();
                                $tag->printer('SEUS AMIGOS');
                            $tag->h2;
                        $tag->div;
                        $tag->div('class="col-md-4"');
                            $tag->div('class="form-group"');
                                $tag->div('class="form-line"');
                                    $tag->input('name="search" id="filtro" onkeydown="filtrar_amizade(value)" class="form-control" placeholder=" Encontre alguém"');
                                $tag->div;
                            $tag->div;
                            $tag->span('id="filter-count"');
                            $tag->span;
                        $tag->div;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->div('class="row" id="usuarios"');
                            foreach ($amigos as $key => $value) {
                                $tag->div('class="col-sm-6 col-md-4"');                             
                                    $tag->div('class="thumbnail"');
                                        $tag->a('href="'.URL_BASE.'usuario/profile/'.$value->id.'"');
                                            if (empty($value->foto_link)) {
                                                $tag->img('src="'.$usuario->url->social_img_path.'/profle.png." class="img-circle" height="128" width="128"');
                                            } else {
                                                $tag->img('src="'.$value->foto_link.'" class="img-circle" height="128" width="128"');
                                            } 
                                        $tag->a;
                                        $tag->div('class="caption"');
                                            $tag->h3('class="align-center"');
                                                $tag->printer($value->login);
                                            $tag->h3;
                                            
                                            $tag->p('class="align-center font-10"');
                                                $tag->printer($value->email);
                                            $tag->p;
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