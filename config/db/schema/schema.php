<?php

/**
 * Database Schema - Help RPG
 **/

class Schema{

	public $_DB_TABLE_USUARIOS = [
		'table_name'	=>'usuarios',
		'fields'		=> [
			'nome'				=> 'varchar(255)',
			'adm'				=> 'int(11) not null default 0',
			'login'				=> 'varchar(255)',
			'senha'				=> 'varchar(255)',
			'hash_code'			=> 'varchar(255)',
			'nivel'				=> 'varchar(255)',
			'xp'				=> 'varchar(255)',
			'estrelas'			=> 'varchar(255)',
			'ativo'				=> 'varchar(255)',
			'sexo'				=> 'varchar(255)',
			'data_nascimento'	=> 'varchar(255)',
			'pais'				=> 'varchar(255)',
			'cidade'			=> 'varchar(255)',
			'estado'			=> 'varchar(255)',
			'whats_app'			=> 'varchar(255)',
			'skype'				=> 'varchar(255)',
			'rpgs_preferido'	=> 'varchar(255)',
			'classe_preferida'	=> 'varchar(255)',
			'raca_preferida'	=> 'varchar(255)',
			'e_mestre'			=> 'varchar(255)',
			'frase_preferida'	=> 'varchar(255)',
			'foto_link'			=> 'varchar(255)',
			'capa_link'			=> 'varchar(255) NOT NULL DEFAULT \'https://scontent.fbsb2-1.fna.fbcdn.net/v/t1.0-9/15037162_975034705936539_8898971176691255883_n.png?oh=cdbb1202d490a1548389da430218aaad&oe=58F93CD7\'',
			'capa_pequena_link'	=> 'varchar(255) NOT NULL DEFAULT \'https://helprpg.files.wordpress.com/2016/12/help.png\'',
			'facebook_link'		=> 'varchar(255)',
			'twitter_link'		=> 'varchar(255)',
			'youtube_link'		=> 'varchar(255)',
			'gplus_link'		=> 'varchar(255)',
			'pagina_social'		=> 'varchar(255)',
			'site_pessoal'		=> 'varchar(255)',
			'email'				=> 'varchar(255)',
			'ultimo_login'		=> 'TIMESTAMP NOT NULL',
			'descricao'			=> 'longtext'
			]
	];

	public $_DB_TABLE_PREFERENCIAS = [
		'table_name'	=>'preferencias',
		'fields'		=> [
			'usuario_id'		=> 'int not null',
			'lingua'			=> 'varchar(255)',
			'timeline'			=> 'varchar(255)',
			'assuntos'			=> 'varchar(255)',
			],
		'fk_reference'	=> ['preferencias','usuario_id','usuarios']
	];

	public $_DB_TABLE_PAGINAS = [
		'table_name'	=>'paginas',
		'fields'		=> [
			'id'				=> 'int not null',
			'lingua'			=> 'varchar(255)',
			'mome'				=> 'varchar(255)',
			'titulo'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_ARMADURAS = [
		'table_name'	=>'armaduras',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'categoria'			=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_ARMAS = [
		'table_name'	=>'armas',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_ESCUDOS = [
		'table_name'	=>'escudos',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_ARTEFATOS = [
		'table_name'	=>'artefatos',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_AVENTURAS = [
		'table_name'	=>'aventuras',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'titulo'			=> 'varchar(255)',
			'descricao_pequena'	=> 'text',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_BESTIARIO = [
		'table_name'	=>'bestiario',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_CENARIO = [
		'table_name'	=>'cenario',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'descricao_pequena'	=> 'text',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_LUGARES = [
		'table_name'	=>'lugares',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'tipo'				=> 'varchar(255)', //cidade,taverna,vilarejo,metrópole,reino,vila,caverna
			'dono'				=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_CONTOS = [
		'table_name'	=>'contos',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'titulo'			=> 'varchar(255)',
			'tipo'				=> 'varchar(255)', //romance, terror, meieval, futurista... etc...
			'descricao_pequena'	=> 'text',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_CRONICAS = [
		'table_name'	=>'cronicas',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'titulo'			=> 'varchar(255)',
			'tipo'				=> 'varchar(255)', //romance, terror, meieval, futurista... etc...
			'descricao_pequena'	=> 'text',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_HISTORIAS = [
		'table_name'	=>'historias',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'titulo'			=> 'varchar(255)',
			'tipo'				=> 'varchar(255)', //romance, terror, meieval, futurista... etc...
			'descricao_pequena'	=> 'text',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_PERSONAGENS = [
		'table_name'	=>'personagens',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'tipo'				=> 'varchar(255)',
			'classe'			=> 'varchar(255)',
			'raca'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_PERICIAS = [
		'table_name'	=>'pericias',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_TALENTOS = [
		'table_name'	=>'talentos',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_HABILIDADES = [
		'table_name'	=>'habilidades',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_MAGIAS = [
		'table_name'	=>'magias',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_TIMELINE = [
		'table_name'	=>'timeline',
		'fields'		=> [
			'id_cadastro'		=> 'varchar(255)',
			'lingua'			=> 'varchar(255)',
			'titulo'			=> 'varchar(255)',
			'exibir'			=> 'varchar(255)',
			'tipo'				=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_GALERIA_DE_IMAGENS = [
		'table_name'	=>'galeria',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'url_img'			=> 'varchar(255)',
			'tipo'				=> 'varchar(255)', //personagem, monstro, cidade, masmorra etc
			'dono'				=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_CLASSES = [
		'table_name'	=>'classes',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'tipo'				=> 'varchar(255)', //basica ou prestigio
			'sistema'			=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_MESSAS = [
		'table_name'	=>'messas',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'data_final'		=> 'timestamp',
			'dono'				=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	public $_DB_TABLE_VIDEOS = [
		'table_name'	=>'videos',
		'fields'		=> [
			'lingua'			=> 'varchar(255)',
			'nome'				=> 'varchar(255)',
			'link'				=> 'varchar(255)',
			'iframe'			=> 'varchar(255)',
			'sistema'			=> 'varchar(255)',
			'dono'				=> 'varchar(255)',
			'descricao'			=> 'longtext'
		]
	];

	function generate_tables(){
		$db_record = new HelperRecord_Lib;
		try{
			foreach($this as $attributes){
				$db_record->createTable($attributes);
				if (isset($attributes['fk_reference'])) {
					$db_record->fkReferences($attributes['fk_reference'][0], $attributes['fk_reference'][1], $attributes['fk_reference'][2]);
				}
			}
			return true;
		} catch(Exception $e){
			echo $e;
		}
	}

	function show_tables(){
		$attrs = '';
		foreach($this as $attributes){
			foreach ($attributes['fields'] as $key => $value) {
	   			$attrs .= "[{$key}::{$value}]\n";
	   		}
	   		echo '<input type="button" name="botao" value="'.$attributes['table_name'].'" class="model-btn-core" title="'.$attrs.'">';
	   		$attrs = '';
		}
	}
}