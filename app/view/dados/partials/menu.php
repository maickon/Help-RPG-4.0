<?php
$tag->div(['class'=>'row']);
    $tag->div(['class'=>'col-md-12']);
        $tag->h2();
            $tag->printer($language->DICE_UTILITIES);
        $tag->h2;
        
        $tag->printer('|');
        $home_helper->utilitaries_menu();
    $tag->div;
    $tag->hr();
$tag->div;