<?php

/*
	Model_Lib
	Fornece funcionalidades uteis que
	sao inerentes a qualquer classe de modelo.
*/

class Model_Lib{


	function __construct(){
		$class_name =  explode('_',get_class($this))[0];
		$attr_img_icon_name = strtolower($class_name.'_img_icon'); //Ex: dados_img_icon
		$attr_index_url = strtolower($class_name.'_root_path'); //Ex: dados_root_path linka para a index de dados
		$attr_description = strtolower($class_name.'_descricao_alt'); //Ex: dados_descricao_alt descricao pra ser exibito no atributo alt

		$this->$attr_img_icon_name = URL_BASE . 'app/assets/img/icons/';
		$this->$attr_index_url = URL_BASE . strtolower($class_name) . '/';
		$this->$attr_description = strtoupper($class_name);

		$this->define_path(URL_BASE_INTERNAL . 'app/assets/css/', 'app/assets/css/', 'css');
		$this->define_path(URL_BASE_INTERNAL . 'app/assets/img/', 'app/assets/img/', 'img');
		$this->define_path(URL_BASE_INTERNAL . 'app/assets/js/', 'app/assets/js/', 'js');
		$this->define_path(URL_BASE_INTERNAL . 'app/assets/fonts/', 'app/assets/fonts/', 'font');
		$this->define_path(URL_BASE_INTERNAL . 'config/labels/', 'app/assets/labels/', 'label');
		$this->define_path(URL_BASE_INTERNAL . 'config/url/', 'app/assets/url/', 'url');
	}

	/*
		Method define_path()
		Cria novos atributos para corresponder
		a cada arquivo de texto relevante para o
		modelo que ira implementa lo.
		$base_path : Caminho base para os arquivos a serem listados
		Retorna os atributos na nomenclatura nomedoarquivo_path.
	*/

	function define_path($base_path, $file = null, $type = null){
		$dir = scandir($base_path);
		foreach ($dir as $key => $value) {
			if ($value != '.' and $value != '..') {
				$file_attr = str_replace('-', '_', explode('.', $value)[0]);
				if ($type != null && $file != null) {
					$file_attr .= "_{$type}_path";
				} else {
					$file_attr .= '_path';
				}
				
				/*
					se $file e $type estao preencidos sabemos 
					que se trata de definicao de path para assets.
				*/
				if ($type != null && $file != null) {
					$this->$file_attr = URL_BASE . $file . $value;
				} else {
					$this->$file_attr = $base_path . $value;
				}
			}
		}
	}
}