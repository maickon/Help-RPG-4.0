<?php
require 'rpg-names.php';
// site name
const SITE_NAME = 'Help RPG';
// symbols
const HORIZONTAL_BAR = '|';
// home page - meta tags
const META_DESCRIPTION = 'Help rpg - Faça cadastro de Fichas de RPG, itens, armas, talentos, gere mapas de masmorra, nome de cidades, personagens, reinos e muito mais.';
const META_AUTHOR = 'Maickon Rangel';
const META_KEYWORDS = 'Fichas de RPG, Utilitários para RPG, Utilitários, Ferramentas para RPG, Cadastro de armas RPG, Cadastro de Magias RPG, Cadastro de Artefatos para RPG, D&D, Rifts RPG,  Mundo das trevas RPG, Mutantes & Malfeitores RPG, Traveller RPG, Call of Cthulhu RPG, Hackmaster RPG, GURPS RPG, Savage Worlds RPG, Pathfinder RPG';	
// titles for slide
const SLIDE_TITLE_01 = 'Tudo que você precisa para o seu RPG está aqui!';
const SLIDE_TITLE_02 = 'Compartilhe o seu RPG aqui! Seja um Helper';
const SLIDE_TITLE_03 = 'Utilize nossos utilitários e seja feliz com o Help RPG!';
// slide messages
const SLIDE_MESSAGE_01 = 'O Help RPG é um novo site que reúne tudo o que você precisa para te auxiliar no seu RPG, temos fichas, utilitários, magias, armas, armaduras e etc. Tudo que você precisa nós oferecemos aqui.';
const SLIDE_MESSAGE_02 = 'Crie uma conta e começe agora mesmo a cadastrar fichas, armas, itens, artefatos poderosos e muito mais. Compartilhe o melhor de suas aventuras conosco e venha fazer parte desta comunidade.';
const SLIDE_MESSAGE_03 = 'Temos diversos utilitários que vão te auxiliar na hora certa, contamos com diversos geradores para aumentar a produtividade de sua sessão. O que está esperando? corra logo pra lá e utilize nossos utilitários.';
// free text
const FREE_TEXT_01 = 'Paire o mouse em um de nossos utilitários abaixo para maiores informações.';
// utilitarios - dados
const UTILITIES_DICE = 'Rolador de dados - utilitários';
const META_DESCRIPTION_DICE = 'Rolador de dados - Help RPG.';
const META_KEYWORDS_DICE = 'rolador de dados, d4, d6, d8, d10, d12, d100, rolar dados, dados.';
const DICE_OPTION_CONFIC2X4 = '2x4 (2 linhas e 4 colunas)';
const DICE_OPTION_CONFIC2X6 = '2x6 (2 linhas e 6 colunas)';
const DICE_OPTION_CONFIC3X3 = '3x3 (3 linhas e 3 colunas)';
const DICE_OPTION_CONFIC7X1 = '7x1 (7 linhas e 1 coluna)';
const DICE_CLEAR = 'Limpar';
const DICE_ROLL_DICE = 'Rolar Todos';
const DICE_CONFIG = 'Configuração';
const DICE_ROLL_PLUS = 'Rolar +';
const DICE_GO = 'Go';
const DICE_SHOW_TOTAL = 'Ver total';
// botoes
const SHEETS_GENERATION = 'Gerar Ficha';
const NAME_GENERATION = 'Gerar Nome';
// utilitarios - nomes
const UTILITIES_NAME = 'Gerador de nomes - utilitários';
const META_DESCRIPTION_NAME = 'Gerador de nomes - Help RPG.';
const META_KEYWORDS_NAME = 'nomes,  nomes de lugares, nome de classes, nomes de raças, nomes culturais, outros nomes, nomes de nave, nomes de super heróis';
// utilitarios - fichas
const UTILITIES_CHARACTER_SHEETS = 'Gerador de fichas - utilitários';
const META_DESCRIPTION_CHARACTER_SHEETS = 'Gerador de fichas - Help RPG.';
const META_KEYWORDS_CHARACTER_SHEETS = 'fichas RPG, lista de fichas, pesquisa por fichas, cadastro de fichas, fichas RPG, lista de fichas, pesquisa por fichas, cadastro de fichas, monstros, ficha de monstro';
// menu itens
const HOME = 'HOME';
const CONTACT 	= 'CONTATO';
const REGISTER 	= 'CADASTRO';
const ABOUT 	= 'SOBRE';
const HOW_TO_USE = 'COMO USAR';
const FOREIGN_VERSION = 'VERSAO ESTRANGEIRA';
const DONATION 	= 'DOAÇÃO';
const PARTNERSHIP 	= 'PARCERIA';
const WHO_AM_I 	= 'QUEM SOU';
const FACEBOOK 	= 'PÁGINA NO FACEBOOK';
const YOUTUBE 	= 'CANAL NO YOUTUBE';
const BLOG 		= 'BLOG HELP RPG';
// menu utilitarios nome
const NAME_PLACES = 'Lugares';
const NAME_CLASS = 'Classes';
const NAME_RACES = 'Raças';
const NAME_CULTURAL = 'Culturais';
const NAME_OTHERS = 'Outros';
const NAME_OPTIONS_ANIMALS = 'Animais de Estimação';
const NAME_OPTIONS_ANGELS = 'Anjos';
const NAME_OPTIONS_DEMONS = 'Demônios';
const NAME_OPTIONS_DWARVES = 'Anões';
const NAME_OPTIONS_ELVES = 'Elfos';
const NAME_OPTIONS_HALFLING = 'Halfling';
const NAME_OPTIONS_HOBBITS = 'Hobbits';
const NAME_OPTIONS_ORCS = 'Orcs';
const NAME_OPTIONS_MALE_RATS = 'Homen Rato';
const NAME_OPTIONS_HUMAN_FEMALE = 'Humanos - Mulheres'; 
const NAME_OPTIONS_HUMAN_MALE = 'Humanos - Homens';
const NAME_OPTIONS_ARABIC = 'Arábico';
const NAME_OPTIONS_ASIAN = 'Asiático';
const NAME_OPTIONS_AZTEC = 'Asteca';
const NAME_OPTIONS_EGYPTIAN = 'Egipcios';
const NAME_OPTIONS_SPANISH = 'Espanhol';
const NAME_OPTIONS_FRENCH = 'Françes';
const NAME_OPTIONS_BELGIUM_DUTCH = 'Bélgico - Neerlandes';
const NAME_OPTIONS_SCOTIA_PICTISH = 'Escócia (Pictish)';
const NAME_OPTIONS_FRANCOS_FEMALE = 'Francos (Feminino)';
const NAME_OPTIONS_FRANCOS_MALE = 'Francos (Masculino)';
const NAME_OPTIONS_RUSSIAN_FEMALE = 'Russo (Feminino)';
const NAME_OPTIONS_RUSSIAN_MALE = 'Russo (Masculino)';
const NAME_OPTIONS_ROMAN_FEMALE = 'Romano (Feminino)';
const NAME_OPTIONS_ROMAN_MALE = 'Romano (Masculino)';
const NAME_OPTIONS_GAELIC_CELTIC_FEMALE = 'Gaélico Celta (Feminino)';
const NAME_OPTIONS_GAELIC_CELTIC_MALE = 'Gaélico Celta (Masculino)';
const NAME_OPTIONS_GAELIC_SCOTTISH_FEMALE = 'Gaélico Escocês (Feminino)';
const NAME_OPTIONS_GAELIC_SCOTTISH_MALE = 'Gaélico Escocês (Masculino)';
const NAME_OPTIONS_ITALY_REMANESCISTA_FEMALE = 'Italia Remanescista (Feminino)';
const NAME_OPTIONS_ITALY_REMANESCISTA_MALE = 'Italia Remanescista (Masculino)';
const NAME_OPTIONS_GERMANIC_FEMALE = 'Germânico (Feminino)';
const NAME_OPTIONS_GERMANIC_MALE = 'Germânico (Masculino)';
const NAME_OPTIONS_PERSIAN_FEMALE = 'Persa (Feminino)';
const NAME_OPTIONS_PERSIAN_MALE = 'Persa (Masculino)';
const NAME_OPTIONS_ANGLO_SAXON_LATINIZED_FEMALE = 'Anglo Saxão - Latinizado (Feminino)';
const NAME_OPTIONS_ANGLO_SAXON_LATINIZED_MALE = 'Anglo Saxão - Latinizado (Masculino)';
const NAME_OPTIONS_ANGLO_SAXON_ENGLISH_FEMALE = 'Anglo Saxão - Ingles; Séculos 15; 16 e 17 (Feminino)';
const NAME_OPTIONS_ANGLO_SAXON_ENGLISH_MALE = 'Anglo Saxão - Ingles; Séculos 15; 16 e 17 (Masculino)';
const NAME_OPTIONS_AMERICAN_USA_AB = 'Americanos USA (de A até B)';
const NAME_OPTIONS_AMERICAN_USA_CD = 'Americanos USA (de C até D)';
const NAME_OPTIONS_AMERICAN_USA_EH = 'Americanos USA (de E até H)';
const NAME_OPTIONS_AMERICAN_USA_IL = 'Americanos USA (de I até L)';
const NAME_OPTIONS_AMERICAN_USA_MO = 'Americanos USA (de M até O)';
const NAME_OPTIONS_AMERICAN_USA_PR = 'Americanos USA (de P até R)';
const NAME_OPTIONS_AMERICAN_USA_ST = 'Americanos USA (de S até T)';
const NAME_OPTIONS_AMERICAN_USA_UZ = 'Americanos USA (de U até Z)';
const NAME_OPTIONS_VILLAGE = 'Vilarejos';
const NAME_OPTIONS_CITIES = 'Cidades';
const NAME_OPTIONS_KINGDOMS = 'Reinos';
const NAME_OPTIONS_PLANETS = 'Planetas';
const NAME_OPTIONS_CONSTELLATIONS = 'Constelações';
const NAME_OPTIONS_GALAXIES = 'Galáxias';
const NAME_OPTIONS_GOTHIC = 'Gótico';
const NAME_OPTIONS_PIRATES = 'Piratas';
const NAME_OPTIONS_KINGS = 'Reis';
const NAME_OPTIONS_SHIPS = 'Naves Espaciais';
const NAME_OPTIONS_HEROES = 'Super Heróis';
const NAME_OPTIONS_HEROES_BR = 'Super Heróis Br';
const NAME_OPTIONS_SURNAME_EN = 'Apelidos em inglês';
const NAME_OPTIONS_DIVINE_TITLES = 'Títulos Divinos';
const NAME_OPTIONS_GODS = 'Deuses';
const NAME_OPTIONS_LAST_NAME = 'Sobrenome';
const NAME_OPTIONS_FAMILY = 'Nome de família';
const NAME_OPTIONS_ORC_HALF = 'Meio Orc';
const NAME_OPTIONS_SURNAME = 'Aplelidos';
const NAME_OPTIONS_CLAN = 'Nome de clã'; 
const NAME_OPTIONS_TIELFLING = "Tiefling";
const SHEETS_NPC = 'Fichas de Npc';
const SHEETS_MONSTERS = 'Fichas de Monstros';
//Home page
const RECORDS = 'REGISTROS';
const CHARACTER_SHEETS = 'FICHAS';
const USERS_REGISTERED = 'USUÁRIOS';
const FILE_REGISTERED = 'FICHAS CADASTRADAS';
const MONSTERS_REGISTERED = 'MONSTROS CADASTRADOS';
const FILE_MONSTERS = 'FICHAS DE MONSTROS';
const ITEMS_REGISTERED = 'ITENS CADASTRADOS';
const FILE_PLAYER_CHARACTER = 'PERSONAGEM DE JOGADOR';
const FILE_NPC_CHARACTER = 'PERSONAGEM DE NPC';
const WEAPONS = 'ARMAS';
const ARMOR = 'ARMADURAS';
const ARTIFACTS = 'ARTEFATOS';
const SPELLS = 'MAGIAS';
const TALENTS = 'TALENTOS';
const SKILLS = 'PERÍCIAS';
const RANDOM_FILE = 'FICHA ALEATÓRIA';
const RANDOM_MONSTERS = 'MONSTRO ALEATÓRIO';
const STORIES = 'HISTÓRIAS';
const ADVENTURES = 'AVENTURAS';
const TALES = 'CONTOS';
const CHRONICLES = 'CRÔNICAS';
const SCENARIO = 'CENÁRIOS';
const ROLL_DICE = 'ROLADOR DE DADOS';
const GENERATOR_WORLDS = 'GERADOR DE MUNDOS';
const BESTIARY = 'BESTIÁRIO';
const WORLD_MAP = 'MAPA MUNDI';
const GENERATOR_BASE_FILE = 'GERADOR DE FICHAS BASE';
const GENERATOR_FEATURES = 'GERADOR DE CARACTERÍSTICAS';
const GENERATOR_NAMES = 'GERADOR DE NOMES';
const GENERATOR_ADVENTURE = 'GERADOR DE AVENTURAS';
const GENERATOR_TAVERN = 'GERADOR DE TAVERNA';
const GENERATOR_DUNGEON = 'GERADOR DE MASMORRA';
const GENERATOR_PERSONALITIES = 'GERADOR DE PERSONALIDADES';
const GENERATOR_CITIES = 'GERADOR DE CIDADES';
const GENERATOR_ITENS = 'GERADOR DE ITENS';
const GENERATOR_LUCK = 'GERADOR DE SORTE';
const GENERATOR_NAME_SWORD = 'GERADOR DE NOME DE ESPADAS';
const HIGHLIGHTER = 'MARCADORES';
const UTILITIES = 'UTILITÁRIOS';
const CHARACTER = 'PERSONAGENS';
// utilitaries page
const DISABLE_MODE_DRAW = 'Desativar modo sorteio'; 
// social web
const FACEBOOK_PAGE = 'Facebook';
const TWITTER_PAGE = 'Twitter';
const GOOGLE_PAGE = 'Google +';
const YOU_TUBE_PAGE = 'YOUTUBE';
const SOCIAL_TITLE = 'Nós somos sociais';
const SOCIAL_MSG = 'Acompanhe as novidades do Help RPG nas mídias sociais.';
// Contato
const CONTACT_TITLE = 'Contato rápido';
const CONTACT_EMAIL_LABEL = 'Email:';
const CONTACT_CALL_LABEL = 'Tel:';
const CONTACT_SKYPE_LABEL = 'Skype:';
const CONTACT_EMAIL_CONTENT = 'helprpg.br@gmail.com';
const CONTACT_CALL_CONTENT = '55 22 99614-9758';
const CONTACT_SKYPE_CONTENT = 'maickon.rangel';
// endereco
const ADDRESS = 'Endereço';
const ADDRESS_CONTENT = 'RJ, São João da Barra';
const ADDRESS_COUNTRY_CONTENT = 'Brasil';
const COPYRIGHT = 'Help RPG &copy 2014-2016|';
const TEMPLATE_NAME = 'by DesignBootstrp';
// others utititaries
const TABLETOPAUDIO = 'Tabletop Audio';	
const PYROMANCERS = 'Pyromancers';		
const INKARNATE = 'Inkarnate';
// errors
const ERROR_FILE_NOT_FOUND = 'Arquivo de classe não pode ser encontrado.';
const ERROR_NAME_NOT_FOUND = 'Nome não pode ser encontrado.';