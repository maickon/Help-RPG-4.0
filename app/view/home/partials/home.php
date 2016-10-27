<?php
// variaveis de menu
require 'variaveis.php';

$tag->div('id="home"');
    $tag->div('class="container"');
        $tag->div('class="row"');
            $tag->div('class="class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 "');
                // $tag->div('id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up"');
                //     $tag->div('class="carousel-inner"');
                      
                //         foreach ($carousel_list as $key => $value) {
                //             if ($key == 0) {
                //                 $tag->div('class="item active"');
                //                     $tag->h1();
                //                         $tag->printer($value[0]);
                //                     $tag->h1;
                //                     $tag->p();
                //                         $tag->printer($value[1]);
                //                     $tag->p;
                //                 $tag->div;
                                
                //             } else {
                //                $tag->div('class="item"');
                //                    $tag->h1();
                //                         $tag->printer($value[0]);
                //                    $tag->h1;
                //                    $tag->p();
                //                         $tag->printer($value[1]);
                //                    $tag->p;
                //                $tag->div;
                //             }
                //         }
                        
                //     $tag->div;
                // $tag->div;
                $tag->div('class="row text-center header"');
                    $tag->div('class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up"');
                        $tag->h3();
                            $tag->printer($language->MENU_UTILITIES);
                        $tag->h3;
                        $tag->hr();
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;

        $tag->div('class="row animate-in" data-anim-type="fade-in-up"');
            $tag->div('class="col-lg-12 scroll-me"');
            // <!-- <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me"> -->
                $tag->div('class="social"');
                    foreach ($_IMG_UTILITARIES as $key => $value) {
                        $tag->a('href="' . $value[3] . '" class="btn button-custom btn-custom-one"');
                            $tag->img('src="' . $value[0] . '" class="icon img-responsive" alt="' . $value[1] . '" title="' . $value[2] . '"');
                        $tag->a;
                    }
                $tag->div;
    
            $tag->div;
        $tag->div;
    $tag->div;
$tag->div;