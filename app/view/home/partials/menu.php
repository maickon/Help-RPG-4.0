<?php
// <!--MENU SECTION START-->
$tag->div('class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section"');
    $tag->div('class="container"');
        $tag->div('class="navbar-header"');
            $tag->button('type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"');
                $tag->span('class="icon-bar"'); $tag->span;
                $tag->span('class="icon-bar"'); $tag->span;
                $tag->span('class="icon-bar"'); $tag->span;
            $tag->button;
            $tag->a('class="navbar-brand" href="#"');
                $tag->printer($language->SITE_NAME);
            $tag->a;
        $tag->div;
        $tag->div('class="navbar-collapse collapse"');
            $tag->ul('class="nav navbar-nav navbar-right"');
            
            $menu = [
                        ['#home',           $language->MENU_HOME],
                        ['#registros',      $language->MENU_RECORDS],
                        ['#contato',        $language->MENU_CONTACT],
                        [URL_BASE.'login',  $language->MENU_LOGIN],
                        [WORDPRESS_URL,     $language->MENU_BLOG],
                        [YOU_TUBE_URL,      $language->MENU_YOUTUBE],
                        [URL_BASE.'idioma', $language->MENU_LANGUAGE]
                    ];    
            foreach ($menu as $key => $value) {
                $tag->li();
                    if ($value[1] == 'LOGIN') {
                        $tag->a('href="' . $value[0] . '"');
                            $tag->printer($value[1]);
                        $tag->a;
                    } else {
                        $tag->a('href="' . $value[0] . '"');
                            $tag->printer($value[1]);
                        $tag->a;
                    }
                $tag->li;
            }
            $tag->ul;
        $tag->div;
    $tag->div;
$tag->div;