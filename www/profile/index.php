<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

//global $USER; 
// $currentUser = CUser::GetByID($GLOBALS["USER"]->GetID());
// $dataUser = $currentUser->Fetch();

// $photo = CFile::GetPath($dataUser["PERSONAL_PHOTO"]);

?>


<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	"profile",
	Array(
		"CHECK_RIGHTS" => "N",
		"SEND_INFO" => "N",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array("UF_ABOUT", "UF_STATUS", "UF_COMPETENCE", "UF_MANAGER"),
		"USER_PROPERTY_NAME" => ""
	)
);?>



<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>