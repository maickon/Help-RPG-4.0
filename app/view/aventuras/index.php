
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina index da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

	$tag->section('class="content"');

    	$tag->div('class="col-lg-12"');
        	$tag->div('class="row clearfix"');
            	$tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                	$tag->div('class="card"');
                		$tag->div('class="card"');
		                    $tag->div('class="header"');
		                        $tag->a('href="'.$this->novo_path.'" class="btn btn-primary waves-effect"');
		                            $tag->printer($language->BUTTON_SUBSCRIBE);
		                        $tag->a;
		                    $tag->div;
		                    $tag->div('class="body"');
		                        $tag->table('class="table table-bordered table-striped table-hover dataTable js-exportable"');
		                            $tag->thead();
		                                $tag->tr();
		                                $form->th('ID');
		                                $form->th('Dono');
		                                    $form->th('titulo');
		                                    $form->th('descricao_pequena');
		                                    $form->th('sistema');
		                                    $form->th('descricao');
		                            	$form->th($language->SITE_ACTION);
		                                $tag->tr;
		                            $tag->thead;
		                            $tag->tbody();
		                                foreach ($aventuras as $key => $value) {
		                                    $tag->tr();
		                                    	$form->th($value->id);
		                                    	$form->th($value->dono);
												$form->th($value->titulo);
												$form->th($value->descricao_pequena);
												$form->th($value->sistema);
												$text = $limit_text->limitar_texto(strip_tags($value->descricao), 128);
												$form->th($text);
		                                        if ($value->dono == $_SESSION['login']) {
		                                            $tag->th('class="btns-del-edit"');
		                                                $tag->div('class="icon-button-demo js-modal-buttons"');
		                                                    $tag->button('data-color="red" class="icon-button-demo btn bg-red btn-xs waves-effect"');
		                                                        $tag->i('class="material-icons" onclick="deletar_url(\''.URL_BASE.'aventuras/deletar/'.$value->id.'\')"');
		                                                            $tag->printer('delete');
		                                                        $tag->i;
		                                                    $tag->button;
		                                                $tag->div;
		                                                $tag->div('class="icon-button-demo"');
		                                                    $tag->a('href="'.URL_BASE.'aventuras/editar/'.$value->id.'"');
		                                                        $tag->button('class="btn bg-green btn-xs waves-effect"');
		                                                            $tag->i('class="material-icons"');
		                                                                $tag->printer('edit');
		                                                            $tag->i;
		                                                        $tag->button;
		                                                    $tag->a;
		                                                $tag->div;
		                                            $tag->th;
		                                        } else {
		                                            $tag->th('class="btns-del-edit"');
		                                                $tag->a('href="'.URL_BASE.'aventuras/visualizar/'.$value->id.'" ');
		                                                    $tag->button('class="btn bg-deep-purple btn-xs waves-effect"');
		                                                        $tag->i('class="material-icons"');
		                                                            $tag->printer('pageview');
		                                                        $tag->i;
		                                                    $tag->button;
		                                                $tag->a;
		                                            $tag->th;
		                                        }
		                                    $tag->tr;
		                                }
		                            $tag->tbody;
		                        $tag->table;
		                    $tag->div;
		                $tag->div;
                	$tag->div;
            	$tag->div;
        	$tag->div;
    	$tag->div;

	$tag->section;

	$tag->div('class="modal fade" id="mdModal" tabindex="-1" role="dialog"');
	    $tag->div('class="modal-dialog" role="document"');
	        $tag->div('class="modal-content"');
	            $tag->div('class="modal-header"');
	                $tag->h4('class="modal-title" id="defaultModalLabel"');
	                $tag->h4;
	            $tag->div;
	            $tag->div('class="modal-body"');
	                $tag->printer($language->PANEL_ARE_YOU_SURE_MSG);
	            $tag->div;
	            $tag->div('class="modal-footer"');
	                $tag->a('href="#" target="blank" id="delete_url" class="btn btn-link waves-effect"');
	                     $tag->printer($language->BUTTON_YES);
	                $tag->a;
	                $tag->a('href="#" class="btn btn-link waves-effect" data-dismiss="modal"');
	                     $tag->printer($language->BUTTON_NO);
	                $tag->a;
	            $tag->div;
	        $tag->div;
	    $tag->div;
	$tag->div;

	require 'partials/footer.php';
	