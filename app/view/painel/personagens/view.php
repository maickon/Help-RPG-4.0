<?php
require_once '../../../header.php';
require_once '../helper.php';

$super = false;
global $tag, $form, $parametros;

$tag->body('role="document"');

new Components('menu', $parametros);
$tag->br();
$tag->br();
	
	$objeto = new Personagens(ROOTPATH.PERSONAGEMIMGPATH);
	$personagens = $objeto->select($objeto->getTable(),null,[ ['id','=', $_GET['id']] ]);
	

	if(!isset($personagens[0]['id'])):
		$form->_container();
			$form->_col(12);
				$form->h1(REGISTRO_NAO_ENCONTRADO_MSG);
			$form->col_();
		$form->container_();
	else:
		$form->_container();
			$form->_col(2);
				$tag->span('class="span_title"');
					$tag->imprime(PERSONAGEM);
				$tag->span;
			$form->col_();
			
			helper_prev_next($objeto, $_GET['id'], 'personagens','Personagem jogador');
			
			//verificando permiçoes
			foreach($permit as $p):
				if($s->get_session('nome') == $p):
					$super = true;
				endif;
			endforeach;
			
			helper_buttons_bar($super, 'personagens', $personagens[0]['id']);
			
			$tag->br();
			$tag->hr();
			
			helper_modal_alert_confirm();
			
			$form->_container();
				$form->_col(6);
					$img = !empty($personagens[0]['img'])?$personagens[0]['img']:'';
					helper_show_rpg_system($personagens[0]['sistema'],$personagens[0]);
				$form->col_();
				
				$form->_col(6);
					$form->_col(12);
						$tag->div('class="center"');
							if($img != null):
								$tag->img('src="'.ROOTPATHURL.PERSONAGEMIMGPATH.$img.'" class="img-responsive img-thumbnail size-img"');
							else:
								$tag->img('src="'.ROOTPATHURL.IMGPATH.'noimage.png" class="img-responsive img-thumbnail size-img"');
							endif;
						$tag->div;
					$form->col_();

					$form->_col(12);
						$tag->br();
						$tag->br();
					$form->col_();
					
					$form->_col(12);
						helper_adsense_responsivo_01();
					$form->col_();
				$form->col_();
				
				$form->_col(12);
					helper_disqus_comment();	
				$form->col_();
			$form->container_();
		$form->div_();
	endif;
	
require_once '../../../footer.php';