<?php
// options select
$rpg_nomes = [
        'vilarejos'           => NAME_OPTIONS_VILLAGE,
        'cidades'             => NAME_OPTIONS_CITIES,
        'reinos'              => NAME_OPTIONS_KINGDOMS,
        'planetas'            => NAME_OPTIONS_PLANETS,
        'constelacoes'        => NAME_OPTIONS_CONSTELLATIONS,
        'galaxias'            => NAME_OPTIONS_GALAXIES
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;