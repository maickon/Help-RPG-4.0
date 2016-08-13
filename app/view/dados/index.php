<?php

$options = ['d4.png','d6.png','d8.png','d10.png','d12.png','d20.png','d100.png'];

require 'partials/header.php';

$tag->div(['class'=>'container']);
  
  require 'partials/menu.php';

  require 'partials/body.php';

  require_once 'partials/footer.php';

$tag->div;