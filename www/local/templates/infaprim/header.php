<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

global $USER; 
$currentUser = CUser::GetByID($GLOBALS["USER"]->GetID());
$dataUser = $currentUser->Fetch(); ?>
<!DOCTYPE html>
<html>
	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="/local/templates/infaprim/css/select2.min.css">
		<link rel="stylesheet" href="/local/templates/infaprim/css/select.css">
		
		<link rel="stylesheet" href="/local/templates/infaprim/js/UItoTop-jQuery-Plugin/css/ui.totop.css">

		<link rel="stylesheet" href="/local/templates/infaprim/js/slick/slick-theme.css">
		<link rel="stylesheet" href="/local/templates/infaprim/js/slick/slick.css">

		<link rel="stylesheet" href="/local/templates/infaprim/css/mobile_menu.css">

		<link rel="stylesheet" href="/local/templates/infaprim/css/datepicker.min.css">

		<link rel="stylesheet" href="/local/templates/infaprim/css/modals.css">

		<link rel="stylesheet" href="/local/templates/infaprim/css/app.css">
	</head>
	<body>
		<div id="panel">
<?
$arGroups = $USER->GetUserGroupArray();
if (in_array('1', $arGroups ) || 
in_array('11', $arGroups ) ||
in_array('12', $arGroups ) ||
in_array('13', $arGroups ) ||
in_array('14', $arGroups ) ||
in_array('15', $arGroups )
){
$APPLICATION->ShowPanel();
}

?>

		</div>
<?		
global $USER;
if ($USER->IsAuthorized()) { ?>
<header>
<div class="wrapper">
	
	<a href="/" class="logo"></a>

		<?$APPLICATION->IncludeComponent(
			"bitrix:menu", 
			"header_menu", 
			array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "sub-menu",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MENU_CACHE_TIME" => "0",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "header",
				"USE_EXT" => "N",
				"COMPONENT_TEMPLATE" => "header_menu"
			),
			false
		);?>

		<div class="outer-menu mobile-menu">
		  <input class="checkbox-toggle" type="checkbox" />
		  <div class="hamburger">
		    <div></div>
		  </div>
		  <div class="menu">
		    <div>
		      <div>
		        
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"header_menu", 
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "sub-menu",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_CACHE_TIME" => "0",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "header",
							"USE_EXT" => "N",
							"COMPONENT_TEMPLATE" => "header_menu"
						),
						false
					);?>


		      </div>
		    </div>
		  </div>
		</div>

	<div class="lk">
		<a href="/profile/" class="header__lk"><?=$dataUser["LOGIN"]?></a>
		<div class="logout"><a href="<? echo $APPLICATION->GetCurPageParam("logout=yes", array()); ?>">Выйти</a></div>
	</div>
</div><!-- end of wrapper -->
</header>

<div class="wrapper">
<? $APPLICATION->IncludeComponent("bitrix:breadcrumb","main",Array(
    "START_FROM" => "0",
    "PATH" => "",
    "SITE_ID" => "s1"
));?>
</div>

<?} elseif ($APPLICATION->GetCurPage(false) !== '/auth/') { 
	LocalRedirect('/auth/');
}?>