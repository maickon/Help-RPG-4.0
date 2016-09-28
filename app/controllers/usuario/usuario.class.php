<?php

class Usuario_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$usuario = new Usuario_Model();
		$usuarios = $usuario->select('usuarios');
		require (new Render_Lib())->get_required_path();
	}		
}