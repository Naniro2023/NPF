<?use Bitrix\Main\IO,
	Bitrix\Main\Application;

foreach ($arResult['ITEMS'] as $key => $item){
	//Размер файла в Кб
	$file_size = round($item["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"] / 1024, 0);
	$arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"] = $file_size.' Кб';
	// Определяю файл иконки 
	$icons_folder = '/local/markup/dist/img/file_icons/'; // Чтобы менять папку, если что
	// определяю тип иконки битриксовской оберткой метода getExtension
	$file = new IO\File($arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]);
	$file_type = $file->getExtension();
	//можно просто через имя файла, чтобы не подключать класс, разобрать имя на массив через точку и взять последний элемент
	$file_name_array = explode('.', $arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_NAME"]);
	$file_type = array_pop($file_name_array);
	//echo '<pre>';
	//print_r($file_type);
	//echo '</pre>';
	// И так, и так работает
	$arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["ICON_SRC"] = $icons_folder.$file_type.'.svg';
} //endforeach


/*
echo '<pre>';
echo 'Это после модифайра:<br/>';
echo '$arResult:<br/>';
print_r($arResult);
echo '</pre>';
*/

?>