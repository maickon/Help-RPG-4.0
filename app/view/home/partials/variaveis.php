<?php

// Lista de utilitarios [nome-titulo-url]
$_IMG_UTILITARIES = [
					    [
	                        $dados->dados_img_icon.'dados.png', 
	                        $dados->dados_descricao_alt, 
	                        $dados->dados_descricao_alt, 
	                        $dados->dados_root_path
	                    ],

	                    [
	                        $nomes->nomes_img_icon.'nomes.png', 
	                        $nomes->nomes_descricao_alt, 
	                        $nomes->nomes_descricao_alt, 
	                        $nomes->nomes_root_path
	                    ],

					    [
	                        $fichas->fichas_img_icon.'fichas_jogador.png', 
	                        $fichas->fichas_descricao_alt, 
	                        $fichas->fichas_descricao_alt, 
	                        $fichas->fichas_root_path
	                    ],

					    [
	                        $geradoraventuras->geradoraventuras_img_icon.'aventura-cadastro.png', 
	                        $geradoraventuras->geradoraventuras_descricao_alt, 
	                        $geradoraventuras->geradoraventuras_descricao_alt, 
	                        $geradoraventuras->geradoraventuras_root_path
	                    ],

	                    [
	                        $tavernas->tavernas_img_icon.'tavernas.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],

					    [
	                        $masmorras->masmorras_img_icon.'masmorras.png', 
	                        $masmorras->masmorras_descricao_alt, 
	                        $masmorras->masmorras_descricao_alt, 
	                        $masmorras->masmorras_root_path
	                    ],

					    [  
	                        $mundos->mundos_img_icon.'mapas.png', 
	                        $mundos->mundos_descricao_alt, 
	                        $mundos->mundos_descricao_alt, 
	                        $mundos->mundos_root_path
	                    ],

	                    [
	                        $personalidades->personalidades_img_icon.'personalidades.png', 
	                        $personalidades->personalidades_descricao_alt, 
	                        $personalidades->personalidades_descricao_alt, 
	                        $personalidades->personalidades_root_path
	                    ],

					    [
	                        $cidades->cidades_img_icon.'cidades.png', 
	                        $cidades->cidades_descricao_alt, 
	                        $cidades->cidades_descricao_alt, 
	                        $cidades->cidades_root_path
	                    ],

					    [
	                        $marcadores->marcadores_img_icon.'marcadores.png', 
	                        $marcadores->marcadores_descricao_alt, 
	                        $marcadores->marcadores_descricao_alt, 
	                        $marcadores->marcadores_root_path
	                    ],

	                    [
	                        $itens->itens_img_icon.'itens.png', 
	                        $itens->itens_descricao_alt, 
	                        $itens->itens_descricao_alt, 
	                        $itens->itens_root_path
	                    ],

	                    [
	                        $sorte->sorte_img_icon.'sorte.png', 
	                        $sorte->sorte_descricao_alt, 
	                        $sorte->sorte_descricao_alt, 
	                        $sorte->sorte_root_path
	                    ],

	                    [
	                        $tempo->tempo_img_icon.'tempo.png', 
	                        $tempo->tempo_descricao_alt, 
	                        $tempo->tempo_descricao_alt, 
	                        $tempo->tempo_root_path
	                    ],

	                    [
	                        $nomedeespadas->nomedeespadas_img_icon.'espadas.png', 
	                        $nomedeespadas->nomedeespadas_descricao_alt, 
	                        $nomedeespadas->nomedeespadas_descricao_alt, 
	                        $nomedeespadas->nomedeespadas_root_path
	                    ]
					];

$_IMG_UTILITARIES_2 = [ 

	            [
	            	IMG_ICON_PATH . 'usuario.png', 
	            	$language->MENU_USERS_REGISTERED, 
	            	"{$usuarios_registrados} " . $language->MENU_RECORDS,
	            	URL_BASE . ''
	            ],

				[
					IMG_ICON_PATH . 'armaduras.png', 
					$language->MENU_ARMOR, 
					"{$armaduras_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'armas.png', 
					$language->MENU_WEAPONS, 
					"{$armas_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'artefatos.png', 
					$language->MENU_ARTIFACTS, 
					"{$artefatos_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'personagens.png', 
					$language->MENU_FILE_PLAYER_CHARACTER, 
					"{$personagens_jogadores_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'fichas_npc.png', 
					$language->MENU_FILE_NPC_CHARACTER, 
					"{$personagens_monstros_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'talentos.png', 
					$language->MENU_TALENTS, 
					"{$talentos_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'magias.png', 
					$language->MENU_SPELLS, 
					"{$magias_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'pericias.png', 
					$language->MENU_SKILLS, 
					"{$pericias_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'aventuras.png', 
					$language->MENU_ADVENTURES, 
					"{$aventuras_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'historias.png', 
					$language->MENU_STORIES, 
					"{$historias_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'contos.png', 
					$language->MENU_TALES, 
					"{$contos_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'cronicas.png', 
					$language->MENU_CHRONICLES, 
					"{$cronicas_registradas} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'cenarios.png', 
					$language->MENU_SCENARIO, 
					"{$cenarios_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'bestiario.png', 
					$language->MENU_BESTIARY, 
					"{$bestiarios_registrados} " . $language->MENU_RECORDS,
					URL_BASE . ''
				]
			];