<?php
class Armaduras_Controller{

	function index(){
		$armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
		$armaduras = $armadura->select($armadura->getTable());
		return $armaduras;
	}

	function new(){
		$create_armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
		$_REQUEST['img'] =  $_FILES['img'];
		$create_armadura->create($_REQUEST);
	}

	function create(){
		$create_armadura = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
	}

	function edit(){
		$objeto = new Armaduras(ROOTPATH.ARMADURASIMGPATH);
		$armadura = $objeto->select($objeto->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
		$create_armadura->update_data($_REQUEST);
	}

	function delete(){
		$armadura = $show_armadura->select($show_armadura->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);
		$delete = $show_armadura->delete_data($armadura);
		if($delete == 1):
			help_header(ROOTPATHURL.ARMADURASPATH.'?status=deleted');
		else:
			help_header(ROOTPATHURL.ARMADURASPATH.'?status=error');
		endif;
	}
}