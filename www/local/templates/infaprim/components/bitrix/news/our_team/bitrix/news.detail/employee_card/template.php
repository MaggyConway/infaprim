<!-- СТРАНИЦА ДЕТАЛЬНОЙ СТАТЬИ -->

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

global $USER; 
$currentUser = CUser::GetByID($GLOBALS["USER"]->GetID());
$dataUser = $currentUser->Fetch();

echo "<pre>"; var_dump($dataUser); echo "</pre>";
?>

<? 
$date_arr = ParseDateTime($arResult["PROPERTIES"]["DATE"]["VALUE"], "DD.MM.YYYY");

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
			<div class="photo" style="background: url(<?= $arResult["PREVIEW_PICTURE"]["SRC"]?>) no-repeat center center;"></div>
			<div class="mini-title">О себе:</div>
			<div class="about"><?= $arResult["PROPERTIES"]["ABOUT"]["VALUE"]["TEXT"]?></div>
		</div>
		<div class="employee_card__part--right">
			<div class="name"><?= $arResult["NAME"]?></div>

			<div class="flexbox-status-date">
				<div class="status"><?= $arResult["PROPERTIES"]["STATUS"]["VALUE"]["TEXT"]?></div>
				<div class="date">
					<p>Отмечает день рождения:</p>
					<p><? echo $date_arr["DD"]; echo $date_arr["MM"]?></p>
				</div>
			</div>
			<div class="center-info-grid">
				<div class="grid-item">
					<div class="mini-title">Регион:</div>
					<?= $arResult["PROPERTIES"]["CITY"]["VALUE"]?>		
				</div>

				<div class="grid-item">
					<div class="mini-title">Подразделение:</div>
					<?= $arResult["PROPERTIES"]["OTDEL"]["VALUE"]?>		
				</div>

				<div class="grid-item">
					<div class="mini-title">Должность:</div>
					<?= $arResult["PROPERTIES"]["POSITION"]["VALUE"]?>		
				</div>

				<div class="grid-item">
					<div class="mini-title">Руководитель:</div>
					<?= $arResult["PROPERTIES"]["MANAGER"]["VALUE"]?>		
				</div>
			</div>
			<div class="zone">
				<div class="mini-title">Зона ответственности:</div>
				<ul>
					<? foreach ($arResult["PROPERTIES"]["COMPETENCIES"]["VALUE"] as $key) { ?>

						<li><? echo $key;?></li>

					<? } ?>
				</ul>
			</div>
			<div class="contacts">
				<div class="email">
					<div class="mini-title">e-mail:</div>
					<a href="mailto:<?= $arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?= $arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a>
				</div>
				<div class="personal_phone">
					<div class="mini-title">Личный телефон:</div>
					<a href="tel:<?= $arResult["PROPERTIES"]["PERSONAL_PHONE"]["VALUE"]?>">
						<?= $arResult["PROPERTIES"]["PERSONAL_PHONE"]["VALUE"]?></a>
				</div>
				<div class="work_phone">
					<div class="mini-title">Рабочий телефон:</div>
					<a href="tel:<?= $arResult["PROPERTIES"]["WORK_PHONE"]["VALUE"]?>">
						<?= $arResult["PROPERTIES"]["WORK_PHONE"]["VALUE"]?></a>
				</div>
			</div>
			<a href="#" class="btn">НАПИСАТЬ</a>
	</section>
</div>

