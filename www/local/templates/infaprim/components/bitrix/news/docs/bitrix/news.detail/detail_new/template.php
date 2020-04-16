<!-- СТРАНИЦА ДЕТАЛЬНОЙ СТАТЬИ -->


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
$this->setFrameMode(true);  ?>

<? $file_path = CFile::GetPath($arResult['PROPERTIES']['FILE']['VALUE']); ?>

<? //echo "<pre>"; var_dump($arResult['PROPERTIES']); echo "</pre>"; ?>

<section class="detail_doc"><div class="wrapper">
	
	<h1><?=$arResult["NAME"]?></h1>
	
	<a href="<?= $file_path?>" class="file" target="_blank"><?= $arResult['PROPERTIES']['DOC_TITLE']['VALUE']?></a>

	?>

</div></section>