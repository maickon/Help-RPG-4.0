<?php

$tag->br();
$tag->div(['class'=>'row']);
	$tag->div('class="col-md-3"');
		$tag->div(['class'=>'btn-group']);
	       
	        $tag->button(['class'=>'btn btn-default dropdown-toggle', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false', 'type'=>'button']);
	        	$tag->printer($language->HIGHLIGHTER_SELECT_MSG_LABEL);
		        
		        $tag->span('class="caret"');
		        $tag->span;

		        $tag->span('class="sr-only"');
			        $tag->printer("Toggle Dropdown");
		        $tag->span;
	        $tag->button;
	 
	        $tipos = [
	        			["#",$language->HIGHLIGHTER_OPTION_1_LABEL,'tipo1'],
	        			["#",$language->HIGHLIGHTER_OPTION_2_LABEL,'tipo2'],
	        			["#",$language->HIGHLIGHTER_OPTION_3_LABEL,'tipo3'],
	        			["#",$language->HIGHLIGHTER_OPTION_4_LABEL,'tipo4'],
	        			["#",$language->HIGHLIGHTER_OPTION_5_LABEL,'tipo5'],
	        			["#",$language->HIGHLIGHTER_OPTION_6_LABEL,'tipo6'],
	        			["#",$language->HIGHLIGHTER_OPTION_7_LABEL,'tipo7'],
	        			["#",$language->HIGHLIGHTER_OPTION_8_LABEL,'tipo8']
	        		];

	        $tag->ul('class="dropdown-menu"');
	        	for($i=0; $i<count($tipos); $i++):
		        	$tag->li('id="'.$tipos[$i][2].'" onclick="campo(\''.$tipos[$i][2].'\')"');
		        		$tag->a('href="'.$tipos[$i][0].'"');
		        			$tag->printer($tipos[$i][1]);
		        		$tag->a;
		        	$tag->li;
		        endfor;
	        $tag->ul;
	    $tag->div;
    $tag->div;

    $tag->div('class="col-md-3"');
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'value'=>''.$language->HIGHLIGHTER_BUTTON_LABEL_CLEAR.'', 'onclick'=>'location.reload();']);
	    $tag->span;
	$tag->div;
$tag->div;

$tag->div(['class'=>'col-md-12', 'id'=>'marcador_content']);
	$tag->div(['class'=>'row']);
	$tag->div;	
$tag->div;
