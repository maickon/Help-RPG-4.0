<?php
class Cidades_Model extends Model_Lib{

	function __construct(){
		parent::__construct();
		$this->define_path(CONFIG_TXT_PATH.'cidades/');
		$this->tamanho = $this->tamanho();
		$this->language = new Locale_Lib;
		// parametros = populacao min, populacao max, limite em PO, mod. de poder central, mod. comunidade
		$this->cidades = [
			'Lugarejo' 			=> [20, 40, 40, -1, -3],
			'Povoado' 			=> [81, 400, 100, 0, -2],
			'Aldeia' 			=> [401, 900, 200, 1, -1],
			'Vila pequena' 		=> [901, 2.000, 800, 2, 0],
			'Vila grande' 		=> [2001, 5000, 3000, 3, 3],
			'Cidade pequena' 	=> [5001, 12000, 15000, 4, 6],
			'Cidade grande' 	=> [12001, 25000, 40000, 5, 9],
			'Metrópole' 		=> [25001, 100000, 100000, 6, 12],
		];
	}

	function nome(){
		return (new Raffleitemfile_Lib($this->nome_path, 1, 'FILE'))->getRaffleItens();
	}

	function tamanho(){
		return (new Raffleitemfile_Lib($this->tamanho_path, 1, 'FILE'))->getRaffleItens();
	}

	function tendencia_do_poder_central(){
		return (new Raffleitemfile_Lib($this->tendencia_path, 1, 'FILE'))->getRaffleItens();
	}

	function tipo_de_defesa(){
		return (new Raffleitemfile_Lib($this->defesa_path, 1, 'FILE'))->getRaffleItens();
	}

	function tipo_de_religiao(){
		return (new Raffleitemfile_Lib($this->religiao_path, 1, 'FILE'))->getRaffleItens();
	}

	function tipo_de_cultura(){
		return (new Raffleitemfile_Lib($this->cultura_path, 3, 'FILE'))->getRaffleItens();
	}

	function populacao(){
		$min = $this->cidades[rtrim($this->tamanho)][0];
		$max = $this->cidades[rtrim($this->tamanho)][1];
		$populacao = number_format(rand($min, $max));
		return $populacao . $this->language->CITIES_POPULATION_SIZE_LABEL;
	}

	function limite_po(){
		return number_format($this->cidades[rtrim($this->tamanho)][2]);
	}

	function composicao_racial(){
		$racas = [
				$this->language->CITIES_HUMAN_LABEL,
				$this->language->CITIES_HALFLING_LABEL,
				$this->language->CITIES_ELF_LABEL,
				$this->language->CITIES_DWARF_LABEL,
				$this->language->CITIES_GNOMES_LABEL,
				$this->language->CITIES_HALF_ELF_LABEL,
				$this->language->CITIES_HELF_ORC_LABEL,
				$this->language->CITIES_OTHERS_LABEL
			];

		$racas_porcentagem = [
			rand(40,69),
			rand(5,10),
			rand(1,6),
			rand(1,5),
			rand(1,4),
			rand(1,3),
			rand(1,2),
			rand(1,1),
			];

		$total = 0;
		foreach ($racas_porcentagem as $value) {
			$total += $value;
		}

		if ($total < 100) {
			$faltante = 100 - $total;
		}

		$pos = rand(0,7);
		$racas_porcentagem[$pos] += $faltante;

		$composicao_racial = array();
		for ($i=0; $i < count($racas); $i++) { 
			$composicao_racial[$i] = "{$racas_porcentagem[$i]}% {$racas[$i]}";
		}

		return $composicao_racial;
	}	

	function poder_central(){
		$d20 = rand(1, 20);
		$modificador = $this->cidades[rtrim($this->tamanho)][3];
		$rolagem = $d20 + $modificador;

		if ($rolagem <= 13) {
			$opcoes = [
				$this->language->CITIES_CONVENTIONAL_OPTION_1_LABEL,
				$this->language->CITIES_CONVENTIONAL_OPTION_2_LABEL,
				$this->language->CITIES_CONVENTIONAL_OPTION_3_LABEL,
				$this->language->CITIES_CONVENTIONAL_OPTION_4_LABEL
			];
			$this->tipo_poder_central = $this->language->CITIES_CONVENTIONAL_LABEL;
			$this->tipo_poder_central_descricao = $this->language->CITIES_CONVENTIONAL_DESCRIPTION_LABEL;
			$this->tipo_poder_central_escolhido = $opcoes[rand(0,3)];
		} elseif ($rolagem >= 14 and $rolagem <= 18) {
			$opcoes = [
				$this->language->CITIES_INCOMUM_OPTION_1_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_2_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_3_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_4_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_5_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_6_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_7_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_8_LABEL,
				$this->language->CITIES_INCOMUM_OPTION_9_LABEL
			];
			$this->tipo_poder_central = $this->language->CITIES_INCOMUM_LABEL;
			$this->tipo_poder_central_descricao = $this->language->CITIES_INCOMUM_DESCRIPTION_LABEL;
			$this->tipo_poder_central_escolhido = $opcoes[rand(0,8)];
		} else {
			$opcoes = [
				$this->language->CITIES_MAGIC_OPTION_1_LABEL,
				$this->language->CITIES_MAGIC_OPTION_2_LABEL,
				$this->language->CITIES_MAGIC_OPTION_3_LABEL,
				$this->language->CITIES_MAGIC_OPTION_4_LABEL,
				$this->language->CITIES_MAGIC_OPTION_5_LABEL,
				$this->language->CITIES_MAGIC_OPTION_6_LABEL,
				$this->language->CITIES_MAGIC_OPTION_7_LABEL
			];
			$this->tipo_poder_central = $this->language->CITIES_MAGIC_LABEL;
			$this->tipo_poder_central_descricao = $this->language->CITIES_MAGIC_DESCRIPTION_LABEL;
			$this->tipo_poder_central_escolhido = $opcoes[rand(0,6)];
		}
	}
}