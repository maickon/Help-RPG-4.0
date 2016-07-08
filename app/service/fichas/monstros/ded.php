<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// dados dos modelo de home
$ficha = $controllers_instance['fichas']->index();
// npc_ded ou monstro_ded
$personagem = $ficha->select_sheet('monstro_ded');

echo json_encode($personagem);