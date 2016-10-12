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
                $tag->printer(SITE_NAME);
            $tag->a;
        $tag->div;
        $tag->div('class="navbar-collapse collapse"');
            $tag->ul('class="nav navbar-nav navbar-right"');
            
            $menu = [
                        ['#'.strtolower(HOME),       HOME],
                        ['#'.strtolower(RECORDS), RECORDS],
                        ['#'.strtolower(CONTACT),    CONTACT],
                        [strtolower(LOGIN),            LOGIN],
                        [strtolower(WORDPRESS_URL),    BLOG],
                        [strtolower(YOU_TUBE_URL),    YOU_TUBE_PAGE]
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