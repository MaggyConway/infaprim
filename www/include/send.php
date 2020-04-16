<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


if(isset($_POST)  && !empty($_POST)){

	$event = $_POST['event'];
	
	if($event == 'PROFILE_FORM'){

		$USER_ABOUT= $_POST['about'];
		$USER_STATUS= $_POST['status'];
		$USER_PHOTO= $_POST['photo'];

		$fields = array(
			'USER_ABOUT' => $USER_ABOUT,
			'USER_STATUS' => $USER_STATUS,
			'USER_PHOTO' => $USER_PHOTO,
		);
	}

	if($event){
		CEvent::Send($event, 's1', $fields , 'N', '','' );
	}
	echo true;
} else {
	LocalRedirect("404.php", " 404 Страница не найдена");
}?>