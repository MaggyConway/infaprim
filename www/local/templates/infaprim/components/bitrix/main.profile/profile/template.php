<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)	die();

$photo = CFile::GetPath($arResult["arUser"]["PERSONAL_PHOTO"]);

$sth = CFile::ShowImage($arResult["arUser"]["PERSONAL_PHOTO"], 150, 150, "border=0", "", true);

//echo $sth;
//echo '<pre>'; var_dump($arResult["arUser"]["PERSONAL_BIRTHDAY"]); echo '</pre>';
$APPLICATION->AddChainItem('Личный кабинет');

$date_arr = ParseDateTime($arResult["arUser"]["PERSONAL_BIRTHDAY"], "DD.MM.YYYY");

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
	<?ShowError($arResult["strProfileError"]);?>


	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="profile_card_form">

		<?
		if ($arResult['DATA_SAVED'] == 'Y') {
			$APPLICATION->IncludeFile(
				SITE_DIR . "/include/profile_save_success.php",
				Array(),
				Array(
					"MODE" => "html")
			);
		} elseif ($arResult['DATA_SAVED'] == 'N') {
			$APPLICATION->IncludeFile(
				SITE_DIR . "/include/profile_save_error.php",
				Array(),
				Array(
					"MODE" => "html")
			);
		}
		?>


		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

		<div class="profile_card__part--left">

			<? if (!empty($arResult["arUser"]["PERSONAL_PHOTO"])) { //var_dump($dataUser);?>

				<div class="profile_photo" 
				style="background: url(<?=$photo?>) no-repeat center center;">

				<label class="not_empty">
					<input name="PERSONAL_PHOTO" class="typefile" size="20" type="file" id="input_profile_photo">
					Изменить фотографию...
				</label>

			</div>

		<? } else { ?>

			<div class="profile_photo" 
			style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center;">

			<label>
				<input name="PERSONAL_PHOTO" class="typefile" size="20" type="file" id="input_profile_photo">
				Загрузите вашу фотографию...
			</label>

		</div>

	<? } ?>

	<div class="mini-title">О себе:</div>

	<div class="about">

		<textarea type="text" name="UF_ABOUT" placeholder="Заполните информацию о себе..." readonly><?=$arResult["USER_PROPERTIES"]["DATA"]["UF_ABOUT"]["VALUE"]?></textarea>

	</div>

</div>
<div class="profile_card__part--right">

	<div class="name">
		<span><?=$arResult["arUser"]["LAST_NAME"]?></span>
		<span><?=$arResult["arUser"]["NAME"]?></span>
		<span><?=$arResult["arUser"]["SECOND_NAME"]?></span>
	</div>

	<div class="flexbox-status-date">

		<div class="status">

			<textarea type="text" name="UF_STATUS" placeholder="Напишите о чем вы думаете, над чем работаете или о чем мечтаете..." readonly><?=$arResult["USER_PROPERTIES"]["DATA"]["UF_STATUS"]["VALUE"]?></textarea>

		</div>

	<? if ($arResult["arUser"]["PERSONAL_BIRTHDAY"] !== NULL) {?>
		<div class="date">
			<p>Отмечает день рождения:</p>
			<p><? echo $date_arr["DD"]; echo $date_arr["MM"]?></p>
		</div>
	<? } ?>
	</div>

	<div class="center-info-grid">
		<div class="grid-item">
			<div class="mini-title">Регион:</div>
			<?=$arResult["arUser"]["PERSONAL_STATE"]?>	
		</div>

		<div class="grid-item">
			<div class="mini-title">Подразделение:</div>
			<?=$arResult["arUser"]["WORK_DEPARTMENT"]?>
		</div>

		<div class="grid-item">
			<div class="mini-title">Должность:</div>
			<?=$arResult["arUser"]["WORK_POSITION"]?>
		</div>

		<div class="grid-item">
			<div class="mini-title">Руководитель:</div>

			<?  if ($arResult["arUser"]["UF_MANAGER"] !== NULL) {  

			$rsManager = CUserFieldEnum::GetList(array(), array(
				"ID" => $arResult["arUser"]["UF_MANAGER"],
			));

			//echo '<pre>'; var_dump($rsManager->arResult); echo '</pre>';

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
				"ID" => $arUser["UF_COMPETENCE"],
			));
			while($ar_res = $rsComp->GetNext()){

				if(in_array($ar_res['ID'], $arResult["arUser"]["UF_COMPETENCE"])){ ?>
					<li><?=$ar_res['VALUE']?></li>
				<?}
			}

			?>
		</ul>
	</div>
	<div class="contacts">
		<div class="email">
			<div class="mini-title">e-mail:</div>
			<a href="mailto:<?=$arResult["arUser"]["EMAIL"]?>"><?=$arResult["arUser"]["EMAIL"]?></a>
		</div>
		<div class="personal_phone">
			<div class="mini-title">Личный телефон:</div>
			<a href="tel:<?=$arResult["arUser"]["PERSONAL_PHONE"]?>">
				<?=$arResult["arUser"]["PERSONAL_PHONE"]?></a>
			</div>
			<div class="work_phone">
				<div class="mini-title">Рабочий телефон:</div>
				<a href="tel:<?=$arResult["arUser"]["WORK_PHONE"]?>">
					<?=$arResult["arUser"]["WORK_PHONE"]?></a>
				</div>
			</div>

			<input type="hidden" name="event" value="PROFILE_FORM">
			<div class="btn btn_change">Изменить данные</div>
			<input type="submit" name="save" value="Сохранить данные" class="btn btn_save">
		</div>

	</form>
</div>