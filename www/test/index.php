<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("тест");

/*
require_once dirname(__FILE__) . '/PHPExcel-1.8/Classes/PHPExcel.php';
$File = dirname(__FILE__) .  '/folks.xls';

$excel = PHPExcel_IOFactory::load($File);

$Start = 2;
$Res = array();


for ($i = $Start; $i <= 1000; $i++) {
    if ($excel->getActiveSheet()->getCell('B' . $i)->getValue() == null) continue;
    $Row = new stdClass();

    $fio =  $excel->getActiveSheet()->getCell('A' . $i)->getValue();
    $login =  $excel->getActiveSheet()->getCell('B' . $i)->getValue();
    $dep =  $excel->getActiveSheet()->getCell('C' . $i)->getValue();
    $head =  $excel->getActiveSheet()->getCell('D' . $i)->getValue();
    $position =  $excel->getActiveSheet()->getCell('E' . $i)->getValue();
    $email =  $excel->getActiveSheet()->getCell('F' . $i)->getValue();
    $phone =  $excel->getActiveSheet()->getCell('G' . $i)->getValue();
    $city =  $excel->getActiveSheet()->getCell('H' . $i)->getValue();
    $type =  $excel->getActiveSheet()->getCell('I' . $i)->getValue();
    $credantials =  $excel->getActiveSheet()->getCell('J' . $i)->getValue();



    if(!empty($dep)){
        $readyDep = $dep;
    }else{
        $readyDep = '';
    }

    if(!empty($head)){
        $stepOneHead = $head;
    }else{
        $stepOneHead = '';
    }

    if(!empty($position)){
        $readyPosition = $position;
    }else{
        $readyPosition = '';
    }


    if(!empty($email)){
        $readyEmail = $email;
    }else{
        $readyEmail = '';
    }


    if(!empty($phone)){
        $readyPhone = $phone;
    }else{
        $readyPhone = '';
    }


    if(!empty($city)){
        $readyCity = $city;
    }else{
        $readyCity = '';
    }



    if($type == 'офис'){

        if(!empty($credantials)){

            if( $credantials == 'hr'){
                $tempType = '11';

            }elseif( $credantials ==  'суперадмин') {
                $tempType = '15';

            }elseif( $credantials ==  'администратор контента') {
                $tempType = '14';

            }else{
                $tempType = '6';
            }


        }else{
            $tempType = '6';
        }


    }else if ( $type  == 'удаленный'){
        $tempType = '7';


    }else{
        $tempType = '6';
    }




    list($first , $second, $third) = explode(' ', $fio);
    $listHead = [
        '4' => 'Иванов Иван Иванович',
        '5' => 'Сидоров Александр Петрович',
        '7' => 'Кухарчук Ксения',
        '35' => 'Минаева Светлана Владимировна',
        '36' => 'Толчинская Светлана Вячеславовна',
        '37' => 'Лутовинов Максим Александрович',
        '38' => 'Вологина Татьяна Федоровна',
        '39' => 'Клычков Дмитрий Геннадьевич',
        '40' => 'Елисеев Виктор Генрихович',
        '41' => 'Высотский Максим Викторович',
        '42' => 'Васильченко Елена Сергеевна',
        '43' => 'Балашова Елена Викторовна',
        '44' => 'Кухарчук Ксения Александровна',
    ];
    $readyHead = '';
    foreach ($listHead as $key =>  $valueHead){

        if($valueHead == $stepOneHead){
            $readyHead = $key;
            break;
        }
    }


    $Row->firstName = $first;
    $Row->secondName = $second;
    $Row->thirdName = $third;
    $Row->login = $login;
    $Row->department = $readyDep;
    $Row->head = $readyHead;
    $Row->position = $readyPosition;
    $Row->email = $readyEmail;
    $Row->phone = $readyPhone;
    $Row->city = $readyCity;
    $Row->group = $tempType;

    $Res[] = $Row;
}

$fp = fopen(dirname(__FILE__) ."/folks.json", 'w');
fwrite($fp, json_encode($Res));
fclose($fp);





*/

//
//
//$json_file = file_get_contents(dirname(__FILE__)."/folks.json");
//$objects = json_decode($json_file, true);
//
//
//    foreach ($objects as $value){
//        $rsUser = CUser::GetByLogin($value['login']);
//        if($arUser = $rsUser->Fetch())
//        {
//            continue;
//        } else {
//            $user = new CUser;
//            $arFields = [
//                "NAME"              =>  $value['secondName'],
//                "LAST_NAME"         =>  $value['firstName'],
//                "SECOND_NAME"       =>  $value['thirdName'],
//                "EMAIL"             =>  $value['email'],
//                "LOGIN"             =>  $value['login'],
//                "LID"               => "ru",
//                "ACTIVE"            => "Y",
//                "GROUP_ID"          => array($value['group']),
//                "PASSWORD"          => "123456",
//                "CONFIRM_PASSWORD"  => "123456",
//                "WORK_PHONE"  => $value['phone'],
//                "PERSONAL_STATE"  => $value['city'],
//                "WORK_POSITION"  => $value['position'],
//                "WORK_DEPARTMENT"  => $value['department'],
//                "UF_MANAGER"  => $value['head'],
//
//            ];
//
//            $ID = $user->Add($arFields);
//            if (intval($ID) > 0)
//                echo "Пользователь успешно добавлен.";
//            else
//                echo $user->LAST_ERROR;
//        }
//
//        echo 'Tru';
//    }
//
//


?>






<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>