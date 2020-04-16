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

//echo "<pre>"; var_dump($arResult); echo "</pre>"; ?>

<?= $arParams['END_CUSTOM']; ?>
<div class="position">
	<span>Должность:</span>
	<p><?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?></p>
</div>
<div class="manager">
	<span>Руководитель:</span>
	<p><?=$arResult["PROPERTIES"]["MANAGER"]["VALUE"]?></p>
</div>
<div class="city">
	<span>Регион:</span>
	<p><?=$arResult["PROPERTIES"]["CITY"]["VALUE"]?></p>
</div>




<p><?= $arParams['END_CUSTOM']; ?></p>
	<p class="wish"><strong>Приветствуем Викторию и желаем профессиональных успехов!</strong></p>
</div>
<div class="profile">
	<div class="photo" style="background: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center center;"></div>
	<a href="<?=$arResult["DETAIL_PAGE_URL"]?>" class="btn">ПРОФИЛЬ СОТРУДНИКА</a>
</div>