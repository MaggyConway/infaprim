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
$res = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'CODE' => $_REQUEST["SECTION_CODE"], 'SITE_ID' => "s1"));
$section = $res->Fetch();
$APPLICATION->setPageProperty('title', $section["NAME"]);
$APPLICATION->AddChainItem($section["NAME"]);
 
?>

<section class="docs_elements"><div class="header__blot"></div>
	<div class="wrapper">
		<div class="docs_flex">
			<div class="docs_content">
				<h1><?$APPLICATION->ShowTitle();?></h1>
			</div>
			<div class="docs_image" style="background: url(/local/templates/infaprim/img/docs-page.svg) no-repeat center center;"></div>
		</div>

		<? if (!empty($arResult["ITEMS"])) { ?>
			
		<?foreach($arResult["ITEMS"] as $arItem):

			
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));

			$doc_path = CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"]);
				//echo '<pre>'; var_dump($arItem["PROPERTIES"]["FILE_ABOUT"]["VALUE"]["TEXT"]); echo '</pre>';
			?>

			<div class="element">
				<a href="<?=$doc_path?>" target="_blank">

					<? if ($arItem["PROPERTIES"]["ICON_TYPE"]["VALUE"][0] == 'PDF') { ?>
						
						<span style="background: url(/local/templates/infaprim/img/doc_icons/pdf.svg) no-repeat center center;"></span>

					<? } elseif ($arItem["PROPERTIES"]["ICON_TYPE"]["VALUE"][0] == 'DOC') { ?>
						
						<span style="background: url(/local/templates/infaprim/img/doc_icons/doc.svg) no-repeat center center;"></span>

					<? } elseif ($arItem["PROPERTIES"]["ICON_TYPE"]["VALUE"][0] == 'XLS') { ?>

						<span style="background: url(/local/templates/infaprim/img/doc_icons/xls.svg) no-repeat center center;"></span>

					<?}?>

					<?= $arItem["NAME"]?>
				</a>

				<? if (!empty($arItem["PROPERTIES"]["FILE_ABOUT"]["VALUE"])) { ?>
					<p class="file_about"><?=$arItem["PROPERTIES"]["FILE_ABOUT"]["VALUE"]["TEXT"]?></p>
				<? } else {?>
					<div style="height: 5px; width: 100%;"></div>
				<?}?>
			</div>
			
		<? endforeach;

		} else { ?>
			<p class="no_docs">Документов нет</p>
		<?}?>

	</div>
</section>