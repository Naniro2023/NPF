<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="nav__list nav__list-middle">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="nav__link nav__open nav__list-link"><a class="nav__link nav__open nav__list-link" href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a><div class="nav__arrow arrow nav__arrow-program"></div></li>
	<?else:?>
		<li class="nav__item nav__program-li menu__item"><a class="nav__link nav__open nav__list-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><div class="nav__arrow arrow nav__arrow-program"></div></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>