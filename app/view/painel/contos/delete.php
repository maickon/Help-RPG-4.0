<?php
require_once '../../../header.php';
require_once '../helper.php';

$delete_contos = new Contos();
$objeto = $delete_contos->select($delete_contos->getTable(), null, [['id','=', $_GET['id'] ? $_GET['id'] : ' ']]);

$pass = helper_check_permitions($objeto[0]['dono']);
if(!$pass):
	help_header(ROOTPATHURL.CONTOSPATH);
else:
	$delete = $delete_contos->delete_data($objeto);
	if($delete == 1):
		help_header(ROOTPATHURL.CONTOSPATH.'?status=deleted');
	else:
		help_header(ROOTPATHURL.CONTOSPATH.'?status=error');
	endif;
endif;