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
//print_pre($arResult);
?>
<section class="our_team">
   <div class="wrapper">
      <h2>Наша команда</h2>
      <div class="our_team__grid">
         <? foreach ($arResult["ITEMS"] as $arItem): ?>

            <div class="team__item">
            <? //echo '<pre>'; var_dump($arItem["DETAIL_URL"]); echo "</pre>"; ?>

               <? if (!empty($arItem['PERSONAL_PHOTO']["SRC"])) { ?>

                  <a href="<?=$arItem["DETAIL_URL"]?>" class="photo" style="background: url(<?= $arItem['PERSONAL_PHOTO']["SRC"]?>) no-repeat center center;"></a>

               <? } else { ?>

                  <a href="<?=$arItem["DETAIL_URL"]?>" class="photo" style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center;"></a>

               <? } ?>

               <div class="name">
                  <a href="<?=$arItem["DETAIL_URL"]?>">

                     <span><?=$arItem["LAST_NAME"]?></span>
                     <span><?=$arItem["NAME"]?></span>
                     <span><?=$arItem["SECOND_NAME"]?></span>

                  </a>
               </div>
               <div class="position">
                  <?= $arItem["WORK_POSITION"]?>
               </div>
               <div class="city">
                  <?= $arItem["PERSONAL_STATE"]?>
               </div>
               <a href="mailto:<?= $arItem["EMAIL"]?>" class="email">
                  <?= $arItem["EMAIL"]?>
               </a>
            </div>

         <? endforeach; ?>
      </div>
   </div>
</section>

<div class="wrapper">
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>