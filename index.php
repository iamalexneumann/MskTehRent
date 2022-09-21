<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>
<section class="main-section">
    <header class="main-section__header">
        <div class="main-section__wrapper">
            <h2 class="main-section__title">Аренда спецтехники</h2>
            <div class="main-section__subtitle">Собственный парк автовышек – никаких посредников</div>
        </div>
        <a href="/spetstekhnika/" class="main-section__link">Перейти в раздел <i class="main-section__icon fa-solid fa-angle-right"></i></a>
    </header>
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "product_categories",
        Array(
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "COUNT_ELEMENTS" => "N",
            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
            "FILTER_NAME" => "sectionsFilter",
            "IBLOCK_ID" => "1",
            "IBLOCK_TYPE" => "primary_content",
            "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
            "SECTION_FIELDS" => array("", ""),
            "SECTION_ID" => "",
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array("", ""),
            "SHOW_PARENT_NAME" => "Y",
            "SMALL_CARD_TAG_TITLE" => "3",
            "TOP_DEPTH" => "2",
            "VIEW_MODE" => "LINE"
        )
    ); ?>
</section>

<div class="index-features">
    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_features.php'); ?>
</div>

<section class="main-section">
    <header class="main-section__header">
        <div class="main-section__wrapper">
            <h2 class="main-section__title">Отзывы</h2>
            <div class="main-section__subtitle">Почитайте отзывы о нашей работе</div>
        </div>
        <a href="/otzyvy/" class="main-section__link">Все отзывы <i class="main-section__icon fa-solid fa-angle-right"></i></a>
    </header>
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "reviews_list",
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
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("", ""),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "2",
            "IBLOCK_TYPE" => "primary_content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "10",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "main_pagination",
            "PAGER_TITLE" => "",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("ATT_DATE", ""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
        )
    ); ?>
</section>

<section class="main-section">
    <header class="main-section__header">
        <h2 class="main-section__title">Цены на аренду спецтехники</h2>
        <div class="main-section__subtitle">Сделаем для Вас лучшее предложение по цене</div>
    </header>
    <ul>
        <li>Стоимость указана при оплате по безналичному расчету с учетом НДС;</li>
        <li>Смена: 7 часов аренды + 1 час подачи;</li>
        <li>Въезд в садовое кольцо, ТТК, центр + 1 час к смене.</li>
    </ul>
    <div class="mb-5">
        <?php
        if ($siteparam_price_aerial_platform) {
            $APPLICATION->IncludeComponent(
                "sprint.editor:blocks",
                ".default",
                Array(
                    "JSON" => $siteparam_price_aerial_platform,
                ),
                '',
                Array(
                    "HIDE_ICONS" => "Y"
                )
            );
        }
        ?>
        <button type="button"
                class="btn btn-warning"
                data-bs-toggle="modal"
                data-bs-target="#orderModal"
                data-bs-source='Кнопка на странице "Главная"'>Заказать спецтехнику</button>
    </div>
    <div class="mb-5">
        <?php
        if ($siteparam_price_truck_crane) {
            $APPLICATION->IncludeComponent(
                "sprint.editor:blocks",
                ".default",
                Array(
                    "JSON" => $siteparam_price_truck_crane,
                ),
                '',
                Array(
                    "HIDE_ICONS" => "Y"
                )
            );
        }
        ?>
        <button type="button"
                class="btn btn-warning"
                data-bs-toggle="modal"
                data-bs-target="#orderModal"
                data-bs-source='Кнопка на странице "Главная"'>Заказать спецтехнику</button>
    </div>
    <div>
        <?php
        if ($siteparam_price_manipulators) {
            $APPLICATION->IncludeComponent(
                "sprint.editor:blocks",
                ".default",
                Array(
                    "JSON" => $siteparam_price_manipulators,
                ),
                '',
                Array(
                    "HIDE_ICONS" => "Y"
                )
            );
        }
        ?>
        <button type="button"
                class="btn btn-warning"
                data-bs-toggle="modal"
                data-bs-target="#orderModal"
                data-bs-source='Кнопка на странице "Главная"'>Заказать спецтехнику</button>
    </div>
</section>

<section class="main-section">
    <header class="main-section__header">
        <div class="main-section__wrapper">
            <h2 class="main-section__title">Фотографии</h2>
            <div class="main-section__subtitle">Здесь вы можете увидеть реальные фотографии спецтехники, которую мы сдаем в аренду нашим клиентам.</div>
        </div>
    </header>
    <?php
    if ($siteparam_photos) {
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $siteparam_photos,
            ),
            '',
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
    }
    ?>
</section>

<section class="main-section">
    <header class="main-section__header">
        <div class="main-section__wrapper">
            <h2 class="main-section__title">Контакты</h2>
            <div class="main-section__subtitle">Свяжитесь с нами удобным для Вас способом</div>
        </div>
    </header>
    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/page_contacts.php'); ?>
</section>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>