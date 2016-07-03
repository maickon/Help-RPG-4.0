<?php
$tag->section('id="utilitarios"');
    $tag->div('class="container"');
        $tag->div('class="row text-center header"');
            $tag->div('class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up"');
                $tag->h3();
                    $tag->printer(UTILITIES);
                $tag->h3;
                $tag->hr();
            $tag->div;
        $tag->div;
        $tag->div('class="row animate-in" data-anim-type="fade-in-up"');
            
            $_IMG_UTILITARIES_2 = [ 
            [IMG_USER, USERS_REGISTERED, "{$home->getHomeData('count_user')} " . RECORDS],
			[IMG_ARMOR, ARMOR, "{$home->getHomeData('count_armadura')} " . RECORDS],
			[IMG_WEAPON, WEAPONS, "{$home->getHomeData('count_arma')} " . RECORDS],
			[IMG_ARTIFACT, ARTIFACTS, "{$home->getHomeData('count_artefato')} " . RECORDS],
			[IMG_CHARACTER, FILE_PLAYER_CHARACTER, "{$home->getHomeData('count_personagem_jogador')} " . RECORDS],
			[IMG_CHARACTER_SHEETS, FILE_NPC_CHARACTER, "{$home->getHomeData('count_personagem_npc')} " . RECORDS],
			[IMG_TALENTS, TALENTS, "{$home->getHomeData('count_talentos')} " . RECORDS],
			[IMG_SPELLS, SPELLS, "{$home->getHomeData('count_magias')} " . RECORDS],
			[IMG_SKILLS, SKILLS, "{$home->getHomeData('count_pericias')} " . RECORDS],
			[IMG_ADVENTURES_REGISTER, ADVENTURES, "{$home->getHomeData('count_aventuras')} " . RECORDS],
			[IMG_HISTORY, STORIES, "{$home->getHomeData('count_historias')} " . RECORDS],
			[IMG_TALES, TALES, "{$home->getHomeData('count_contos')} " . RECORDS],
			[IMG_CHRONICLES, CHRONICLES, "{$home->getHomeData('count_cronicas')} " . RECORDS],
			[IMG_SCENARIOS, SCENARIO, "{$home->getHomeData('count_cenarios')} " . RECORDS],
			[IMG_BESTIARY, BESTIARY, "{$home->getHomeData('count_bestiario')} " . RECORDS]
			];
            foreach ($_IMG_UTILITARIES_2 as $key => $value) {
                $tag->div('class="col-xs-12 col-sm-4 col-md-4 col-lg-4"');
                    $tag->div('class="utilitarios-wrapper"');
                      
                        $tag->a('href="#" class="icon-content"');
                            $tag->img('src="' . $value[0] . '" class="icon_maior img-circle" alt="' . $value[1] . '" title="' . $value[1] . '"');
                        $tag->a;
                    
                        $tag->h3();
                            $tag->printer($value[1]);
                        $tag->h3;
                        $tag->printer($value[2]);
                    $tag->div;
                $tag->div;
            }

        $tag->div;
    $tag->div;
$tag->section;