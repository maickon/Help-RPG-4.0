<?php

class Nomes_Controller{

	function index(){
		return new Nomes_Model;
	}

	function service($file, $qtd){
		return new Nomes_Model($file, $qtd);
	}
}