<?php
// options select
$rpg_nomes = [
    'animais'             => $language->NAME_OPTIONS_ANIMALS,
    'anjos'               => $language->NAME_OPTIONS_ANGELS,
    'demonios'            => $language->NAME_OPTIONS_DEMONS,
    'anoes'               => $language->NAME_OPTIONS_DWARVES,
    'elfos'               => $language->NAME_OPTIONS_ELVES,
    'halflings'           => $language->NAME_OPTIONS_HALFLING,
    'tielfling'           => $language->NAME_OPTIONS_TIELFLING,
    'hobbits'             => $language->NAME_OPTIONS_HOBBITS,
    'orcs'                => $language->NAME_OPTIONS_ORCS,
    'meio_orc'            => $language->NAME_OPTIONS_ORC_HALF,
    'homens_ratos'        => $language->NAME_OPTIONS_MALE_RATS,
    'humanos_feminino'    => $language->NAME_OPTIONS_HUMAN_FEMALE,
    'humanos_masculino'   => $language->NAME_OPTIONS_HUMAN_MALE
    ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;
