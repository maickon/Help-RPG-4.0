<?php

class Itens_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$language = new Locale_Lib;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$itens = new Itens_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$language = new Locale_Lib;
		$itens = new Itens_Model;
		$tipos = [
			'itens_estupidos' 	=> $language->ITENS_MAGIC_STUPID,
			'armas_magicas'		=> $language->ITENS_MAGIC_WAPONS,
			'armas_comuns'		=> $language->ITENS_COMUM_WAPONS,
			'escudos_magicos' 	=> $language->ITENS_MAGIC_SHIELD,
			'armaduras_magicas' => $language->ITENS_MAGIC_ARMOR,
			'bugigangas' 		=> $language->ITENS_RATTLETRAP,
			'botas' 			=> $language->ITENS_BOOTS,
			'capa'				=> $language->ITENS_COVERS,
			'colar'				=> $language->ITENS_NECKLACE,
			'coroa'				=> $language->ITENS_CROWN,
			'elmo'				=> $language->ITENS_HELMET,
			'mascara'			=> $language->ITENS_MASK,
			'medalhao'			=> $language->ITENS_MEDALLION,
			'oculos'			=> $language->ITENS_GRASSES,
			'tiara'				=> $language->ITENS_TIARA,
			'aneis_magicos'		=> $language->ITENS_MAGIC_RINGS,
			'grimorios'			=> $language->ITENS_GRIMORES,
			'outros'			=> $language->ITENS_OTHERS
    	];

		if (is_array($params)) {
			$attr = "{$params[0]}_path";
			$nome = (new Raffleitemfile_Lib("{$itens->$attr}", $params[1]))->getRaffleItens();	
			$nomes = ['titulo' => $tipos[$params[0]], 'descricao' => $nome];
		} else {
			$attr = "{$params}_path";
			$nome = (new Raffleitemfile_Lib("{$itens->$attr}", 1))->getRaffleItens();
			$nomes = ['titulo' => $tipos[$params], 'descricao' => $nome];
		}
		// echo '<pre>';
		// print_r($nome);
		echo json_encode($nomes);
	}
}