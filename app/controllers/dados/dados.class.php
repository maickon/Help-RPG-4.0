<?php

class Dados_Controller{
	
	function index(){
		$tag = new Tags_Lib();
		require (new Render_Lib('dados'))->get_required_path();
		return new Dados_Model;
	}

	function service(){
		$d =  new Dados_Model;
		require (new Render_Lib('service'))->get_required_path();
	}
}