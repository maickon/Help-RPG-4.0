<?php
class Textos_Helper{

	function limitar_texto($texto, $limite){
    	return substr_replace($texto, (strlen($texto) > $limite ? '...' : ''), $limite);
	}
}