<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="files__box">
		<div class="files__list ">
			<div class="files__item">
				<div class="files__icon">
						<img src="<?echo $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["ICON_SRC"]?>" class="files__img" alt="<?echo $arItem["NAME"]?>">
				</div>
				<div class="files__attr">
					<div class="files__name" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<?if($arResult["USER_HAVE_ACCESS"]):?>
								<a href="<?echo $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>" class="files__link" target="_blank" download><?echo $arItem["NAME"]?></a>
							<?else:?>
								<?echo $arItem["NAME"]?>
							<?endif;?>
						<?endif;?>
						<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
							<?echo $arItem["PREVIEW_TEXT"];?>
						<?endif;?>
					</div>
					<div class="files__size"><?echo $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"];?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
