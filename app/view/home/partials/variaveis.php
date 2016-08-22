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
	                        IMG_ROLL_DICE, 
	                        ROLL_DICE, 
	                        ROLL_DICE, 
	                        ROLL_DICE_URL
	                    ],
					
	                    [
	                        IMG_NAMES, 
	                        GENERATOR_NAMES, 
	                        GENERATOR_NAMES, 
	                        NAMES_URL
	                    ],

					    [
	                        IMG_SHEET, 
	                        CHARACTER_SHEETS, 
	                        CHARACTER_SHEETS, 
	                        RANDOM_FILE_URL
	                    ],

					    [
	                        IMG_ADVENTURES, 
	                        GENERATOR_ADVENTURE, 
	                        GENERATOR_ADVENTURE, 
	                        GENERATOR_ADVENTURE_URL
	                    ],
					
	                    [
	                        IMG_TAVERN, 
	                        GENERATOR_TAVERN, 
	                        GENERATOR_TAVERN, 
	                        TAVERN_URL
	                    ],

					    [
	                        IMG_MONSTER, 
	                        CHARACTER_SHEETS, 
	                        CHARACTER_SHEETS, 
	                        GENERATOR_WORLDS_URL
	                    ],

					    [  
	                        IMG_MAP, 
	                        GENERATOR_WORLDS, 
	                        GENERATOR_WORLDS, 
	                        GENERATOR_WORLDS_URL
	                    ],
					
	                    [
	                        IMG_DUNGEON, 
	                        GENERATOR_DUNGEON, 
	                        GENERATOR_DUNGEON, 
	                        GENERATOR_DUNGEON_URL
	                    ],

					    [
	                        IMG_PERSONALITY, 
	                        GENERATOR_PERSONALITIES, 
	                        GENERATOR_PERSONALITIES, 
	                        GENERATOR_PERSONALITIES_URL
	                    ],

					    [
	                        IMG_CITIES, 
	                        GENERATOR_CITIES, 
	                        GENERATOR_CITIES, 
	                        GENERATOR_CITIES_URL
	                    ],
					
	                    [
	                        IMG_HIGHLIGHTER, 
	                        HIGHLIGHTER, 
	                        HIGHLIGHTER, 
	                        HIGHLIGHTER_URL
	                    ],
					
	                    [
	                        IMG_ITEMS, 
	                        GENERATOR_ITENS, 
	                        GENERATOR_ITENS, 
	                        GENERATOR_ITENS_URL
	                    ],
					
	                    [
	                        IMG_LUCK, 
	                        GENERATOR_LUCK, 
	                        GENERATOR_LUCK, 
	                        GENERATOR_LUCK_URL
	                    ],
					
	                    [
	                        IMG_SWORD, 
	                        GENERATOR_NAME_SWORD, 
	                        GENERATOR_NAME_SWORD, 
	                        GENERATOR_NAME_SWORD_URL
	                    ]
					];

$_IMG_UTILITARIES_2 = [ 

	            [
	            	IMG_USER, 
	            	USERS_REGISTERED, 
	            	"{$home->getHomeData('count_user')} " . RECORDS
	            ],
				
				[
					IMG_ARMOR, 
					ARMOR, 
					"{$home->getHomeData('count_armadura')} " . RECORDS
				],
				
				[
					IMG_WEAPON, 
					WEAPONS, 
					"{$home->getHomeData('count_arma')} " . RECORDS
				],
				
				[
					IMG_ARTIFACT, 
					ARTIFACTS, 
					"{$home->getHomeData('count_artefato')} " . RECORDS
				],
				
				[
					IMG_CHARACTER, 
					FILE_PLAYER_CHARACTER, 
					"{$home->getHomeData('count_personagem_jogador')} " . RECORDS
				],
				
				[
					IMG_CHARACTER_SHEETS, 
					FILE_NPC_CHARACTER, 
					"{$home->getHomeData('count_personagem_npc')} " . RECORDS
				],
				
				[
					IMG_TALENTS, 
					TALENTS, 
					"{$home->getHomeData('count_talentos')} " . RECORDS
				],
				
				[
					IMG_SPELLS, 
					SPELLS, 
					"{$home->getHomeData('count_magias')} " . RECORDS
				],
				
				[
					IMG_SKILLS, 
					SKILLS, 
					"{$home->getHomeData('count_pericias')} " . RECORDS
				],
				
				[
					IMG_ADVENTURES_REGISTER, 
					ADVENTURES, 
					"{$home->getHomeData('count_aventuras')} " . RECORDS
				],

				[
					IMG_HISTORY, 
					STORIES, 
					"{$home->getHomeData('count_historias')} " . RECORDS
				],
				
				[
					IMG_TALES, 
					TALES, 
					"{$home->getHomeData('count_contos')} " . RECORDS
				],
				
				[
					IMG_CHRONICLES, 
					CHRONICLES, 
					"{$home->getHomeData('count_cronicas')} " . RECORDS
				],
				
				[	
					IMG_SCENARIOS, 
					SCENARIO, 
					"{$home->getHomeData('count_cenarios')} " . RECORDS
				],
				
				[
					IMG_BESTIARY, 
					BESTIARY, 
					"{$home->getHomeData('count_bestiario')} " . RECORDS
				]
			];