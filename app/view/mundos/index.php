<?php

require 'partials/header.php';
require 'partials/menu.php';

$tag->br();
$tag->form('method="get" onsubmit="return false;"');
    $form->_container();
        $menus = [
                    ['col-number' => 3, 'label' => LABEL_RAND_ID,       'id' => 'seed',             'type' => 'input'],
                    ['col-number' => 3, 'label' => LABEL_PROJECTION,    'id' => 'projection',       'type' => 'select'],
                    ['col-number' => 3, 'label' => LABEL_PALET,         'id' => 'palette',          'type' => 'select'],
                    ['col-number' => 3, 'label' => LABEL_WATER,       	'id' => 'pct_water',        'type' => 'input'],
                    ['col-number' => 3, 'label' => LABEL_ICE,      	 	'id' => 'pct_ice',          'type' => 'input'],
                    ['col-number' => 3, 'label' => LABEL_IMG_SIZE,      'id' => 'height',           'type' => 'input'],
                    ['col-number' => 3, 'label' => LABEL_INTERACTION,   'id' => 'iter',             'type' => 'input'],
                    ['col-number' => 3, 'label' => LABEL_ROTATION,		'id' => 'rotate',           'type' => 'input']
                ];

        $form->_col(12);
            for($i=0; $i<count($menus); $i++):
                $tag->div('class="col-md-'.$menus[$i]['col-number'].'"');
                    $tag->label('class="control-label"');
                        $tag->printer($menus[$i]['label']);
                    $tag->label;
                    if($menus[$i]['type'] == 'select'):
                        $tag->select('id="'.$menus[$i]['id'].'" class="form-control"');
                        $tag->select;
                    elseif($menus[$i]['type'] == 'input'):
                        $tag->input('id="'.$menus[$i]['id'].'" class="form-control"');
                    endif;
                $tag->div;
            endfor;
            
            $tag->div('class="col-md-2"');
                $tag->br();
                $tag->input('type="button" class="btn btn-default" id="new_seed" value="'.MAP_BUTTON_LABEL_NEW.'"');
            $tag->div;
            $tag->div('class="col-md-2"');
                $tag->br();
                $tag->input('type="button" value="'.MAP_BUTTON_LABEL_SAVE.'" class="btn btn-default" onclick="save_map();"');
            $tag->div;
            $tag->div('class="col-md-2"');
                $tag->br();
                $tag->printer('&nbsp;');
                $tag->input('type="button" value="'.MAP_BUTTON_LABEL_PRINT.'" class="btn btn-default" onclick="window.print();"');
            $tag->div;
            
        $form->col_();
    $form->container_();
$tag->form;

$tag->div('class="center"');
    $tag->h1('id="dungeon_title" class="title"');
    $tag->h1;
    $tag->canvas('id="map" width="1" height="1"');
        $tag->p();
            $tag->printer(MAP_ERROR_CANVAS_MSG);
        $tag->p;
    $tag->canvas;
$tag->div;
$tag->br();

require 'partials/footer.php';