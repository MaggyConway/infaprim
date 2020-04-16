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

<div id="news_another">
   <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <? //echo '<pre>'; var_dump($arItem); echo "</pre>"; ?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>

   <? if ($arItem["PROPERTIES"]["HOME_VISIBLE"]["VALUE"][0] == "ДА") { ?>

      <div class="news__item">

         <a href="<?= $arItem["DETAIL_PAGE_URL"]?>" class='wrap_link'>

            <? if (!empty($arItem["PROPERTIES"]["STICKER"]["VALUE"])) { ?>

               <span class="news_sticker"><?=$arItem["PROPERTIES"]["STICKER"]["VALUE"]?></span>

            <? } ?>

            <? if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])) { ?>

               <div class="photo" style="background: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center center;"></div>

            <? } else { ?>

               <div class="photo" style="background: url(/local/templates/infaprim/img/news_image_wrapper.png) no-repeat center center;"></div>
               
            <? } ?>

            <div class="news__item__content">
               <div class="name"><?= $arItem["NAME"]?></div>
               
               <? if (!empty($arItem["PROPERTIES"]["BEGIN"]["VALUE"]["TEXT"])) {?>
                  <p><?=$arItem["PROPERTIES"]["BEGIN"]["VALUE"]["TEXT"]?></p>
               <? } else { ?>
                  <p><?= $arItem["FIELDS"]["PREVIEW_TEXT"]?></p>
               <? } ?>

               <div class="date"><?= $arItem["PROPERTIES"]["DATE"]["VALUE"]?></div>
            </div>

         </a>

      </div>

   <? } ?>

   <? endforeach; ?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <?=$arResult["NAV_STRING"]?>
<?endif;?>
