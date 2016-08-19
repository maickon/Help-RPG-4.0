<?php

require 'base/base.php';
require 'css/css.php';
require 'img/img.php';
require 'js/js.php';
require 'modulos/modulos.php';
require 'views/views.php';
require 'txt/aventuras/aventuras.php';

const CONFIG_DB_PATH = 'config/db/';
const CONFIG_ERRORS_PATH = 'config/errors/';

// view URL fichas
const SHEETS_NPC_URL = URL_BASE . 'fichas/npc';
const SHEETS_MONSTERS_URL = URL_BASE . 'fichas/monstros';
// view URL aventuras
const MEDIVEL_ADVENTURES_URL = GENERATOR_ADVENTURE_URL .'medieval';
const STAR_WAR_ADVENTURES_URL = GENERATOR_ADVENTURE_URL .'starwar';
const APOCALIPSE_ADVENTURES_URL = GENERATOR_ADVENTURE_URL .'apocalipse';

// web servece
const DICE_SERVICE_URL = URL_BASE . 'dados-service/';
const SHEETS_NPC_SERVICE_URL = URL_BASE . 'service/fichas/npc/ded';
const SHEETS_MONSTERS_SERVICE_URL = URL_BASE . 'service/fichas/monstros/ded';
// txt config files
const TXT_NAMES = URL_BASE_INTERNAL . 'config/txt/nomes';