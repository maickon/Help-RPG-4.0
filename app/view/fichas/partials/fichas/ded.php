<?php
// load each instance required
require_once "{$_SERVER['DOCUMENT_ROOT']}/app/index.php";

// tag instance
$tag = $lib_instance['tags'];

// helper instance
$helper = $helper_instance['fichas'];

$tag->div('class="col-md-12"');
	$tag->div('class="form-group"');
		$helper->label_sheet(SHEET_NAME_LABELS, SHEET_NAME_ID);
		$helper->label_sheet(SHEET_NAME_PLAYER_LABELS, SHEET_NAME_PLAYER_ID);
		$helper->label_sheet(SHEET_XP_LABELS, SHEET_XP_ID);
		$helper->label_sheet(SHEET_LEVEL_LABELS, SHEET_LEVEL_ID);
		$helper->label_sheet(SHEET_DICE_LIFE_LABELS, SHEET_DICE_LIFE_ID);
		$helper->label_sheet(SHEET_RACE_LABELS, SHEET_RACE_ID);
		$helper->label_sheet(SHEET_CLASS_LABELS, SHEET_CLASS_ID);
		$helper->label_sheet(SHEET_GOD_NAME_LABELS, SHEET_GOD_NAME_ID);
		$helper->label_sheet(SHEET_RELIGION_LABELS, SHEET_RELIGION_ID);
		$helper->label_sheet(SHEET_TREND_LABELS, SHEET_TREND_ID);
		$helper->label_sheet(SHEET_SIZE_LABELS, SHEET_SIZE_ID);
		$helper->label_sheet(SHEET_AGE_LABELS, SHEET_AGE_ID);
		$helper->label_sheet(SHEET_SEX_LABELS, SHEET_SEX_ID);
		$helper->label_sheet(SHEET_HEIGHT_LABELS, SHEET_HEIGHT_ID);
		$helper->label_sheet(SHEET_WEIGHT_LABELS, SHEET_WEIGHT_ID);
		$helper->label_sheet(SHEET_EYES_LABELS, SHEET_EYES_ID);
		$helper->label_sheet(SHEET_HAIR_LABELS, SHEET_HAIR_ID);
		$helper->label_sheet(SHEET_SKIN_LABELS, SHEET_SKIN_ID);
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