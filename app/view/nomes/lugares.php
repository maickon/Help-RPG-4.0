<?php
// options select
$rpg_nomes = [
        'vilarejos'           => $language->NAME_OPTIONS_VILLAGE,
        'cidades'             => $language->NAME_OPTIONS_CITIES,
        'reinos'              => $language->NAME_OPTIONS_KINGDOMS,
        'planetas'            => $language->NAME_OPTIONS_PLANETS,
        'constelacoes'        => $language->NAME_OPTIONS_CONSTELLATIONS,
        'galaxias'            => $language->NAME_OPTIONS_GALAXIES
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;