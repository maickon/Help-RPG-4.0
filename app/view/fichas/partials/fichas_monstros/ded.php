<?php

$tag->div('class="col-md-12"');
	$tag->div('class="form-group"');
		$helper->label_sheet(SHEET_TYPE, SHEET_TYPE_ID);
		$helper->label_sheet(SHEET_SUBTYPE, SHEET_SUBTYPE_ID);
		$helper->label_sheet(SHEET_SIZE_LABELS, SHEET_SIZE_ID);
		$helper->label_sheet(SHEET_CHALLENGE_LEVEL, SHEET_CHALLENGE_LEVEL_ID);
		$helper->label_sheet(SHEET_SPACE, SHEET_SPACE_ID);
		$helper->label_sheet(SHEET_REACH, SHEET_REACH_ID);
		$helper->label_sheet(SHEET_HEIGHT_LABELS, SHEET_HEIGHT_ID);
		$helper->label_sheet(SHEET_WEIGHT_LABELS, SHEET_WEIGHT_ID);
		
	$tag->div;	
$tag->div;	

$tag->div('class="col-md-1"');
	$tag->div('class="form-group"');
		$helper->label_sheet(SHEET_FORCE_LABELS, SHEET_FORCE_ID);
		$helper->label_sheet(SHEET_DEXTERITY_LABELS, SHEET_DEXTERITY_ID);
		$helper->label_sheet(SHEET_CONSTITUTION_LABELS, SHEET_CONSTITUTION_ID);
		$helper->label_sheet(SHEET_INTELLIGENCE_LABELS, SHEET_INTELLIGENCE_ID);
		$helper->label_sheet(SHEET_WISDOM_LABELS, SHEET_WISDOM_ID);
		$helper->label_sheet(SHEET_CHARISMA_LABELS, SHEET_CHARISMA_ID);
	$tag->div;	
$tag->div;	