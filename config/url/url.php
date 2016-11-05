<?php

require 'base/base.php';
require 'social/social.php';
require 'txt/aventuras/aventuras.php';
require 'txt/tavernas/tavernas.php';

define('LOG_PATH', URL_BASE_INTERNAL . 'config/log/log.txt');
// img url
define('IMG_ICON_PATH', URL_BASE . 'app/assets/img/icons/');
define('CONFIG_DB_PATH', 'config/db/');
define('CONFIG_ERRORS_PATH', 'config/errors/');

// view URL fichas
define('SHEETS_NPC_URL', URL_BASE . 'fichas/npc');
define('SHEETS_MONSTERS_URL', URL_BASE . 'fichas/monstros');

// web servece
define('DICE_SERVICE_URL', URL_BASE . 'dados-service/');
define('SHEETS_NPC_SERVICE_URL', URL_BASE . 'service/fichas/npc/ded');
define('SHEETS_MONSTERS_SERVICE_URL', URL_BASE . 'service/fichas/monstros/ded');
// txt config files
define('TXT_NAMES', URL_BASE_INTERNAL . 'config/txt/nomes');