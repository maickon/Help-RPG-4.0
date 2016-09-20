<?php
$tag->br();
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-8']);
	    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
	        foreach($tipos_personalidades as $key => $value):
	            $tag->option('data-subtext="'.PERSONALIDADE_TYPE.$value.'" value="'.$key.'" title="'.$key.'"');
	                $tag->printer($value);
	            $tag->option;		
	        endforeach;
	    $tag->select;
	
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'title'=> PERSONALITY_BUTTON_LABEL_NEW, 'value'=> PERSONALITY_BUTTON_LABEL_NEW, 'onclick'=>'rand_personalidades();']);
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

	        $tag->div('class="bs-callout bs-callout-danger" id="callout-btndropdown-dependency"');
		        

		        $tag->h4('id="aspecto_titulo"');
		        $tag->h4;

		        $tag->span('id="aspecto"');
		        $tag->span;

		        $tag->h4('id="aspecto_negativo_titulo"');
		        $tag->h4;
				
				$tag->span('id="aspecto_negativo"');
		        $tag->span;

				$tag->h4('id="aspecto_positivo_titulo"');
		        $tag->h4;
				
				$tag->span('id="aspecto_positivo"');
		        $tag->span;

		        $tag->h4('id="aspecto_geral_titulo"');
		        $tag->h4;
				
				$tag->span('id="aspecto_geral"');
		        $tag->span;

		        $tag->h4('id="aspecto_ideologico_titulo"');
		        $tag->h4;
				
				$tag->span('id="aspecto_ideologia"');
		        $tag->span;

		        $tag->h4('id="aspecto_medo_titulo"');
		        $tag->h4;
				
				$tag->span('id="aspecto_medo"');
		        $tag->span;

		        $tag->h4('id="aspecto_tendencia_titulo"');
		        $tag->h4;
				
				$tag->span('id="aspecto_tendencia"');
		        $tag->span;
	        $tag->div;
	    $tag->div;

	    $tag->hr();

	$tag->div;
$tag->div;