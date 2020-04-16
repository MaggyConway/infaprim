<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация"); ?>

<section class="login">
	<?$APPLICATION->IncludeComponent(
		"bitrix:system.auth.form",
		"login",
		Array(
			"FORGOT_PASSWORD_URL" => "",
			"PROFILE_URL" => "/auth/profile.php",
			"REGISTER_URL" => "",
			"SHOW_ERRORS" => "N"
		)
	);?>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>