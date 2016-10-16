<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->br();
                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->printer('PESSOAS QUE ESTÃO NO HELP RPG');
                        $tag->h2;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->div('class="row"');
                            foreach ($usuarios as $key => $value) {
                                $tag->div('class="col-sm-6 col-md-4"');                             
                                    $tag->div('class="thumbnail"');
                                        if (empty($value['foto_link'])) {
                                            $tag->img('src="'.$usuario->url->social_img_path.'/profle.png." height="128" width="128"');
                                        } else {
                                            $tag->img('src="'.$value['foto_link'].'" class="img-circle" height="128" width="128"');
                                        } 
                                        $tag->div('class="caption"');
                                            $tag->h3('class="align-center"');
                                                $tag->printer($value['login']);
                                            $tag->h3;
                                            
                                            $tag->p('class="align-center font-10"');
                                                $tag->printer($value['email']);
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