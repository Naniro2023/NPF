<?
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
echo '</pre>';
?>