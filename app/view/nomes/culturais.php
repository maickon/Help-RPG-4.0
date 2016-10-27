<?php

// options select
    $rpg_nomes = [
        'arabicos'                                      => $language->NAME_OPTIONS_ARABIC,
        'asiaticos'                                     => $language->NAME_OPTIONS_ASIAN,
        'asteca'                                        => $language->NAME_OPTIONS_AZTEC,
        'egipcios'                                      => $language->NAME_OPTIONS_EGYPTIAN,
        'espanhois'                                     => $language->NAME_OPTIONS_SPANISH,
        'frances'                                       => $language->NAME_OPTIONS_FRENCH,
        'neerlandes'                                    => $language->NAME_OPTIONS_BELGIUM_DUTCH,
        'pictos'                                        => $language->NAME_OPTIONS_SCOTIA_PICTISH,
        'francos_feminino'                              => $language->NAME_OPTIONS_FRANCOS_FEMALE,
        'francos_masculino'                             => $language->NAME_OPTIONS_FRANCOS_MALE,
        'romano_feminino'                               => $language->NAME_OPTIONS_ROMAN_FEMALE,
        'romano_masculino'                              => $language->NAME_OPTIONS_ROMAN_MALE,
        'russo_feminino'                                => $language->NAME_OPTIONS_RUSSIAN_FEMALE,
        'russo_masculino'                               => $language->NAME_OPTIONS_RUSSIAN_MALE,
        'gaelico_celta_feminino'                        => $language->NAME_OPTIONS_GAELIC_CELTIC_FEMALE,
        'gaelico_celta_masculino'                       => $language->NAME_OPTIONS_GAELIC_CELTIC_MALE,
        'gaelico_escoces_feminino'                      => $language->NAME_OPTIONS_GAELIC_SCOTTISH_FEMALE,
        'gaelico_escoces_masculino'                     => $language->NAME_OPTIONS_GAELIC_SCOTTISH_MALE,
        'italia_remanescista_feminino'                  => $language->NAME_OPTIONS_ITALY_REMANESCISTA_FEMALE,
        'italia_remanescista_masculino'                 => $language->NAME_OPTIONS_ITALY_REMANESCISTA_MALE,
        'germanico_feminino'                            => $language->NAME_OPTIONS_GERMANIC_FEMALE,
        'germanico_masculino'                           => $language->NAME_OPTIONS_GERMANIC_MALE,
        'persa_feminino'                                => $language->NAME_OPTIONS_PERSIAN_FEMALE,
        'persa_masculino'                               => $language->NAME_OPTIONS_PERSIAN_MALE,
        'anglo_saxao_mulheres_latinizado'               => $language->NAME_OPTIONS_ANGLO_SAXON_LATINIZED_FEMALE,
        'anglo_saxao_homens_latinizado'                 => $language->NAME_OPTIONS_ANGLO_SAXON_LATINIZED_MALE,
        'anglo_saxao_mulheres_ingles_15_16_17'          => $language->NAME_OPTIONS_ANGLO_SAXON_ENGLISH_FEMALE,
        'anglo_saxao_homens_ingles_15_16_17'            => $language->NAME_OPTIONS_ANGLO_SAXON_ENGLISH_MALE,
        'ingles_A_B'                                    => $language->NAME_OPTIONS_AMERICAN_USA_AB,
        'ingles_C_D'                                    => $language->NAME_OPTIONS_AMERICAN_USA_CD,
        'ingles_E_F_G_H'                                => $language->NAME_OPTIONS_AMERICAN_USA_EH,
        'ingles_I_J_K_L'                                => $language->NAME_OPTIONS_AMERICAN_USA_IL,
        'ingles_M_N_O'                                  => $language->NAME_OPTIONS_AMERICAN_USA_MO,
        'ingles_P_Q_R'                                  => $language->NAME_OPTIONS_AMERICAN_USA_PR,
        'ingles_S_T'                                    => $language->NAME_OPTIONS_AMERICAN_USA_ST,
        'ingles_U_V_W_X_Y_Z'                            => $language->NAME_OPTIONS_AMERICAN_USA_UZ,
        ];

$tag->div(['class'=>'container']);

    $tag->div(['class'=>'row-fluid']);
        
        require 'partials/header.php';

        require 'partials/menu.php';
        
        require 'partials/body.php';

        require 'partials/footer.php';

    $tag->div;
$tag->div;