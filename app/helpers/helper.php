<?php
require_once 'painel/helper.php';

function helper_panel_data_user($title, $name, $object, $path){
	global $tag, $form;
	$qtd_armas = count($object);
	
	$form->_col(3);
		$tag->div('class="panel panel-primary"');
			$tag->div('class="panel-heading"');
				$tag->a('href="'.$path.'" target="blank" class="link-title"');
					$tag->imprime($title);
				$tag->a;
			$tag->div;
		
			$tag->div('class="panel-body overflow"');
				$tag->imprime("Atualmente você tem <b>{$qtd_armas}</b> {$name}.");
				//$form->_row();
				//helper_form_input("Buscar", ['name' => 'peso', 'type' => 'text', 'class'=>'form-control', 'data-live-search' => "true"], 12);
				//$form->row_();
				$tag->br();
				$tag->br();
		
				foreach($object as $key => $value):
					$nome = (isset($value['nome'])) ? $value['nome'] : $value['titulo'];
					$sistema = (isset($value['sistema'])) ? $value['sistema'] : false;
					$tag->a('href="'.$path.'view.php?id='.$value['id'].'" target="blank"');
						$tag->imprime($nome.' - ');
						if($sistema)
							$tag->imprime($sistema);
					$tag->a;
					$tag->br();
				endforeach;
			$tag->div;
		$tag->div;
	$tag->div;
}

function helper_current_data(){
	
	$data = date('D');
	$mes = date('M');
	$dia = date('d');
	$ano = date('Y');
	
	$semana = array(
			'Sun' => 'Domingo',
			'Mon' => 'Segunda-Feira',
			'Tue' => 'Terca-Feira',
			'Wed' => 'Quarta-Feira',
			'Thu' => 'Quinta-Feira',
			'Fri' => 'Sexta-Feira',
			'Sat' => 'Sábado'
	);
	
	$mes_extenso = array(
			'Jan' => 'Janeiro',
			'Feb' => 'Fevereiro',
			'Mar' => 'Marco',
			'Apr' => 'Abril',
			'May' => 'Maio',
			'Jun' => 'Junho',
			'Jul' => 'Julho',
			'Aug' => 'Agosto',
			'Nov' => 'Novembro',
			'Sep' => 'Setembro',
			'Oct' => 'Outubro',
			'Dec' => 'Dezembro'
	);
	
	return $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";
}

function helper_footer_bar_page_search($links, $menus){
	global $tag;
	$tag->div('class="footer" align="center"');
		$tag->div('class="row"');
		
			for($m=0; $m<count($menus); $m++):
				$tag->span('class="menu-item"');
					$tag->a('href="'.$links[$m].'" class="footer-search-fonte"');
						$tag->imprime($menus[$m]);
					$tag->a;
				$tag->span;
			endfor;
		$tag->div;
	$tag->div;
}