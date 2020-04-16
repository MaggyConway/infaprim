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

<div class="news__grid">
   <? foreach ($arResult["ITEMS"] as $arItem): ?>

      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>

      <a href="<?= $arItem["DETAIL_PAGE_URL"]?>" class="news__item">
         <? //echo '<pre>'; var_dump($_REQUEST['tags']); echo '</pre>';?>

         <? 
         $res = CIBlockElement::GetByID($arItem["ID"]);
              if ($ar_res = $res->GetNext()){

                  $tags = $ar_res['TAGS'];
              } else {
                  $tags = '';
              }
              $arrayTags =  explode(',', $tags);

              //echo '<pre>'; var_dump($arrayTags[0]); echo '</pre>';
         ?>
   
        <?if (!empty($arrayTags[0])) { ?>

            <span class="news_sticker"><?=$arrayTags[0]?></span>

         <? } ?>

         <? if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])) { ?>

            <div class="photo" style="background: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center center;"></div>

         <? } else { ?>

            <div class="photo" style="background: url(/local/templates/infaprim/img/news_image_wrapper.png) no-repeat center center;"></div>
            
         <? } ?>

         <div class="news__item__content">
            <div class="name"><?= $arItem["NAME"]?>
            </div>

            <? if (!empty($arItem["DISPLAY_PROPERTIES"]["BEGIN"]["VALUE"]["TEXT"])) {?>
               <p><?=$arItem["DISPLAY_PROPERTIES"]["BEGIN"]["VALUE"]["TEXT"]?></p>
            <? } else { ?>
               <p><?= $arItem["FIELDS"]["PREVIEW_TEXT"]?></p>
            <? } ?>
            <div class="date"><?= $arItem["PROPERTIES"]["DATE"]["VALUE"]?></div>
         </div>
      </a>

   <? endforeach; ?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <?=$arResult["NAV_STRING"]?>
<?endif;?>
