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
 
<ul class="taglist">  
	<?  foreach ($arResult["SEARCH"] as $key => $res) { ?> 
		<li class="taglist__item">
			<a href="#"  data-name="<?=$res["NAME"]?>" >
				<?=$res["NAME"]?> 
			</a>
		</li>
	<? } ?>
</ul>
