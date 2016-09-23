<?php

class Cidades_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$cidade = new Cidades_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service(){
		$cidade = new Cidades_Model;
		$cidade->poder_central();

		$cidade_criada = [
			'nome_label' 							=> CITIES_NAME_LABEL,
			'nome' 									=> $cidade->nome(),
			'tamanho_label' 						=> CITIES_SIZE_LABEL,
			'tamanho' 								=> $cidade->tamanho(),
			'populacao_label' 						=> CITIES_POPULATION_LABEL,
			'populacao' 							=> $cidade->populacao(),
			'limite_po_label' 						=> CITIES_LIMIT_PO_LABEL,
			'limite_po' 							=> $cidade->limite_po(),
			'tipo_poder_central_label' 				=> CITIES_CENTRAL_POWER_LABEL,
			'tipo_poder_central' 					=> $cidade->tipo_poder_central,
			'tipo_poder_central_descricao_label' 	=> CITIES_CENTRAL_POWER_DESCRIPTION_LABEL,
			'tipo_poder_central_descricao' 			=> $cidade->tipo_poder_central_descricao,
			'tipo_poder_central_escolhido_label' 	=> CITIES_CENTRAL_POWER_CHOSED_LABEL,
			'tipo_poder_central_escolhido' 			=> $cidade->tipo_poder_central_escolhido,
			'tendencia_do_poder_central_label' 		=> CITIES_TRAND_LABEL,
			'tendencia_do_poder_central' 			=> $cidade->tendencia_do_poder_central(),
			'composicao_racial_label' 				=> CITIES_RACIAL_COMPOSED_LABEL,
			'composicao_racial' 					=> $cidade->composicao_racial(),
			'tipo_de_defesa_label' 					=> CITIES_DEFENSE_LABEL,
			'tipo_de_defesa' 						=> $cidade->tipo_de_defesa(),
			'tipo_de_religiao_label' 				=> CITIES_RELIGION_LABEL,
			'tipo_de_religiao' 						=> $cidade->tipo_de_religiao(),
			'tipo_de_cultura_label' 				=> CITIES_CUTURAL_LABEL,
			'tipo_de_cultura' 						=> $cidade->tipo_de_cultura()
		];
		
		echo json_encode($cidade_criada);
	}
}