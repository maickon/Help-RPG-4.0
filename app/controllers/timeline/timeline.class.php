<?php

class Timeline_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		require (new Render_Lib())->get_required_path();
	}

	function exibir($params){
		$timeline = new Timeline_Model;
		$data = $timeline->direct_instruction('SELECT * FROM timeline LIMIT '.$params[0].','.$params[1],'timeline');
		print_r($data);
	}

	function timeline_total(){
		echo (new Timeline_Model)->qtd_max('timeline')->count;
	}
}