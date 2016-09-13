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
	                        $mundos->mundos_img_icon.'mapa.png', 
	                        $mundos->mundos_descricao_alt, 
	                        $mundos->mundos_descricao_alt, 
	                        $mundos->mundos_root_path
	                    ],

					    [  
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],
					
	                    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],

					    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],

					    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],
					
	                    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],
					
	                    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],
					
	                    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ],
					
	                    [
	                        $tavernas->tavernas_img_icon.'taverna.png', 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_descricao_alt, 
	                        $tavernas->tavernas_root_path
	                    ]
					];

$_IMG_UTILITARIES_2 = [ 

	            [
	            	IMG_ICON_PATH . 'usuario.png', 
	            	USERS_REGISTERED, 
	            	"{$home->getHomeData('count_user')} " . RECORDS
	            ],
				
				[
					IMG_ICON_PATH . 'armadura.png', 
					ARMOR, 
					"{$home->getHomeData('count_armadura')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'arma.png', 
					WEAPONS, 
					"{$home->getHomeData('count_arma')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'artefato.png', 
					ARTIFACTS, 
					"{$home->getHomeData('count_artefato')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'personagem.png', 
					FILE_PLAYER_CHARACTER, 
					"{$home->getHomeData('count_personagem_jogador')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'mais-fichas.png', 
					FILE_NPC_CHARACTER, 
					"{$home->getHomeData('count_personagem_npc')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'talentos.png', 
					TALENTS, 
					"{$home->getHomeData('count_talentos')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'magia.png', 
					SPELLS, 
					"{$home->getHomeData('count_magias')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'pericia.png', 
					SKILLS, 
					"{$home->getHomeData('count_pericias')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'aventura.png', 
					ADVENTURES, 
					"{$home->getHomeData('count_aventuras')} " . RECORDS
				],

				[
					IMG_ICON_PATH . 'historia.png', 
					STORIES, 
					"{$home->getHomeData('count_historias')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'contos.png', 
					TALES, 
					"{$home->getHomeData('count_contos')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'cronicas.png', 
					CHRONICLES, 
					"{$home->getHomeData('count_cronicas')} " . RECORDS
				],
				
				[	
					IMG_ICON_PATH . 'cenarios.png', 
					SCENARIO, 
					"{$home->getHomeData('count_cenarios')} " . RECORDS
				],
				
				[
					IMG_ICON_PATH . 'bestiario.png', 
					BESTIARY, 
					"{$home->getHomeData('count_bestiario')} " . RECORDS
				]
			];