<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
    <meta name="description" content="<?php echo $language->PANEL_META_DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo $language->PANEL_META_KEYWORDS; ?>">
    <meta name="author" content="<?php echo $language->SITE_META_AUTHOR; ?>">

     <!-- facebook -->
    <meta property="og:url"           content="<?php echo URL_BASE; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo $language->SITE_NAME; ?>" />
    <meta property="og:description"   content="<?php echo $language->SITE_META_DESCRIPTION; ?>" />
    <meta property="og:image"         content="<?php echo $home->home_img_icon.'../logo-icon.png'; ?>" />

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $language->PANEL_TITLE; ?></title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo $painel->url->logo_icon_img_path; ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <?php
        $_CSS = [
            $painel->url->painel_css_path . '/plugins/bootstrap/css/bootstrap.css',
            $painel->url->painel_css_path . '/plugins/node-waves/waves.css',
            $painel->url->painel_css_path . '/plugins/animate-css/animate.css',
            $painel->url->painel_css_path . '/plugins/lightgallery/lightgallery.css',
            $painel->url->painel_css_path . '/plugins/material-design-preloader/md-preloader.css',
            $painel->url->painel_css_path . '/plugins/waitme/waitMe.css',
            $painel->url->painel_css_path . '/plugins/morrisjs/morris.css',
            $painel->url->painel_css_path . '/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
            $painel->url->painel_css_path . '/plugins/bootstrap-select/css/bootstrap-select.css',
            $painel->url->painel_css_path . '/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css',
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1539591932928704";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'pt-BR'}
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>