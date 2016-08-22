<?php
class Tavernas_Model{
	
	private $names;
	private $aparencia;
	private $sexo;
	private $nome;
	private $idade;
	private $raca;
	private $personalidade;
	private $taverna;
	private $objetos_de_briga;
	private $tempo_profissao;

	function __construct(){
		$this->sexo = array_rand([0,1]);
		$this->taverna_nome();
		$this->taverna_raca_taverneiro();
		$this->taverna_nome_taverneiro();
		$this->taverna_aparencia_taverneiro(rand(4,6));
		$this->taverna_idade_taverneiro();
		$this->taverna_tempo_de_profissao();
		$this->taverna_personalidade_taverneiro(rand(2,5));
		$this->taverna_carnes(rand(2,4));
		$this->taverna_frutas(rand(2,4));
		$this->taverna_legumes(rand(2,4));
		$this->taverna_verduras(rand(2,4));
		$this->taverna_bebidas(rand(3,6));
		$this->taverna_objetos_de_briga(rand(3,6));
		$this->taverna_atracao_conteporanea(rand(3,6));
		$this->taverna_atracao_medieval(1);
		$this->taverna_bebidas_bar_ou_restaurante(rand(3,6));
		$this->taverna_bebidas_simples(rand(3,6));
		$this->taverna_cervejas(rand(3,6));
		$this->taverna_porcoes(rand(3,6));
		$this->taverna_pratos(rand(3,6));
		$this->taverna_sobremesas(rand(3,6));
		$this->taverna_sucos(rand(3,6));
	}

	function get_taverna_nome(){
		return $this->taverna;
	}

	function get_nome(){
		return $this->nome;
	}

	function get_aparencia(){
		return $this->aparencia;
	}

	function get_idade(){
		return $this->idade;
	}

	function get_raca(){
		return $this->raca;
	}

	function get_personalidade(){
		return $this->personalidade;
	}

	function get_carnes(){
		return $this->carnes;
	}

	function get_frutas(){
		return $this->frutas;
	}
	
	function get_legumes(){
		return $this->legumes;
	}
	
	function get_verduras(){
		return $this->verduras;
	}
	
	function get_bebidas(){
		return $this->bebidas;
	}

	function get_objetos_de_briga(){
		return $this->objetos_de_briga;
	}

	function get_tempo_profissao(){
		return $this->tempo_profissao;
	}

	function get_taverna_atracao_conteporanea(){
		return $this->atracao_conteporanea;
	}

	function get_taverna_atracao_medieval(){
		return $this->atracao_medieval;
	}

	function get_taverna_bebidas_bar_ou_restaurante(){
		return $this->bebidas_bar_ou_restaurante;
	}

	function get_taverna_bebidas_simples(){
		return $this->bebidas_simples;
	}

	function get_taverna_cervejas(){
		return $this->cervejas;
	}

	function get_taverna_porcoes(){
		return $this->porcoes;
	}

	function get_taverna_pratos(){
		return $this->pratos;
	}

	function get_taverna_sobremesas(){
		return $this->sobremesas;
	}

	function get_taverna_sucos(){
		return $this->sucos;
	}

	function taverna_nome_taverneiro(){
		if($this->sexo == 0):
			$this->nome = (new Raffleitemfile_Lib(TAVERN_MAN_NAME_TXT, 1))->getRaffleItens();
		else:
			$this->nome = (new Raffleitemfile_Lib(TAVERN_WOMAN_NAME_TXT, 1))->getRaffleItens();
		endif;
	}

	function taverna_aparencia_taverneiro($qtd){
		$sexo = 'M'?($this->sexo == 0): 'F';
		$this->aparencia = (new Raffleitemfile_Lib(TAVERN_APPEARANCE_TXT, $qtd, 'FILE', $sexo))->getRaffleItens();
	}

	function taverna_idade_taverneiro(){
		$racas = $this->raca;
		$idade = [
					'Humano'	=> rand(15,100),
					'Elfo'		=> rand(35,600),
					'Gnomo' 	=> rand(85,1200),
					'Gnoma'		=> rand(85,1200),
					'Meio elfo' => rand(30,400),
					'Meio orc' 	=> rand(15,500),
					'Halfling' 	=> rand(10,85),
					'Humana'	=> rand(15,200),
					'Anã'		=> rand(15,100),
					'Anão'		=> rand(15,100),
					'Elfa'		=> rand(35,600),
					'Gnoma'		=> rand(85,1200),
					'Meio elfa'	=> rand(30,400)
				];

		$this->idade = $idade[$racas];
	}

	function taverna_tempo_de_profissao(){
		$experiencia = [TAVERN_YEARS_LABEL, TAVERN_MONTHS_LABEL, TAVERN_DAYS_LABEL];
		$divisor = rand(2,4);
		$tempo = $experiencia[rand(0,2)];
		$carreira = intval($this->idade/$divisor);
		if($carreira == 1)
			$carreira = 2;
		$this->tempo_profissao = TAVERN_HAS_LABEL ." {$carreira} {$tempo} ". TAVERN_EXPERIENCE_LABEL;

	}

	function taverna_raca_taverneiro(){
		$sexo = 'M'?($this->sexo == 0): 'F';
		$this->raca = (new Raffleitemfile_Lib(TAVERN_RACES_TXT, 1, 'FILE', $sexo))->getRaffleItens();
	}

	function taverna_personalidade_taverneiro($qtd){
		$sexo = 'M'?($this->sexo == 0): 'F';
		$this->personalidade = (new Raffleitemfile_Lib(TAVERN_PERSONALITIES_TXT, $qtd, 'FILE', $sexo))->getRaffleItens();
	}

	function taverna_carnes($qtd){
		$this->carnes = (new Raffleitemfile_Lib(TAVERN_MEAT_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_frutas($qtd){
		$this->frutas = (new Raffleitemfile_Lib(TAVERN_FRUIT_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_legumes($qtd){
		$this->legumes = (new Raffleitemfile_Lib(TAVERN_VEGETABLES_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_verduras($qtd){
		$this->verduras = (new Raffleitemfile_Lib(TAVERN_VEGETABLE_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_bebidas($qtd){
		$this->bebidas = (new Raffleitemfile_Lib(TAVERN_BEVERAGE_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_objetos_de_briga($qtd){
		$this->objetos_de_briga = (new Raffleitemfile_Lib(TAVERN_FIGHT_OBJECTS_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_atracao_conteporanea($qtd){
		$this->atracao_conteporanea = (new Raffleitemfile_Lib(TAVERN_ATTRACTION_CONTEPORANEA_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_atracao_medieval($qtd){
		$this->atracao_medieval = (new Raffleitemfile_Lib(TAVERN_ATTRACTION_MEDIEVAL_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_bebidas_bar_ou_restaurante($qtd){
		$this->bebidas_bar_ou_restaurante = (new Raffleitemfile_Lib(TAVERN_BAR_DRINKS_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_bebidas_simples($qtd){
		$this->bebidas_simples = (new Raffleitemfile_Lib(TAVERN_SIMPLE_DRINKS_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_cervejas($qtd){
		$this->cervejas = (new Raffleitemfile_Lib(TAVERN_BEERS_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_porcoes($qtd){
		$this->porcoes = (new Raffleitemfile_Lib(TAVERN_SERVINGS_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_pratos($qtd){
		$this->pratos = (new Raffleitemfile_Lib(TAVERN_PLATES_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_sobremesas($qtd){
		$this->sobremesas = (new Raffleitemfile_Lib(TAVERN_DESSERTS_TXT, $qtd, 'FILE'))->getRaffleItens();
	}

	function taverna_sucos($qtd){
		$this->sucos = (new Raffleitemfile_Lib(TAVERN_JUICE_TXT, $qtd, 'FILE'))->getRaffleItens();
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
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_CHARACTER_TXT, 1, 'FILE', $sexo))->getRaffleItens();
				$nome_taverna[]	= (new Raffleitemfile_Lib(TAVERN_CHARACTER_QUALITIES_TXT, 1, 'FILE', $sexo))->getRaffleItens();
			break;

			case 'oo':
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_OBJECTS_TXT, 1, 'FILE'))->getRaffleItens();
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_OBJECTS_TXT, 1, 'FILE'))->getRaffleItens();
			break;

			case 'pp':
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_CHARACTER_TXT, 1, 'FILE', $sexo))->getRaffleItens();
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_CHARACTER_TXT, 1, 'FILE', $sexo))->getRaffleItens();
			break;

			case 'oq':
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_OBJECTS_TXT, 1, 'FILE'))->getRaffleItens();
				$nome_taverna[]	= (new Raffleitemfile_Lib(TAVERN_OBJECT_QUALITIES_TXT, 1, 'FILE'))->getRaffleItens();
			break;

			case 'np':
				$nome_taverna[] = (new Raffleitemfile_Lib(TAVERN_NAME_TAVERNS_TXT, 1, 'FILE'))->getRaffleItens();
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

		$this->taverna = $taverna;
	}
}