/*
	config.js
	Arquivo de configuracao de URLs para requisicao AJAX
*/

// Velocidade do efeito de sorteio
var speed = 50;
var time = 950;

// URL base
var URL_BASE = 'http://127.0.0.1/';

// utilitarios service path
/*
	Estas URL chama seu respectivo controller
	ex: dados/service
	Chama a classe Dados_cotroller e o seu metodo service
*/
var JS_SERVICE_DICE_PATH = URL_BASE + 'dados/service';
var JS_SERVICE_NAME_PATH = URL_BASE + 'nomes/service';
var JS_SERVICE_NPC_DED = URL_BASE + 'fichas/service/npc_ded';
var JS_SERVICE_MONSTROS_PATH = URL_BASE + 'service/monstro_ded';
// fichas html path
var JS_FICHAS_PATH = URL_BASE + 'fichas/select_sheet';