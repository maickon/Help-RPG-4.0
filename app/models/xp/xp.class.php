<?php

class Xp_Model extends Model_Lib{
	
	public $tabela_xp;

	function __construct(){
		parent::__construct();
	}

	function tabela_xp($nivel){
		$xp_base_anterior = 0;
		for ($i=1; $i <= $nivel; $i++) {
			if ($i == 1) {
				$xp = 0;
				$tabela_xp["nivel_{$i}"] = 0;
				// $xp_base_anterior = $i * 1000;
			} else {
				$xp_base = ($i - 1) * 1000 + $xp_base_anterior;
				$xp = $xp_base;
				$xp_base_anterior += $i * 1000;
				if ($i != 0) {
					$tabela_xp["nivel_{$i}"] = $xp;
				}
			}
		}

		$this->tabela_xp = $tabela_xp;
	}

	function checar_nivel($usuario){
		$proximo_nivel = $usuario->nivel + 1;
		$this->tabela_xp($proximo_nivel);
		if ($usuario->xp > $this->tabela_xp["nivel_{$proximo_nivel}"]) {
			$novo_nivel = $usuario->nivel +1;
			$usuario_model = new Usuario_Model;
			$usuario_model->update('usuarios',['nivel'], [$novo_nivel], 'id', $_SESSION['id']);
		}
	}

	function gravar_xp($usuario){
		$novo_xp = 0;
		$novo_xp += $usuario->xp + 250 + rand(1,50);
		$usuario_model = new Usuario_Model;
		$usuario_model->update('usuarios',['xp'], [$novo_xp], 'id', $_SESSION['id']);
	}
}