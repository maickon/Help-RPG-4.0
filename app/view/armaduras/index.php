<?php
session_start();
if (!isset($_SESSION['id']) and !isset($_SESSION['nome']) and !isset($_SESSION['login'])) {
    header("Location: " . URL_BASE);
}

require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');

        $tag->div('class="block-header"');
            $tag->h2();
                $tag->printer('ARMADURAS');
            $tag->h2;
        $tag->div;

        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                        $tag->a('href="'.$this->novo_path.'" class="btn btn-primary waves-effect"');
                            $tag->printer('NOVA ARMADURA');
                        $tag->a;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->table('class="table table-bordered table-striped table-hover dataTable js-exportable"');
                            $tag->thead();
                                $tag->tr();
                                    $form->th('ID');
                                    $form->th('Nome');
                                    $form->th('Sistema de RPG');
                                $tag->tr;
                            $tag->thead;

                            $tag->tbody();
                                foreach ($armaduras as $key => $value) {
                                    $tag->tr();
                                        $form->th($value['id']);
                                        $form->th($value['nome']);
                                        $form->th($value['sistema']);
                                    $tag->tr;
                                }
                            $tag->tbody;
                        $tag->table;
                    $tag->div;
                $tag->div;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->section;

require 'partials/footer.php';