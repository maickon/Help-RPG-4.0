<?php 

	$tag->form('method="get" onsubmit="return false;"');
		$form->_container();
			$form->_row();
				$tag->div('class="row banner-center"');
					$tag->div;
					$tag->br();
					$menus = [
								['col-number' => 6, 'label' => LABEL_NAME_DUNGEON, 			'id' => 'dungeon_name', 	'type' => 'input'],
								['col-number' => 3, 'label' => LABEL_MAP_STYLE, 			'id' => 'map_style', 		'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_GRID, 					'id' => 'grid', 			'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_LAYOUT_DUNGEON, 		'id' => 'dungeon_layout', 	'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_DUNGEON_SIZE,			'id' => 'dungeon_size', 	'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_STAIRS, 				'id' => 'add_stairs', 		'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_LAYOUT_ROOM, 			'id' => 'room_layout', 		'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_ROOM_SIZE, 			'id' => 'room_size', 		'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_DOORS, 				'id' => 'doors', 			'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_HALLS, 				'id' => 'corridor_layout', 	'type' => 'select'],
								['col-number' => 3, 'label' => LABEL_EXIT_LANES, 			'id' => 'remove_deadends', 	'type' => 'select']
							];

					for($i=0; $i<count($menus); $i++):
						$tag->div('class="col-md-'.$menus[$i]['col-number'].'"');
							$tag->label('class="control-label"');
								$tag->imprime($menus[$i]['label']);
							$tag->label;
							if($menus[$i]['type'] == 'select'):
								$tag->select('id="'.$menus[$i]['id'].'" class="form-control"');
								$tag->select;
							elseif($menus[$i]['type'] == 'input'):
								$tag->input('id="'.$menus[$i]['id'].'" class="form-control"');
							endif;
						$tag->div;
					endfor;

					$tag->div('class="col-md-2"');
						$tag->br();
						$tag->input('type="button" class="btn btn-default" id="new_name" value="'.DUNGEON_BUTTON_LABEL_NEW.'"');
					$tag->div;

					$tag->div('class="col-md-2"');
						$tag->br();
						$tag->input('type="button" value="'.DUNGEON_BUTTON_LABEL_SAVE.'" class="btn btn-default" onclick="save_map();"');
					$tag->div;

					$tag->div('class="col-md-2"');
						$tag->br();
						$tag->imprime('&nbsp;');
						$tag->input('type="button" value="'.DUNGEON_BUTTON_LABEL_PRINT.'" class="btn btn-default" onclick="window.print();"');
					$tag->div;

				$tag->div;
			$form->row_();
		$form->container_();
	$tag->form;

	$tag->div('class="center"');
		$tag->h1('id="dungeon_title" class="title"');
		$tag->h1;
		$tag->canvas('id="map" width="1" height="1"');
			$tag->p();
				$tag->imprime('Seu navegador não tem suporte ao HTML5 &lt;canvas&gt; element.');
			$tag->p;
		$tag->canvas;

		$tag->p();
			$tag->img('src="'.$masmorras->footer_dungeon_img_path.'" alt="Legendas" class="legendas"');
		$tag->p;
	$tag->div;

	$tag->div('id="debug"');
	$tag->div;

	$tag->br();

	$tag->div('class="center"');
		$tag->imprime('Masmorra adaptada do site <b>donjon.bin.sh</b> e mantida pela licensa <b>Creative Commons</b> (creativecommons.org/licenses/by-nc/3.0)');
	$tag->div;


