<?php
$tag->div('id="home"');
    $tag->div('class="container"');
        $tag->div('class="row"');
            $tag->div('class="class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 "');
                $tag->div('id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up"');
                    $tag->div('class="carousel-inner"');
                      
                        $carousel_list = [
                            [
                                SLIDE_TITLE_01,
                                SLIDE_MESSAGE_01
                            ],
                            [
                                SLIDE_TITLE_02,
                                SLIDE_MESSAGE_02
                            ],
                            [
                                SLIDE_TITLE_03,
                                SLIDE_MESSAGE_03
                            ]
                        ];
                        foreach ($carousel_list as $key => $value) {
                            if ($key == 0) {
                                $tag->div('class="item active"');
                                    $tag->h1();
                                        $tag->printer($value[0]);
                                    $tag->h1;
                                    $tag->p();
                                        $tag->printer($value[1]);
                                    $tag->p;
                                $tag->div;
                                
                            } else {
                               $tag->div('class="item"');
                                   $tag->h1();
                                        $tag->printer($value[0]);
                                   $tag->h1;
                                   $tag->p();
                                        $tag->printer($value[1]);
                                   $tag->p;
                               $tag->div;
                            }
                        }
                        
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;

        $tag->div('class="row animate-in" data-anim-type="fade-in-up"');
            $tag->div('class="col-lg-12 scroll-me"');
            // <!-- <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me"> -->
            
                $_IMG_UTILITARIES = [
					[IMG_ROLL_DICE, ROLL_DICE, ROLL_DICE, ROLL_DICE_URL],
					[IMG_NAMES, GENERATOR_NAMES, GENERATOR_NAMES, NAMES_URL],
					[IMG_SHEET, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_ADVENTURES, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_TAVERN, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_MONSTER, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_MAP, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_DUNGEON, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_PERSONALITY, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_CITIES, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_HIGHLIGHTER, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_ITEMS, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_LUCK, CHARACTER_SHEETS, CHARACTER_SHEETS, '#'],
					[IMG_SWORD, CHARACTER_SHEETS, CHARACTER_SHEETS, '#']
				];
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