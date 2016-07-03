<?php 
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];

// dados dos modelo de home
$home = $controllers_instance['home']->index();
    
    // header partial from home page
    require 'partials/header.php';

    // body partial from home page
    require 'partials/body.php';

$tag->html;
