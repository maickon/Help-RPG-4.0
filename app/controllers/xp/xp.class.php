<?php

class Xp_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$tag = new Tags_Lib;
		$form = new Form_Lib;
		$xp = new Xp_Model();
		$xp->tabela_xp(21);
		
		// $xp->checar_nivel(10, 54001);

		echo '<pre>';
		print_r($xp->tabela_xp);
		// print_r($xp->gravar_xp(500));

		require (new Render_Lib())->get_required_path();
	}
}