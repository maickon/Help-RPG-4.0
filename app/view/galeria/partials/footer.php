
<?php
	// Help RPG 2016
	// @author Maickon Rangel
	// Pagina footer da visualizacao gerada no automatico

	$_JS = [
				$painel->url->painel_js_path . '/plugins/jquery/jquery.min.js',
				$painel->url->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
				$painel->url->painel_js_path . '/plugins/bootstrap-select/js/bootstrap-select.js',
				$painel->url->painel_js_path . '/plugins/jquery-slimscroll/jquery.slimscroll.js',
				$painel->url->painel_js_path . '/plugins/bootstrap-notify/bootstrap-notify.js',
				$painel->url->painel_js_path . '/plugins/node-waves/waves.js',
				$painel->url->painel_js_path . '/plugins/ckeditor/ckeditor.js',

				$painel->url->painel_js_path . '/plugins/jquery-datatable/jquery.dataTables.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/buttons.flash.min.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/jszip.min.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/pdfmake.min.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/vfs_fonts.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/buttons.html5.min.js',
				$painel->url->painel_js_path . '/plugins/jquery-datatable/extensions/export/buttons.print.min.js',
				$painel->url->painel_js_path . '/plugins/lightgallery/lightgallery-all.js',
				$painel->url->painel_js_path . '/plugins/lightgallery/image-galery.js',
				$painel->url->painel_js_path . '/admin.js',
				$painel->url->painel_js_path . '/modals.js',
				$painel->url->painel_js_path . '/plugins/tables/jquery-datatable.js',
				$painel->url->painel_js_path . '/editors.js',
				$painel->url->painel_js_path . '/index.js',
				$painel->url->painel_js_path . '/demo.js',
				$painel->url->config_js_path
				];
		foreach ($_JS as $key => $value) {
		    $tag->script('src="' . $value . '" rel="stylesheet"');
		    $tag->script;
		}
