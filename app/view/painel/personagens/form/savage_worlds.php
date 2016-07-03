<?php	
global $s;
$current_user = $s->get_session('nome');
$form->input(['name' => 'dono', 'type' => 'hidden', 'value'=> $current_user]);
$form->input(['name' => 'sistema', 'type' => 'hidden', 'value'=> 'Savage Worlds']);
$form->input(['name' => 'tipo', 'type' => 'hidden', 'value'=> 'Personagem jogador']);

$atributos = [
				['Força','forca'], ['Escalar','escalar'], ['Agilidade','agilidade'],
				['Atirar','atirar'],['Arremessar','arremessar'], ['Cavalgar','cavalgar'],
				['Digirir','digirir'],['Furtividade','furtividade'], ['Lutar','lutar'],
				['Nadar','nadar'],['Navegar','navegar'],['Pilotar','pilotar'],['Astúcia','astucia'], 
				['Arrombar','arrombar'],['Conhecimento','conhecimento'], ['Trab. Pedra','trabpedra'],
				['Concertar','concertar'], ['Curar','curar'], ['Investigação','investigacao'],
				['Manha','manha'], ['Perceber','perceber'], ['Provocar','provocar'], ['Rastrear','rastrear'],
				['Sobrevivência','sobrevivencia'], ['Espírito','espirito'], ['Intimidar','intimidar'], ['Persuação','persuacao'], ['Vigor','vigor']  
			];
for($i=0; $i<=count($atributos)-1; $i++):
	$col = 2;
	$form->_col($col);
		$form->label($atributos[$i][0]);
		$form->input(['name' => $atributos[$i][1], 'type' => 'number', "pattern" => "[0-9]+$", 'class'=>'form-control', 'required'=>'required', 'value'=> helper_check_value($objeto[0], $atributos[$i][1])]);
	$form->col_();
endfor;

helper_new_line_in_form();

$caracteristicas = [
						['Nome','nome'],['Data de nascimento', 'data_nascimento'],['Local de nascimento', 'local_nascimento'],
						['Sexo','sexo'],['Altura','altura'],['Peso','peso'],['Classe Social/Profissão','profissao'],
						['Idade aparente','idade_aparente'],['Idade real','idade_real'],['Armadura','armadura'],
						['Idiomas','idiomas'],['Religião','religiao'],['Classe','classe'],['Raça','raca']
				   ];

for($i=0; $i<=count($caracteristicas)-1; $i++):
	$form->_col(3);
		$form->label($caracteristicas[$i][0]);
		if(!isset($caracteristicas[$i][2])):
			$required = 'false';
		else:
			$required = 'false';
		endif;
		$form->input(['name' => $caracteristicas[$i][1], 'type' => 'text', 'class'=>'form-control', 'value'=> helper_check_value($objeto[0], $caracteristicas[$i][1])]);
	$form->col_();
endfor;

helper_form_input("Imagem", ['name' => 'img', 'type' => 'file', 'class'=>'form-control'], 6);

helper_form_text_area("Perícias com armas", ['name' => 'pericias_com_armas', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias_com_armas'), 6);

helper_form_text_area("Equipamentos", ['name' => 'equipamentos', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'equipamentos'), 6);

helper_form_text_area("Perícias", ['name' => 'pericias', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'pericias'), 6);

helper_form_text_area("Complicações", ['name' => 'complicacoes', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'complicacoes'), 6);

helper_form_text_area("Vantagens", ['name' => 'vantagens', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'vantagens'), 6);

helper_form_text_area("Outros", ['name' => 'outros', 'class'=>'form-control', 'rows'=>'5'], helper_check_value($objeto[0], 'outros'), 6);