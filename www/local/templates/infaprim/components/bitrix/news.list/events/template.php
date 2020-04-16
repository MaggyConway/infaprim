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
?>
<?php foreach (GetCurrentWeekDates() as $key => $day): ?>

    <?php if ($key <= 6) : ?>
        <td>
            <?php
            $date  = date("d.m.Y", strtotime($day));
            echo '<ul class="events">';
            foreach($arResult["ITEMS"] as $arItem):
                     if ($arItem["DISPLAY_PROPERTIES"]['DATE']['VALUE'] == $date) {
                  
                if ($arItem["DISPLAY_PROPERTIES"]['EVENT_TYPE']['VALUE_XML_ID'] == 'birthday') {
 
                    foreach ($arItem["DISPLAY_PROPERTIES"]['BIRTDAY_USER']["VALUE"] as $value_birtday) {
                        $rsUser = CUser::GetByID($value_birtday);
                        $arUser = $rsUser->Fetch();
                        echo '<li class="birthday">День рождения <a href="/adress-book/' . $arUser['ID'] . '">' . $arUser['LAST_NAME'] . ' ' . $arUser['NAME'] . ' ' . $arUser['SECOND_NAME'] . '</a></li>';
                    }
                   
                } else if ($arItem["DISPLAY_PROPERTIES"]['EVENT_TYPE']['VALUE_XML_ID'] == 'exhibition') { 
                     echo '<li class="exhibition"> ' .$arItem["NAME"]. ' </li>';

                }else {
                    echo '<li> ' .$arItem["NAME"]. ' </li>';
                
                }
              
            }
            endforeach;
               echo '</ul>';
            ?>
        </td>
    <?php endif; ?>
<?php endforeach; ?>
