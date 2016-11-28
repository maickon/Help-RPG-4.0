
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina de formulario da visualizacao gerada no automatico

	$tag->div('class="col-sm-4"');
		$tag->p();
	        $tag->b();
	        	$tag->printer($language->$SITE_TITLE_LABEL);
	        $tag->b;
	    $tag->p;
	    $tag->div('class="form-group"');
	        $tag->div('class="form-line"');
	        	$tag->input('type="hidden" name="dono" value="'.$_SESSION['login'].'" required aria-required="true"');
	            $tag->input('type="hidden" name="lingua" value="'.$_SESSION['lingua'].'" required aria-required="true"');
	        	$tag->input('type="hidden" name="id" value="'.$historias->id.'" required aria-required="true"');
	        	$tag->input('type="text" name="titulo" value="'.$historias->titulo.'" required aria-required="true" class="form-control" placeholder="'.$language->SITE_TITLE_LABEL.'"');
				
				$tag->input('type="text" name="autor" value="'.$historias->autor.'" required aria-required="true" class="form-control" placeholder="'.$language->SITE_TITLE_LABEL.'"');
				
				$tag->input('type="text" name="descricao_breve" value="'.$historias->descricao_breve.'" required aria-required="true" class="form-control" placeholder="'.$language->SITE_TITLE_LABEL.'"');
				
				$tag->div('class="col-sm-12"');
					$tag->p();
				        $tag->b();
				        	$tag->printer($language->$SITE_TITLE_LABEL);
				        $tag->b;
				    $tag->p;
				    $tag->div('class="form-group"');
				        $tag->div('class="form-line"');	
				        	$tag->textarea('id="ckeditor" name="descricao"');
				        		$tag->printer($historias->descricao);
				        	$tag->textarea;
						$tag->div;
					$tag->div;
				$tag->div;

				$tag->div;
		$tag->div;
	$tag->div;
	