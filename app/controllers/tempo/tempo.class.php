<?php

class Tempo_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$tempo = new Tempo_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$tempo = new Tempo_Model;
		$attr = "{$params[0]}_path";

		$tipos = [
			'precipitacao' 	=> TIME_PRECIPITATION_LABEL,
			'temperatura'	=> TIME_TEMPERATURE_LABEL,
			'vento'			=> TIME_WIND_LABEL,
			'clima'			=> TIME_CLIMATE_LABEL,
			'todos' 		=> TIME_ALL_LABEL
    	];

		if (is_array($params)) {
			if ($params[0] == 'todos') {
				$nome[] = (new Raffleitemfile_Lib($tempo->clima_path, 1))->getRaffleItens();	
				$nome[] = (new Raffleitemfile_Lib($tempo->vento_path, 1))->getRaffleItens();	
				$nome[] = (new Raffleitemfile_Lib($tempo->temperatura_path, 1))->getRaffleItens();	
				$nome[] = (new Raffleitemfile_Lib($tempo->precipitacao_path, 1))->getRaffleItens();	
				$nomes = ['titulo' => $tipos[$params[0]], 'descricao' => $nome];
			} else {
				$nome = (new Raffleitemfile_Lib("{$tempo->$attr}", $params[1]))->getRaffleItens();	
				$nomes = ['titulo' => $tipos[$params[0]], 'descricao' => $nome];
			}
		} else {
			$nome = (new Raffleitemfile_Lib("{$tempo->$attr}", 1))->getRaffleItens();
			$nomes = ['titulo' => $tipos[$params], 'descricao' => $nome];
		}
		// echo '<pre>';
		// print_r($nome);
		echo json_encode($nomes);
	}
}