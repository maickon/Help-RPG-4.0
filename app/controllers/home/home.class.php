<?php

class Home_Controller{

	function index(){
		$home = new Home_Model();
		$tag = new Tags_Lib;
		require (new Render_Lib($home))->get_required_path();
	}
}