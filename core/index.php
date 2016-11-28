<?php
	require 'path_config.php';
	require 'show_status.php';
	// nome:text, sexo-mas-fem:label,descricao:text
?>
<script type="text/javascript">
	function aceitar(model, path) {
		var wanser = confirm("Você tem certeza que deseja deletar a model, view e controller? ");
		if (wanser) {
			window.location.href = path + 'core/delete.php?model=' + model;
		}
	}
</script>
<form method="POST" action="create.php">
	<span>Nome do módulo: </span><input type="text" name="modulo" >	
	<span>control<span><input type="checkbox" name="control" checked>
	<span>model<span><input type="checkbox" name="model" checked>
	<span>view<span><input type="checkbox" name="view" checked>
	<span>herda de DB?<span><input type="checkbox" name="db" checked>
	<hr>
	<span>Atributos (divididos por vírgula):</span>
	<br>
	<textarea rows="2" cols="100%" name="atributos" placeholder="nome:text,sexo-masculino-feminino:select,descricao:text"></textarea>
	<br>
	<input type="submit" name="botao" value="criar">
</form>

<hr>
<h4>Deletar algum módulo criado</h4>
<div style="width:100%;">
<?php
$dir = new DirectoryIterator(URL_BASE_INTERNAL.'app/models/');
foreach($dir as $file ) {
	if (!$file->isDot() && $file->isDir()) {
		$dname = $file->getFilename();
		echo '<div>';
		echo '<input type="button" onclick="aceitar(\''.$dname.'\',\''.URL_BASE.'\');" name="botao" value="'.$dname.'" style="width: 150px; float: left; margin: 1px;">';
		echo '</div>';
	}
}
?>
</div>