<?php
// load each instance required
require "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];

// options select
    $rpg_nomes = [
        'arabicos'                                      => NAME_OPTIONS_ARABIC,
        'asiaticos'                                     => NAME_OPTIONS_ASIAN,
        'asteca'                                        => NAME_OPTIONS_AZTEC,
        'egipcios'                                      => NAME_OPTIONS_EGYPTIAN,
        'espanhois'                                     => NAME_OPTIONS_SPANISH,
        'frances'                                       => NAME_OPTIONS_FRENCH,
        'neerlandes'                                    => NAME_OPTIONS_BELGIUM_DUTCH,
        'pictos'                                        => NAME_OPTIONS_SCOTIA_PICTISH,
        'francos_feminino'                              => NAME_OPTIONS_FRANCOS_FEMALE,
        'francos_masculino'                             => NAME_OPTIONS_FRANCOS_MALE,
        'romano_feminino'                               => NAME_OPTIONS_ROMAN_FEMALE,
        'romano_masculino'                              => NAME_OPTIONS_ROMAN_MALE,
        'russo_feminino'                                => NAME_OPTIONS_RUSSIAN_FEMALE,
        'russo_masculino'                               => NAME_OPTIONS_RUSSIAN_MALE,
        'gaelico_celta_feminino'                        => NAME_OPTIONS_GAELIC_CELTIC_FEMALE,
        'gaelico_celta_masculino'                       => NAME_OPTIONS_GAELIC_CELTIC_MALE,
        'gaelico_escoces_feminino'                      => NAME_OPTIONS_GAELIC_SCOTTISH_FEMALE,
        'gaelico_escoces_masculino'                     => NAME_OPTIONS_GAELIC_SCOTTISH_MALE,
        'italia_remanescista_feminino'                  => NAME_OPTIONS_ITALY_REMANESCISTA_FEMALE,
        'italia_remanescista_masculino'                 => NAME_OPTIONS_ITALY_REMANESCISTA_MALE,
        'germanico_feminino'                            => NAME_OPTIONS_GERMANIC_FEMALE,
        'germanico_masculino'                           => NAME_OPTIONS_GERMANIC_MALE,
        'persa_feminino'                                => NAME_OPTIONS_PERSIAN_FEMALE,
        'persa_masculino'                               => NAME_OPTIONS_PERSIAN_MALE,
        'anglo_saxao_mulheres_latinizado'               => NAME_OPTIONS_ANGLO_SAXON_LATINIZED_FEMALE,
        'anglo_saxao_homens_latinizado'                 => NAME_OPTIONS_ANGLO_SAXON_LATINIZED_MALE,
        'anglo_saxao_mulheres_ingles_15_16_17'          => NAME_OPTIONS_ANGLO_SAXON_ENGLISH_FEMALE,
        'anglo_saxao_homens_ingles_15_16_17'            => NAME_OPTIONS_ANGLO_SAXON_ENGLISH_MALE,
        'ingles_A_B'                                    => NAME_OPTIONS_AMERICAN_USA_AB,
        'ingles_C_D'                                    => NAME_OPTIONS_AMERICAN_USA_CD,
        'ingles_E_F_G_H'                                => NAME_OPTIONS_AMERICAN_USA_EH,
        'ingles_I_J_K_L'                                => NAME_OPTIONS_AMERICAN_USA_IL,
        'ingles_M_N_O'                                  => NAME_OPTIONS_AMERICAN_USA_MO,
        'ingles_P_Q_R'                                  => NAME_OPTIONS_AMERICAN_USA_PR,
        'ingles_S_T'                                    => NAME_OPTIONS_AMERICAN_USA_ST,
        'ingles_U_V_W_X_Y_Z'                            => NAME_OPTIONS_AMERICAN_USA_UZ,
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;