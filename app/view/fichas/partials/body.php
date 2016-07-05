<?php
$tag->br();
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-8']);
	    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
	        foreach($rpg_nomes as $key => $value):
	            $tag->option('data-subtext="Nome de '.$value.'" value="'.$key.'" title="'.$key.'"');
	                $tag->printer($value);
	            $tag->option;		
	        endforeach;
	    $tag->select;
	
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'title'=>'Gerar Nome', 'value'=>'Gerar Nome', 'onclick'=>'rand_nomes();']);
	    $tag->spam;

	    $tag->div('class="checkbox"');
	     	$tag->label();
	       		$tag->input('type="checkbox" checked id="disable_mode_draw"');
	        	$tag->printer(DISABLE_MODE_DRAW);
	      	$tag->label;
    	$tag->div;
	$tag->div;

	$tag->div(['class'=>'col-md-12', 'id'=>'content']);
	    $tag->div('class="row"');
	        $tag->br();

	        for($i=1; $i<10; $i++):

	            $tag->div(['class'=>'col-md-4']);
	                $tag->span(['id'=>'nome-'.$i.'', 'class'=>'nome form-control input-md no-border background-gradiente-silver']);
	                $tag->span;
	                $tag->br;
	            $tag->div;

	        endfor;
            
  
	    $tag->div;

	    $tag->hr();
	    
	    $tag->div('class="row"');
	        //habilidades basicas
	         
	    $tag->div;

	$tag->div;

	$tag->div('id="editor"');
	$tag->div;
$tag->div;