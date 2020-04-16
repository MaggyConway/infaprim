<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?><?
$arrFilterAddress = array( 'LAST_NAME' => 'Коршунова' );
?>
<?$APPLICATION->IncludeComponent(
	"dev2fun:user.list",
	"adress-book-list",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COUNT" => "5",
		"DETAIL_URL" => "/adress-book/#ID#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","XML_ID","ACTIVE","LOGIN","NAME","LAST_NAME","SECOND_NAME","EMAIL","PERSONAL_PHOTO","TIMESTAMP_X","PERSONAL_BIRTHDAY","DATE_REGISTER","LAST_LOGIN",""),
		"FILTER_NAME" => "arrFilterAddress",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "0",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "pagination",
		"PAGER_TITLE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("SLUG",""),
		"RESIZE_PERSONAL_PHOTO" => "500*600",
		"RESIZE_TYPE" => "BX_RESIZE_IMAGE_PROPORTIONAL",
		"RESIZE_WORK_LOGO" => "500*600",
		"SET_STATUS_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_BY3" => "id",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"SORT_ORDER3" => "DESC"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>