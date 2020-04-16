<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Календарь событий");
?>


<!-- 

активная ячейка - класс active - на весь td
ячейки из прошлого месяца - класс not_current_month - на весь td 

внутри ячейки td может быть список ul с классом events, в нем может быть три типа событий:
 - обычные - никак не помечаются классом, просто фиолетовый кружок
 - дни рожденья - класс birthday на li
 - выставки - класс exhibition на li


класс current_date нужен просто для указания даты в ячейке (например, 1 января)


-->



<section class="calendar_page">
	<div class="header__blot"></div>

	<div class="wrapper">
		<div class="calendar_flex">
			<div class="calendar_content">
				<h1><?$APPLICATION->ShowTitle();?></h1>
				<p>Узнайте о&nbsp;проходящих мероприятиях и&nbsp;событиях в&nbsp;компании</p>
			</div>
			<div class="calendar_image" style="background: url(/local/templates/infaprim/img/calendar_image.svg) no-repeat center center;"></div>
		</div>

		<div class="calendar_table">
			<div class="table_title_info">
				<div class="date">  <?php echo getMonthName(date('d.M.Y')) ; ?>, <? echo date('Y'); ?></div>
				<div class="picker">
                <label>
					<input type='text' id="picker_input" class="datepicker-here" placeholder="Выберите дату" readonly /><span class="chevron"></span>
                </label>
					<span class="calendar_close"></span>
				</div>
			</div>
			
			<table>
                <thead>
                <tr>
                    <td><span class="weekday">Понедельник</span></td>
                    <td><span class="weekday">Вторник</span></td>
                    <td><span class="weekday">Среда</span></td>
                    <td><span class="weekday">Четверг</span></td>
                    <td><span class="weekday">Пятница</span></td>
                    <td><span class="weekday">Суббота</span></td>
                    <td><span class="weekday">Воскресенье</span></td>
                </tr>
                </thead>
				<tbody>
                <?

                $month_start =  date("Y-m-01 H:i:s", strtotime(date('Y-m-d')));
                $week_end =  date("Y-m-01 23:59:59", strtotime(date('Y-m-d')));

                global $arFilterEvent;
                $arFilterEvent['>=DATE'] = $month_start;
                $arFilterEvent['<=DATE'] = $week_end;
                $APPLICATION->IncludeComponent("bitrix:news.list", "events-page", Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                    "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                    "AJAX_MODE" => "N",    // Включить режим AJAX
                    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                    "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
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
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
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
                    "CURRENT_MONTH" => array(date("Y-m-d")),  // custom
                    "FILTER_MONTH" => '',  // custom  d.M.Y
                ),
                    false
                );
                ?>
                </tbody>
			</table>
		</div>
	</div>
</section>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>