<?php
/*
	Class RaffleItemFile_Lib
	Gerencia abertura de arquivo 
	para sortear lista de textos 
	divididos por quebra de linha.

	@author Maickon Rangel
	@date 23/06/2016
*/

class Raffleitemfile_Lib{

	private $file;
	private $path;
	private $raffle_name;
	private $list;
	private $raffle_number;
	private $raffle_itens;
	private $sex_option;

	function __construct($path = '', $number = '', $mode = 'FILE', $sex = 'R'){
		if(!empty($path) && !empty($number)) {
			$this->path = $path;
			$this->sex_option = $sex;
			$this->setSex();
			$this->raffle_number = $number;
			if ($mode == 'FILE') {
				$this->open_file();
				$this->explod_file_by_line();
				$this->file_line_raffle();		
			} elseif ($mode == 'DIR') {
				$this->file_list_by_name();
				$this->raffle_file_name();
			}
			$this->analize_line();
		}
	}

	function setRaffleNumber($number){
		$this->raffle_number = $number;
	}

	function getRaffleNumber(){
		return $this->raffle_number;
	}

	function get_file(){
		return $this->path;
	}

	function getRaffleItens(){
		return $this->raffle_itens;
	}

	function setSex(){
		switch ($this->sex_option) {
			case 'M':
				$this->sex_option = 0;
				break;

			case 'F':
				$this->sex_option = 1;
				break;
			
			case 'R':
				$this->sex_option = null;
				break;
		}
	}

	/*
		@method open_file()
		Atribui o arquivo aberto ao atributo $file da classe.
	*/

	function open_file(){
		$this->file = $file_open = file_get_contents($this->path);
	}

	/*
		@method explod_file()
		Divide os elementos separadas por
		quebra de linha e os transforma 
		em array.
	*/

	function explod_file_by_line(){
		$this->list = explode("\n", $this->file);
	}

	
	/*
		@method raffle_file()
		Retorna um ou mais elementos aleatorios
		de um array. 
		raffleNumber e a quantidade de elementos raffleeados
	*/

	function file_line_raffle(){
		$element = array_rand($this->list, $this->raffle_number);
		if (is_array($element)) {
			$this->formart_file_line_raffle($element);	
		} else {
			$this->raffle_itens = $this->list[$element];	
		}
	}

	/*
		@method formart_raffle_file()
		@parameter $element = array contendo o indice dos elementos raffleeados
		Preenche o atributo raffle_itens 
	*/

	function formart_file_line_raffle($element){
		foreach ($element as $value) {
			$this->raffle_itens[] = $this->list[$value];
		}
	}

	/*
		@method file_list_by_name()
		Inicializa uma lista de nomes baseado
		nos nomes dos arquivos da pasta solicitada.
	*/

	function file_list_by_name(){
		$files = scandir($this->path);
		unset($files[0]);
		unset($files[1]);
		$this->list = array_values($files);
	}

	/*
		@method raffle_file_name()
		Retorna o nome sorteado a partir de 
		uma lista de arquivos de um diretorio 
		e armazena em $raffle_itens

	*/

	function raffle_file_name(){
		$indices = array_rand($this->list, $this->raffle_number);
		if (is_array($indices)) {
			$this->formart_file_line_raffle($indices);	
		} else {
			$this->raffle_itens = $this->list[$indices];	
		}
	}

	/*
		@method analize_line()
		Alaniza a linha e identifica novos conjuntos a 
		partir de '|' e '/'. Ele separa a linha para cada
		'|' e separa novamente o resultado para cada '/'.

	*/

	function analize_line(){
		if (is_array($this->raffle_itens)) {

			foreach ($this->raffle_itens as $key => $value) {
				
				if (strripos($value, '|')) {
					$options = explode('|', $value);
					$chosen_option = array_rand($options);
					
					if (strripos($options[$chosen_option], '/')) {
						
						$chosen_sex = explode('/', $options[$chosen_option]);
						$index = array_rand($chosen_sex);
						if (!is_null($this->sex_option)) {
							$index = $this->sex_option;
						}

						$value = $chosen_sex[$index];
					
					} else {
						
						$value = ($options[$chosen_option]);
					
					}
				} elseif (strripos($value, '/')) {

					$chosen_sex = explode('/', $value);
					$index = array_rand($chosen_sex);
					if (!is_null($this->sex_option)) {
						$index = $this->sex_option;
					}

					$value = $chosen_sex[$index];

				}
				
				$this->raffle_itens[$key] = $value;
			}
		} else {
			$value = '';
			if (strripos($this->raffle_itens, '|')) {

				$options = explode('|', $this->raffle_itens);
				$chosen_option = array_rand($options);
				
				if (strripos($options[$chosen_option], '/')) {
					
					$chosen_sex = explode('/', $options[$chosen_option]);
					$index = array_rand($chosen_sex);
					if (!is_null($this->sex_option)) {
						$index = $this->sex_option;
					}

					$value = $chosen_sex[$index];
				
				} else {
					
					$value = ($options[$chosen_option]);
				
				}

				$this->raffle_itens = $value;
			
			} elseif (strripos($this->raffle_itens, '/')) {

				$chosen_sex = explode('/', $this->raffle_itens);
				$index = array_rand($chosen_sex);
				if (!is_null($this->sex_option)) {
					$index = $this->sex_option;
				}

				$value = $chosen_sex[$index];
				$this->raffle_itens = $value;

			}
				
		}
	}
}