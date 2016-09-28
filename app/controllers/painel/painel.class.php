<?php

class Painel_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$painel = new Painel_Model;
		require (new Render_Lib())->get_required_path();
	}		
}