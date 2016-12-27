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

	$tag->input(\'type="hidden" name="dono" value="\'.$_SESSION[\'login\'].\'" required aria-required="true"\');
    $tag->input(\'type="hidden" name="lingua" value="\'.$_SESSION[\'lingua\'].\'" required aria-required="true"\');
	$tag->input(\'type="hidden" name="id" value="\'.$'.$file_name.'->id.\'" required aria-required="true"\');';

		$atributes_list = array();
		$atribute_select = null;
		$array = null;

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
				$atributes_list[] = [$atribute_select, $atribute[1]];
			} else {
				$atributes_list[] = [$atribute[0],$atribute[1]];
			}
		}

		foreach ($atributes_list as $value) {
			if ($value[1] == 'text') {
				$code_form .= '
	$tag->div(\'class="col-sm-4"\');
		$tag->p();
	        $tag->b();
	        	$tag->printer(\''.$value[0].'\');
	        $tag->b;
	    $tag->p;
	    $tag->div(\'class="form-group"\');
	        $tag->div(\'class="form-line"\');
	        	$tag->input(\'type="text" name="'.$value[0].'" value="\'.$'.$file_name.'->'.$value[0].'.\'" required aria-required="true" class="form-control" placeholder=""\');
			$tag->div;
		$tag->div;
	$tag->div;';
			} elseif ($value[1] == 'select') {
				$code_form .= $array;
				$code_form .= '

	$tag->div(\'class="col-md-4"\');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->ARMOR_RPG_SYSTEM);
	        $tag->b;
	    $tag->p;

	    //$sistemas_helper->rpg_nomes

	    $tag->select(\'class="form-control show-tick" name="'.$atribute_select.'" data-live-search="true" id="lista"\');
	    	foreach ($selects as $key => $value) {
	    		if (trim($value) == $'.$file_name.'->'.$atribute_select.') {
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
	$tag->div;';
			} elseif ($value[1] == 'textarea') {
				$code_form .= '
	$tag->div(\'class="col-sm-12"\');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->WEAPON_DESCRIPTION);
	        $tag->b;
	    $tag->p;
	    $tag->div(\'class="form-group"\');
	        $tag->div(\'class="form-line"\');
	        	$tag->textarea(\'id="ckeditor" name="'.$value[0].'"\');
	        		$tag->printer($'.$file_name.'->'.$value[0].');
	        	$tag->textarea;
			$tag->div;
		$tag->div;
	$tag->div;
	';
			}
		}



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
		                            $tag->printer($language->BUTTON_SUBSCRIBE);
		                        $tag->a;
		                    $tag->div;
		                    $tag->div(\'class="body"\');
		                        $tag->table(\'class="table table-bordered table-striped table-hover dataTable js-exportable"\');
		                            $tag->thead();
		                                $tag->tr();
		                                $form->th(\'ID\');
		                                $form->th(\'Dono\');';

		                                foreach ($atributes as $key => $value) {
											$atribute = explode(':', $value);
											if (strpos($atribute[0], '-')) {
												$select = explode('-',$atribute[0]);
												$atribute[0] = $select[0];
											}

	                    					$code_index .= '
		                                    $form->th(\''.$atribute[0].'\');';
		                            	}
		                            $code_index .= '
		                            	$form->th($language->SITE_ACTION);
		                                $tag->tr;
		                            $tag->thead;';

		                            $code_index .= '
		                            $tag->tbody();
		                                foreach ($'.$file_name.' as $key => $value) {
		                                    $tag->tr();
		                                    	$form->th($value->id);
		                                    	$form->th($value->dono);';
		                                    foreach ($atributes as $key => $value) {
												$atribute = explode(':', $value);
												if (strpos($atribute[0], '-')) {
													$select = explode('-',$atribute[0]);
													$atribute[0] = $select[0];
												}

												if ($atribute[0] == 'nome') {
													$code_index .= '
												$form->th("<a href=\"".URL_BASE."'.$file_name.'/visualizar/{$value->id}\">{$value->'.$atribute[0].'}</a>");';
												} else if ($atribute[0] == 'descricao') {
													$code_index .= '
												$text = $limit_text->limitar_texto(strip_tags($value->'.$atribute[0].'), 128);
												$form->th($text);';
												} else {
													$code_index .= '
												$form->th($value->'.$atribute[0].');';
												}
											}

		                                    $code_index .= '
		                                        if ($value->dono == $_SESSION[\'login\']) {
		                                            $tag->th(\'class="btns-del-edit"\');
		                                                $tag->div(\'class="icon-button-demo js-modal-buttons"\');
		                                                    $tag->button(\'data-color="red" class="icon-button-demo btn bg-red btn-xs waves-effect"\');
		                                                        $tag->i(\'class="material-icons" onclick="deletar_url(\'\'.URL_BASE.\''.$file_name.'/deletar/\'.$value->id.\'\')"\');
		                                                            $tag->printer(\'delete\');
		                                                        $tag->i;
		                                                    $tag->button;
		                                                $tag->div;
		                                                $tag->div(\'class="icon-button-demo"\');
		                                                    $tag->a(\'href="\'.URL_BASE.\''.$file_name.'/editar/\'.$value->id.\'"\');
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
		                                                $tag->a(\'href="\'.URL_BASE.\''.$file_name.'/visualizar/\'.$value->id.\'" \');
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
	                $tag->a(\'href="#" target="blank" id="delete_url" class="btn btn-link waves-effect"\');
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
	                            $tag->li(\'class="dropdown open"\');
	                                $tag->a(\'href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"\');
		                                $tag->printer(\'<i class="material-icons">more_vert</i>\');
		                            $tag->a;
		                            $tag->ul(\'class="dropdown-menu pull-right"\');
		                                $tag->printer(\'<li><a href="javascript:window.history.go(-1)" class=" waves-effect waves-block">\'.$language->BUTTON_BACK.\'</a></li>\');
		                                $tag->printer(\'<li><a href="\'.URL_BASE.\''.$file_name.'" class=" waves-effect waves-block">\'.$language->MENU_HOME.\'</a></li>\');
		                                $tag->printer(\'<li><a href="\'.URL_BASE.\''.$file_name.'/novo" class=" waves-effect waves-block">\'.$language->BUTTON_SUBSCRIBE.\'</a></li>\');
		                            $tag->ul;
	                            $tag->li;
	                        $tag->ul;
	                    $tag->div;

	                    $tag->div(\'class="body"\');
	                    	$tag->div(\'class="row clearfix"\');
	                    		$tag->form(\'method="post" action="\'.$this->atualizar_path.\'"\');

	                    			require \'partials/form.php\';

		                        	$tag->div(\'class="col-sm-12"\');
				                        $tag->input(\'type="submit" class="btn btn-primary waves-effect" name="submit" value="\'.$language->BUTTON_SAVE_UPDATE.\'"\');
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
	                            $tag->li(\'class="dropdown open"\');
	                                $tag->a(\'href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"\');
		                                $tag->printer(\'<i class="material-icons">more_vert</i>\');
		                            $tag->a;
		                            $tag->ul(\'class="dropdown-menu pull-right"\');
		                                $tag->printer(\'<li><a href="javascript:window.history.go(-1)" class=" waves-effect waves-block">\'.$language->BUTTON_BACK.\'</a></li>\');
		                                $tag->printer(\'<li><a href="\'.URL_BASE.\''.$file_name.'" class=" waves-effect waves-block">\'.$language->MENU_HOME.\'</a></li>\');
		                                $tag->printer(\'<li><a href="\'.URL_BASE.\'utilitarios" class=" waves-effect waves-block">\'.$language->MENU_UTILITIES.\'</a></li>\');
		                            $tag->ul;
	                            $tag->li;
	                        $tag->ul;
	                    $tag->div;

	                    $tag->div(\'class="body"\');
	                    	$tag->div(\'class="row clearfix"\');
	                    		$tag->form(\'method="post" action="\'.$this->salvar_path.\'"\');

	                    			require \'partials/form.php\';

		                        	$tag->div(\'class="col-sm-12"\');
				                        $tag->input(\'type="submit" class="btn btn-primary waves-effect" name="submit" value="\'.$language->BUTTON_SAVE.\'"\');
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
	                    	$tag->ul(\'class="header-dropdown m-r--5"\');
	                            $tag->li(\'class="dropdown open"\');
	                                $tag->a(\'href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"\');
		                                $tag->printer(\'<i class="material-icons">more_vert</i>\');
		                            $tag->a;
		                            $tag->ul(\'class="dropdown-menu pull-right"\');
		                                $tag->printer(\'<li><a href="javascript:window.history.go(-1)" class=" waves-effect waves-block">\'.$language->BUTTON_BACK.\'</a></li>\');
		                                $tag->printer(\'<li><a href="\'.URL_BASE.\''.$file_name.'" class=" waves-effect waves-block">\'.$language->MENU_HOME.\'</a></li>\');
		                                $tag->printer(\'<li><a href="\'.URL_BASE.\''.$file_name.'/novo" class=" waves-effect waves-block">\'.$language->BUTTON_SUBSCRIBE.\'</a></li>\');
		                                 if ($_SESSION[\'nome\'] == $'.$file_name.'_view->usuario_nome) {
		                                	$tag->printer(\'<li><a href="\'.URL_BASE.\''.$file_name.'/editar/\'.$'.$file_name.'_view->id.\'" class=" waves-effect waves-block">\'.$language->BUTTON_UPDATE.\'</a></li>\');
				    	                }
		                            $tag->ul;
	                            $tag->li;
	                        $tag->ul;
	                    	$tag->h2();
				                $tag->printer("
				                		<span class=\"font-bold col-blue\">{$'.$file_name.'_view->nome}</span>
				                		{$language->SITE_SUBSCRIBE_BY}
				                		<span class=\"font-bold col-blue\">
				                			<a onmouseover=\"display_profile();\" onmouseout=\"hide_profile();\" href=\"".URL_BASE."usuario/profile/{$'.$file_name.'_view->usuario_id}\" target=\"_blank\">
				                				{$'.$file_name.'_view->usuario_nome}
				                			</a>
				                		</span>");
				            $tag->h2;
	                    $tag->div;

	                    $tag->div(\'id="display_profile_box" style="display:none"\');
	                    	$tag->div(\'class="row clearfix"\');
					            $tag->div(\'class="col-lg-12 col-md-12 col-sm-12 col-xs-12"\');
					                $tag->div(\'class="card"\');
					                    $tag->div(\'class="body"\');
					                    	$tag->div(\'class="row clearfix"\');
						                    	$tag->div(\'class="col-md-2"\');
		                    						$tag->img(\'src="\'.$'.$file_name.'_view->foto_link.\'" class="img-responsive thumbnail"\');
						                    	$tag->div;
						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_NAME}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'_view->usuario_nome}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_COUNTRY}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'_view->pais}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_XP}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'_view->xp}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_LEVEL}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'_view->nivel}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-3"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_STARS}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'_view->estrelas}");
						                    	$tag->div;

						                    	$tag->div(\'class="col-md-10"\');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_ABOUT} {$'.$file_name.'_view->usuario_nome}");
						                    		$tag->b;
						                    		$tag->printer("{$'.$file_name.'_view->usuario_descricao}");
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
		                                    	$tag->printer(\''.$atribute[0].'\');
		                                    $tag->b;
		                                $tag->p;
		                                $tag->div(\'class="form-group"\');
		                                    $tag->div(\'class="form-line"\');
				                                $tag->printer($'.$file_name.'_view->'.$atribute[0].');
		                                    $tag->div;
		                                $tag->div;
		                            $tag->div;';
		                        }
		                        $code_view .= '
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