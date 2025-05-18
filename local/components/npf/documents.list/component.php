<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\Collection;
use Bitrix\Main\Type\DateTime;
use Bitrix\Iblock;

// подключаем медиабиблиотеку
CModule::IncludeModule("fileman");
CMedialib::Init();
/*
echo '<pre>';
echo 'ДО КОМПОНЕНТА:<br/>';
//echo 'Текущий реквест:<br/>';
//print_r($_REQUEST);
//echo '$arCurrentValues:<br/>';
//print_r($arCurrentValues);
echo 'ПАРАМЕТРЫ $arParams:<br/>';
print_r($arParams);
echo '</pre>';
*/
// очистка входящих параметров от разных ошибок
if (!isset($arParams["CACHE_TIME"]))
{
	$arParams["CACHE_TIME"] = 36000000;
}
$arParams["COLLECTION_ID"] = trim($arParams["COLLECTION_ID"] ?? '');
$arParams["CACHE_FILTER"] = ($arParams["CACHE_FILTER"] ?? '') === "Y";
if (!$arParams["CACHE_FILTER"] && !empty($arrFilter))
{
	$arParams["CACHE_TIME"] = 0;
}
// конец очистки входящих параметров
$bUSER_HAVE_ACCESS = !$arParams["USE_PERMISSIONS"];
if ($arParams["USE_PERMISSIONS"] && isset($GLOBALS["USER"]) && is_object($GLOBALS["USER"]))
{
	$arUserGroupArray = $USER->GetUserGroupArray();
	foreach ($arParams["GROUP_PERMISSIONS"] as $PERM)
	{
		if (in_array($PERM, $arUserGroupArray))
		{
			$bUSER_HAVE_ACCESS = true;
			break;
		}
	}
}
$arResult["USER_HAVE_ACCESS"] = $bUSER_HAVE_ACCESS;

//Список элементов коллекции по входящему параметру COLLECTION_ID
if($arParams["COLLECTION_ID"]){
   $arRes = CMedialibItem::GetList(array('arCollections' => array("0" => $arParams["COLLECTION_ID"]),));
}
$arResult['ITEMS'] = array();
//Чтобы не переделывать шаблон, проще переделать входящий массив?
foreach ($arRes as $key => $value){
	$arResult['ITEMS'][$key]['ID'] = $arRes[$key]['ID'];
	$arResult['ITEMS'][$key]['NAME'] = $arRes[$key]['NAME'];
	$arResult['ITEMS'][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"] = $arRes[$key]['PATH'];
	$arResult['ITEMS'][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"] = $arRes[$key]['FILE_SIZE'];
	$arResult['ITEMS'][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_NAME"] = $arRes[$key]['FILE_NAME'];
}


/*


echo '<pre>';
echo 'ПОСЛЕ КОМПОНЕНТА:<br/>';
echo '$arRes:<br/>';
print_r($arRes);
echo '$arResult:<br/>';
print_r($arResult);
echo '</pre>';

*/


$this->includeComponentTemplate();





