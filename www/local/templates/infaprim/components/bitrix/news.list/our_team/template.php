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

<section class="our_team"><div class="wrapper">
    <h2>Наша команда</h2>
    <div class="our_team__grid">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <? //echo '<pre>'; var_dump($arItem["PROPERTIES"]); echo "</pre>"; ?>

            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <div class="team__item">

              <? if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])) { ?>
                
                <a href="<?= $arItem["DETAIL_PAGE_URL"]?>" class="photo" style="background: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center center;"></a>

              <? } else { ?>
                
                <a href="<?= $arItem["DETAIL_PAGE_URL"]?>" class="photo" style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center;"></a>

              <? } ?>
               
               <div class="name">
                   <a href="<?= $arItem["DETAIL_PAGE_URL"]?>"><?= $arItem["NAME"]?></a>
               </div>
               <div class="position">
                   <?= $arItem["PROPERTIES"]["POSITION"]["VALUE"]?>
               </div>
               <div class="city">
                   <?= $arItem["PROPERTIES"]["CITY"]["VALUE"]?>
               </div>
               <a href="mailto:<?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"]?>" class="email">
                    <?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"]?>
               </a>
           </div>

       <? endforeach; ?>
</div></section>