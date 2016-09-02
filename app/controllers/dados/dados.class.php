<?php

class Dados_Controller{
	
	function index(){
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		$dados = new Dados_Model;
		require (new Render_Lib('dados'))->get_required_path();
	}

	function service($params, $return = false){
		if (is_array($params)) {
			$d =  new Dados_Model;
			if (method_exists($d, $params[0])) {
				for($i=1; $i<=$params[1]; $i++):
					$d =  new Dados_Model;
					if($d->$params[0] == 1):
						$class_css = 'result-rol-fail';
					elseif($d->$params[0] == substr($params[0], 1)):
						$class_css = 'result-rol-critical';
					else:
						$class_css = 'result-rol-normal';
					endif;
					$result[] = $d->$params[0];
				endfor;
			} else {
				$result = $this->error();
			}
		} else {
			$d =  new Dados_Model;
			if (method_exists($d, $params)) {
				$result = $d->$params;
			} else {
				$result = $this->error();
			}
		}

		if ($return) {
			return json_encode($result);
		} else {
			echo json_encode($result);	
		}
		// require (new Render_Lib('service'))->get_required_path();
	}

	function roll_dices($params){
		$result_service = json_decode($this->service($params, true));
		$result = array();
		for ($i=0; $i < count($result_service); $i++) {
			if($result_service[$i] == 1):
				$class_css = 'result-rol-fail';
			elseif($result_service[$i] == substr($params[0], 1)):
				$class_css = 'result-rol-critical';
			else:
				$class_css = 'result-rol-normal';
			endif;
			$c = $i+1;
			$result[] = "<br><span class=\"{$class_css}\">Rolagem[n°{$c}]::=><span id=\"resultados_{$params[0]}\">{$result_service[$i]}</span></span>";
		}
		// print_r($result);
		echo json_encode($result);
	}

	function error(){
		return 'Pagina nao encontrada!';
	}
}