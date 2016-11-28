<?php
require 'path_config.php';

$status_code = 0;

function delTree($dir) { 
  $files = array_diff(scandir($dir), array('.','..')); 
  foreach ($files as $file) { 
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
  } 
  return rmdir($dir); 
}

if (isset($_REQUEST['model'])) {
	$model = URL_BASE_INTERNAL.'app/models/'.$_REQUEST['model'];
	$view = URL_BASE_INTERNAL.'app/view/'.$_REQUEST['model'];
	$control = URL_BASE_INTERNAL.'app/controllers/'.$_REQUEST['model'];

	if(delTree($model) && delTree($view) && delTree($control)){
		$status_code = 2;
	}
}

header('location: '.URL_BASE.'core?status='.$status_code);