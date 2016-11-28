<?php 

class ModelCreator{

	function __construct($path, $class_name, $db_dependence = false){
		$file_name = strtolower($class_name);
		$class_name = ucfirst(strtolower($class_name));
		$code = '
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Classe de modelo gerada no automatico

	class '.$class_name.'_Model ';

	if ($db_dependence) {
		$code .= 'extends HelperRecord_Lib{';
	} else {
		$code .= '{';
	}
	
	$code .= '	
		function __construct(){
			parent::__construct();
			$this->set_attr_class($this, \''.$file_name.'\');	
		}
	}';

		mkdir("{$path}app/models/{$file_name}/");
		file_put_contents("{$path}app/models/{$file_name}/{$file_name}.class.php", $code);
	}
}