<?php
class Tavernas_Model extends Model_Lib{
	
	function __construct(){
		parent::__construct();
		$this->define_path(CONFIG_TXT_PATH.'taverna/');
		$this->sexo = array_rand([0,1]);
	}

	function taverna_nome_taverneiro(){
		if($this->sexo == 0):
			$nome = (new Raffleitemfile_Lib(TAVERN_MAN_NAME_TXT, 1))->getRaffleItens();
		else:
			$nome = (new Raffleitemfile_Lib(TAVERN_WOMAN_NAME_TXT, 1))->getRaffleItens();
		endif;
		return $nome;
	}

	function taverna_bar_nome(){
		return (new Raffleitemfile_Lib($this->bar_nomes_path, 1, 'FILE'))->getRaffleItens();
	}

	function taverna_aparencia_taverneiro($qtd){
		$sexo = 'M'?($this->sexo == 0): 'F';
		return (new Raffleitemfile_Lib($this->aparencias_path, $qtd, 'FILE', $sexo))->getRaffleItens();
	}

	function taverna_idade_taverneiro($racas){
		$idade = [
					'Humano'	=> rand(15,100),
					'Elfo'		=> rand(35,600),
					'Gnomo' 	=> rand(85,1200),
					'Gnoma'		=> rand(85,1200),
					'Meio elfo' => rand(30,400),
					'Meio orc' 	=> rand(15,500),
					'Halfling' 	=> rand(10,85),
					'Humana'	=> rand(15,100),
					'Anã'		=> rand(15,100),
					'Anão'		=> rand(15,100),
					'Elfa'		=> rand(35,600),
					'Gnoma'		=> rand(85,1200),
					'Meio elfa'	=> rand(30,400)
				];

		return $idade[$racas];
	}

	function taverna_tempo_de_profissao($idade){
		$experiencia = [TAVERN_YEARS_LABEL, TAVERN_MONTHS_LABEL, TAVERN_DAYS_LABEL];
		$divisor = rand(2,4);
		$tempo = $experiencia[rand(0,2)];
		$carreira = intval($idade/$divisor);
		if($carreira == 1)
			$carreira = 2;
		return TAVERN_HAS_LABEL ." {$carreira} {$tempo} ". TAVERN_EXPERIENCE_LABEL;

	}

	function taverna_raca_taverneiro(){
		$sexo = 'M'?($this->sexo == 0): 'F';
		return (new Raffleitemfile_Lib($this->racas_path, 1, 'FILE', $sexo))->getRaffleItens();
	}

	function taverna_personalidade_taverneiro($qtd){
		$sexo = 'M'?($this->sexo == 0): 'F';
		return (new Raffleitemfile_Lib($this->personalidades_path, $qtd, 'FILE', $sexo))->getRaffleItens();
	}

	function taverna_carnes($qtd){
		return (new Raffleitemfile_Lib($this->carnes_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_frutas($qtd){
		return (new Raffleitemfile_Lib($this->frutas_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_legumes($qtd){
		return (new Raffleitemfile_Lib($this->legumes_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_verduras($qtd){
		return (new Raffleitemfile_Lib($this->verduras_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_bebidas($qtd){
		return (new Raffleitemfile_Lib($this->bebidas_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_objetos_de_briga($qtd){
		return (new Raffleitemfile_Lib($this->objetos_na_hora_da_briga_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_atracao_conteporanea($qtd){
		return (new Raffleitemfile_Lib($this->atracao_comteporanea_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_artista($qtd = 1){
		return (new Raffleitemfile_Lib($this->artistas_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_atracao_medieval($qtd){
		return (new Raffleitemfile_Lib($this->atracao_medieval_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_bebidas_bar_ou_restaurante($qtd){
		return (new Raffleitemfile_Lib($this->bebidas_de_bar_ou_restaurante_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_bebidas_simples($qtd){
		return (new Raffleitemfile_Lib($this->bebidas_simples_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_cervejas($qtd){
		return (new Raffleitemfile_Lib($this->cervejas_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_porcoes($qtd){
		return (new Raffleitemfile_Lib($this->porcoes_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_pratos($qtd){
		return (new Raffleitemfile_Lib($this->pratos_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_sobremesas($qtd){
		return (new Raffleitemfile_Lib($this->sobremesas_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_sucos($qtd){
		return (new Raffleitemfile_Lib($this->sucos_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_petiscos($qtd){
		return (new Raffleitemfile_Lib($this->petiscos_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_garcon($qtd){
		return (new Raffleitemfile_Lib($this->garcons_personalidade_path, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_restaurante_nome(){
		return (new Raffleitemfile_Lib($this->restaurantes_path, 1, 'FILE'))->getRaffleItens();
	}

	function taverna_nome(){
		$tipo = [TAVERN_NAME_TXT,TAVERN_IN_TXT];
		$nome = $tipo[rand(0, count($tipo)-1)];
		$sexo = ($this->sexo == 0)?'M': 'F';

		//pq = [personagem][qualidade]
		//oo = [objeto][objeto]
		//pp = [personagem][personagem]
		//oq = [objeto][qualidade]

		$nome_taverna = [];
		$forma = ['pq','oo','pp','oq','np'];
		$forma_escolhida = $forma[rand(0, count($forma)-1)];
	
		switch($forma_escolhida):
			case 'pq': 
				$nome_taverna[] = (new Raffleitemfile_Lib($this->personagem_path, 1, 'FILE', $sexo))->getRaffleItens();
				$nome_taverna[]	= (new Raffleitemfile_Lib($this->qualidade_personagem_path, 1, 'FILE', $sexo))->getRaffleItens();
			break;

			case 'oo':
				$nome_taverna[] = (new Raffleitemfile_Lib($this->objetos_path, 1, 'FILE'))->getRaffleItens();
				$nome_taverna[] = (new Raffleitemfile_Lib($this->objetos_path, 1, 'FILE'))->getRaffleItens();
			break;

			case 'pp':
				$nome_taverna[] = (new Raffleitemfile_Lib($this->personagem_path, 1, 'FILE', $sexo))->getRaffleItens();
				$nome_taverna[] = (new Raffleitemfile_Lib($this->personagem_path, 1, 'FILE', $sexo))->getRaffleItens();
			break;

			case 'oq':
				$nome_taverna[] = (new Raffleitemfile_Lib($this->objetos_path, 1, 'FILE'))->getRaffleItens();
				$nome_taverna[]	= (new Raffleitemfile_Lib($this->qualidade_objetos_path, 1, 'FILE'))->getRaffleItens();
			break;

			case 'np':
				$nome_taverna[] = (new Raffleitemfile_Lib($this->tavernas_nomes_path, 1, 'FILE'))->getRaffleItens();
			break;
		endswitch;

		
		$taverna = "{$nome} ";
		for($i=0; $i<count($nome_taverna); $i++):
			if($forma_escolhida != 'np'):
				if($i == 0 and stristr(substr($nome_taverna[0],2),'a') || stristr(substr($nome_taverna[0],2),'ã') ):
					$taverna = 'Estalagem da ';
				elseif($i == 0 and stristr(substr($nome_taverna[0],2),'o') || stristr(substr($nome_taverna[0],2),'ã') ):
					$taverna = 'Estalagem do ';
				elseif($i == 0 and stristr(substr($nome_taverna[0],2),'s') && stristr(substr($nome_taverna[0],3),'a') ):
					$taverna = 'Estalagem das ';
				endif;
			endif;
			$taverna .= "{$nome_taverna[$i]} ";
		endfor;

		return $taverna;
	}
}