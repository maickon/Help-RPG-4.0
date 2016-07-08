<?php
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// lista rpgs
require 'partials/config.php';
// tag instance
$tag = $lib_instance['tags'];

// dados dos modelo de home
$ficha = $controllers_instance['fichas']->index();
// npc_ded ou monstro_ded
$personagem = $ficha->select_sheet('npc_ded');

$rpg_nomes = $rpg_system;

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;