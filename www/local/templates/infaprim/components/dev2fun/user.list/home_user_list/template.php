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

<section id="our_team_new">
   <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <?// echo '<pre>'; var_dump($arItem); echo "</pre>"; ?>

         <div class="team__item">

            <a href="/adress-book/<?= $arItem["ID"]?>" class="wrap_link">

               <? if (!empty($arItem['PERSONAL_PHOTO']["SRC"])) { ?>

                  <div class="photo" style="background: url(<?= $arItem['PERSONAL_PHOTO']["SRC"]?>) no-repeat center center;"></div>

               <? } else { ?>

                  <div class="photo" style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center;"></div>
                  
               <? } ?>
               <div class="name">
                     <span><?=$arItem["LAST_NAME"]?></span>
                     <span><?=$arItem["NAME"]?></span>
                     <span><?=$arItem["SECOND_NAME"]?></span>
               </div>
               <div class="position"><?= $arItem["WORK_POSITION"]?></div>
               <div class="city"><?= $arItem["PERSONAL_STATE"]?></div>
            </a>

            <div class="email">
               <a href="mailto:<?= $arItem["EMAIL"]?>">
                  <?= $arItem["EMAIL"]?>
               </a>
            </div>

         </div>
         
   <? endforeach; ?>
</section>