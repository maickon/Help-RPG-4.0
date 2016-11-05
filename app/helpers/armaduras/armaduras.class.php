<?php

class Armaduras_Helper{
	
	function __construct(){
		$this->language = new Locale_Lib;
		$this->categorias();
	}

	function categorias(){
		$this->categorias = [
			 $this->language->ARMOR_HEAVY
			,$this->language->ARMOR_MEDIA
			,$this->language->ARMOR_LIGHT
			,$this->language->ARMOR_SIMPLE
			,$this->language->ARMOR_HEAVY_MAGIC
			,$this->language->ARMOR_MEDIA_MAGIC
			,$this->language->ARMOR_LIGHT_MAGIC
			,$this->language->ARMOR_SIMPLE_MAGIC
		];
	}
}