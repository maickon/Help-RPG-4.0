<?php

class Painel_Model extends HelperRecord_Lib{

	public $url;

	function __construct(){
		parent::__construct();
		$this->url = new Model_Lib();
	}

	function rank_by_model($type){
		try{
			$class = ucfirst("{$type}_Model");
			$object = new $class;
			$data = $object->direct_instruction("
					SELECT
					    COUNT(*) AS contador,
					    dono
					FROM
					    {$type}
					GROUP BY
					    dono
					HAVING
					    COUNT(*) > 1
					ORDER BY contador DESC
				", $type);

			return $data;
		} catch (Exception $e){
			echo $e;
		}
	}

	function general_rank($qtd = 5){
		$usuarios = (new Usuario_Model())->direct_instruction("SELECT id,login as dono,nivel,xp,foto_link FROM usuarios u ORDER BY u.xp DESC LIMIT {$qtd}",'usuarios');
		return $usuarios;
	}

	function general_tables($qtd = 5){
		$data_atual = date("Y-m-d h:i:s");
		$mesas = (new Mesas_Model())->direct_instruction("SELECT id,nome,sistema,data_final FROM mesas WHERE '{$data_atual}' < data_final ORDER BY id DESC LIMIT {$qtd}",'mesas');
		return $mesas;
	}

	function model_rank($model){
		$class = ucfirst("{$model}_Model");
		$usuarios = (new $class())->direct_instruction("SELECT count(*) as qtd_registros, dono, u.id, u.foto_link, u.nivel, u.xp FROM {$model} a, usuarios u WHERE a.dono = u.login GROUP BY dono ORDER BY 'qtd_registros' ASC", $model);
		return $usuarios;
	}
}