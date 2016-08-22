<?php
$tipos_de_aventura = [
		ADVENTURE_TYPE_MEDIVEL => MEDIVEL_ADVENTURES_LABEL,
		ADVENTURE_TYPE_STAR_WAR => STAR_WAR_ADVENTURES_LABEL,
		ADVENTURE_TYPE_APOCALIPSE => APOCALIPSE_ADVENTURES_LABEL,
		];
$tag->br();
$tag->div(['class'=>'row']);
	$tag->div(['class'=>'col-md-8']);
	    $tag->select('class="selectpicker margin" data-show-subtext="true" data-live-search="true" id="select"');
	        foreach($tipos_de_aventura as $key => $value):
	            $tag->option('data-subtext="'.ADVENTURE_TYPE.$value.'" value="'.$key.'" title="'.$key.'"');
	                $tag->printer($value);
	            $tag->option;		
	        endforeach;
	    $tag->select;
	
	    $tag->span(['class'=>'help-inline']);
	        $tag->input(['class'=>'btn btn-success margin', 'type'=>'button', 'title'=> ADVENTURE_GENERATION, 'value'=> ADVENTURE_GENERATION, 'onclick'=>'rand_aventuras();']);
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

	        $id = [
	        	['aventura-titulo-objetivo', 'aventura-conteudo-objetivo'],
	        	['aventura-titulo-local', 'aventura-conteudo-local'],
	        	['aventura-titulo-antagonista', 'aventura-conteudo-antagonista'],
	        	['aventura-titulo-coadjuvante', 'aventura-conteudo-coadjuvante'],
	        	['aventura-titulo-complicaco', 'aventura-conteudo-complicaco'],
	        	['aventura-titulo-recompensa', 'aventura-conteudo-recompensa'],
	        ];
	        for($i=0; $i<count($id); $i++):
	        	$tag->div(['class'=>'col-md-6']);
		            $tag->div('class="bs-callout bs-callout-danger" id="callout-btndropdown-dependency"'); 
			            $tag->h4('id="'.$id[$i][0].'"');
			            $tag->h4; 
			            $tag->p('id="'.$id[$i][1].'"');
			            $tag->p; 
		            $tag->div;
	        	$tag->div;
	        endfor;
            
	    $tag->div;
	$tag->div;
$tag->div;

$tag->hr();