<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');

        $tag->div('class="block-header"');
            $tag->h2();
                $tag->printer('ARMADURA');
            $tag->h2;
        $tag->div;

        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                    	$tag->h2();
			                $tag->printer('CADASTRAR');
			            $tag->h2;
                    $tag->div;
                    
                    $tag->div('class="body"');
                    	$tag->div('class="row clearfix"');
                    		$tag->form('method="post" action="'.$this->salvar_path.'"');
	                            $tag->div('class="col-sm-4"');
	                            	$tag->p();
	                                    $tag->b();
	                                    	$tag->printer('Nome');
	                                    $tag->b;
	                                $tag->p;
	                                $tag->div('class="form-group"');
	                                    $tag->div('class="form-line"');
	                                        $tag->input('type="text" name="nome" required aria-required="true" class="form-control" placeholder="Nome da armadura"');
	                                    $tag->div;
	                                $tag->div;
	                            $tag->div;

	                            $tag->div('class="col-sm-4"');
	                            	$tag->p();
	                                    $tag->b();
	                                    	$tag->printer('Categoria');
	                                    $tag->b;
	                                $tag->p;
	                                $tag->select('class="form-control show-tick" name="categoria" data-live-search="true" id="lista"');
	                                	foreach ($armaduras_helper->categorias as $key => $value) {
		                                    $tag->option();
		                                    	$tag->printer($value);
		                                    $tag->option;
	                                	}
	                                $tag->select;
	                            $tag->div;
	                        
	                            $tag->div('class="col-md-4"');
	                            	$tag->p();
	                                    $tag->b();
	                                    	$tag->printer('Sistema de RPG');
	                                    $tag->b;
	                                $tag->p;
	                                $tag->select('class="form-control show-tick" name="sistema" data-live-search="true" id="lista"');
	                                	foreach ($sistemas_helper->rpg_nomes as $key => $value) {
		                                    $tag->option();
		                                    	$tag->printer($value);
		                                    $tag->option;
	                                	}
	                                $tag->select;
	                            $tag->div;

	                            $tag->div('class="col-sm-12"');
	                            	$tag->p();
	                                    $tag->b();
	                                    	$tag->printer('Descrição');
	                                    $tag->b;
	                                $tag->p;
	                                $tag->div('class="form-group"');
	                                    $tag->div('class="form-line"');	
	                                    	$tag->textarea('id="ckeditor" name="descricao"');
	                                    	$tag->textarea;
	                        			$tag->div;
	                        		$tag->div;
	                        	$tag->div;

	                        	$tag->div('class="col-sm-12"');
			                        $tag->input('type="submit" class="btn btn-primary waves-effect" name="submit" value="NOVA ARMADURA"');
		    	                    $tag->input;
		    	                $tag->div;
	                        $tag->form;
                        $tag->div;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';