<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "АО «НПФ «Сургутнефтегаз»");
$APPLICATION->SetPageProperty("description", "Акционерное общество «Негосударственный пенсионный фонд «Сургутнефтегаз»");
$APPLICATION->SetTitle("Устав");
?><h3>Вывод документов через кастомный компонент npf:documents.list из Медиабиблиотеки</h3>
<h6 class="files__title">Действующая редакция:</h6>
 <?$APPLICATION->IncludeComponent(
	"npf:documents.list",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COLLECTION_ID" => "6"
	)
);?><br>
<h6 class="files__title">Архив:</h6>
 <?$APPLICATION->IncludeComponent(
	"npf:documents.list",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COLLECTION_ID" => "7"
	)
);?><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>