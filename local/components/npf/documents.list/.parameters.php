<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arCurrentValues */
// подключаем медиабиблиотеку
CModule::IncludeModule("fileman");
CMedialib::Init();

// Список типов медиабиблиотек А они зачем?
/*$db_MLTypes = CMedialib::GetTypes();

foreach($db_MLTypes as $id => $arRes){
		$arTypesEx[$arRes["id"]] = "[" . $arRes["id"] . "] " . $arRes["name"];
}*/

$arCFilter = [
	'ACTIVE' => 'Y',
];
/*if (!empty($arCurrentValues['MEDIALIBRARY_TYPE']))
{
	$arCFilter['ID'] = $arCurrentValues['MEDIALIBRARY_TYPE'];
}*/
//Список коллекций из медиабиблиотеки
$arCollectionsEx = [];
$db_MLCollections = CMedialibCollection::GetList(array('arFilter' => $arCFilter, 'arOrder' => array('ID' => 'ASC')));
foreach($db_MLCollections as $id => $arRes){
		$arCollectionsEx[$arRes["ID"]] = "[" . $arRes["ID"] . "] " . $arRes["NAME"];
}

$arComponentParameters = [
	"GROUPS" => [],
	"PARAMETERS" => [
		"AJAX_MODE" => [],
		/*"MEDIALIBRARY_TYPE" => [
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_DESC_MEDIALIBRARY_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arTypesEx,
			"DEFAULT" => "images",
			"REFRESH" => "Y",
		],*/
		"COLLECTION_ID" => [
		"PARENT" => "BASE",
		"NAME" => GetMessage("T_IBLOCK_DESC_COLLECTION_ID"),
		"TYPE" => "LIST",
		"VALUES" => $arCollectionsEx,
		"DEFAULT" => '',
		"REFRESH" => "Y",
		],
		"CACHE_TIME"  =>  ["DEFAULT"=>36000000],
		"CACHE_FILTER" => [
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("IBLOCK_CACHE_FILTER"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		],
		"CACHE_GROUPS" => [
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BNL_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		],
	],
];

