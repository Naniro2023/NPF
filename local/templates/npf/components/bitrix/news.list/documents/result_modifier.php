<?
use Bitrix\Main\IO,
	Bitrix\Main\Application;
foreach ($arResult['ITEMS'] as $key => $item){
	//Размер файла в Кб
	$file_size = round($item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"] / 1024, 0);
	$arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"] = $file_size.' Кб';
	// Определяю файл иконки 
	$icons_folder = '/local/markup/dist/img/file_icons/'; // Чтобы менять папку, если что
	// определяю тип иконки классом битрикс 
	$file = new IO\File($arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]);
	$file_type = $file->getExtension();
	$arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["ICON_SRC"] = $icons_folder.$file_type.'.svg';
	//можно было просто через имя файла, чтобы не подключать класс
	$file_type = '';
	//echo '<pre>';
	//print_r($item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]"FILE_NAME"]);
	//echo '</pre>';
	
} //endforeach





//echo '<pre>';
//print_r($arResult["ITEMS"];
//print_r($arResult["ITEMS"]["0"]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]);
//print_r($arItem["DISPLAY_PROPERTIES"]);
//echo '</pre>';



/*echo '<pre>';
print_r($arResult["ITEMS"]);
echo '</pre>';

CModule::IncludeModule("fileman");
CMedialib::Init(); 

$arRes = CMedialib::GetTypes(array("image"), true);
echo '<pre>';
print_r($arRes);
echo '</pre>';

$arRes = CMedialibCollection::GetList(array('arFilter' => array('ACTIVE' => 'Y'), 'arOrder' => array('NAME' => 'ASC')));
echo '<pre>';
print_r($arRes);
echo '</pre>';

$arRes = CMedialibItem::GetList(array('arCollections' => array("1"), 'minId' => 3));
echo '<pre>';
print_r($arRes);
echo '</pre>';*/
?>