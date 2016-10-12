<?php

class Armaduras_Helper{
	
	function __construct(){
		$this->categorias();
	}

	function categorias(){
		$this->categorias = [
			 ARMADURA_PESADA
			,ARMADURA_MADIA
			,ARMADURA_LEVE
			,ARMADURA_SIMPLES
			,ARMADURA_MAGICA_PESADA
			,ARMADURA_MAGICA_MEDIA
			,ARMADURA_MAGICA_LEVE
			,ARMADURA_MAGICA_SIMPLES
		];
	}
}