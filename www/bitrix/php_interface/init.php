<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 23.02.20
 * Time: 21:47
 */

function GetCurrentWeekDates()
{


    if (date('D') != 'Mon') {
        $startdate = date('Y-m-d', strtotime('last Monday'));
    } else {
        $startdate = date('Y-m-d');
    }

//always next saturday
    if (date('D') != 'Sat') {
        $enddate = date('Y-m-d', strtotime('next Saturday'));
    } else {
        $enddate = date('Y-m-d');
    }

    $DateArray = array();
    $timestamp = strtotime($startdate);
    while ($startdate <= $enddate) {
        $startdate = date('Y-m-d', $timestamp);
        $DateArray[] = $startdate;
        $timestamp = strtotime('+1 days', strtotime($startdate));


    }
    return $DateArray;
}



/*
 *   Event calendar create Birthday  items
 */
function BirthdayCreate()
{
    $rs = CUser::GetList($by = "id", $order = "asc");
    global $USER;

    while ($arr = $rs->GetNext()) :
        if (CModule::IncludeModule('iblock')):
            $birthDayUser = date('d.m', strtotime($arr['PERSONAL_BIRTHDAY']));
            $arFilter = Array(
                "IBLOCK_ID" => IntVal(5),
                "ACTIVE" => "Y",
                "NAME" => "День рождения " . $arr['LAST_NAME'] . ' ' . $arr['NAME'] . ' ' . $arr['SECOND_NAME']
            );
            $res = CIBlockElement::GetList(Array("SORT" => "ASC", "PROPERTY_PRIORITY" => "ASC"), $arFilter, Array("DATE_ACTIVE_FROM"));
            $ar = $res->Fetch();
            if (empty($ar)) {
                foreach (GetCurrentWeekDates() as $key => $day):
                    $currentDay = date("d.m", strtotime($day));

                    if ($currentDay == $birthDayUser) {
                        $createDay = date("d.m.Y H:i:s", strtotime($day));

                        $el = new CIBlockElement;

                        $PROP = array();
                        $PROP[30] = $createDay;
                        $PROP[31] = "26";
                        $PROP[32] = $arr['ID'];

                        $arLoadProductArray = Array(
                            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
                            "IBLOCK_ID" => 5,
                            "PROPERTY_VALUES" => $PROP,
                            "NAME" => "День рождения " . $arr['LAST_NAME'] . ' ' . $arr['NAME'] . ' ' . $arr['SECOND_NAME'],
                            "ACTIVE" => "Y",            // активен
                        );
                        $el->Add($arLoadProductArray);

                    }
                endforeach;
            }
        endif;
    endwhile;
}


/*
 * Return Month
 */
function getMonthName($date) {
    $months_name = array(
        "Января",
        "Февраля",
        "Марта",
        "Апреля",
        "Мая",
        "Июня",
        "Июля",
        "Августа",
        "Сентября",
        "Октября",
        "Ноября",
        "Декабря"
    );
    return $months_name[date("n", strtotime($date)) - 1];
}

/**
 * Custom login
 * @param $user
 * @param $password*
 */
function loginCustom ($user,$password, $type = false) {
    global $USER;
    if (!is_object($USER)) $USER = new CUser;
    $arAuthResult = $USER->Login($user, $password, "Y");
    if (!empty($arAuthResult['MESSAGE'])) {
            echo json_encode(['errors' => true, 'message' => $arAuthResult['MESSAGE']]);

    } else {
        if($type == 'one'){
            LocalRedirect('/docs/');
        }else{
            echo json_encode(['errors' => '', 'data' => 'true']);
        }
    }

}

//if (!isset($_SERVER['PHP_AUTH_USER']) || strcmp($_SERVER['PHP_AUTH_USER'] , "logout" ) == 0 ){
//    LocalRedirect('/auth/');
//} else {
//    $username = $_SERVER['PHP_AUTH_USER'];
//    $password = $_SERVER["PHP_AUTH_PW"];
//
//    loginCustom ($user,$password,'one');
//}
