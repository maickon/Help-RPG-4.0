<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Help Rpg - Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <?php
        $_CSS = [
            $painel->url->painel_css_path . '/plugins/bootstrap/css/bootstrap.css',
            $painel->url->painel_css_path . '/plugins/node-waves/waves.css',
            $painel->url->painel_css_path . '/plugins/animate-css/animate.css',
            $painel->url->painel_css_path . '/plugins/material-design-preloader/md-preloader.css',
            $painel->url->painel_css_path . '/plugins/morrisjs/morris.css',
            $painel->url->painel_css_path . '/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
            $painel->url->painel_css_path . '/plugins/bootstrap-select/css/bootstrap-select.css',
            $painel->url->painel_css_path . '/style.css', 
            $painel->url->painel_css_path . '/themes/all-themes.css',
            $painel->url->index_css_path 
        ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }
    ?>
</head>