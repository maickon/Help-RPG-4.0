<?php
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];

// dados dos modelo de home
$ficha = $controllers_instance['fichas']->index();
// npc_ded ou monstro_ded
$personagem = $ficha->select_sheet('npc_ded');

$rpg_nomes = [
		'npc_ded' => 'Ficha de Npc D&D',
		'monstro_ded' => 'Ficha de monstros D&D'
];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

		echo '<pre>';
		print_r($personagem);

    $tag->div;
$tag->div;