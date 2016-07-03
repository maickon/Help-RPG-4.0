<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

$slect_name = isset($_POST['select']) ? $_POST['select'] : '';
$qtd_names = isset($_POST['qtd_names']) ? $_POST['qtd_names'] : '';
if (($slect_name != '') && ($qtd_names != '')) {
	// name generator instance, default 9 nomes
	$name = $controllers_instance['nomes']->service(TXT_NAMES."/{$slect_name}.txt", $qtd_names);
} elseif ($slect_name != ''){
	$name = $controllers_instance['nomes']->service(TXT_NAMES."/{$slect_name}.txt", 9);
} else {
	$name = ERROR_NAME_NOT_FOUND;
}

if (!is_object($name)) {
	echo json_encode($name);
} else {
	echo json_encode($name->getNames());
}