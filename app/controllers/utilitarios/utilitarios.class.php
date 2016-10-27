<?php

class Utilitarios_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$rota = $this;
		$tag = new Tags_Lib();
		$painel = new Painel_Model;
		$utilitarios = new Utilitarios_Model;
		$helprpg = $utilitarios->helprpg();
		$fichas = $utilitarios->npc_gerador();
		$masmorras = $utilitarios->masmorras();

		require (new Render_Lib())->get_required_path();
	}
}