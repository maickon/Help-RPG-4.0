<?php

class GeradorAventuras_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$language = new Locale_Lib();
		$aventura =  new GeradorAventuras_Model();
		$tag = new Tags_Lib();
		$form = new Form_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$data = $this->$params();
		echo json_encode($data);
	}

	function medieval(){
		$language = new Locale_Lib();
		$aventura =  new GeradorAventuras_Model();
		$tag = new Tags_Lib();
		$root = $this;
		$number = rand(1,6);

		$antagonist = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/antagonista/antagonista-opcao-{$number}.txt");
		$supporting = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/coadjuvantes/coadjuvantes-opcao-{$number}.txt");
		$complication = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/complicacao/complicacao-opcao-{$number}.txt");
		$locality = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/localidade/localidade-opcao-{$number}.txt");
		$objective_1 = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/objetivos/objetivo-{$number}.txt");
		$objective_2 = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/objetivos/objetivo-opcao-{$number}.txt");
		$rewards_1 = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/recompensas/recompensa-{$number}.txt");
		$rewards_2 = $aventura->sortear_nome_arquivo("{$aventura->medieval_path}/recompensas/recompensa-opcao-{$number}.txt");

		$aventura_completa = [
			['titulo-objetivo' => $language->ADVENTURE_OBJECTIVE_LABEL, 'conteudo-objetivo' => $objective_1 . $objective_2],
			['titulo-local' =>$language->ADVENTURE_LOCAL_LABEL, 'conteudo-local' => $locality],
			['titulo-antagonista' => $language->ADVENTURE_ANTAGONIST_LABEL, 'conteudo-antagonista' => $antagonist],
			['titulo-coadjuvante' => $language->ADVENTURE_SUPPORTING_LABEL, 'conteudo-coadjuvante' => $supporting],
			['titulo-complicaco' => $language->ADVENTURE_COMPLICATION_LABEL, 'conteudo-complicaco' => $complication],
			['titulo-recompensa' => $language->ADVENTURE_REWARD_LABEL, 'conteudo-recompensa' => $rewards_1 . $rewards_2]
		];

		return ($aventura_completa);
	}

	function starwar(){
		$language = new Locale_Lib();
		$aventura =  new GeradorAventuras_Model();
		$tag = new Tags_Lib();
		$root = $this;

		$antagonist = $aventura->sortear_nome_arquivo("{$aventura->starwars_path}/antagonistas.txt");
		$supporting = $aventura->sortear_nome_arquivo("{$aventura->starwars_path}/coadjuvantes.txt");
		$complication = $aventura->sortear_nome_arquivo("{$aventura->starwars_path}/complicacoes.txt");
		$locality = $aventura->sortear_nome_arquivo("{$aventura->starwars_path}/localidades.txt");
		$objective = $aventura->sortear_nome_arquivo("{$aventura->starwars_path}/objetivos.txt");
		$rewards= $aventura->sortear_nome_arquivo("{$aventura->starwars_path}/recompensas.txt");

		$aventura_completa = [
		['titulo-objetivo' => $language->ADVENTURE_OBJECTIVE_LABEL, 'conteudo-objetivo' => $antagonist],
		['titulo-local' =>$language->ADVENTURE_LOCAL_LABEL, 'conteudo-local' => $locality],
		['titulo-antagonista' => $language->ADVENTURE_ANTAGONIST_LABEL, 'conteudo-antagonista' => $antagonist],
		['titulo-coadjuvante' => $language->ADVENTURE_SUPPORTING_LABEL, 'conteudo-coadjuvante' => $supporting],
		['titulo-complicaco' => $language->ADVENTURE_COMPLICATION_LABEL, 'conteudo-complicaco' => $complication],
		['titulo-recompensa' => $language->ADVENTURE_REWARD_LABEL, 'conteudo-recompensa' => $rewards]
		];

		return ($aventura_completa);
	}

	function apocalipse(){
		$language = new Locale_Lib();
		$aventura =  new GeradorAventuras_Model();
		$tag = new Tags_Lib();
		$root = $this;
		$number = rand(1,6);

		$antagonist_1 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/antagonista/antagonista-{$number}.txt");
		$antagonist_2 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/antagonista/antagonista-opcao-{$number}.txt");
		$supporting_1 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/coadjuvantes/coadjuvantes-{$number}.txt");
		$supporting_2 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/coadjuvantes/coadjuvantes-opcao-{$number}.txt");		
		$complication_1 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/complicacao/complicacao-{$number}.txt");
		$complication_2 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/complicacao/complicacao-opcao-{$number}.txt");		
		$locality_1 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/localidade/localidade-{$number}.txt");
		$locality_2 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/localidade/localidade-opcao-{$number}.txt");		
		$objective_1 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/objetivos/objetivo-{$number}.txt");
		$objective_2 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/objetivos/objetivo-opcao-{$number}.txt");
		$rewards_1 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/recompensas/recompensa-{$number}.txt");
		$rewards_2 = $aventura->sortear_nome_arquivo("{$aventura->apocaliptica_path}/recompensas/recompensa-opcao-{$number}.txt");

		$aventura_completa = [
		['titulo-objetivo' => $language->ADVENTURE_OBJECTIVE_LABEL, 'conteudo-objetivo' => $objective_1 .' '. $objective_2],
		['titulo-local' =>$language->ADVENTURE_LOCAL_LABEL, 'conteudo-local' => $locality_1.' '.$locality_2],
		['titulo-antagonista' => $language->ADVENTURE_ANTAGONIST_LABEL, 'conteudo-antagonista' => $antagonist_1.' '.$antagonist_2],
		['titulo-coadjuvante' => $language->ADVENTURE_SUPPORTING_LABEL, 'conteudo-coadjuvante' => $supporting_1.' '.$supporting_2],
		['titulo-complicaco' => $language->ADVENTURE_COMPLICATION_LABEL, 'conteudo-complicaco' => $complication_1.' '.$complication_2],
		['titulo-recompensa' => $language->ADVENTURE_REWARD_LABEL, 'conteudo-recompensa' => $rewards_1 .' '. $rewards_2]
		];

		return ($aventura_completa);
	}
}