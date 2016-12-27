<?php

class Xp_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$xp = new Xp_Model();
		$xp->tabela_xp(100);
		$usuario = (new Usuario_Model)->select('usuarios', '*', ['id','=',$_SESSION['id']])[0];
		echo 'Nivel: '.$usuario->nivel.'<br	>';
		$xp->checar_nivel($usuario);

		echo '<pre>';
		// print_r($usuario);
		echo 'XP: '.$usuario->xp;
		echo 'Nivel: '.$usuario->nivel;
		echo '<br>';
		print_r($xp->tabela_xp);
		print_r($xp->gravar_xp($usuario));

		require (new Render_Lib())->get_required_path();
	}
}