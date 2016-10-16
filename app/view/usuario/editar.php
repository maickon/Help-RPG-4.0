<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                        $tag->h2();
                            $tag->printer('EDITAR...');
                        $tag->h2;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->div('class="row"');
                            $tag->form('action="'.URL_BASE.'usuario/atualizar" method="post"');
                                require 'partials/form.php';
                            $tag->form;
                        $tag->div;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';