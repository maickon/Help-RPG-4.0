<?php
session_start();
if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])) {
    header("Location: " . URL_BASE);
}

require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                    	$tag->h2();
			                $tag->printer($armadura_view->nome);
			            $tag->h2;
                    $tag->div;
                    
                    $tag->div('class="body"');
                    	$tag->div('class="row clearfix"');
                    		$tag->form('method="post" action="'.$this->salvar_path.'"');
	                            $tag->div('class="col-sm-12"');
	                            	$tag->p();
	                                    $tag->b();
	                                    	$tag->printer($language->ARMOR_RPG_SYSTEM);
	                                    $tag->b;
	                                $tag->p;
	                                $tag->div('class="form-group"');
	                                    $tag->div('class="form-line"');
			                                $tag->printer($armadura_view->sistema);
	                                    $tag->div;
	                                $tag->div;
	                            $tag->div;
	                        
	                            $tag->div('class="col-md-12"');
	                            	$tag->p();
	                                    $tag->b();
	                                    	$tag->printer('Descrição');
	                                    $tag->b;
	                                $tag->p;
	                                $tag->div('class="form-group"');
	                                    $tag->div('class="form-line"');
			                                $tag->printer($armadura_view->descricao);
	                                    $tag->div;
	                                $tag->div;
	                            $tag->div;
	                        $tag->form;
	                        $tag->div('class="col-sm-2"');
		                        $tag->a('href="'.URL_BASE.'armaduras/novo" class="btn bg-indigo waves-effect"');
	    	                    	$tag->printer($language->ARMOR_BTN_NEW_ARMOR);
	    	                    $tag->a;
	    	                $tag->div;
	    	                $tag->div('class="col-sm-10"');
		                        $tag->a('href="'.URL_BASE.'armaduras" class="btn bg-deep-purple waves-effect"');
	    	                    	$tag->printer($language->ARMOR_BTN_BACK_TITLE);
	    	                    $tag->a;
	    	                $tag->div;
                        $tag->div;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';