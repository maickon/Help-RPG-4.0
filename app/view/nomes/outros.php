<?php
// options select
 $rpg_nomes = [ 
        'sobrenome'           => $language->NAME_OPTIONS_LAST_NAME,
        'familia'             => $language->NAME_OPTIONS_FAMILY,
        'apelidos'            => $language->NAME_OPTIONS_SURNAME,
        'cla'                 => $language->NAME_OPTIONS_CLAN,
        'goticos'             => $language->NAME_OPTIONS_GOTHIC,
        'reis'                => $language->NAME_OPTIONS_KINGS,
        'naves'               => $language->NAME_OPTIONS_SHIPS,
        'super_herois'        => $language->NAME_OPTIONS_HEROES,
        'super_herois_pt_br'  => $language->NAME_OPTIONS_HEROES_BR,
        'apelidos_ingles'     => $language->NAME_OPTIONS_SURNAME,
        'titulos_divinos'     => $language->NAME_OPTIONS_DIVINE_TITLES,
        'deuses'              => $language->NAME_OPTIONS_GODS  
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;