<?php

	/**
	* Função para gerar senhas aleatórias
	*
	* @author Thiago Belem <contato@thiagobelem.net>
	*
	* @param integer $tamanho Tamanho da senha a ser gerada
	* @param boolean $maiusculas Se terá letras maiúsculas
	* @param boolean $numeros Se terá números
	* @param boolean $simbolos Se terá símbolos
	*
	* @return string A senha gerada
	*/

class Senhas_Helper{

	function __construct(){
		$this->senha = $this->gerar_senha();
	}

	function gerar_senha($tamanho = 12, $maiusculas = true, $numeros = true, $simbolos = true){

		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';

		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;

		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;

		$len = strlen($caracteres);

		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}

		return $retorno;
	}
}