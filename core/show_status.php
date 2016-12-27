<?php

	$status = [
		'<div style="background:red;"><b>Erro!</b></div>',
		'<div style="background:green;"><b>Módulo criado com sucesso!</b></div>',
		'<div style="background:green;"><b>Módulo deletado com sucesso!</b></div>',
		'<div style="background:green;"><b>Tabelas criadas com sucesso!</b></div>'
	];

	if (isset($_GET['status'])) {
		echo $status[$_GET['status']].'<br>';
	} else{
		echo '<h1 class="logo-core">HelpRPG</h1>';
		echo '<h1>Painel administrador - HelpRPG</h1>';
	}