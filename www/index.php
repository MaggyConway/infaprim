<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Главная"); ?><section class="all_content"> <section class="main">
<div class="wrapper">
	<div class="main__content">
		<h1>Корпоративный портал</h1>
		<p>
			 Будьте в&nbsp;крусе последних событий компании, оставайтесь на&nbsp;связи с&nbsp;коллегами и&nbsp;имейте возможность оперативно решать проблемы
		</p>
 <a href="#" class="btn">ПОДРОБНЕЕ</a>
	</div>
	<div class="main__image">
	</div>
</div>
 </section> <section class="news_slider">
<div class="wrapper">
	<h2>Новости компании</h2>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news_another",
	Array(
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
		"COMPONENT_TEMPLATE" => "news_another",
		"DETAIL_URL" => "/news/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"DETAIL_TEXT",4=>"DETAIL_PICTURE",5=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "0",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"DATE",1=>"DOC_TITLE",2=>"",),
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
		"STRICT_SECTION_CHECK" => "Y"
	)
);?> <a href="/news/" class="btn">ВСЕ НОВОСТИ</a>
</div>
 </section> <section class="our_team_slider">
<div class="wrapper">
	<h2>Новые сотрудники</h2>
	 <?$APPLICATION->IncludeComponent(
	"dev2fun:user.list",
	"home_user_list",
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
		"COUNT" => "",
		"DETAIL_URL" => "/?USER_ID=#ID#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","XML_ID","ACTIVE","LOGIN","NAME","LAST_NAME","SECOND_NAME","EMAIL","PERSONAL_PHOTO","TIMESTAMP_X","PERSONAL_BIRTHDAY","DATE_REGISTER","LAST_LOGIN",""),
		"FILTER_NAME" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Пользователи",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(""),
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
);?> <a href="/adress-book/" class="btn">НАША КОМАНДА</a>
</div>
 </section> <section class="docs">
<div class="wrapper">
	<div class="docs__content">
		<h2>Документы</h2>
		<p>
			 Вы&nbsp;можете ознакомиться с&nbsp;различными документами компании, мы&nbsp;создали страницу с&nbsp;упорядоченной информацией о&nbsp;документах компании и&nbsp;инструкций для внутреннего использования.
		</p>
 <a href="/docs/" class="btn">ДОКУМЕНТЫ</a>
	</div>
</div>
 </section> <section class="about_us">
<div class="wrapper">
	<div class="about_us__image">
	</div>
	<div class="about_us__content">
		<h2>О нас</h2>
		<p>
			 Инфаприм&nbsp;— компания, которая заботится о&nbsp;качестве жизни людей, обеспечивая их&nbsp;продуктами функционального питания и&nbsp;сервисом, имеющими уникальную ценность.
		</p>
		<p>
			 Наши клиенты&nbsp;— мамы поколения Y&nbsp;и&nbsp;Z, врачи и&nbsp;пациенты, люди разного возраста, заинтересованные в&nbsp;здоровом питании, чьи потребности мы&nbsp;удовлетворяем не&nbsp;только продуктами, а&nbsp;и&nbsp;с&nbsp;помощью информационной поддержки, используя современные медиа-средства, эмоционально вовлекая и&nbsp;выстраивая отношения партнерства.
		</p>
 <a href="/about/" class="btn">О НАС</a>
	</div>
</div>
 </section> <section class="calendar">
<div class="wrapper">
	<h2>Календарь событий</h2>
	<div class="table-wrap">
		 <?php
                    $day = date('w');
                    $week_start = date('d.m.Y H:i:s ', strtotime('-' . $day . ' days'));
                    $day_start = date('D', strtotime('-' . $day . ' days'));

                    $week_end = date('d.m.Y H:i:s', strtotime('+' . (8 - $day) . ' days'));

                    ?> <?php foreach (GetCurrentWeekDates() as $key => $day): ?><?php if ($key <= 6) : ?><?php endif; ?><?php endforeach; ?><?
                            global $arFilterEvent;
                            $arFilterEvent['>=DATE'] = $week_start;
                            $arFilterEvent['<=DATE'] = $week_end;

                            $APPLICATION->IncludeComponent("bitrix:news.list", "events", Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                                "AJAX_MODE" => "N",    // Включить режим AJAX
                                "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                                "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                                "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                                "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                                "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                                "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                                "CACHE_TIME" => "0",    // Время кеширования (сек.)
                                "CACHE_TYPE" => "A",    // Тип кеширования
                                "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                                "COMPONENT_TEMPLATE" => "news_another",
                                "DETAIL_URL" => "/news/#ELEMENT_CODE#/",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                                "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
                                "DISPLAY_DATE" => "N",    // Выводить дату элемента
                                "DISPLAY_NAME" => "Y",    // Выводить название элемента
                                "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
                                "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                                "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                                "FIELD_CODE" => array(    // Поля
                                    0 => "NAME",
                                    1 => "PREVIEW_TEXT",
                                    2 => "PREVIEW_PICTURE",
                                    3 => "DETAIL_TEXT",
                                    4 => "DETAIL_PICTURE",
                                    5 => "",
                                ),
                                "FILTER_NAME" => "arFilterEvent",    // Фильтр
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
                                "IBLOCK_ID" => "5",    // Код информационного блока
                                "IBLOCK_TYPE" => "content",    // Тип информационного блока (используется только для проверки)
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
                                "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
                                "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
                                "NEWS_COUNT" => "",    // Количество новостей на странице
                                "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                                "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "0",    // Время кеширования страниц для обратной навигации
                                "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                                "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                                "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
                                "PAGER_TITLE" => "Новости",    // Название категорий
                                "PARENT_SECTION" => "",    // ID раздела
                                "PARENT_SECTION_CODE" => "",    // Код раздела
                                "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
                                "PROPERTY_CODE" => array(    // Свойства
                                    0 => "",
                                    1 => "DATE",
                                    3 => "EVENT_TYPE",
                                    2 => "BIRTDAY_USER",
                                ),
                                "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
                                "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                                "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
                                "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
                                "SET_STATUS_404" => "N",    // Устанавливать статус 404
                                "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
                                "SHOW_404" => "N",    // Показ специальной страницы
                                "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
                                "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
                                "SORT_ORDER1" => "ASC",    // Направление для первой сортировки новостей
                                "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
                                "STRICT_SECTION_CHECK" => "Y",    // Строгая проверка раздела для показа списка
                            ),
                                false
                            ); ?>
		<table>
		<tbody>
		<tr>
			<td>
				 Понедельник
			</td>
			<td>
				 Вторник
			</td>
			<td>
				 Среда
			</td>
			<td>
				 Четверг
			</td>
			<td>
				 Пятница
			</td>
			<td>
				 Суббота
			</td>
			<td>
				 Воскресенье
			</td>
		</tr>
		<tr>
			<td>
				 <?echo  ' <span class="current_date">'. date("d ", strtotime($day));  
                                            echo getMonthName($day).'</span>';?>
			</td>
		</tr>
		<tr>
		</tr>
		</tbody>
		</table>
	</div>
 <a href="/calendar/" class="btn">ВСЕ СОБЫТИЯ</a>
</div>
 </section> </section><? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>