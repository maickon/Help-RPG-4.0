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
}