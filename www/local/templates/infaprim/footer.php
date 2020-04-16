<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

<?		
global $USER;
//if ($USER->IsAuthorized()) { ?>

<footer>
	<div class="footer__top">
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent( //class="footer__menu"
				"bitrix:menu", 
				"footer_menu", 
				array(
					"ALLOW_MULTI_SELECT" => "N",
					"CHILD_MENU_TYPE" => "sub-menu",
					"DELAY" => "N",
					"MAX_LEVEL" => "1",
					"MENU_CACHE_GET_VARS" => array(
					),
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE" => "footer",
					"USE_EXT" => "N",
					"COMPONENT_TEMPLATE" => "footer_menu"
				),
				false
			);?>

			<? // включаемая область для раздела
				$APPLICATION->IncludeFile(
				    SITE_DIR . "/include/social.php",
				    Array(),
				    Array(
				        "MODE" => "html")
				);
			?>
		</div>
	</div>
	<div class="footer__bottom">
		<div class="wrapper">

			<? // включаемая область для раздела
				$APPLICATION->IncludeFile(
				    SITE_DIR . "/include/footer_brands.php",
				    Array(),
				    Array(
				        "MODE" => "html")
				);
			?>
			
		</div>
	</div>
</footer>



<?//}?>



<script src="/local/templates/infaprim/js/jquery-3.4.1.min.js"></script>
<script src="/local/templates/infaprim/js/slick/slick.min.js"></script>
<script src="/local/templates/infaprim/js/select2.full.js"></script>
<script src="/local/templates/infaprim/js/UItoTop-jQuery-Plugin/js/easing.js"></script>
<script src="/local/templates/infaprim/js/UItoTop-jQuery-Plugin/js/jquery.ui.totop.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' }); 
	});
</script>
<script src="/local/templates/infaprim/js/jquery.ellipsis.min.js"></script>
<script src="/local/templates/infaprim/js/datepicker.min.js"></script>
<script src="/local/templates/infaprim/js/app.js"></script>

</body>
</html>