<?php
// viewCreator
// Cria os arquivos base de view automaticamente
// @author Maickon Rangel
// Help RPG - 2016


class viewCreator{

	function __construct($path, $class_name, $atributes, $db_dependence = false){
		$file_name = strtolower($class_name);
		$class_name = ucfirst(strtolower($class_name));

		mkdir("{$path}app/view/{$file_name}/");
		$this->footer_generation($path, $file_name);	
		$this->form_generation($path, $file_name, $atributes);
		$this->index_generation($path, $file_name, $atributes);
		$this->edit_generation($path, $file_name);
		$this->new_generation($path, $file_name);
		$this->view_generation($path, $file_name, $atributes);		
	}

	// Cria o arquivo de footer

	function footer_generation($path, $file_name){
		mkdir("{$path}app/view/{$file_name}/partials");

		$code_footer = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina footer da visualizacao gerada no automatico

	$_JS = [	
				$painel->url->painel_js_path . \'/plugins/jquery/jquery.min.js\',
				$painel->url->painel_js_path . \'/plugins/rateYo/rateYo.js\',
				$painel->url->painel_js_path . \'/plugins/bootstrap/js/bootstrap.js\',
				$painel->url->painel_js_path . \'/plugins/bootstrap-select/js/bootstrap-select.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-slimscroll/jquery.slimscroll.js\',
				$painel->url->painel_js_path . \'/plugins/bootstrap-notify/bootstrap-notify.js\',
				$painel->url->painel_js_path . \'/plugins/node-waves/waves.js\',
				$painel->url->painel_js_path . \'/plugins/tinymce/tinymce.js\',
				$painel->url->painel_js_path . \'/plugins/ckeditor/ckeditor.js\',
				
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/jquery.dataTables.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/buttons.flash.min.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/jszip.min.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/pdfmake.min.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/vfs_fonts.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/buttons.html5.min.js\',
				$painel->url->painel_js_path . \'/plugins/jquery-datatable/extensions/export/buttons.print.min.js\',
				$painel->url->painel_js_path . \'/admin.js\',
				$painel->url->painel_js_path . \'/modals.js\',
				$painel->url->painel_js_path . \'/plugins/tables/jquery-datatable.js\',
				$painel->url->painel_js_path . \'/editors.js\',
				$painel->url->painel_js_path . \'/demo.js\',
				$painel->url->painel_js_path . \'/index.js\',
				];
		foreach ($_JS as $key => $value) {
		    $tag->script(\'src="\' . $value . \'" rel="stylesheet"\'); 
		    $tag->script;
		}

		';

		file_put_contents("{$path}app/view/{$file_name}/partials/footer.php", $code_footer);
	}

	function form_generation($path, $file_name, $atributes){
		$translate_text = 'SITE_TITLE_LABEL';

		$code_form = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina de formulario da visualizacao gerada no automatico

	$tag->div(\'class="col-sm-4"\');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->$'.$translate_text.');
	        $tag->b;
	    $tag->p;
	    $tag->div(\'class="form-group"\');
	        $tag->div(\'class="form-line"\');
	        	$tag->input(\'type="hidden" name="dono" value="\'.$_SESSION[\'login\'].\'" required aria-required="true"\');
	            $tag->input(\'type="hidden" name="lingua" value="\'.$_SESSION[\'lingua\'].\'" required aria-required="true"\');
	        	$tag->input(\'type="hidden" name="id" value="\'.$'.$file_name.'->id.\'" required aria-required="true"\');
	        	';
	            foreach ($atributes as $key => $value) {
					$atribute = explode(':', $value);
					if (strpos($atribute[0], '-')) {
						$select = explode('-',$atribute[0]);
						$atribute_select = $select[0];
						unset($select[0]);
						$array = '$selects = [';
						foreach ($select as $key => $value) {
							if (count($select) == $key) {
								$array .= '\''.$value.'\'];';
							} else {
								$array .= '\''.$value.'\',';	
							}
						}
					$code_form .= '
				'.$array.'


				$tag->div(\'class="col-sm-4"\');
					$tag->p();
				        $tag->b();
				        	$tag->printer($language->$'.$translate_text.');
				        $tag->b;
				    $tag->p;
				    $tag->select(\'class="form-control show-tick" name="'.$atribute[0].'" data-live-search="true" id="'.$atribute[0].'"\');
				    	foreach ($selects as $key => $value) {
				            if ($value == $'.$file_name.'->$'.$atribute_select.') {
					            $tag->option(\'selected\');
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

				';
					} elseif ($atribute[1] == 'textarea') {
					$code_form .=

				'$tag->div(\'class="col-sm-12"\');
					$tag->p();
				        $tag->b();
				        	$tag->printer($language->$'.$translate_text.');
				        $tag->b;
				    $tag->p;
				    $tag->div(\'class="form-group"\');
				        $tag->div(\'class="form-line"\');	
				        	$tag->textarea(\'id="ckeditor" name="'.$atribute[0].'"\');
				        		$tag->printer($'.$file_name.'->'.$atribute[0].');
				        	$tag->textarea;
						$tag->div;
					$tag->div;
				$tag->div;

				';
					} else {
					$code_form .= 

				'$tag->input(\'type="'.$atribute[1].'" name="'.$atribute[0].'" value="\'.$'.$file_name.'->'.$atribute[0].'.\'" required aria-required="true" class="form-control" placeholder="\'.$language->'.$translate_text.'.\'"\');
				
				';	
					}
				}
	        		$code_form .= 

			'$tag->div;
		$tag->div;
	$tag->div;
	';

		file_put_contents("{$path}app/view/{$file_name}/partials/form.php", $code_form);
	}

	// Gera o codigo da pagina index

	function index_generation($path, $file_name, $atributes){
		$translate_text = 'SITE_TITLE_LABEL';
		$code_index = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina index da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.\'app/view/painel/partials/home_page.php\';

	$tag->section(\'class="content"\');

    	$tag->div(\'class="col-lg-12"\');
        	$tag->div(\'class="row clearfix"\');
            	$tag->div(\'class="col-lg-12 col-md-12 col-sm-12 col-xs-12"\');
                	$tag->div(\'class="card"\');
                		$tag->div(\'class="card"\');
		                    $tag->div(\'class="header"\');
		                        $tag->a(\'href="\'.$this->novo_path.\'" class="btn btn-primary waves-effect"\');
		                            $tag->printer($language->'.$translate_text.');
		                        $tag->a;
		                    $tag->div;
		                    $tag->div(\'class="body"\');
		                        $tag->table(\'class="table table-bordered table-striped table-hover dataTable js-exportable"\');
		                            $tag->thead();
		                                $tag->tr();';
		                                $atribute_field = '
		                                	$atributes = [';
		                                
		                                foreach ($atributes as $key => $value) {
											$atribute = explode(':', $value);
											if (strpos($atribute[0], '-')) {
												$select = explode('-',$atribute[0]);
												$atribute[0] = $select[0];
											}
											if ((count($atribute) -1) == $key) {
												$atribute_field .= '\''.$file_name.'->'.$atribute[0].'\'];';
											} else {
												$atribute_field .= '\''.$file_name.'->'.$atribute[0].'\',';
											}

	                    					$code_index .= '
		                                    $form->th('.$atribute[0].');';
		                            	}
		                            $code_index .= '
		                                $tag->tr;
		                            $tag->thead;';

		                            $code_index .= $atribute_field;

		                            $code_index .= '
		                            $tag->tbody();
		                                foreach ($atributes as $key => $value) {
		                                    $tag->tr();';
		                                    foreach ($atributes as $key => $value) {
												$atribute = explode(':', $value);
												if (strpos($atribute[0], '-')) {
													$select = explode('-',$atribute[0]);
													$atribute[0] = $select[0];
												}

												if ($atribute[0] == 'nome') {
													$code_index .= '
												$form->th("<a href=\"".URL_BASE."'.$file_name.'/visualizar/{$'.$file_name.'->id}\">{$'.$file_name.'->'.$atribute[0].'}</a>");';
												} else {
													$code_index .= '
													$form->th($'.$file_name.'->'.$atribute[0].');';
												}
											}

		                                    $code_index .= '
		                                        if ($'.$file_name.'->dono == $_SESSION[\'login\']) {
		                                            $tag->th(\'class="btns-del-edit"\');
		                                                $tag->div(\'class="icon-button-demo js-modal-buttons btn-del"\');
		                                                    $tag->button(\'data-color="red" class="icon-button-demo btn bg-red btn-xs waves-effect"\');
		                                                        $tag->i(\'class="material-icons"\');
		                                                            $tag->printer(\'delete\');
		                                                        $tag->i;
		                                                    $tag->button;
		                                                $tag->div;
		                                                $tag->div(\'class="icon-button-demo btn-edit"\');
		                                                    $tag->a(\'href="\'.URL_BASE.\''.$file_name.'/editar/\'.$'.$file_name.'->id.\'"\');
		                                                        $tag->button(\'class="btn bg-green btn-xs waves-effect"\');
		                                                            $tag->i(\'class="material-icons"\');
		                                                                $tag->printer(\'edit\');
		                                                            $tag->i;
		                                                        $tag->button;
		                                                    $tag->a;
		                                                $tag->div;
		                                            $tag->th; 
		                                        } else {
		                                            $tag->th(\'class="btns-del-edit"\');
		                                                $tag->a(\'href="\'.URL_BASE.\''.$file_name.'/visualizar/\'.$'.$file_name.'->id.\'" target="_blank"\');
		                                                    $tag->button(\'class="btn bg-deep-purple btn-xs waves-effect"\');
		                                                        $tag->i(\'class="material-icons"\');
		                                                            $tag->printer(\'pageview\');
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

	$tag->div(\'class="modal fade" id="mdModal" tabindex="-1" role="dialog"\');
	    $tag->div(\'class="modal-dialog" role="document"\');
	        $tag->div(\'class="modal-content"\');
	            $tag->div(\'class="modal-header"\');
	                $tag->h4(\'class="modal-title" id="defaultModalLabel"\');
	                $tag->h4;
	            $tag->div;
	            $tag->div(\'class="modal-body"\');
	                $tag->printer($language->PANEL_ARE_YOU_SURE_MSG);
	            $tag->div;
	            $tag->div(\'class="modal-footer"\');
	                $tag->a(\'href="#" target="blank" class="btn btn-link waves-effect"\');
	                     $tag->printer($language->BUTTON_YES);
	                $tag->a;
	                $tag->a(\'href="#" class="btn btn-link waves-effect" data-dismiss="modal"\');
	                     $tag->printer($language->BUTTON_NO);
	                $tag->a;
	            $tag->div;
	        $tag->div;
	    $tag->div;
	$tag->div;

	require \'partials/footer.php\';
	';

		file_put_contents("{$path}app/view/{$file_name}/index.php", $code_index);

	}

	function edit_generation($path, $file_name){
				$code_edit = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina editar da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.\'app/view/painel/partials/home_page.php\';

	 $tag->section(\'class="content"\');

	    $tag->div(\'class="col-lg-12"\');
	        $tag->div(\'class="row clearfix"\');
	            $tag->div(\'class="col-lg-12 col-md-12 col-sm-12 col-xs-12"\');
	                $tag->div(\'class="card"\');
	                    $tag->div(\'class="header"\');
	                    	$tag->h2();
				                $tag->printer($language->TITLE_EDIT);
				            $tag->h2;

				            $tag->ul(\'class="header-dropdown m-r--5"\');
	                            $tag->li(\'class="dropdown"\');
	                                $tag->a(\'href="javascript:window.history.go(-1)" role="button" title="\'.$language->BTN_BACK_TITLE_HERE.\'" aria-haspopup="true" aria-expanded="false"\');
	                                    $tag->i(\'class="material-icons"\');
	                                    	$tag->printer(\'keyboard_return\');
	                                    $tag->i;
	                                $tag->a;
	                            $tag->li;
	                        $tag->ul;
	                    $tag->div;
	                    
	                    $tag->div(\'class="body"\');
	                    	$tag->div(\'class="row clearfix"\');
	                    		$tag->form(\'method="post" action="\'.$this->atualizar_path.\'"\');
		                            
	                    			require \'partials/form.php\';

		                        	$tag->div(\'class="col-sm-12"\');
				                        $tag->input(\'type="submit" class="btn btn-primary waves-effect" name="submit" value="\'.$language->BTN_EDIT_HERE.\'"\');
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

	require \'partials/footer.php\';

	';
		file_put_contents("{$path}app/view/{$file_name}/editar.php", $code_edit);
	}


	function new_generation($path, $file_name){
		$code_new = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina editar da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.\'app/view/painel/partials/home_page.php\';

	 $tag->section(\'class="content"\');

	    $tag->div(\'class="col-lg-12"\');
	        $tag->div(\'class="row clearfix"\');
	            $tag->div(\'class="col-lg-12 col-md-12 col-sm-12 col-xs-12"\');
	                $tag->div(\'class="card"\');
	                    $tag->div(\'class="header"\');
	                    	$tag->h2();
				                $tag->printer($language->TITLE_REGISTER);
				            $tag->h2;

				            $tag->ul(\'class="header-dropdown m-r--5"\');
	                            $tag->li(\'class="dropdown"\');
	                                $tag->a(\'href="javascript:history.go(-1)" role="button" title="\'.$language->BTN_BACK_TITLE_HERE.\'" aria-haspopup="true" aria-expanded="false"\');
	                                    $tag->i(\'class="material-icons"\');
	                                    	$tag->printer(\'keyboard_return\');
	                                    $tag->i;
	                                $tag->a;
	                            $tag->li;
	                        $tag->ul;
	                    $tag->div;
	                    
	                    $tag->div(\'class="body"\');
	                    	$tag->div(\'class="row clearfix"\');
	                    		$tag->form(\'method="post" action="\'.$this->salvar_path.\'"\');
		                            
	                    			require \'partials/form.php\';

		                        	$tag->div(\'class="col-sm-12"\');
				                        $tag->input(\'type="submit" class="btn btn-primary waves-effect" name="submit" value="\'.$language->BTN_NEW_HERE.\'"\');
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

	require \'partials/footer.php\';

		';
		file_put_contents("{$path}app/view/{$file_name}/novo.php", $code_new);
	}

	function view_generation($path, $file_name, $atributes){
		$translate_text = 'SITE_TITLE_LABEL';
		$code_view = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina visualizar da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.\'app/view/painel/partials/home_page.php\';

	$tag->section(\'class="content"\');

		$tag->div(\'class="col-lg-12"\');
	        $tag->div(\'class="row clearfix"\');
	            $tag->div(\'class="col-lg-12 col-md-12 col-sm-12 col-xs-12"\');

	            	$tag->div(\'class="card"\');
	                    $tag->div(\'class="header"\');
	                    	$tag->h2();
				                $tag->printer("
				                		<span class=\"font-bold col-blue\">{$'.$file_name.'->nome}</span> 
				                		{$language->'.$translate_text.'} 
				                		<span class=\"font-bold col-blue\">
				                			<a onmouseover=\"display_profile();\" onmouseout=\"hide_profile();\" href=\"".URL_BASE."usuario/profile/{$'.$file_name.'->usuario_id}\" target=\"_blank\">
				                				{$'.$file_name.'->usuario_nome}
				                			</a>
				                		</span>");
				            $tag->h2;

				            // $tag->div(\'id="rateyo"\');
				         
				            // $tag->div;
	                    $tag->div;
	                 
	                    $tag->div(\'id="display_profile_box" style="display:none"\');
	                    	$tag->div(\'class="row clearfix"\');
					            $tag->div(\'class="col-lg-12 col-md-12 col-sm-12 col-xs-12"\');
					                $tag->div(\'class="card"\');
					                    $tag->div(\'class="body"\');
					                    	$tag->div(\'class="row clearfix"\');
						                    	$tag->div(\'class="col-md-2"\');
		                    						$tag->img(\'src="\'.$'.$file_name.'->foto_link.\'" class="img-responsive thumbnail"\');
						                    	$tag->div;
						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_NAME}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'->usuario_nome}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_COUNTRY}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'->pais}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_XP}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'->xp}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_LEVEL}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'->nivel}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_STARS}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'->estrelas}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-10"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_ABOUT} {$'.$file_name.'->usuario_nome}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'->usuario_descricao}");
						                    	$tag->div;
						                    	
					                    	$tag->div;
					                    $tag->div;
					    			$tag->div;
					    		$tag->div;
					    	$tag->div;
	                    $tag->div;

	                    $tag->div(\'class="body"\');
	                    	$tag->div(\'class="row clearfix"\');';
	                    		foreach ($atributes as $key => $value) {
									$atribute = explode(':', $value);
									if (strpos($atribute[0], '-')) {
										$select = explode('-',$atribute[0]);
										$atribute[0] = $select[0];
									}


	                    			$code_view .= '
		                            $tag->div(\'class="col-sm-12"\');
		                            	$tag->p();
		                                    $tag->b();
		                                    	$tag->printer($language->'.$translate_text.');
		                                    $tag->b;
		                                $tag->p;
		                                $tag->div(\'class="form-group"\');
		                                    $tag->div(\'class="form-line"\');
				                                $tag->printer($'.$file_name.'->'.$atribute[0].');
		                                    $tag->div;
		                                $tag->div;
		                            $tag->div;';
		                        }

		                            	$code_view .= '
		                        $tag->div(\'class="col-sm-2"\');
			                        $tag->a(\'href="\'.URL_BASE.\'armaduras/novo" class="btn bg-indigo waves-effect"\');
		    	                    	$tag->printer($language->'.$translate_text.');
		    	                    $tag->a;
		    	                $tag->div;
		    	               
		    	                if ($_SESSION[\'nome\'] == $'.$file_name.'->usuario_nome) {
			    	                $tag->div(\'class="col-sm-2"\');
				                        $tag->a(\'href="'.URL_BASE.'armaduras/editar/\'.$'.$file_name.'->id.\'" class="btn bg-indigo waves-effect"\');
			    	                    	$tag->printer($language->'.$translate_text.');
			    	                    $tag->a;
			    	                $tag->div;
		    	                }

		    	                $tag->div(\'class="col-sm-2"\');
			                        $tag->a(\'href="\'.URL_BASE.\'armaduras" class="btn bg-deep-purple waves-effect"\');
		    	                    	$tag->printer($language->'.$translate_text.');
		    	                    $tag->a;
		    	                $tag->div;

	                        $tag->div;

	                        //comentario disqus
		    	            $comments->disqus_comment();
	                    $tag->div;
	                $tag->div;

	            $tag->div;
            $tag->div;
        $tag->div;

    $tag->section;

    require \'partials/footer.php\';
	';
		file_put_contents("{$path}app/view/{$file_name}/visualizar.php", $code_view);
	}


}