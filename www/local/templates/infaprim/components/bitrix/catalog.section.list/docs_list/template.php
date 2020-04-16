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
$this->setFrameMode(true);?>

<section class="docs_page">
	<div class="header__blot"></div>

	<div class="wrapper">
		<div class="docs_flex">
			<div class="docs_content">
				<h1><?$APPLICATION->ShowTitle();?></h1>
				<p>Скачайте необходимый документ за&nbsp;считанные минуты</p>
			</div>
			<div class="docs_image" style="background: url(/local/templates/infaprim/img/docs-page.svg) no-repeat center center;"></div>
		</div>
		<?
			$res = CIBlockElement::GetList(Array(), Array("ACTIVE"=>"Y", "ID" => $arResult["ID"]), false, false, Array("NAME", "TAGS"));
			$arrayTags = [];
			while ($el = $res->Fetch())
			{  
				if(!empty($el["TAGS"])){
					$arrayTags[] =  $el["TAGS"];
				}
			 	
			}
 
			$uniqueTags = array_unique($arrayTags); ?>


		<ul class="elemTags">
            <?  foreach ($uniqueTags as $tagItem) : ?>  
                <li class="itemTag" data-name="<?= $tagItem; ?>">
                    #<?= $tagItem; ?> 
                </li>
            <?  endforeach; ?>
        </ul>

	<div class="docs__box">
		<div class="docs__grid">
			<? foreach ($arResult['SECTIONS'] as $arSection) { ?>
				<? //echo '<pre>'; var_dump($arrayTags); echo '</pre>'; ?>

				<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="docs__item">
					<?=$arSection["NAME"]?>
				</a>

			<? } ?>
		</div>
	</div>

</section>