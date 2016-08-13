<?php
// options select
$rpg_nomes = [
    'animais'             => NAME_OPTIONS_ANIMALS,
    'anjos'               => NAME_OPTIONS_ANGELS,
    'demonios'            => NAME_OPTIONS_DEMONS,
    'anoes'               => NAME_OPTIONS_DWARVES,
    'elfos'               => NAME_OPTIONS_ELVES,
    'halflings'           => NAME_OPTIONS_HALFLING,
    'tielfling'           => NAME_OPTIONS_TIELFLING,
    'hobbits'             => NAME_OPTIONS_HOBBITS,
    'orcs'                => NAME_OPTIONS_ORCS,
    'meio_orc'            => NAME_OPTIONS_ORC_HALF,
    'homens_ratos'        => NAME_OPTIONS_MALE_RATS,
    'humanos_feminino'    => NAME_OPTIONS_HUMAN_FEMALE,
    'humanos_masculino'   => NAME_OPTIONS_HUMAN_MALE
    ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;
