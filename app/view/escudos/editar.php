
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina editar da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

	$tag->section('class="content"');

	    $tag->div('class="col-lg-12"');
	        $tag->div('class="row clearfix"');
	            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
	                $tag->div('class="card"');
	                    $tag->div('class="header"');
	                    	$tag->h2();
				                $tag->printer($language->TITLE_EDIT);
				            $tag->h2;

				            $tag->ul('class="header-dropdown m-r--5"');
	                            $tag->li('class="dropdown open"');
	                                $tag->a('href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"');
		                                $tag->printer('<i class="material-icons">more_vert</i>');
		                            $tag->a;
		                            $tag->ul('class="dropdown-menu pull-right"');
		                                $tag->printer('<li><a href="javascript:window.history.go(-1)" class=" waves-effect waves-block">'.$language->BUTTON_BACK.'</a></li>');
		                                $tag->printer('<li><a href="'.URL_BASE.'escudos" class=" waves-effect waves-block">'.$language->MENU_HOME.'</a></li>');
		                                $tag->printer('<li><a href="'.URL_BASE.'escudos/novo" class=" waves-effect waves-block">'.$language->BUTTON_SUBSCRIBE.'</a></li>');
		                            $tag->ul;
	                            $tag->li;
	                        $tag->ul;
	                    $tag->div;

	                    $tag->div('class="body"');
	                    	$tag->div('class="row clearfix"');
	                    		$tag->form('method="post" action="'.$this->atualizar_path.'"');

	                    			require 'partials/form.php';

		                        	$tag->div('class="col-sm-12"');
				                        $tag->input('type="submit" class="btn btn-primary waves-effect" name="submit" value="'.$language->BUTTON_SAVE_UPDATE.'"');
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

	