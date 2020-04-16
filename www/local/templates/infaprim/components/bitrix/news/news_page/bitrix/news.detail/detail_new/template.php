<!-- СТРАНИЦА ДЕТАЛЬНОЙ СТАТЬИ -->

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var stripcslashes(str)ng $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); 

$currentUser = CUser::GetByID($arResult["PROPERTIES"]["USER"]["VALUE"]);
$dataUser = $currentUser->Fetch(); 
$photo = CFile::GetPath($dataUser["PERSONAL_PHOTO"]); ?>

<? $file_path = CFile::GetPath($arResult['PROPERTIES']['FILE']['VALUE']); ?>

<? //echo "<pre>"; var_dump($arResult['ID']); echo "</pre>"; 

if ($arResult['PROPERTIES']["NEWS_TEMPLATE"]["VALUE"][0] == 'Обычная новость') { ?>

<section class="detail_new"><div class="wrapper">
	
	<h1><?=$arResult["NAME"]?></h1>

	<div class="date"><?= $arResult["PROPERTIES"]["DATE"]["VALUE"]?></div>
	
	<div class="news__content"><?= $arResult["FIELDS"]["DETAIL_TEXT"]?></div>

	<? if (!empty($arResult["PROPERTIES"]["YOUTUBE_LINK"]["VALUE"])) {

		$video_path = $arResult["PROPERTIES"]["YOUTUBE_LINK"]["VALUE"];
		parse_str( parse_url( $video_path, PHP_URL_QUERY ), $my_array_of_vars ); ?> 

	<div class="video_item">
		<iframe width="600px" height="400px" frameborder="0" allowfullscreen 
			src="https://www.youtube.com/embed/<?= $my_array_of_vars['v']; ?>">
		</iframe>
	</div>

	<?}?>

	<? if (!empty($arResult['PROPERTIES']['FILE']['VALUE'])) { ?>
		<a href="<?= $file_path?>" class="file" target="_blank"><?= $arResult['PROPERTIES']['DOC_TITLE']['VALUE']?></a>
	<?} ?>
	<? //var_dump($arResult["TAGS"]);  ?>
	<ul class="tags">
		<li><a href="/news/?tags=<?=$arResult["TAGS"]?>">#&nbsp;<?=$arResult["TAGS"]?></a></li>
	</ul>

</div></section>

<? } elseif ($arResult['PROPERTIES']["NEWS_TEMPLATE"]["VALUE"][0] == 'Новый сотрудник') { ?>
	
	<div class="wrapper">

		<? //echo "<pre>"; var_dump($arResult["PROPERTIES"]["USER"]["VALUE"]); echo "</pre>"; ?>
		<section class="new_people_card">
			<div class="info">
				<h1>Новый сотрудник:&nbsp;<?=$arResult["NAME"]?></h1>
				<div class="date"><?= $arResult["PROPERTIES"]["DATE"]["VALUE"] ?></div>
				<p class="hello"><strong>Коллеги, добрый день!</strong></p>
				<p><?= $arResult["PROPERTIES"]["BEGIN"]["VALUE"]["TEXT"] ?></p>

			<? //echo "<pre>"; var_dump($dataUser["ID"]); echo "</pre>" ?>

				<div class="center_user_grid">
					<div class="grid-item position">
						<div class="mini-title">Должность:</div>
						<?= $dataUser["WORK_POSITION"]?>
					</div>
					<div class="grid-item">
						<div class="mini-title">Руководитель:</div>
						<? $rsManager = CUserFieldEnum::GetList(array(), array(
							"ID" => $dataUser["UF_MANAGER"], ));
							while($manager = $rsManager->GetNext()){?>

								<div><?=$manager['VALUE']?></div>
							<? } ?>
					</div>
					<div class="grid-item">
						<div class="mini-title">Регион:</div>
						<?= $dataUser["PERSONAL_STATE"]?>
					</div>
				</div>

				<p><?= $arResult["PROPERTIES"]["END"]["VALUE"]["TEXT"] ?></p>
				<p class="wish"><strong>Приветствуем Викторию и желаем профессиональных успехов!</strong></p>
			</div>
			<div class="profile">
				<div class="photo" style="background: url(<?=$photo?>);"></div>
				<a href="/adress-book/<?=$dataUser["ID"]?>" class="btn">ПРОФИЛЬ СОТРУДНИКА</a>
			</div>
		</section>
	</div>
<?}?>

<section class="readmore_slider"><div class="wrapper">
	<h2>Читайте также</h2>

	<?  
      global $arrFilterNews;
      $arrFilterNews =  array('!ID' => $arResult["ID"]);
    ?>

	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news_another", 
	array(
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
		"DETAIL_URL" => "/news/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"FILTER_NAME" => "arrFilterNews",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
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
		"PROPERTY_CODE" => array(
			0 => "DATE",
			1 => "DOC_TITLE",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "Y",
		"COMPONENT_TEMPLATE" => "news_another"
	),
	false
);?>
</div></section>