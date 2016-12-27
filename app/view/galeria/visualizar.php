
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina visualizar da visualizacao gerada no automatico

	require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

	$tag->section('class="content"');

		$tag->div('class="col-lg-12"');
	        $tag->div('class="row clearfix"');
	            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');

	            	$tag->div('class="card"');
	                    $tag->div('class="header"');
	                    	$tag->ul('class="header-dropdown m-r--5"');
	                            $tag->li('class="dropdown open"');
	                                $tag->a('href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"');
		                                $tag->printer('<i class="material-icons">more_vert</i>');
		                            $tag->a;
		                            $tag->ul('class="dropdown-menu pull-right"');
		                                $tag->printer('<li><a href="javascript:window.history.go(-1)" class=" waves-effect waves-block">'.$language->BUTTON_BACK.'</a></li>');
		                                $tag->printer('<li><a href="'.URL_BASE.'galeria" class=" waves-effect waves-block">'.$language->MENU_HOME.'</a></li>');
		                                $tag->printer('<li><a href="'.URL_BASE.'galeria/novo" class=" waves-effect waves-block">'.$language->BUTTON_SUBSCRIBE.'</a></li>');
		                                $tag->printer('<li><a href="'.URL_BASE.'galeria/imagens" class=" waves-effect waves-block">GALERIA</a></li>');
		                                 if ($_SESSION['nome'] == $galeria_view->usuario_nome) {
		                                	$tag->printer('<li><a href="'.URL_BASE.'galeria/editar/'.$galeria_view->id.'" class=" waves-effect waves-block">'.$language->BUTTON_UPDATE.'</a></li>');
				    	                }
		                            $tag->ul;
	                            $tag->li;
	                        $tag->ul;
	                    	$tag->h2();
				                $tag->printer("
				                		<span class=\"font-bold col-blue\">{$galeria_view->nome}</span>
				                		{$language->SITE_SUBSCRIBE_BY}
				                		<span class=\"font-bold col-blue\">
				                			<a onmouseover=\"display_profile();\" onmouseout=\"hide_profile();\" href=\"".URL_BASE."usuario/profile/{$galeria_view->usuario_id}\" target=\"_blank\">
				                				{$galeria_view->usuario_nome}
				                			</a>
				                		</span>");
				            $tag->h2;
	                    $tag->div;

	                    $tag->div('id="display_profile_box" style="display:none"');
	                    	$tag->div('class="row clearfix"');
					            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
					                $tag->div('class="card"');
					                    $tag->div('class="body"');
					                    	$tag->div('class="row clearfix"');
						                    	$tag->div('class="col-md-2"');
		                    						$tag->img('src="'.$galeria_view->foto_link.'" class="img-responsive thumbnail"');
						                    	$tag->div;
						                    	$tag->div('class="col-md-3"');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_NAME}");
						                    		$tag->b;
						                    		$tag->printer("{$galeria_view->usuario_nome}");
						                    	$tag->div;

						                    	$tag->div('class="col-md-3"');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_COUNTRY}");
						                    		$tag->b;
						                    		$tag->printer("{$galeria_view->pais}");
						                    	$tag->div;

						                    	$tag->div('class="col-md-3"');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_XP}");
						                    		$tag->b;
						                    		$tag->printer("{$galeria_view->xp}");
						                    	$tag->div;

						                    	$tag->div('class="col-md-3"');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_LEVEL}");
						                    		$tag->b;
						                    		$tag->printer("{$galeria_view->nivel}");
						                    	$tag->div;

						                    	$tag->div('class="col-md-3"');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_STARS}");
						                    		$tag->b;
						                    		$tag->printer("{$galeria_view->estrelas}");
						                    	$tag->div;

						                    	$tag->div('class="col-md-10"');
						                    		$tag->b();
						                    			$tag->printer("{$language->USER_LABEL_ABOUT} {$galeria_view->usuario_nome}");
						                    		$tag->b;
						                    		$tag->printer("{$galeria_view->usuario_descricao}");
						                    	$tag->div;

					                    	$tag->div;
					                    $tag->div;
					    			$tag->div;
					    		$tag->div;
					    	$tag->div;
	                    $tag->div;

	                    $tag->div('class="body"');
	                    	$tag->div('class="row clearfix"');
		                            $tag->div('class="col-sm-6"');
		                            	$tag->p();
		                                    $tag->b();
		                                    	$tag->printer('nome');
		                                    $tag->b;
		                                $tag->p;
		                                $tag->div('class="form-group"');
		                                    $tag->div('class="form-line"');
				                                $tag->printer($galeria_view->nome);
		                                    $tag->div;
		                                $tag->div;
		                            $tag->div;
		                            $tag->div('class="col-sm-6"');
		                            	$tag->p();
		                                    $tag->b();
		                                    	$tag->printer('tipo');
		                                    $tag->b;
		                                $tag->p;
		                                $tag->div('class="form-group"');
		                                    $tag->div('class="form-line"');
				                                $tag->printer($galeria_view->tipo);
		                                    $tag->div;
		                                $tag->div;
		                            $tag->div;
		                            $tag->div('class="col-sm-12"');
		                            	$tag->p();
		                                    $tag->b();
		                                    	$tag->printer('descricao');
		                                    $tag->b;
		                                $tag->p;
		                                $tag->div('class="form-group"');
		                                    $tag->div('class="form-line"');
				                                $tag->printer($galeria_view->descricao);
		                                    $tag->div;
		                                $tag->div;
		                            $tag->div;
		                            $tag->div('class="col-sm-12"');
		                            	$tag->p();
		                                    $tag->b();
		                                    	$tag->printer('url_img');
		                                    $tag->b;
		                                $tag->p;
		                                $tag->div('class="form-group"');
		                                    $tag->div('class="form-line"');
				                                $tag->img('src="'.$galeria_view->url_img.'" class="img-responsive"');
		                                    $tag->div;
		                                $tag->div;
		                                $tag->printer("Fonte: {$galeria_view->url_img}");
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

    require 'partials/footer.php';
	