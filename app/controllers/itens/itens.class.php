<?php

class Itens_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$itens = new Itens_Model;
		require (new Render_Lib())->get_required_path();
	}

	function service($params){
		$itens = new Itens_Model;
		$tipos = [
			'itens_estupidos' 	=> 'Itens mágicos Estúpidos',
			'armas_magicas'		=> 'Armas mágicas',
			'armas_comuns'		=> 'Armas comuns',
			'escudos_magicos' 	=> 'Escudos mágicos',
			'armaduras_magicas' => 'Armaduras mágicas',
			'bugigangas' 		=> 'Bugigangas',
			'botas' 			=> 'Botas',
			'capa'				=> 'Capas',
			'colar'				=> 'Colar',
			'coroa'				=> 'Coroa',
			'elmo'				=> 'Elmo',
			'mascara'			=> 'Mascaras',
			'medalhao'			=> 'Medalhão',
			'oculos'			=> 'Óculos',
			'tiara'				=> 'Tiara',
			'aneis_magicos'		=> 'Anéis mágicos',
			'grimorios'			=> 'Grimórios',
			'outros'			=> 'Outros'
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