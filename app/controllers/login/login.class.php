<?php

class Login_Controller extends Controller_Lib{

	function __construct(){
		parent::get_path();
	}

	function index(){
		$login =  new Login_Model();
		$tag = new Tags_Lib();
		require (new Render_Lib())->get_required_path();
	}
}