<?php
// options select
 $rpg_nomes = [ 
        'piratas'             => $language->NAME_OPTIONS_PIRATES,
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;