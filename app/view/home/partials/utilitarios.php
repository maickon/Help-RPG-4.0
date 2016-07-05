<?php
require 'variaveis.php';

$tag->section('id="utilitarios"');
    $tag->div('class="container"');
        $tag->div('class="row text-center header"');
            $tag->div('class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up"');
                $tag->h3();
                    $tag->printer(UTILITIES);
                $tag->h3;
                $tag->hr();
            $tag->div;
        $tag->div;
        $tag->div('class="row animate-in" data-anim-type="fade-in-up"');
            
            foreach ($_IMG_UTILITARIES_2 as $key => $value) {
                $tag->div('class="col-xs-12 col-sm-4 col-md-4 col-lg-4"');
                    $tag->div('class="utilitarios-wrapper"');
                      
                        $tag->a('href="#" class="icon-content"');
                            $tag->img('src="' . $value[0] . '" class="icon_maior img-circle" alt="' . $value[1] . '" title="' . $value[1] . '"');
                        $tag->a;
                    
                        $tag->h3();
                            $tag->printer($value[1]);
                        $tag->h3;
                        $tag->printer($value[2]);
                    $tag->div;
                $tag->div;
            }

        $tag->div;
    $tag->div;
$tag->section;