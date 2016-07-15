<?php

// lista rpgs
require 'partials/config.php';

$rpg_nomes = $rpg_system;

$tag->div(['class'=>'container']);
    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;