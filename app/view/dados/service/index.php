<?php

$result = [];
$dado = isset($_POST['dado']) ? $_POST['dado'] : null;
$qtd = isset($_POST['q']) ? $_POST['q'] : null;

if($qtd && $dado):
	$r = 0;
	for($i=0; $i<$qtd; $i++):
		$d = $controllers_instance['dados']->service();
		$r++;
		if($d->$dado == 1):
			$class_css = 'result-rol-fail';
		elseif($d->$dado == substr($dado, 1)):
			$class_css = 'result-rol-critical';
		else:
			$class_css = 'result-rol-normal';
		endif;
		$result[] = "<br><span class=\"{$class_css}\">Rolagem[n°{$r}]::=><span id=\"resultados_{$dado}\">{$d->$dado}</span></span>";
	endfor;
elseif(isset($dado)):
	$result = $d->$dado;
endif;

echo(json_encode($result));