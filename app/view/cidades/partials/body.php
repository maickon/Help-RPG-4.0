<?php
$tag->br();
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-8']);
	   
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'title'=> CITY_GENERATION, 'value'=> CITY_GENERATION, 'onclick'=>'rand_cidades();']);
	    $tag->spam;

	    $tag->div('class="checkbox"');
	     	$tag->label();
	       		$tag->input('type="checkbox" checked id="disable_mode_draw"');
	        	$tag->printer(DISABLE_MODE_DRAW);
	      	$tag->label;
    	$tag->div;
	$tag->div;

	$tag->div(['class'=>'col-md-6', 'id'=>'content']);
	    $tag->div('class="row"');
	        $tag->br();

	        $tag->div('class="bs-callout bs-callout-danger" id="callout-btndropdown-dependency"');
		        $tag->h4('id="nome_label"');
		        $tag->h4;
				
				$tag->span('id="nome"');
		        $tag->span;

		        $tag->h4('id="tamanho_label"');
		        $tag->h4;
				
				$tag->span('id="tamanho"');
		        $tag->span;

		        $tag->h4('id="populacao_label"');
		        $tag->h4;
				
				$tag->span('id="populacao"');
		        $tag->span;

		       	$tag->h4('id="limite_po_label"');
		        $tag->h4;
				
				$tag->span('id="limite_po"');
		        $tag->span;

		        $tag->h4('id="tipo_poder_central_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_poder_central"');
		        $tag->span;
		        
		        $tag->h4('id="tipo_poder_central_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_poder_central"');
		        $tag->span;

		        $tag->h4('id="tipo_poder_central_descricao_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_poder_central_descricao"');
		        $tag->span;

		        $tag->h4('id="tipo_poder_central_escolhido_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_poder_central_escolhido"');
		        $tag->span;
		        
		        $tag->h4('id="tendencia_do_poder_central_label"');
		        $tag->h4;
				
				$tag->span('id="tendencia_do_poder_central"');
		        $tag->span;
		    $tag->div;
	    $tag->div;
	$tag->div;

	$tag->div(['class'=>'col-md-6', 'id'=>'content']);
	    $tag->div('class="row"');
	        $tag->br();

	        $tag->div('class="bs-callout bs-callout-danger" id="callout-btndropdown-dependency"');

		        $tag->h4('id="composicao_racial_label"');
		        $tag->h4;
				
				$tag->span('id="composicao_racial"');
		        $tag->span;

		        $tag->h4('id="tipo_de_defesa_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_de_defesa"');
		        $tag->span;

		        $tag->h4('id="tipo_de_religiao_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_de_religiao"');
		        $tag->span;

		        $tag->h4('id="tipo_de_cultura_label"');
		        $tag->h4;
				
				$tag->span('id="tipo_de_cultura"');
		        $tag->span;
	        $tag->div;
	        
			
	        
	    $tag->div;

	    $tag->hr();

	$tag->div;
$tag->div;