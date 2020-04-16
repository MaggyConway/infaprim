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


if(!empty($arParams['FILTER_MONTH'])){
    list ($day,$month, $year) = explode('.', $arParams['FILTER_MONTH']);
    $y = $year;
    $m = $month;
    $currentDay  = $day;
}else{
    $y = date("Y");
    $m = date("m");
    $currentDay  = '';
}

$month_stamp = mktime(0, 0, 0, $m, 1, $y);
$day_count = date("t", $month_stamp);
$weekday = date("w", $month_stamp);
if ($weekday == 0) $weekday = 7;
$start = -($weekday - 2);
$last = ($day_count + $weekday - 1) % 7;
if ($last == 0) $end = $day_count; else $end = $day_count + 7 - $last;
$today = date("Y-m-d");
$prev = date('?\m=m&\y=Y', mktime(0, 0, 0, $m - 1, 1, $y));
$next = date('?\m=m&\y=Y', mktime(0, 0, 0, $m + 1, 1, $y));
$i = 0;

for ($d = $start; $d <= $end; $d++) {
    if (!($i++ % 7)) echo " <tr>\n";
    $now = "$y-$m-" . sprintf("%02d", $d);
    $date = date("d.m.Y", strtotime($d . '.' . $m . '.' . $y));
    $day= date("d", strtotime($d . '.' . $m . '.' . $y));
    if (is_array($arParams['CURRENT_MONTH']) AND in_array($now, $arParams['CURRENT_MONTH'])  || !empty($currentDay) && $currentDay == $day  ) {

        if(!empty($currentDay) && $currentDay == $day){
            $active = 'active';
        }else{
           $active = 'today'; 
        }
        
    } else {
        $active = '';
    }
    if ($d < 1 OR $d > $day_count) {
        $activeMonth = ' not_current_month';
        $active = ''; 
    } else {
        $activeMonth = '';
    }

    echo '  <td  class="' . $active . '  '.$activeMonth.'"   data-date="'.$day.'">';

    if ($d < 1 OR $d > $day_count) {
//        echo  ' <span class="current_date">'. date("d ", strtotime($now));  echo getMonthName($now) .'</span>';
    } else {

   echo  ' <span class="current_date">'. date("d ", strtotime($now));  echo getMonthName($now).'</span>';


 echo '<ul class="events">';
        foreach ($arResult["ITEMS"] as $arItem):
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

    }

    echo "</td>\n";
    if (!($i % 7)) echo " </tr>\n";
}

