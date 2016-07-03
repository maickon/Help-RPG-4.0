<?php
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];


// options select
 $rpg_nomes = [ 
        'sobrenome'           => NAME_OPTIONS_LAST_NAME,
        'familia'             => NAME_OPTIONS_FAMILY,
        'apelidos'            => NAME_OPTIONS_SURNAME,
        'cla'                 => NAME_OPTIONS_CLAN,
        'goticos'             => NAME_OPTIONS_GOTHIC,
        'reis'                => NAME_OPTIONS_KINGS,
        'naves'               => NAME_OPTIONS_SHIPS,
        'super_herois'        => NAME_OPTIONS_HEROES,
        'super_herois_pt_br'  => NAME_OPTIONS_HEROES_BR,
        'apelidos_ingles'     => NAME_OPTIONS_SURNAME,
        'titulos_divinos'     => NAME_OPTIONS_DIVINE_TITLES,
        'deuses'              => NAME_OPTIONS_GODS  
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;