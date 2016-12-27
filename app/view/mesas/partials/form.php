
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina de formulario da visualizacao gerada no automatico

	$tag->input('type="hidden" name="dono" value="'.$_SESSION['login'].'" required aria-required="true"');
    $tag->input('type="hidden" name="lingua" value="'.$_SESSION['lingua'].'" required aria-required="true"');
	$tag->input('type="hidden" name="id" value="'.$mesas->id.'" required aria-required="true"');
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('nome');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="text" name="nome" value="'.$mesas->nome.'" required aria-required="true" class="form-control" placeholder=""');
			$tag->div;
		$tag->div;
	$tag->div;
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('sistema');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="text" name="sistema" value="'.$mesas->sistema.'" required aria-required="true" class="form-control" placeholder=""');
			$tag->div;
		$tag->div;
	$tag->div;
	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer('data_final');
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group demo-masked-input"');
	        $tag->div('class="form-line"');
	        	if (empty($mesas->data_final)) {
	        		$data = '';
	        	} else {
	        		$data = date('d/m/Y',strtotime($mesas->data_final));
	        	}
	        	$tag->input('type="text" name="data_final" onchange="verificar_data(this.value)" value="'.$data.'" required aria-required="true" class="form-control date" placeholder="Ex: 30/07/2016"');
			$tag->div;
			$tag->span('id="data-msg-aviso"');
			$tag->span;
		$tag->div;
	$tag->div;
	$tag->div('class="col-sm-12"');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->WEAPON_DESCRIPTION);
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->textarea('id="ckeditor" name="descricao"');
	        		$tag->printer($mesas->descricao);
	        	$tag->textarea;
			$tag->div;
		$tag->div;
	$tag->div;