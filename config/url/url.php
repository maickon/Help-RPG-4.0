<?php
// main URLS
const URL_BASE = 'http://127.0.0.1/';
const URL_BASE_INTERNAL = 'C:/xampp/htdocs/';
// css path
const CSS_BOOTSTRAP = URL_BASE . 'assets/css/bootstrap.css';
const CSS_BOOTSTRAP_SELECT = URL_BASE . 'assets/css/bootstrap-select.css';
const CSS_INDEX = URL_BASE . 'assets/css/index.css';
const CSS_ICONS = URL_BASE . 'assets/css/ionicons.css';
const CSS_FONT_AWESOM = URL_BASE . 'assets/css/font-awesome.css';
const CSS_FANCYBOX = URL_BASE . 'assets/js/source/jquery.fancybox.css';
const CSS_ANIMATIONS = URL_BASE . 'assets/css/animations.min.css';
const CSS_STYLE_SITE = URL_BASE . 'assets/css/style-site.css';
const CSS_DICE = URL_BASE . 'assets/css/dice/dice.css';
const CSS_NAME_FONT = URL_BASE . 'assets/css/nomes/fonts.css';
// js path
const JS_JQUERY = URL_BASE . 'assets/js/jquery-1.11.1.js';
const JS_BOOTSTRAP = URL_BASE . 'assets/js/bootstrap.js';
const JS_BOOTSTRAP_SELECT = URL_BASE . 'assets/js/bootstrap-select.min.js';
const JS_VEGAS = URL_BASE . 'assets/js/vegas/jquery.vegas.min.js';
const JS_EASING = URL_BASE . 'assets/js/jquery.easing.min.js';
const JS_FANCYBOX = URL_BASE . 'assets/js/source/jquery.fancybox.js';
const JS_ISOTOPE = URL_BASE . 'assets/js/jquery.isotope.js';
const JS_APPEAR = URL_BASE . 'assets/js/appear.min.js';
const JS_ANIMATIONS = URL_BASE . 'assets/js/animations.min.js';
const JS_CUSTOM = URL_BASE . 'assets/js/custom.js';
const JS_PDF = URL_BASE . 'assets/js/jspdf.js';
const JS_DICE = URL_BASE . 'assets/js/dice/dice.js';
const JS_NAME = URL_BASE . 'assets/js/nomes/nomes.js';
const JS_CONFIG = URL_BASE . 'assets/js/config.js';
// img path
const IMG_ICONS = URL_BASE . 'assets/img/icons/';
const IMG_GALERY = URL_BASE . 'assets/img/icons/';
const IMG_TEAM = URL_BASE . 'assets/img/icons/';
const IMG_ROLL_DICE = URL_BASE . 'assets/img/icons/dados.png';
const IMG_NAMES = URL_BASE . 'assets/img/icons/nomes.png';
const IMG_SHEET = URL_BASE . 'assets/img/icons/ficha.png';
const IMG_ADVENTURES = URL_BASE . 'assets/img/icons/aventura.png';
const IMG_TAVERN = URL_BASE . 'assets/img/icons/taverna.png';
const IMG_MONSTER = URL_BASE . 'assets/img/icons/monstro.png';
const IMG_MAP = URL_BASE . 'assets/img/icons/mapa.png';
const IMG_DUNGEON = URL_BASE . 'assets/img/icons/masmorras.png';
const IMG_PERSONALITY = URL_BASE . 'assets/img/icons/personalidades.png';
const IMG_CITIES = URL_BASE . 'assets/img/icons/cidades.png';
const IMG_HIGHLIGHTER = URL_BASE . 'assets/img/icons/marcador.png';
const IMG_ITEMS = URL_BASE . 'assets/img/icons/itens.png';
const IMG_LUCK = URL_BASE . 'assets/img/icons/sorte.png';
const IMG_SWORD = URL_BASE . 'assets/img/icons/espadas.png';
// data stored in database
const IMG_SHORTCUT_ICON = URL_BASE . 'assets/img/logo-icon.png';
const IMG_USER = URL_BASE . 'assets/img/icons/usuario.png';
const IMG_ARMOR = URL_BASE . 'assets/img/icons/armadura.png';
const IMG_WEAPON = URL_BASE . 'assets/img/icons/arma.png';
const IMG_ARTIFACT = URL_BASE . 'assets/img/icons/artefato.png';
const IMG_CHARACTER = URL_BASE . 'assets/img/icons/personagem.png';
const IMG_CHARACTER_SHEETS = URL_BASE . 'assets/img/icons/mais-fichas.png';
const IMG_TALENTS = URL_BASE . 'assets/img/icons/talentos.png';
const IMG_SPELLS = URL_BASE . 'assets/img/icons/magia.png';
const IMG_SKILLS = URL_BASE . 'assets/img/icons/pericia.png';
const IMG_ADVENTURES_REGISTER = URL_BASE . 'assets/img/icons/aventura-cadastro.png';
const IMG_HISTORY = URL_BASE . 'assets/img/icons/historia.png';
const IMG_TALES = URL_BASE . 'assets/img/icons/contos.png';
const IMG_CHRONICLES = URL_BASE . 'assets/img/icons/cronicas.png';
const IMG_SCENARIOS = URL_BASE . 'assets/img/icons/cenarios.png';
const IMG_BESTIARY = URL_BASE . 'assets/img/icons/bestiario.png';
const IMG_DICE = URL_BASE . 'assets/img/dice/';
// modules path
const HOME_PATH = 'app/view/home/';
const ARMOR_PATH = 'app/view/armaduras/';
const WEAPONS_PATH = 'app/view/armas/';
const USER_PATH = 'app/view/usuario/';
const ARTIFACTS_PATH = 'app/view/artefatos/';
const CHARACTER_PATH = 'app/view/personagem/';
const CHARACTER_PLAYER_SHEETS_PATH = 'app/view/ficha-personagem-jogador/';
const CHARACTER_NPC_SHEETS_PATH = 'app/view/ficha-personagem-npc/';
const CHARACTER_MONSTER_SHEETS_PATH = 'app/view/ficha-monstros/';
const GENERATOR_BASE_FILE_PATH = 'app/view/fichas-base/';
const FILE_REGISTERED_PATH = 'app/view/fichas-cadastradas/';
const GENERATOR_FEATURES_PATH = 'app/view/caracteristicas/';
const TALENTS_PATH = 'app/view/talentos/';
const SPELLS_PATH = 'app/view/magias/';
const SKILLS_PATH = 'app/view/pericias/';
const ADVENTURES_REGISTER_PATH = 'app/view/aventuras/';
const STORIES_PATH = 'app/view/historias/';
const TALES_PATH = 'app/view/contos/';
const CHRONICLES_PATH = 'app/view/cronicas/';
const SCENARIO_PATH = 'app/view/cenarios/';
const BESTIARY_PATH = 'app/view/bestiario/';
const ADVENTURES_PATH = 'app/view/aventuras/';
const RANDOM_FILE_PATH = 'app/view/ficha-aleatoria/';
const RANDOM_MONSTERS_PATH = 'app/view/monstro-aleatoria/';
const ROLL_DICE_PATH  = 'app/view/rolar-dados/';
const GENERATOR_WORLDS_PATH = 'app/view/gerador-mundos/';
const GENERATOR_NAMES_PATH = 'app/view/gerador-nomes/';
const GENERATOR_ADVENTURE_PATH = 'app/view/gerador-aventuras/';
const UTILITIES_PATH = 'app/view/utilitarios/';
// views URL
const HOME_URL = URL_BASE . 'home/';
const ARMOR_URL = URL_BASE . 'armaduras/';
const WEAPONS_URL = URL_BASE . 'armas/';
const USER_URL = URL_BASE . 'usuario/';
const ARTIFACTS_URL = URL_BASE . 'artefatos/';
const CHARACTER_URL = URL_BASE . 'personagem/';
const CHARACTER_PLAYER_SHEETS_URL = URL_BASE . 'ficha-personagem-jogador/';
const CHARACTER_NPC_SHEETS_URL = URL_BASE . 'ficha-personagem-npc/';
const CHARACTER_MONSTER_SHEETS_URL = URL_BASE . 'ficha-monstros/';
const GENERATOR_BASE_FILE_URL = URL_BASE . 'fichas-base/';
const FILE_REGISTERED_URL = URL_BASE . 'fichas-cadastradas/';
const GENERATOR_FEATURES_URL = URL_BASE . 'caracteristicas/';
const TALENTS_URL = URL_BASE . 'talentos/';
const SPELLS_URL = URL_BASE . 'magias/';
const SKILLS_URL = URL_BASE . 'pericias/';
const ADVENTURES_REGISTER_URL = URL_BASE . 'aventuras/';
const STORIES_URL = URL_BASE . 'historias/';
const TALES_URL = URL_BASE . 'contos/';
const CHRONICLES_URL = URL_BASE . 'cronicas/';
const SCENARIO_URL = URL_BASE . 'cenarios/';
const BESTIARY_URL = URL_BASE . 'bestiario/';
const ADVENTURES_URL = URL_BASE . 'aventuras/';
const RANDOM_FILE_URL = URL_BASE . 'ficha-aleatoria/';
const RANDOM_MONSTERS_URL = URL_BASE . 'monstro-aleatoria/';
const ROLL_DICE_URL  = URL_BASE . 'dados/';
const GENERATOR_WORLDS_URL = URL_BASE . 'gerador-mundos/';
const NAMES_URL = URL_BASE . 'nomes/';
const GENERATOR_ADVENTURE_URL = URL_BASE . 'gerador-aventuras/';
const UTILITIES_URL = URL_BASE . 'utilitarios/';
// config paths
const CONFIG_TXT_PATH = 'config/txt/';
const CONFIG_DB_PATH = 'config/db/';
const CONFIG_ERRORS_PATH = 'config/errors/';
const TXT_PATH = 'config/txt/';
// views URL nomes
const NAME_PLACES_URL = URL_BASE . 'nomes/lugares';
const NAME_CLASS_URL = URL_BASE . 'nomes/classes';
const NAME_RACES_URL = URL_BASE . 'nomes/racas';
const NAME_CULTURAL_URL = URL_BASE . 'nomes/culturais';
const NAME_OTHERS_URL = URL_BASE . 'nomes/outros';

// DesignBootstrp URL
const DESIGM_BOOTSTRAP = "http://www.designbootstrap.com/";
// medias sociais
const FACEBOOK_URL = "https://www.facebook.com/helprpg.br/";
const TWITTER_URL = "https://twitter.com/HelpRpgBr";
const GOOGLE_PLUS_URL = "https://plus.google.com/u/1/+HelpRpgBr/posts";
const YOU_TUBE_URL = "https://www.youtube.com/channel/UCVx62ydCm9D9JubvsEQXwlA";
const WORDPRESS_URL = "https://helprpg.wordpress.com/";
const TUMBLR_URL = "https://www.tumblr.com/blog/helprpg";
// web servece
const DICE_SERVICE_URL = URL_BASE . 'dados-service/';
// txt config files
const TXT_NAMES = URL_BASE_INTERNAL . 'config/txt/nomes';