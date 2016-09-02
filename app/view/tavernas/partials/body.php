<?php
$tag->br();
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-8']);
	    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
	        foreach($tipos_tavernas as $key => $value):
	            $tag->option('data-subtext="'.TAVERN_TYPE.$value.'" value="'.$key.'" title="'.$key.'"');
	                $tag->printer($value);
	            $tag->option;		
	        endforeach;
	    $tag->select;
	
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'title'=> TAVERN_GENERATION, 'value'=> TAVERN_GENERATION, 'onclick'=>'rand_tavernas();']);
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
		        $tag->h4('id="taverna_nome" class="tavern_title_main"');
		        $tag->h4;
				
				$tag->span('id="taverneiro_nome"');
		        $tag->span;

				$tag->span('id="taverneiro_raca"');
		        $tag->span;

		        $tag->span('id="taverneiro_idade"');
		        $tag->span;

		        $tag->span('id="taverneiro_profissao"');
		        $tag->span;

				$tag->h4('id="garcon_personalidade_titulo" class="tavern_title"');
		        $tag->h4;
				
		        $tag->div('id="garcon_personalidade"');
		        $tag->div;

		        $tag->h4('id="personalidade_titulo" class="tavern_title"');
		        $tag->h4;
				
		        $tag->div('id="taverneiro_personalidade"');
		        $tag->div;

		        $tag->h4('id="aparencia_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverneiro_aparencia"');
		        $tag->div;

		        $tag->h4('id="comidas_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverna_porcoes"');
		        $tag->div; 

		       	$tag->div('id="taverna_petiscos"');
		        $tag->div;

		        $tag->h4('id="pratos_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverna_pratos"');
		        $tag->div;

		        $tag->h4('id="sobremesa_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverna_sobremesas"');
		        $tag->div;

		        $tag->div('id="taverna_carnes"');
		        $tag->div;

		        $tag->div('id="taverna_frutas"');
		        $tag->div;
				
				$tag->div('id="taverna_legumes"');
		        $tag->div;

		        $tag->div('id="taverna_verduras"');
		        $tag->div;

		        $tag->h4('id="bebidas_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverna_bebidas"');
		        $tag->div;

		        $tag->div('id="taverna_bebidas_simples"');
		        $tag->div;

		        $tag->div('id="taverna_bebidas_cervejas"');
		        $tag->div;

		       	$tag->div('id="taverna_bebidas_quentes"');
		        $tag->div;

				$tag->h4('id="objetos_briga_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverna_objetos_briga"');
		        $tag->div;

		        $tag->h4('id="atracao_titulo" class="tavern_title"');
		        $tag->h4;

		        $tag->div('id="taverna_atracao"');
		        $tag->div;
	        $tag->div;
	        
			
	        
	    $tag->div;

	    $tag->hr();

	$tag->div;
$tag->div;