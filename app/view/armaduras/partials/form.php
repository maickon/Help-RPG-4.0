<?php

$tag->div('class="col-sm-4"');
	$tag->p();
        $tag->b();
        	$tag->printer($language->ARMOR_NAME_LABEL);
        $tag->b;
    $tag->p;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');
        	$tag->input('type="hidden" name="dono" value="'.$_SESSION['login'].'" required aria-required="true"');
            $tag->input('type="hidden" name="lingua" value="'.$_SESSION['lingua'].'" required aria-required="true"');
        	$tag->input('type="hidden" name="id" value="'.$armaduras->id.'" required aria-required="true"');
            $tag->input('type="text" name="nome" value="'.$armaduras->nome.'" required aria-required="true" class="form-control" placeholder="'.$language->ARMOR_NAME_PLACEHOLDER.'"');
        $tag->div;
    $tag->div;
$tag->div;

$tag->div('class="col-sm-4"');
	$tag->p();
        $tag->b();
        	$tag->printer($language->ARMOR_CATEGORY);
        $tag->b;
    $tag->p;
    $tag->select('class="form-control show-tick" name="categoria" data-live-search="true" id="lista"');
    	foreach ($armaduras_helper->categorias as $key => $value) {
            if ($value == $armaduras->categoria) {
	            $tag->option('selected');
	            	$tag->printer($value);
	            $tag->option;
    		} else {
	            $tag->option();
	            	$tag->printer($value);
	            $tag->option; 
    		}
    	}
    $tag->select;
$tag->div;

$tag->div('class="col-md-4"');
	$tag->p();
        $tag->b();
        	$tag->printer($language->ARMOR_RPG_SYSTEM);
        $tag->b;
    $tag->p;
    $tag->select('class="form-control show-tick" name="sistema" data-live-search="true" id="lista"');
    	foreach ($sistemas_helper->rpg_nomes as $key => $value) {
    		if ($value == $armaduras->sistema) {
	            $tag->option('selected');
	            	$tag->printer($value);
	            $tag->option;
    		} else {
	            $tag->option();
	            	$tag->printer($value);
	            $tag->option; 
    		}
    	}
    $tag->select;
$tag->div;

$tag->div('class="col-sm-12"');
	$tag->p();
        $tag->b();
        	$tag->printer($language->ARMOR_DESCRIPTION);
        $tag->b;
    $tag->p;
    $tag->div('class="form-group"');
        $tag->div('class="form-line"');	
        	$tag->textarea('id="ckeditor" name="descricao"');
        		$tag->printer($armaduras->descricao);
        	$tag->textarea;
		$tag->div;
	$tag->div;
$tag->div;