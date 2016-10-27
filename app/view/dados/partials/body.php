<?php

$tag->br();

$tag->div(['class'=>'row']);
  $tag->div(['class'=>'col-md-12']);    
    $tag->div('class="btn btn-primary" onclick="location.reload();"');
      $tag->printer($language->DICE_CLEAR);
    $tag->div;

    $tag->div('class="btn btn-success" onclick="rolar_todos();"');
      $tag->printer($language->DICE_ROLL_DICE);
    $tag->div;

    $tag->div('class="btn-group"'); 
      $tag->button('type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"');
        $tag->printer($language->DICE_CONFIG);
        $tag->span('class="caret"');
        $tag->span;
      $tag->button; 

      $opt = [$language->DICE_OPTION_CONFIC2X4, $language->DICE_OPTION_CONFIC2X6, $language->DICE_OPTION_CONFIC3X3, $language->DICE_OPTION_CONFIC7X1];
      $config  = [3, 2, 4, 12];
      
      $tag->ul('class="dropdown-menu"'); 
        for ($i=0; $i < count($opt); $i++) { 
          $tag->li();
            $tag->a('href="#" onclick="configuracao('.$config[$i].');"');
              $tag->printer($opt[$i]);
            $tag->a;
          $tag->li; 
        }
      $tag->ul; 
    $tag->div;

    $tag->div('class="checkbox"');
      $tag->label();
        $tag->input('type="checkbox" id="disable_mode_draw"');
        $tag->printer($language->ADVENTURE_DISABLE_MODE_DRAW);
      $tag->label;
    $tag->div;

  $tag->div;
$tag->div;

$tag->br();

$tag->div(['class'=>'row']);
  $tag->div(['class'=>'col-md-12', 'id'=>'content']);
    $tag->div('class="row"');
      for($i=0; $i<count($options); $i++):
        $id = explode('.', $options[$i]);
        $tag->div('class="col-md-3" id="gride_'.$id[0].'"');
          $tag->div('class="thumbnail"');
          
            $tag->div('class="dice" onclick="rolar_'.$id[0].'();"');
              $tag->img('src="' . $dados->dice_img_path.'/' . $options[$i].'" alt="Dado de '.$id[0].' faces."');
            $tag->div;
            
            $tag->div('class="dice-text thumbnail" id="value_'.$id[0].'"');
              echo '0';
            $tag->div;
  	              	
            $tag->span('class="span-dice"');
          	 $tag->printer($language->DICE_ROLL_PLUS);
          	$tag->span;
          	
            $tag->input('class="input-dice" id="input_'.$id[0].'"');
            
            $tag->span('class="span-dice"');
              $tag->printer($id[0]);
            $tag->span;
        	
            $tag->span('class="small btn btn-default" onclick="processar_rolagem(input_'.$id[0].',\''.$id[0].'\');"');
        		  $tag->printer($language->DICE_GO);
            $tag->span;
          	
            $tag->div('id="rolagem_'.$id[0].'" class="rolagem"');
          	$tag->div;

            $tag->div('class="total" id="total_'.$id[0].'" class="rolagem" onclick="total(\''.$id[0].'\');"');
              $tag->printer($language->DICE_SHOW_TOTAL);
            $tag->div;

          $tag->div;
          $tag->br();
        $tag->div;
      endfor;
    $tag->div;
  $tag->div;
$tag->div;

