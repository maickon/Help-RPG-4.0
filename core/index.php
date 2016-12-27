<?php
	require 'path_config.php';
	require 'show_status.php';
	// nome:text, sexo-mas-fem:label,descricao:text
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de administrador do HelpRPG</title>
</head>
<link rel="stylesheet" type="text/css" href="css/core.css">
<body>

	<section class="main-core">
		<form method="POST" action="create.php" class="form-core">
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
		<div class="modules-core">
		<?php
		$dir = new DirectoryIterator(URL_BASE_INTERNAL.'app/models/');
		foreach($dir as $file ) {
			if (!$file->isDot() && $file->isDir()) {
				$dname = $file->getFilename();
				echo '<input type="button" onclick="aceitar(\''.$dname.'\',\''.URL_BASE.'\');" name="botao" value="'.$dname.'" class="model-btn-core">';
			}
		}
		?>
		</div>

		<div class="modules-core">
			<?php require URL_BASE_INTERNAL . 'lib/helperrecord/helperrecord.class.php';?>
			<?php require URL_BASE_INTERNAL . 'config/db/db.php';?>
			<h1>Configuração de baco de dados</h1>
			<?php
			require URL_BASE_INTERNAL . 'config/db/schema/schema.php';
			$schema = new Schema();
			?>

			<a href="restaure_db.php" class="btn-db">Restaurar Banco de dados</a>
			<br>
			<?php $schema->show_tables(); ?>
		</div>
	</section>
	<script type="text/javascript">
		function aceitar(model, path) {
			var wanser = confirm("Você tem certeza que deseja deletar a model, view e controller? ");
			if (wanser) {
				window.location.href = path + 'core/delete.php?model=' + model;
			}
		}
	</script>
</body>
</html>