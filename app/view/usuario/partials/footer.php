<?php

$_JS = [	
			$painel->url->painel_js_path . '/plugins/jquery/jquery.min.js',
			$painel->url->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
			$painel->url->painel_js_path . '/plugins/bootstrap-select/js/bootstrap-select.js',
			$painel->url->painel_js_path . '/plugins/jquery-slimscroll/jquery.slimscroll.js',
			$painel->url->painel_js_path . '/plugins/jquery-inputmask/jquery.inputmask.bundle.js',
			$painel->url->painel_js_path . '/plugins/node-waves/waves.js',
			$painel->url->painel_js_path . '/plugins/jquery-countto/jquery.countTo.js',
			$painel->url->painel_js_path . '/plugins/jquery-sparkline/jquery.sparkline.js',
			// $painel->url->painel_js_path . '/plugins/tinymce/tinymce.js',
			$painel->url->painel_js_path . '/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js',
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
			$painel->url->painel_js_path . '/admin.js',
			$painel->url->painel_js_path . '/advanced-form-elements.js',
			$painel->url->painel_js_path . '/infobox-4.js',
			$painel->url->painel_js_path . '/plugins/tables/jquery-datatable.js',
			$painel->url->painel_js_path . '/editors.js',
			$painel->url->painel_js_path . '/demo.js',
			$painel->url->usuario_js_path . '/usuario.js',
			$painel->url->amizades_js_path . '/amizades.js',
			];
	foreach ($_JS as $key => $value) {
	    $tag->script('src="' . $value . '" rel="stylesheet"'); 
	    $tag->script;
	}