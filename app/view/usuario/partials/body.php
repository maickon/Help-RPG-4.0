<?php
$tag->br();
$tag->div(['class'=>'container']);
	$tag->div(['class'=>'row']); 	
		$tag->br();
		$tag->div('class="col-md-12"');		       
	    	$tag->table('id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"');
	    		// head da tabela
	    		$tag->thead();
	    			$tag->tr();
	    				$ths = ['#ID','Nome','email','Cadastrado','Último login','Ativo'];
	    				foreach ($ths as $key => $value) {
	    					$tag->th();
	    						$tag->printer($value);
	    					$tag->th;
	    				}
	    			$tag->tr;
	    		$tag->thead;

	    		// corpo da tabela
	    		$tag->tbody();
	    			foreach ($usuarios as $key => $value) {
	    				$tag->tr();
    						$form->td($value['id']);
    						$form->td($value['nome']);
    						$form->td($value['email']);
    						$form->td($value['criado_em']);
    						$form->td($value['ultimo_login']);
    						$form->td($value['ativo']);
	    				$tag->tr;
	    			}
	    		$tag->tbody;
	    	$tag->table;	
		$tag->div;	
	$tag->div;
$tag->div;