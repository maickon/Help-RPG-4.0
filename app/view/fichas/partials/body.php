<?php
$type = explode('/', $_GET['url']);
$type = empty(end($type)) ? 'npc' : end($type);

$tag->br();
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-8']);
	    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
	        foreach($rpg_nomes as $key => $value):
	            $tag->option('data-subtext="'.$language->SHEETS_NAME_OF.' '.$value.'" value="'.$key.'" title="'.$value.'"');
	                $tag->printer($value);
	            $tag->option;		
	        endforeach;
	    $tag->select;
	
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'id'=>'select_option', 'type'=>'button', 'title'=>$language->BUTTON_SHEETS_GENERATION, 'value'=>$language->BUTTON_SHEETS_GENERATION, 'onclick'=>'rand_ficha_npc(\''.$type.'\');']);
	    $tag->spam;

	    $tag->div('class="checkbox"');
	     	$tag->label();
	       		$tag->input('type="checkbox" checked id="disable_mode_draw"');
	        	$tag->printer($language->ADVENTURE_DISABLE_MODE_DRAW);
	      	$tag->label;
    	$tag->div;
	$tag->div;

	$tag->div(['class'=>'col-md-12', 'id'=>'content']);
	    $tag->div('class="row"');
	        $tag->hr();  
	        $tag->div('id="ficha"');
	    	$tag->div;
	    $tag->div;
	$tag->div;
$tag->div;