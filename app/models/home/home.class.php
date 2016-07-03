<?php
class Home_Model{

	private $home_data = array();

	function __construct(){
		$this->home_data['count_user'] 	= $this->get_count_user();
		$this->home_data['count_armadura'] = $this->get_count_armadura();
		$this->home_data['count_arma'] 	= $this->get_count_arma();
		$this->home_data['count_artefato'] = $this->get_count_artefato();
		$this->home_data['count_personagem_jogador'] = $this->get_count_personagem_jogador();
		$this->home_data['count_personagem_monstro'] = $this->get_count_personagem_monstro();
		$this->home_data['count_personagem_npc'] = $this->get_count_personagem_npc();
		$this->home_data['count_fichas'] 	= $this->get_count_fichas();
		$this->home_data['count_talentos'] = $this->get_count_talentos();
		$this->home_data['count_magias'] 	= $this->get_count_magias();
		$this->home_data['count_pericias'] = $this->get_count_pericias();
		$this->home_data['count_aventuras'] = $this->get_count_aventuras();
		$this->home_data['count_historias'] = $this->get_count_historias();
		$this->home_data['count_contos']	= $this->get_count_contos();
		$this->home_data['count_cronicas'] = $this->get_count_cronicas();
		$this->home_data['count_cenarios'] = $this->get_count_cenarios();
		$this->home_data['count_bestiario']= $this->get_count_bestiario();
		$this->home_data['total_itens'] 	= $this->get_total_itens();
		$this->home_data['total_fichas'] 	= $this->get_total_fichas();
		$this->home_data['img_title'] 		= $this->get_img_title();
		$this->home_data['categorys_list'] = $this->get_categorys_list();
	}

	function getHomeData($index){
		return $this->home_data[$index]; 
	}

	function get_count_user(){
		$user = new Usuario_Model();
		$number_user = $user->select('usuarios');		
		return count($number_user);
	}

	function get_count_armadura(){
		$armadura = new Armaduras_Model('');
		$number_armaduras 	= $armadura->select('armaduras');
		return count($number_armaduras);
	}

	function get_count_arma(){
		$arma = new Armas_Model('');
		$number_armas = $arma->select('armas');
		return count($number_armas);
	}

	function get_count_artefato(){
		$artefato = new Artefatos_Model('');
		$number_artefatos = $artefato->select('artefatos');
		return count($number_artefatos);
	}

	function get_count_personagem_jogador(){
		$personagem = new Personagens_Model('');
		$number_jogador	= $personagem->select('personagens', null, [["tipo","=","Personagem jogador"]]);
		return count($number_jogador);	
	}

	function get_count_personagem_monstro(){
		$personagem = new Personagens_Model('');	
		$number_monstros = $personagem->select('personagens', null, [["tipo","=","Monstro"]]);
		return count($number_monstros);	
	}

	function get_count_personagem_npc(){
		$personagem = new Personagens_Model('');	
		$number_npc	= $personagem->select('personagens', null, [["tipo","=","Personagem npc"]]);
		return count($number_npc);	
	}

	function get_count_fichas(){
		$fichas = new UploadFichas_Model();
		$number_fichas 	= $fichas->select('uploadfichas');
		return count($number_fichas);
	}

	function get_count_talentos(){
		$talento = new Talentos_Model('');
		$number_talentos = $talento->select('talentos');
		return count($number_talentos);
	}

	function get_count_magias(){
		$magia = new Magias_Model('');
		$number_magia = $magia->select('magias');
		return count($number_magia);
	}

	function get_count_pericias(){
		$pericia = new Pericias_Model('');
		$number_pericias = $pericia->select('pericias');
		return count($number_pericias);
	}

	function get_count_aventuras(){
		$aventuras 	= new Aventuras_Model();
		$number_aventuras 	= $aventuras->select('aventuras');
		return count($number_aventuras);		
	}

	function get_count_historias(){
		$historias = new Historias_Model();
		$number_historias = $historias->select('historias');
		return count($number_historias);
	}

	function get_count_contos(){
		$contos = new Contos_Model();
		$number_contos = $contos->select('contos');
		return count($number_contos);
	}

	function get_count_cronicas(){
		$cronicas = new Cronicas_Model();
		$number_cronicas = $cronicas->select('cronicas');
		return count($number_cronicas);	
	}
	
	function get_count_cenarios(){
		$cenarios = new Cenarios_Model();
		$number_cenarios = $cenarios->select('cenarios');
		return count($number_cenarios);
	}

	function get_count_bestiario(){
		$bestiario 	= new Bestiario_Model();
		$number_bestiario	= $bestiario->select('bestiario');
		return count($number_bestiario);
	}

	function get_total_itens(){
		return ($this->get_count_armadura() + 
				$this->get_count_arma() + 
				$this->get_count_artefato());
	}

	function get_total_fichas(){
		return ($this->get_count_personagem_jogador() + 
				$this->get_count_personagem_monstro() +
				$this->get_count_personagem_npc() +
				$this->get_count_fichas());
	}

	function get_img_title(){
		$img_title = [
						['usuario.jpg',USERS_REGISTERED, $this->get_count_user()],
						['fichas.jpg',FILE_REGISTERED, $this->get_count_fichas()],
						['bestiario.jpg',MONSTERS_REGISTERED, $this->get_count_personagem_monstro()],
						['itens.jpg',ITEMS_REGISTERED, $this->get_total_itens()]
					];
		return $img_title;
	}

	function get_categorys_list(){
		//Lista ficticia de categorias
		$category = [
		[FILE_PLAYER_CHARACTER, $this->get_count_personagem_jogador(), CHARACTER_PLAYER_SHEETS_PATH],
		//[FICHA_DE_NPC, $qtd_npc, $path[''].VIEW_BY_ID.'1'],
		[FILE_MONSTERS, $this->get_count_personagem_monstro(), CHARACTER_MONSTER_SHEETS_PATH],
		[WEAPONS, $this->get_count_arma(), WEAPONS_PATH],
		[ARMOR, $this->get_count_armadura(), ARMOR_PATH],
		[ARTIFACTS, $this->get_count_artefato(), ARTIFACTS_PATH],
		[TALENTS, $this->get_count_talentos(), TALENTS_PATH],
		[SPELLS, $this->get_count_magias(), SPELLS_PATH],
		[SKILLS, $this->get_count_pericias(), SKILLS_PATH],
		[RANDOM_FILE, 100, RANDOM_FILE_PATH],
		[RANDOM_MONSTERS, 100, RANDOM_MONSTERS_PATH],
		[ADVENTURES, $this->get_count_aventuras(), ADVENTURES_PATH],
		[STORIES, $this->get_count_historias(), STORIES_PATH],
		[TALES, $this->get_count_contos(), TALES_PATH],
		[CHRONICLES, $this->get_count_cronicas(), CHRONICLES_PATH],
		[SCENARIO, $this->get_count_cenarios(), SCENARIO_PATH],
		[ROLL_DICE, 1, ROLL_DICE_PATH],
		[GENERATOR_WORLDS, 100, GENERATOR_WORLDS_PATH],
		[GENERATOR_BASE_FILE, 100, GENERATOR_BASE_FILE_PATH],
		[GENERATOR_FEATURES, 100, GENERATOR_FEATURES_PATH],
		[GENERATOR_NAMES, 100, GENERATOR_NAMES_PATH],
		[BESTIARY, $this->get_count_bestiario(), BESTIARY_PATH],
		[GENERATOR_ADVENTURE, 100, GENERATOR_ADVENTURE_PATH],
		[FILE_REGISTERED, $this->get_count_fichas(), FILE_REGISTERED_PATH],
		[UTILITIES, 8, UTILITIES_PATH]
	];
		return $category;
	}
}
