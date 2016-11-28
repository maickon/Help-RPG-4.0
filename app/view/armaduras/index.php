<?php
require URL_BASE_INTERNAL.'app/view/painel/partials/home_page.php';

 $tag->section('class="content"');

    $tag->div('class="col-lg-12"');
        $tag->div('class="row clearfix"');
            $tag->div('class="col-lg-12 col-md-12 col-sm-12 col-xs-12"');
                $tag->div('class="card"');
                    $tag->div('class="header"');
                        $tag->a('href="'.$this->novo_path.'" class="btn btn-primary waves-effect"');
                            $tag->printer($language->ARMOR_BTN_NEW_ARMOR);
                        $tag->a;
                    $tag->div;
                    $tag->div('class="body"');
                        $tag->table('class="table table-bordered table-striped table-hover dataTable js-exportable"');
                            $tag->thead();
                                $tag->tr();
                                    $form->th($language->ARMOR_ID);
                                    $form->th($language->ARMOR_NAME);
                                    $form->th($language->ARMOR_OWNER);
                                    $form->th($language->ARMOR_RPG_SYSTEM);
                                    $form->th($language->ARMOR_ACTION);
                                $tag->tr;
                            $tag->thead;

                            $tag->tbody();
                                foreach ($armaduras as $key => $value) {
                                    $tag->tr();
                                        $form->th($value->id);
                                        $form->th("<a href=\"".URL_BASE."armaduras/visualizar/{$value->id}\">{$value->nome}</a>");
                                        $form->th($value->dono);
                                        $form->th($value->sistema);
                                        if ($value->dono == $_SESSION['login']) {
                                            $tag->th('class="btns-del-edit"');
                                                $tag->div('class="icon-button-demo js-modal-buttons btn-del"');
                                                    $tag->button('data-color="red" class="icon-button-demo btn bg-red btn-xs waves-effect"');
                                                        $tag->i('class="material-icons"');
                                                            $tag->printer('delete');
                                                        $tag->i;
                                                    $tag->button;
                                                $tag->div;
                                                $tag->div('class="icon-button-demo btn-edit"');
                                                    $tag->a('href="'.URL_BASE.'armaduras/editar/'.$value->id.'"');
                                                        $tag->button('class="btn bg-green btn-xs waves-effect"');
                                                            $tag->i('class="material-icons"');
                                                                $tag->printer('edit');
                                                            $tag->i;
                                                        $tag->button;
                                                    $tag->a;
                                                $tag->div;
                                            $tag->th; 
                                        } else {
                                            $tag->th('class="btns-del-edit"');
                                                $tag->a('href="'.URL_BASE.'armaduras/visualizar/'.$value->id.'" target="_blank"');
                                                    $tag->button('class="btn bg-deep-purple btn-xs waves-effect"');
                                                        $tag->i('class="material-icons"');
                                                            $tag->printer('pageview');
                                                        $tag->i;
                                                    $tag->button;
                                                $tag->a;
                                            $tag->th;
                                        }
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

$tag->div('class="modal fade" id="mdModal" tabindex="-1" role="dialog"');
    $tag->div('class="modal-dialog" role="document"');
        $tag->div('class="modal-content"');
            $tag->div('class="modal-header"');
                $tag->h4('class="modal-title" id="defaultModalLabel"');
                $tag->h4;
            $tag->div;
            $tag->div('class="modal-body"');
                $tag->printer($language->PANEL_ARE_YOU_SURE_MSG);
            $tag->div;
            $tag->div('class="modal-footer"');
                $tag->a('href="#" target="blank" class="btn btn-link waves-effect"');
                     $tag->printer($language->BUTTON_YES);
                $tag->a;
                $tag->a('href="#" class="btn btn-link waves-effect" data-dismiss="modal"');
                     $tag->printer($language->BUTTON_NO);
                $tag->a;
            $tag->div;
        $tag->div;
    $tag->div;
$tag->div;
require 'partials/footer.php';