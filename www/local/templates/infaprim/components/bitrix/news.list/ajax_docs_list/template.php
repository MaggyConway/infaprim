<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
 
<section class="docs_elements"><div class="wrapper">
    <? if (!empty($arResult["ITEMS"])) { ?>

    <? foreach ($arResult["ITEMS"] as $arItem) : ?>

        <?
        $res = CIBlockElement::GetByID($arItem["ID"]);
        if ($ar_res = $res->GetNext()){

            $tags = $ar_res['TAGS'];
        } else {
            $tags = '';
        }
        $arrayTags =  explode(',', $tags);

        //var_dump($arItem);

        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        $doc_path = CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"]); ?>
            
            <div class="element">
                <?// echo '<pre>'; var_dump($arItem["PROPERTIES"]["FILE"]["VALUE"]); echo '</pre>';?>
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

</div></section>

<!-- <div class="transition-loader">
    <div class="transition-loader-inner">
        <label></label>
        <label></label>
        <label></label>
        <label></label>
        <label></label>
        <label></label>
    </div>
</div> -->