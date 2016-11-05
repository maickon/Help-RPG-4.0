<!-- Javascript -->
    <?php 
		$_JS = [$painel->url->painel_js_path . '/plugins/jquery/jquery.min.js',
				$painel->url->painel_js_path . '/plugins/bootstrap/js/bootstrap.js',
				$painel->url->painel_js_path . '/plugins/bootstrap-select/js/bootstrap-select.js',
				$painel->url->painel_js_path . '/plugins/jquery-slimscroll/jquery.slimscroll.js',
				$painel->url->painel_js_path . '/plugins/bootstrap-notify/bootstrap-notify.js',
				$painel->url->painel_js_path . '/plugins/node-waves/waves.js',
				$painel->url->painel_js_path . '/admin.js',
				$painel->url->painel_js_path . '/modals.js',
				];
		foreach ($_JS as $key => $value) {
		    $tag->script('src="' . $value . '" rel="stylesheet"'); 
		    $tag->script;
		}
	?>
    <!-- #END# Javascript -->

	</body>
</html>