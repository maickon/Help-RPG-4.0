<?php
$tag->br();
$tag->div(['class'=>'container']);
	$tag->div(['class'=>'row']); 	
		$tag->br();
		$tag->div('class="col-md-12"');		       
	        $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
		        foreach($tipos as $key => $value):
		            $tag->option('data-subtext="'.$language->NAME_OF.' '.$value[2].'" value="'.$value[2].'" title="'.$value[1].'"');
		                $tag->printer($value[1]);	
		            $tag->option;		
		        endforeach;
		    $tag->select;

		    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select_qtd"');
		        $count = 1;
		        while($count != 10):
		            $tag->option();
		                $tag->printer($count);
		            $tag->option;
		            $count += 1;		
		        endwhile;
		    $tag->select;
		
		    $tag->span(['class'=>'help-inline']);
		        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'title'=> $language->ITENS_GENERATE_BUTTON, 'value'=> $language->ITENS_GENERATE_BUTTON, 'onclick'=>'rand_item_aleatorio();']);
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
		        $tag->br();

		        $tag->div('class="bs-callout bs-callout-danger" id="callout-btndropdown-dependency"');
			        $tag->h4('id="titulo" class="tavern_title_main"');
			        $tag->h4;
					
					$tag->span('id="descricao"');
			        $tag->span;

		        $tag->div;
		    $tag->div;

		    $tag->hr();
		$tag->div;
	$tag->div;
$tag->div;