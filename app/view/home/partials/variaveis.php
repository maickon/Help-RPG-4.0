<?php

// lista de mensagens carrosel
$carousel_list = [
	                [
	                    SLIDE_TITLE_01,
	                    SLIDE_MESSAGE_01
	                ],
	                [
	                    SLIDE_TITLE_02,
	                    SLIDE_MESSAGE_02
	                ],
	                [
	                    SLIDE_TITLE_03,
	                    SLIDE_MESSAGE_03
	                ]
	            ];

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
	                        $fichas->fichas_img_icon.'ficha.png', 
	                        $fichas->fichas_descricao_alt, 
	                        $fichas->fichas_descricao_alt, 
	                        $fichas->fichas_root_path
	                    ],

					    [
	                        $geradoraventuras->geradoraventuras_img_icon.'aventura.png', 
	                        $geradoraventuras->geradoraventuras_descricao_alt, 
	                        $geradoraventuras->geradoraventuras_descricao_alt, 
	                        $geradoraventuras->geradoraventuras_root_path
	                    ],
					
	                    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
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
	                        $masmorras->masmorras_img_icon.'mapa.png', 
	                        $masmorras->masmorras_descricao_alt, 
	                        $masmorras->masmorras_descricao_alt, 
	                        $masmorras->masmorras_root_path
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
	                        $marcadores->marcadores_img_icon.'marcador.png', 
	                        $marcadores->marcadores_descricao_alt, 
	                        $marcadores->marcadores_descricao_alt, 
	                        $marcadores->marcadores_root_path
	                    ],
					
	                    [
	                        $itens->itens_img_icon.'item.png', 
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
	            	USERS_REGISTERED, 
	            	"{$usuarios_registrados} " . RECORDS,
	            	URL_BASE . 'usuario'
	            ],
				
				[
					IMG_ICON_PATH . 'armadura.png', 
					ARMOR, 
					"{$armaduras_registradas} " . RECORDS,
					URL_BASE . 'armadura'
				],
				
				[
					IMG_ICON_PATH . 'arma.png', 
					WEAPONS, 
					"{$armas_registradas} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'artefato.png', 
					ARTIFACTS, 
					"{$artefatos_registrados} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'personagem.png', 
					FILE_PLAYER_CHARACTER, 
					"{$personagens_jogadores_registrados} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'mais-fichas.png', 
					FILE_NPC_CHARACTER, 
					"{$personagens_monstros_registrados} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'talentos.png', 
					TALENTS, 
					"{$talentos_registrados} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'magia.png', 
					SPELLS, 
					"{$magias_registradas} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'pericia.png', 
					SKILLS, 
					"{$pericias_registradas} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'aventura.png', 
					ADVENTURES, 
					"{$aventuras_registradas} " . RECORDS,
					URL_BASE . ''
				],

				[
					IMG_ICON_PATH . 'historia.png', 
					STORIES, 
					"{$historias_registradas} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'contos.png', 
					TALES, 
					"{$contos_registrados} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'cronicas.png', 
					CHRONICLES, 
					"{$cronicas_registradas} " . RECORDS,
					URL_BASE . ''
				],
				
				[	
					IMG_ICON_PATH . 'cenarios.png', 
					SCENARIO, 
					"{$cenarios_registrados} " . RECORDS,
					URL_BASE . ''
				],
				
				[
					IMG_ICON_PATH . 'bestiario.png', 
					BESTIARY, 
					"{$bestiarios_registrados} " . RECORDS,
					URL_BASE . ''
				]
			];