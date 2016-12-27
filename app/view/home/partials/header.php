<?php
$tag->printer('<!DOCTYPE html>');
$tag->html('lang="en" class="no-js"');
    $tag->head();
        $tag->meta('charset="utf-8"'); 
        $tag->meta('name="viewport"     content="width=device-width, initial-scale=1, maximum-scale=1"');
        $tag->meta('name="description"  content="' . $language->SITE_META_DESCRIPTION . '"');
        $tag->meta('name="keywords"     content="' . $language->SITE_META_KEYWORDS . '"');
        $tag->meta('name="author"       content="' . $language->SITE_META_AUTHOR . '"');
        $tag->link('rel="shortcut icon" href="' . $home->home_img_icon . '../logo-icon.png"');
        // facebook
        $tag->link('<meta property="og:url"           content="'.URL_BASE.'" />');
        $tag->link('<meta property="og:type"          content="website" />');
        $tag->link('<meta property="og:title"         content="'.$language->SITE_NAME.'" />');
        $tag->link('<meta property="og:description"   content="'.$language->SITE_META_DESCRIPTION.'" />');
        $tag->link('<meta property="og:image"         content="'.$home->home_img_icon.'../logo-icon.png" />');

        $tag->printer('<!--[if IE]>');
            $tag->meta('http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"');
        $tag->printer('<![endif]-->');
        $tag->title();
            $tag->printer($language->SITE_NAME);
        $tag->title;

        $_CSS = [
                    $home->bootstrap_css_path, 
                    $home->login_css_path . '/login.css',
                    $home->index_css_path, 
                    $home->ionicons_css_path, 
                    $home->font_awesome_css_path, 
                    $home->animations_css_path,
                    $home->style_site_css_path 
                ];
        // <!-- CORE CSS -->
        foreach ($_CSS as $key => $value) {
            $tag->link('href="' . $value . '" rel="stylesheet"');
        }

        $tag->printer('
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media
        queries -->
        <!-- WARNING: Respond.js doesn\'t work if you view the page via file://
        -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
            </script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
            </script>
        <![endif]-->');
    $tag->head;
    // body partial from home page
    $tag->body('data-spy="scroll" data-target="#menu-section"');
?>

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