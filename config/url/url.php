<?php

require 'base/base.php';
require 'modulos/modulos.php';
require 'utilitarios/utilitarios.php';
require 'views/views.php';
require 'social/social.php';
require 'txt/aventuras/aventuras.php';
require 'txt/tavernas/tavernas.php';

const LOG_PATH = URL_BASE_INTERNAL . 'config/log/log.txt';
// img url
const IMG_ICON_PATH = URL_BASE . 'app/assets/img/icons/';
const CONFIG_DB_PATH = 'config/db/';
const CONFIG_ERRORS_PATH = 'config/errors/';

// view URL fichas
const SHEETS_NPC_URL = URL_BASE . 'fichas/npc';
const SHEETS_MONSTERS_URL = URL_BASE . 'fichas/monstros';

// web servece
const DICE_SERVICE_URL = URL_BASE . 'dados-service/';
const SHEETS_NPC_SERVICE_URL = URL_BASE . 'service/fichas/npc/ded';
const SHEETS_MONSTERS_SERVICE_URL = URL_BASE . 'service/fichas/monstros/ded';
// txt config files
const TXT_NAMES = URL_BASE_INTERNAL . 'config/txt/nomes';