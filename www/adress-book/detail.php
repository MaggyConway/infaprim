<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
// $_REQUEST['ELEMENT_ID']  == $GLOBALS["USER"]->GetID()  если открытый сторонный пользователь вдруг окажется мной
// - сделать редикрект на профиль с редактированием
global $USER;
$currentUser = CUser::GetByID($_REQUEST['ELEMENT_ID']);
$dataUser = $currentUser->Fetch();

$photo = CFile::GetPath($dataUser["PERSONAL_PHOTO"]);

	//echo '<pre>'; var_dump($dataUser["PERSONAL_PHOTO"]); echo '</pre>';

if ($_REQUEST['ELEMENT_ID']  == $GLOBALS["USER"]->GetID()) {
	LocalRedirect("/profile/");
}

$APPLICATION->AddChainItem($dataUser["LAST_NAME"] . ' '.$dataUser["NAME"].' '.$dataUser["SECOND_NAME"]);

$date_arr = ParseDateTime($dataUser["PERSONAL_BIRTHDAY"], "DD.MM.YYYY");

if ($date_arr["DD"] == '01' || $date_arr["DD"] == '02' || $date_arr["DD"] == '03' || $date_arr["DD"] == '04' || $date_arr["DD"] == '05' || $date_arr["DD"] == '06' || $date_arr["DD"] == '07' || $date_arr["DD"] == '08' || $date_arr["DD"] == '09') {
	
	$date_arr["DD"] = substr($date_arr["DD"], 1);
	$date_arr["DD"] =  $date_arr["DD"];
}


if ($date_arr["MM"] == '01') {
	$date_arr["MM"] = ' января';
} elseif ($date_arr["MM"] == '02') {
	$date_arr["MM"] = ' февраля';
} elseif ($date_arr["MM"] == '03') {
	$date_arr["MM"] = ' марта';
} elseif ($date_arr["MM"] == '04') {
	$date_arr["MM"] = ' апреля';
} elseif ($date_arr["MM"] == '05') {
	$date_arr["MM"] = ' мая';
} elseif ($date_arr["MM"] == '06') {
	$date_arr["MM"] = ' июня';
} elseif ($date_arr["MM"] == '07') {
	$date_arr["MM"] = ' июля';
} elseif ($date_arr["MM"] == '08') {
	$date_arr["MM"] = ' августа';
} elseif ($date_arr["MM"] == '09') {
	$date_arr["MM"] = ' сентября';
} elseif ($date_arr["MM"] == '10') {
	$date_arr["MM"] = ' октября';
} elseif ($date_arr["MM"] == '11') {
	$date_arr["MM"] = ' ноября';
} elseif ($date_arr["MM"] == '12') {
	$date_arr["MM"] = ' декабря';
}

?>

<div class="wrapper">
	<section class="employee_card">

		<div class="employee_card__part--left">


		<? if (!empty($dataUser["PERSONAL_PHOTO"])) { //var_dump($dataUser);?>

			<div class="photo" style="background: url(<?=$photo?>) no-repeat center center;"></div>

		<? } else { ?>

			<div class="photo" 
				style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center"></div>
		<? } ?>

			<?if (!empty($dataUser["UF_ABOUT"])) {?>
				<div class="mini-title">О себе:</div>
				<div class="about"><?= $dataUser["UF_ABOUT"]?></div>
			<?}?>
		</div>

		<div class="employee_card__part--right">
			<div class="name">
				<span><?=$dataUser["LAST_NAME"]?></span>
				<span><?=$dataUser["NAME"]?></span>
				<span><?=$dataUser["SECOND_NAME"]?></span>
			</div>

			<div class="flexbox-status-date">

			<?if (!empty($dataUser["UF_STATUS"])) {?>
				<div class="status"><?= $dataUser["UF_STATUS"]?></div>
			<?}?>

			<? if ($dataUser["PERSONAL_BIRTHDAY"] !== NULL) {?>
				<div class="date">
					<p>Отмечает день рождения:</p>
					<p><? echo $date_arr["DD"]; echo $date_arr["MM"]?></p>
				</div>
			<? } ?>
			</div>
			<div class="center-info-grid">
				<div class="grid-item">
					<div class="mini-title">Регион:</div>
					<?= $dataUser["PERSONAL_STATE"]?>
				</div>

				<div class="grid-item">
					<div class="mini-title">Подразделение:</div>
					<?= $dataUser["WORK_DEPARTMENT"]?>		
				</div>

				<div class="grid-item">
					<div class="mini-title">Должность:</div>
					<?= $dataUser["WORK_POSITION"]?>
				</div>

				<div class="grid-item">
					<div class="mini-title">Руководитель:</div>
					<? //echo '<pre>'; var_dump($dataUser["UF_MANAGER"]); echo '</pre>';?>	


					<? if ($dataUser["UF_MANAGER"] !== NULL) {					   

						$rsManager = CUserFieldEnum::GetList(array(), array(
							"ID" => $dataUser["UF_MANAGER"],
						));

						

						while($manager = $rsManager->GetNext()){?>

							<div><?=$manager['VALUE']?></div>
						<?}

					}?>


				</div>
			</div>
			<div class="zone">
				<div class="mini-title">Зона ответственности:</div>
				<ul>
					<?    

					$rsComp = CUserFieldEnum::GetList(array(), array(
						"ID" => $dataUser["UF_COMPETENCE"],
					));
					while($ar_res = $rsComp->GetNext()){

						if(in_array($ar_res['ID'], $dataUser["UF_COMPETENCE"])){ ?>
							<li><?=$ar_res['VALUE']?></li>
						<?}
					}

					?>
				</ul>
			</div>
			<div class="contacts">
				<div class="email">
					<div class="mini-title">e-mail:</div>
					<a href="mailto:<?= $dataUser["EMAIL"]?>"><?= $dataUser["EMAIL"]?></a>
				</div>
				<div class="personal_phone">
					<div class="mini-title">Личный телефон:</div>
					<a href="tel:<?= $dataUser["PERSONAL_PHONE"]?>">
						<?= $dataUser["PERSONAL_PHONE"]?></a>
				</div>
				<div class="work_phone">
					<div class="mini-title">Рабочий телефон:</div>
					<a href="tel:<?= $dataUser["WORK_PHONE"]?>">
						<?= $dataUser["WORK_PHONE"]?></a>
				</div>
			</div>
		
		<a href="#" class="btn">НАПИСАТЬ</a>
		</div>
	</section>
</div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>