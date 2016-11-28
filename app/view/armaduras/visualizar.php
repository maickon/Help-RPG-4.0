<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                    	$tag->h2();
			                $tag->printer("
			                		<span class=\"font-bold col-blue\">{$armadura_view->nome}</span> 
			                		{$language->ARMOR_SUBSCRIBE_BY} 
			                		<span class=\"font-bold col-blue\">
			                			<a onmouseover=\"display_profile();\" onmouseout=\"hide_profile();\" href=\"".URL_BASE."usuario/profile/{$armadura_view->usuario_id}\" target=\"_blank\">
			                				{$armadura_view->usuario_nome}
			                			</a>
			                		</span>");
			            $tag->h2;

			            // $tag->div('id="rateyo"');
			         
			            // $tag->div;
                    $tag->div;
                 
                    $tag->div('id="display_profile_box" style="display:none"');
                    	$tag->div('class="row clearfix"');
				            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
				                $tag->div('class="card"');
				                    $tag->div('class="body"');
				                    	$tag->div('class="row clearfix"');
					                    	$tag->div('class="col-md-2"');
	                    						$tag->img('src="'.$armadura_view->foto_link.'" class="img-responsive thumbnail"');
					                    	$tag->div;
					                    	$tag->div('class="col-md-3"');
					                    		$tag->b();
					                    			$tag->printer("{$language->USER_LABEL_NAME}");
					                    		$tag->b;
					                    		$tag->printer("{$armadura_view->usuario_nome}");
					                    	$tag->div;

					                    	$tag->div('class="col-md-3"');
					                    		$tag->b();
					                    			$tag->printer("{$language->USER_LABEL_COUNTRY}");
					                    		$tag->b;
					                    		$tag->printer("{$armadura_view->pais}");
					                    	$tag->div;

					                    	$tag->div('class="col-md-3"');
					                    		$tag->b();
					                    			$tag->printer("{$language->USER_LABEL_XP}");
					                    		$tag->b;
					                    		$tag->printer("{$armadura_view->xp}");
					                    	$tag->div;

					                    	$tag->div('class="col-md-3"');
					                    		$tag->b();
					                    			$tag->printer("{$language->USER_LABEL_LEVEL}");
					                    		$tag->b;
					                    		$tag->printer("{$armadura_view->nivel}");
					                    	$tag->div;

					                    	$tag->div('class="col-md-3"');
					                    		$tag->b();
					                    			$tag->printer("{$language->USER_LABEL_STARS}");
					                    		$tag->b;
					                    		$tag->printer("{$armadura_view->estrelas}");
					                    	$tag->div;

					                    	$tag->div('class="col-md-10"');
					                    		$tag->b();
					                    			$tag->printer("{$language->USER_LABEL_ABOUT} {$armadura_view->usuario_nome}");
					                    		$tag->b;
					                    		$tag->printer("{$armadura_view->usuario_descricao}");
					                    	$tag->div;
					                    	
				                    	$tag->div;
				                    $tag->div;
				    			$tag->div;
				    		$tag->div;
				    	$tag->div;
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
	    	               
	    	                if ($_SESSION['nome'] == $armadura_view->usuario_nome) {
		    	                $tag->div('class="col-sm-2"');
			                        $tag->a('href="'.URL_BASE.'armaduras/editar/'.$armadura_view->id.'" class="btn bg-indigo waves-effect"');
		    	                    	$tag->printer($language->ARMOR_BTN_EDIT_ARMOR);
		    	                    $tag->a;
		    	                $tag->div;
	    	                }

	    	                $tag->div('class="col-sm-2"');
		                        $tag->a('href="'.URL_BASE.'armaduras" class="btn bg-deep-purple waves-effect"');
	    	                    	$tag->printer($language->ARMOR_BTN_BACK_TITLE);
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

require 'partials/footer.php';
?>