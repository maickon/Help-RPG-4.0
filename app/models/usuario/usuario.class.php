<?php

class Usuario_Model extends HelperRecord_Lib{

	public $url;

	function __construct(){
		parent::__construct();
		$this->url = new Model_Lib();
	}

	function get_all($dono){
		$modulos = ['armaduras','armas','artefatos','aventuras','bestiario','cenarios','classes','contos','cronicas','escudos','galeria','habilidades','lugares','magias','mesas','pericias','personagens','talentos','armaduras'];
		$dados = [];

		foreach ($modulos as $key => $value) {
			$class_name = ucfirst("{$value}_Model");
			$modulo 	= (new $class_name)->select($value, '*',['dono','=',$dono]);
			if (count($modulo) > 0) {
				foreach ($modulo as $key2 => $value2) {
					$modulo[$key2]->modulo = $value;
				}
			}
			if (!empty($modulo)) {
				$dados[] = $modulo;
			}
		}

		$dados_formatados = [];

		foreach ($dados as $key => $value) {
			foreach ($value as $key2 => $value2) {
				if (property_exists($value[$key2], 'nome')) {
					$dados_formatados[] = [
									'id' => $value[$key2]->id,
									'nome' => $value[$key2]->nome,
									'modulo' => $value[$key2]->modulo,
									'descricao' => $value[$key2]->descricao];
				} elseif (property_exists($value[$key2], 'titulo')) {
					echo $value[$key2]->titulo;
				}
			}
		}

		return ($dados_formatados);
	}
}