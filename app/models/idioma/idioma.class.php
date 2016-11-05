<?php
class Idioma_Model extends Model_Lib{
	
	function __construct(){
		parent::__construct();
		$this->bandeiras = $this->bandeiras();
	}

	function bandeiras(){
		$bandeiras = [
			// 'alemanha'=>'de',
			// 'argentina'=>'es',
			'australia'=>'en-US',
			// 'belgica'=>'nl',
			'brasil'=>'pt-BR',
			'canada'=>'en-US',
			// 'chile'=>'es',
			// 'china'=>'zh-TW',
			// 'colombia'=>'es',
			// 'coreiadosul'=>'ko',
			'estadosunidos'=>'en-US',
			'japao'=>'ja-JP',
			'portugal'=>'pt-PT',
			'espanha'=>'es-ES',
			'russia'=>'ru-RU',
			'angola'=>'pt-PT',
			'mocambique'=>'pt-PT',
			'indonesia'=>'id-ID',
			'timorleste'=>'pt-PT',
			'suica'=>'de-AL',
			'franca'=>'fr-FR',
			'colombia'=>'es-ES'
		];

		return $bandeiras;
	}
}