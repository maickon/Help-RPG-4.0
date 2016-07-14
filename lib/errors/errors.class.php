<?php

/*
	class Errors_Lib
	Personaliza mensagen de erro a 
	serem exibidas na pagina
*/

class Errors_Lib{

	private $tag, $form;

	function __construct(){
		$this->tag = new Tags_Lib;
		$this->form = new Form_Lib;
	}

	/*
		Show Method
		Uma mensagem de erro personalizada
	*/
	function show($parameters){
		if (is_array($parameters)) {
			$error_msg = 'Erro::' . end($parameters);
			unset($parameters[count($parameters)-1]);
		} else {
			$error_msg = "Erro::{$parameters}";
		}
		

		$this->tag->div('class="container"');
			
			$this->tag->h1();	
				new Flashmsg_Lib('danger', $error_msg);
			$this->tag->h1;
			
			$this->tag->div();
				if (is_array($parameters)) {
					$this->tag->h3();
						$this->tag->printer('Parametros');
					$this->tag->h3;
					
					$this->tag->ul();
					foreach ($parameters as $key => $value) {
						$this->tag->li();
							$this->tag->printer($value);
						$this->tag->li;
					}
					$this->tag->ul;
				}
			$this->tag->div;

		$this->tag->div;
	}
}