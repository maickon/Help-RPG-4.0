/*
	config.js
	Arquivo de configuracao de URLs para requisicao AJAX
*/

// Velocidade do efeito de sorteio
var speed = 50;
var time = 950;

// URL base
var URL_BASE = 'http://127.0.0.1/helprpg/';

// utilitarios service path
/*
	Estas URL chama seu respectivo controller
	ex: dados/service
	Chama a classe Dados_cotroller e o seu metodo service
*/
var JS_SERVICE_DICE_PATH = URL_BASE + 'dados/service';
var JS_SERVICE_ADVENTURE_PATH = URL_BASE + 'geradorAventuras/service';
var JS_SERVICE_NAME_PATH = URL_BASE + 'nomes/service';
var JS_SERVICE_TAVERN_PATH = URL_BASE + 'tavernas/service';
var JS_SERVICE_NPC_DED = URL_BASE + 'fichas/service/ded';
var JS_SERVICE_MONSTROS_PATH = URL_BASE + 'fichas/service/ded';
var JS_SERVICE_PERSONALIDADES_PATH = URL_BASE + 'personalidades/service';
var JS_SERVICE_CITIES_PATH = URL_BASE + 'cidades/service';
var JS_SERVICE_ITENS_PATH = URL_BASE + 'itens/service';
var JS_SERVICE_LOCK_PATH = URL_BASE + 'sorte/service';
var JS_SERVICE_TIME_PATH = URL_BASE + 'tempo/service';
var JS_SERVICE_NAME_SWORDS_PATH = URL_BASE + 'nomedeespadas/service';

// fichas html path
var JS_FICHAS_PATH = URL_BASE + 'fichas/select_sheet';
// rolar varios dados
var JS_ROLL_DICES = URL_BASE + 'dados/roll_dices';