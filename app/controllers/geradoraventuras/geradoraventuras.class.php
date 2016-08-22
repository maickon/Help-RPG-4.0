<?php

class GeradorAventuras_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
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
		$tag = new Tags_Lib();
		$root = $this;
		$number = rand(1,6);

		$file_antagonista = "antagonista-opcao-{$number}.txt";
		$antagonist = new GeradorAventuras_Model(MEDIVEL_ANTGONIST_TXT_PATH. $file_antagonista);
		
		$file_coadjuvantes = "coadjuvantes-opcao-{$number}.txt";
		$supporting = new GeradorAventuras_Model(MEDIVEL_SUPPORTING_TXT_PATH. $file_coadjuvantes);
		
		$file_complicacao = "complicacao-opcao-{$number}.txt";
		$complication = new GeradorAventuras_Model(MEDIVEL_COMPLICATION_TXT_PATH. $file_complicacao);
		
		$file_localidade = "localidade-opcao-{$number}.txt";
		$locality = new GeradorAventuras_Model(MEDIVEL_LOCALITY_TXT_PATH. $file_localidade);
		
		$file_objetivo_1 = "objetivo-{$number}.txt";
		$file_objetivo_2 = "objetivo-opcao-{$number}.txt";
		$objective_1 = new GeradorAventuras_Model(MEDIVEL_OBJECTIVE_TXT_PATH. $file_objetivo_1);
		$objective_2 = new GeradorAventuras_Model(MEDIVEL_OBJECTIVE_TXT_PATH. $file_objetivo_2);
		
		$file_recompensa_1 = "recompensa-{$number}.txt";
		$file_recompensa_2 = "recompensa-opcao-{$number}.txt";
		$rewards_1 = new GeradorAventuras_Model(MEDIVEL_REWARDS_TXT_PATH. $file_recompensa_1);
		$rewards_2 = new GeradorAventuras_Model(MEDIVEL_REWARDS_TXT_PATH. $file_recompensa_2);

		$aventura_completa = [
		['titulo-objetivo' => OBJECTIVE_LABEL, 'conteudo-objetivo' => $objective_1->getNames() . $objective_2->getNames()],
		['titulo-local' =>LOCAL_LABEL, 'conteudo-local' => $locality->getNames()],
		['titulo-antagonista' => ANTAGONIST_LABEL, 'conteudo-antagonista' => $antagonist->getNames()],
		['titulo-coadjuvante' => SUPPORTING_LABEL, 'conteudo-coadjuvante' => $supporting->getNames()],
		['titulo-complicaco' => COMPLICATION_LABEL, 'conteudo-complicaco' => $complication->getNames()],
		['titulo-recompensa' => REWARD_LABEL, 'conteudo-recompensa' => $rewards_1->getNames() . $rewards_2->getNames()]
		];

		return ($aventura_completa);
	}

	function starwar(){
		$tag = new Tags_Lib();
		$root = $this;

		$file_antagonista = "antagonistas.txt";
		$antagonist = new GeradorAventuras_Model(STAR_WAR_ANTGONIST_TXT_PATH. $file_antagonista);
		
		$file_coadjuvantes = "coadjuvantes.txt";
		$supporting = new GeradorAventuras_Model(STAR_WAR_SUPPORTING_TXT_PATH. $file_coadjuvantes);
		
		$file_complicacao = "complicacoes.txt";
		$complication = new GeradorAventuras_Model(STAR_WAR_COMPLICATION_TXT_PATH. $file_complicacao);
		
		$file_localidade = "localidades.txt";
		$locality = new GeradorAventuras_Model(STAR_WAR_LOCALITY_TXT_PATH. $file_localidade);
		
		$file_objetivo = "objetivos.txt";
		$objective = new GeradorAventuras_Model(STAR_WAR_OBJECTIVE_TXT_PATH. $file_objetivo);
		
		$file_recompensa = "recompensas.txt";
		$rewards = new GeradorAventuras_Model(STAR_WAR_REWARDS_TXT_PATH. $file_recompensa);

		$aventura_completa = [
		['titulo-objetivo' => OBJECTIVE_LABEL, 'conteudo-objetivo' => $objective->getNames()],
		['titulo-local' =>LOCAL_LABEL, 'conteudo-local' => $locality->getNames()],
		['titulo-antagonista' => ANTAGONIST_LABEL, 'conteudo-antagonista' => $antagonist->getNames()],
		['titulo-coadjuvante' => SUPPORTING_LABEL, 'conteudo-coadjuvante' => $supporting->getNames()],
		['titulo-complicaco' => COMPLICATION_LABEL, 'conteudo-complicaco' => $complication->getNames()],
		['titulo-recompensa' => REWARD_LABEL, 'conteudo-recompensa' => $rewards->getNames()]
		];

		return ($aventura_completa);
	}

	function apocalipse(){
		$tag = new Tags_Lib();
		$root = $this;
		$number = rand(1,6);

		$file_antagonista_1 = "antagonista-{$number}.txt";
		$file_antagonista_2 = "antagonista-opcao-{$number}.txt";
		$antagonist_1 = new GeradorAventuras_Model(APOCALIPSE_ANTGONIST_TXT_PATH. $file_antagonista_1);
		$antagonist_2 = new GeradorAventuras_Model(APOCALIPSE_ANTGONIST_TXT_PATH. $file_antagonista_2);
		
		$file_coadjuvantes_1 = "coadjuvantes-{$number}.txt";
		$file_coadjuvantes_2 = "coadjuvantes-opcao-{$number}.txt";
		$supporting_1 = new GeradorAventuras_Model(APOCALIPSE_SUPPORTING_TXT_PATH. $file_coadjuvantes_1);
		$supporting_2 = new GeradorAventuras_Model(APOCALIPSE_SUPPORTING_TXT_PATH. $file_coadjuvantes_2);
		
		$file_complicacao_1 = "complicacao-{$number}.txt";
		$file_complicacao_2 = "complicacao-opcao-{$number}.txt";
		$complication_1 = new GeradorAventuras_Model(APOCALIPSE_COMPLICATION_TXT_PATH. $file_complicacao_1);
		$complication_2 = new GeradorAventuras_Model(APOCALIPSE_COMPLICATION_TXT_PATH. $file_complicacao_2);
		
		$file_localidade_1 = "localidade-{$number}.txt";
		$file_localidade_2 = "localidade-opcao-{$number}.txt";
		$locality_1 = new GeradorAventuras_Model(APOCALIPSE_LOCALITY_TXT_PATH. $file_localidade_1);
		$locality_2 = new GeradorAventuras_Model(APOCALIPSE_LOCALITY_TXT_PATH. $file_localidade_2);
		
		$file_objetivo_1 = "objetivo-{$number}.txt";
		$file_objetivo_2 = "objetivo-opcao-{$number}.txt";
		$objective_1 = new GeradorAventuras_Model(APOCALIPSE_OBJECTIVE_TXT_PATH. $file_objetivo_1);
		$objective_2 = new GeradorAventuras_Model(APOCALIPSE_OBJECTIVE_TXT_PATH. $file_objetivo_2);
		
		$file_recompensa_1 = "recompensa-{$number}.txt";
		$file_recompensa_2 = "recompensa-opcao-{$number}.txt";
		$rewards_1 = new GeradorAventuras_Model(APOCALIPSE_REWARDS_TXT_PATH. $file_recompensa_1);
		$rewards_2 = new GeradorAventuras_Model(APOCALIPSE_REWARDS_TXT_PATH. $file_recompensa_2);

		$aventura_completa = [
		['titulo-objetivo' => OBJECTIVE_LABEL, 'conteudo-objetivo' => $objective_1->getNames() .' '. $objective_2->getNames()],
		['titulo-local' =>LOCAL_LABEL, 'conteudo-local' => $locality_1->getNames().' '.$locality_2->getNames()],
		['titulo-antagonista' => ANTAGONIST_LABEL, 'conteudo-antagonista' => $antagonist_1->getNames().' '.$antagonist_2->getNames()],
		['titulo-coadjuvante' => SUPPORTING_LABEL, 'conteudo-coadjuvante' => $supporting_1->getNames().' '.$supporting_2->getNames()],
		['titulo-complicaco' => COMPLICATION_LABEL, 'conteudo-complicaco' => $complication_1->getNames().' '.$complication_2->getNames()],
		['titulo-recompensa' => REWARD_LABEL, 'conteudo-recompensa' => $rewards_1->getNames() .' '. $rewards_2->getNames()]
		];

		return ($aventura_completa);
	}
}