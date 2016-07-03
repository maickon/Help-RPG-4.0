<?php
require_once '../../../header.php';
require_once '../helper.php';

if(empty($_SESSION)):
	help_header(ROOTPATHURL.PERICIASPATH);
else:
	global $tag, $form, $s, $parametros;

	$tag->body('role="document"');

	new Components('menu', $parametros);
	$tag->br();
	$tag->br();
		$form->_container();
			if(isset($_REQUEST['action'])):
				$form->_col(12);
					$create_personagem = new Pericias(ROOTPATH.PERICIASIMGPATH);
					$create_personagem->create($_REQUEST);
				$form->col_();
			endif;
			
			$form->_col(11);
				$tag->span('class="span_title"');
					$tag->imprime(PERICIAS);
				$tag->span;
			$form->col_();
			$form->_col(1);
				$tag->a('href="'.ROOTPATHURL.PERICIASPATH.'" class="btn btn-info"');
					$tag->imprime(BACK);
				$tag->a;
			$form->col_();
			$form->_col(12);
				$tag->hr();
			$form->col_();
		$form->container_();
		
		$form->_row();
			$form->_container();	
				$form->_form(['method'=>'post', 'name'=>'new-user', 'enctype'=>'multipart/form-data', 'class'=>'form-group', 'data-toggle'=>'validator']);
				
					$current_user = $s->get_session('nome');
					$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
					
					helper_form_input("Nome", ['name' => 'nome', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

					helper_form_input("Categoria", ['name' => 'categoria', 'type' => 'text', 'class'=>'form-control']);

					helper_form_input("Habilidade chave", ['name' => 'habilidade_chave', 'type' => 'text', 'class'=>'form-control']);

					helper_form_input("Classe", ['name' => 'classe_favorecida', 'type' => 'text', 'class'=>'form-control', 'required'=>'true']);

					helper_form_select_options_sistema();

					helper_form_text_field_descricao();

					helper_form_button_submit_and_back(ROOTPATHURL.PERICIASPATH);

				$form->form_();
				
			$form->_container();
		$form->row_();
		$tag->div;
	require_once '../../../footer.php';
endif;