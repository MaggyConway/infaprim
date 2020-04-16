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

<section id="our_team_new">
   <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <?// echo '<pre>'; var_dump($arItem["PROPERTIES"]["NEW_WORKER"]["VALUE"]); echo "</pre>"; ?>

      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>


      <? if ($arItem["PROPERTIES"]["NEW_WORKER"]["VALUE"] == "Да") {?>

         <div class="team__item">

            <a href="<?= $arItem["DETAIL_PAGE_URL"]?>" class="wrap_link">

               <? if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])) { ?>

                  <div class="photo" style="background: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center center;"></div>

               <? } else { ?>

                  <div class="photo" style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center;"></div>
                  
               <? } ?>
               <div class="name"><?= $arItem["NAME"]?></div>
               <div class="position"><?= $arItem["PROPERTIES"]["POSITION"]["VALUE"]?></div>
               <div class="city"><?= $arItem["PROPERTIES"]["CITY"]["VALUE"]?></div>
            </a>

            <div class="email">
               <a href="mailto:<?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"]?>">
                  <?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"]?>
               </a>
            </div>

         </div>

      <? } ?>

   <? endforeach; ?>
</section>