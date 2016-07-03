<?php
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];

// options select
 $rpg_nomes = [ 
        'piratas'             => NAME_OPTIONS_PIRATES,
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;