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
<section class="adress-book"><div class="header__blot"></div>
   <div class="wrapper">
      <div class="adress_flex">
         <h1>Адресная книга</h1>
         <div class="adress-book__image"></div>
      </div>
      
      <?$APPLICATION->IncludeComponent(
         "bitrix:news.list",
         "phone-files",
         Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("NAME",""),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "1",
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(0=>"FILE_DOC",1=>""),
            "SET_BROWSER_TITLE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "Y",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N"
         )
      );?>

      <div class="adress-book__form">
         <div class="dropdown_block">
             <?php
             $arParameters = array(
                 'FIELDS' => array('PERSONAL_STATE', 'WORK_DEPARTMENT'),
             );
             $rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"),   array(), $arParameters);
            while ($arUser = $rsUsers->Fetch()){
                $newArrRegion [] =$arUser['PERSONAL_STATE'];
                $newArrDepart [] =$arUser['WORK_DEPARTMENT'];
            }
             $uniqueArrRegion = array_unique($newArrRegion);
             $uniqueArrDepart = array_unique($newArrDepart);

             ?>
            <p class="select_title">Регион:</p>
            <select class="select-listbox--region" name="state">
                <option selected value="all">Все</option>
                <? foreach($uniqueArrRegion as $value)  { ?>
                    <option value="<?=$value; ?>"><?=$value; ?></option>
                <? } ?>
            </select>
         </div>

         <div class="dropdown_block">
            <p class="select_title">Отдел:</p>
            <select class="select-listbox--otdel dropdown_block" name="otdel">
                <option selected value="all">Все</option>
                <? foreach($uniqueArrDepart as $value)  { ?>
                    <option value="<?=$value; ?>"><?=$value; ?></option>
                <? } ?>
            </select>
         </div>

         <div class="dropdown_block">
            <p class="select_title">Поиск:</p>
            <div class="dropdown_block select2-search">
               <input type="text" placeholder="Найти сотрудника..." name="search" />
               <span class="lupa"></span>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="our_team">
   <div class="wrapper">
      <h2>Наша команда</h2>
      <div class="our_team__grid">
         <? foreach ($arResult["ITEMS"] as $arItem): ?>

            <? if($arItem["ID"] !== "1") {?>

                <div class="team__item">
                <? //echo '<pre>'; var_dump($arItem['PERSONAL_PHOTO']); echo "</pre>"; ?>

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
            <?}?>
         <? endforeach; ?>
      </div>
   </div>
</section>

<div class="wrapper">
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>