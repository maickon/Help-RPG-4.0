<?php

class Dados_Controller{
	
	function index(){
		$tag = new Tags_Lib();
		$home_helper = new Home_Helper();
		require (new Render_Lib('dados'))->get_required_path();
	}

	function service(){
		$d =  new Dados_Model;
		require (new Render_Lib('service'))->get_required_path();
	}
}