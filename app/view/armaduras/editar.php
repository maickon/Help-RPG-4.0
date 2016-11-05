<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                    	$tag->h2();
			                $tag->printer($language->ARMOR_SUBSCRIBE);
			            $tag->h2;

			            $tag->ul('class="header-dropdown m-r--5"');
                            $tag->li('class="dropdown"');
                                $tag->a('href="'.URL_BASE.'armaduras" role="button" title="'.$language->ARMOR_BTN_BACK_TITLE.'" aria-haspopup="true" aria-expanded="false"');
                                    $tag->i('class="material-icons"');
                                    	$tag->printer('keyboard_return');
                                    $tag->i;
                                $tag->a;
                            $tag->li;
                        $tag->ul;
                    $tag->div;
                    
                    $tag->div('class="body"');
                    	$tag->div('class="row clearfix"');
                    		$tag->form('method="post" action="'.$this->salvar_path.'"');
	                            
                    			require 'partials/form.php';

	                        	$tag->div('class="col-sm-12"');
			                        $tag->input('type="submit" class="btn btn-primary waves-effect" name="submit" value="'.$language->ARMOR_BTN_NEW_ARMOR.'"');
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