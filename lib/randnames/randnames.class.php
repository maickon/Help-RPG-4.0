<?php
/*
	Class RandNames
	Gera nomes aleatorios
	@outor Maickon Rangel
	@data 23/06/2016
*/

class Randnames_Lib{

	private $vowels = array('a','e','i','o','u');
	private $consonants = array('b','c','d','f','g','h','nh','lh','ch','j','k','l','m','n','p','qu','r','rr','s','ss','t','v','w','x','y','z',);
	private $word_size_min; 
	private $word_size_max;
	private $final_name;

	function __construct($word_size_min = 2, $word_size_max = 5){
		$this->word_size_min = $word_size_min;
		$this->word_size_max = $word_size_max;
		$this->do_name();
	}

	function getName(){
		return $this->final_name;
	}
	function do_name(){
		$word = '';
		$word_size = rand($this->word_size_min, $this->word_size_max);
		$cont_syllables = 0;

		while($cont_syllables < $word_size){
		   $vowel = $this->vowels[rand(0,count($this->vowels)-1)];
		   $consonants = $this->consonants[rand(0,count($this->consonants)-1)];
		   $syllable = $consonants.$vowel;
		   $word .= $syllable;
		   $cont_syllables++;
		   unset($vowel, $consonants, $syllable);
		}
		$this->final_name = ucfirst($word);
	}

	function show_name(){
		echo "<h3>Nome: {$this->final_name}</h3>";
	}
}