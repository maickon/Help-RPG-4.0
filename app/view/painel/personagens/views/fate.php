<?php 
function helper_show_personagens_fate($personagem){
	global $tag, $form;
	$unserialize_params = unserialize($personagem['dados']);
	
	$data_array = ['aparencia'=>'', 'pulso_cura'=>'', 'pulsos'=>'', 'ataque_basico'=>'', 'stress'=>'', 'consequencias'=>''];
	$unserialize_params = array_merge($unserialize_params, array_diff_key($data_array, $unserialize_params));
	
	$tag->div('class="col-md-12 header_fate"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['nome']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CODIGO).$personagem['id']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold($personagem['sistema']));
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(CRIADOR.' ('.$personagem['dono'].')'));				
			$form->col_();
			$form->_col(6);
				$tag->imprime($personagem['raca']);	
			$form->col_();
			$form->_col(6);
				$tag->imprime($personagem['classe']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_fate"');
		$form->_row();
			$form->_col(4);
				$tag->imprime($form->bold(CUIDADOSO).'<br>'.$unserialize_params['cuidadoso'].'('.helper_escala_fate_rpg($unserialize_params['cuidadoso']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(INTELIGENTE).'<br>'.$unserialize_params['inteligente'].'('.helper_escala_fate_rpg($unserialize_params['inteligente']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(CHAMATIVO).'<br>'.$unserialize_params['chamativo'].'('.helper_escala_fate_rpg($unserialize_params['chamativo']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(FORTE).'<br>'.$unserialize_params['forte'].'('.helper_escala_fate_rpg($unserialize_params['forte']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(RAPIDO).'<br>'.$unserialize_params['rapido'].'('.helper_escala_fate_rpg($unserialize_params['rapido']).')');
			$form->col_();
			$form->_col(4);
				$tag->imprime($form->bold(SORRATEIRO).'<br>'.$unserialize_params['sorrateiro'].'('.helper_escala_fate_rpg($unserialize_params['sorrateiro']).')');
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate"');
		$form->_row();
			$form->_col(6);
				$tag->imprime($form->bold(REFRESH).' '.$unserialize_params['refresh']);
			$form->col_();
			$form->_col(6);
				$tag->imprime($form->bold(PONTOS_FATE_ATUAIS).' '.$unserialize_params['fate']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(APARENCIA).'<br>'.$unserialize_params['aparencia']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_fate"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(CONCEITO_CHAVE).'<br>'.$unserialize_params['aspecto_chave']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(COMPLICACAO).'<br>'.$unserialize_params['aspecto_complicacao']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(OUTROS_ASPECTOS).'<br>'.$unserialize_params['aspectos']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body2_fate"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(DESCRICAO).'<br>'.$unserialize_params['descricao']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(STRESS).'<br>'.$unserialize_params['stress']);
			$form->col_();
		$form->row_();
	$tag->div;
	
	$tag->div('class="col-md-12 body1_fate border-button"');
		$form->_row();
			$form->_col(12);
				$tag->imprime($form->bold(CONSEQUENCIAS).'<br>'.$unserialize_params['consequencias']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(PROEZAS).'<br>'.$unserialize_params['proezas']);
			$form->col_();
			$form->_col(12);
				$tag->imprime($form->bold(OUTROS).'<br>'.$unserialize_params['outros']);
			$form->col_();
		$form->row_();
	$tag->div;
}