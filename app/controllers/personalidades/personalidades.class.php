<?php

Class Personalidades_Controller{
	
	function index(){
		$language = new Locale_Lib;
		$personalidades = new Personalidades_Model();
		$tag = new Tags_Lib;
		$home_helper = new Home_Helper();
		require (new Render_Lib())->get_required_path();
	}

	function service($param){
		$language = new Locale_Lib;
		if ($param == 'todos') {
			$personalidades = [
				'aspecto_titulo' => '',
				'aspecto' => '',
				'aspecto_negativo_titulo' => $language->PERSONALITY_BAD_ASPECT,
				'aspecto_negativo' => $this->aspecto_negativo(),
				'aspecto_positivo_titulo' => $language->PERSONALITY_GOOD_ASPECT,
				'aspecto_positivo' => $this->aspecto_positivo(),
				'aspecto_geral_titulo' => $language->PERSONALITY_GENERAL_ASPECT,
				'aspecto_geral' => $this->aspecto_geral(),
				'aspecto_ideologico_titulo' => $language->PERSONALITY_IDEOLOGIC_ASPECT,
				'aspecto_ideologia' => $this->aspecto_ideologia(),
				'aspecto_medo_titulo' => $language->PERSONALITY_FEAR_ASPECT,
				'aspecto_medo' => $this->aspecto_medo(),
				'aspecto_tendencia_titulo' => $language->PERSONALITY_TRAND_ASPECT,
				'aspecto_tendencia' => $this->aspecto_tendencia()
			];
		} else {
			$personalidade = new Personalidades_Model();
			if (method_exists($personalidade, $param)) {
				$titulos = [
							'aspecto_negativo' => $language->PERSONALITY_BAD_ASPECT,
							'aspecto_positivo' => $language->PERSONALITY_GOOD_ASPECT,
							'aspecto_geral' => $language->PERSONALITY_GENERAL_ASPECT,
							'aspecto_ideologia' => $language->PERSONALITY_IDEOLOGIC_ASPECT,
							'aspecto_medo' => $language->PERSONALITY_FEAR_ASPECT,
							'aspecto_tendencia' => $language->PERSONALITY_TRAND_ASPECT
							];
				$personalidades['aspecto_titulo'] = $titulos[$param];			
				$personalidades['aspecto'] = $personalidade->$param();
				$personalidades['aspecto_negativo_titulo'] = '';
				$personalidades['aspecto_negativo'] = '';
				$personalidades['aspecto_positivo_titulo'] = '';
				$personalidades['aspecto_positivo'] = '';
				$personalidades['aspecto_geral_titulo'] = '';
				$personalidades['aspecto_geral'] = '';
				$personalidades['aspecto_ideologico_titulo'] = '';
				$personalidades['aspecto_ideologia'] = '';
				$personalidades['aspecto_medo_titulo'] = '';
				$personalidades['aspecto_medo'] = '';
				$personalidades['aspecto_tendencia_titulo'] = '';
				$personalidades['aspecto_tendencia'] = '';

			} else {
				$this->error();
				exit();
			}
		}
		echo json_encode($personalidades);

	}

	function aspecto_negativo(){
		return (new Personalidades_Model())->aspecto_negativo();
	}

	function aspecto_positivo(){
		return (new Personalidades_Model())->aspecto_positivo();
	}
	
	function aspecto_geral(){
		return (new Personalidades_Model())->aspecto_geral();
	}
	
	function aspecto_ideologia(){
		return (new Personalidades_Model())->aspecto_ideologia();
	}
	
	function aspecto_medo(){
		return (new Personalidades_Model())->aspecto_medo();
	}

	function aspecto_tendencia(){
		return (new Personalidades_Model())->aspecto_tendencia();
	}
	
	function error(){
		echo '<center><h1>ERROR 404</h1></center><p>Página não encontrada.</p>';
	}
}