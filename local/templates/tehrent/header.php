<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_scripts_head
 * @var COption $siteparam_scripts_body_before
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_message
 * @var COption $siteparam_viber_number
 * @var COption $siteparam_viber_link
 * @var COption $siteparam_telegram_link
 */
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">
<head>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php
    echo $siteparam_scripts_head;
    use Bitrix\Main\UI\Extension;
    use Bitrix\Main\Page\Asset;
    Extension::load(
        [
            'ui.bootstrap5',
            'ui.fonts.font-awesome',
            'ui.fonts.montserrat',
            'ui.lazysizes',
        ]
    );
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/main.js');
    $APPLICATION->ShowHead();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/safari-pinned-tab.svg" color="#feb301">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <?= $siteparam_scripts_body_before; ?>
    <?php $APPLICATION->ShowPanel(); ?>
    <header class="main-header sticky-top">
        <nav class="navbar navbar-expand-xl bg-white">
            <div class="container-fluid">
                <a class="logo logo_header"
                   title="<?= htmlspecialchars($siteparam_logo_name . ' - ' . custom_lcfirst($siteparam_logo_description)); ?>"
                    <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                    <img src="<?= $siteparam_main_logo; ?>"
                         class="logo__img"
                         width="75"
                         height="75"
                         alt="<?= htmlspecialchars($siteparam_logo_name . ' - ' . custom_lcfirst($siteparam_logo_description)); ?>">
                    <span class="logo__wrapper">
                        <span class="logo__name"><?= htmlspecialchars($siteparam_logo_name); ?></span>
                        <span class="logo__description"><?= htmlspecialchars($siteparam_logo_description); ?></span>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false"
                        data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-label="<?= Loc::getMessage('HEADER_NAVBAR_ARIA_LABEL'); ?>">
                    <span class="navbar-toggler__text"><?= Loc::getMessage('HEADER_NAVBAR_TOGGLER_TEXT'); ?></span>
                    <span class="navbar-toggler__icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <div class="ms-auto me-auto">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "main_submenu",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "main_menu",
                                "USE_EXT" => "Y",
                                "COMPONENT_TEMPLATE" => "main_menu"
                            ),
                            false
                        ); ?>
                    </div>
                    <div class="header-contacts">
                        <a href="tel:<?= $siteparam_main_phone_tel; ?>"
                           class="header-contacts__phone-link"
                           title="<?= Loc::getMessage('HEADER_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>
                        <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link || $siteparam_viber_number): ?>
                        <div class="header-contacts__messengers-wrapper">
                            <div class="header-contacts__messengers-title"><?= Loc::getMessage('HEADER_MESSENGERS_BLOCK_TITLE'); ?>:</div>
                            <ul class="messengers header-contacts__messengers">
                                <?php if ($siteparam_whatsapp_number): ?>
                                <li class="messengers__item">
                                    <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                                       class="messengers__link"
                                       target="_blank"
                                       title="<?= Loc::getMessage('HEADER_MESSENGERS_WHATSAPP_TITLE'); ?>"><i class="messengers__icon fa-brands fa-whatsapp"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_viber_number): ?>
                                <li class="messengers__item">
                                    <a href="<?= $siteparam_viber_link; ?>"
                                       class="messengers__link"
                                       target="_blank"
                                       title="<?= Loc::getMessage('HEADER_MESSENGERS_VIBER_TITLE'); ?>"><i class="messengers__icon fa-brands fa-viber"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_telegram_link): ?>
                                <li class="messengers__item">
                                    <a href="<?= $siteparam_telegram_link; ?>"
                                       class="messengers__link"
                                       target="_blank"
                                       title="<?= Loc::getMessage('HEADER_MESSENGERS_TELEGRAM_TITLE'); ?>"><i class="messengers__icon fa-brands fa-telegram"></i></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php if ($CurDir === '/'): ?>
    <div class="first-screen">
        <div class="container first-screen__container">
            <div class="first-screen__wrapper">
                <h1 class="first-screen__title"><?= Loc::getMessage('FIRST_SCREEN_TITLE'); ?></h1>
                <div class="first-screen__description"><?= Loc::getMessage('FIRST_SCREEN_DESCRIPTION'); ?></div>
                <div class="first-screen__buttons">
                    <button type="button"
                                class="btn btn-warning first-screen__order-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#orderModal"
                                data-bs-source="<?= Loc::getMessage('ASIDE_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('FIRST_SCREEN_ORDER_BTN_TEXT'); ?></button>
                    <a href="/spetstekhnika" class="btn btn-light first-screen__catalog-btn"><?= Loc::getMessage('FIRST_SCREEN_CATALOG_BTN_TEXT'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <aside class="main-aside col-lg-4">
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "aside_menu",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "3",
                        "MENU_CACHE_GET_VARS" => "",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "aside_menu",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => ""
                    ),
                    false
                ); ?>
                <button type="button"
                        class="btn btn-dark main-aside__order-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#orderModal"
                        data-bs-source="<?= Loc::getMessage('ASIDE_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('ASIDE_ORDER_BTN_TEXT'); ?></button>
                <div class="aside-reviews">
                    <div class="aside-reviews__title"><?= Loc::getMessage('ASIDE_REVIEWS_TITLE'); ?></div>
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
                            "NEWS_COUNT" => "3",
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
                    <a href="/otzyvy/" class="aside-reviews__link">
                        <?= Loc::getMessage('ASIDE_REVIEWS_BTN_TEXT'); ?>
                        <i class="aside-reviews__link-icon fa-solid fa-angle-right"></i>
                    </a>
                </div>
                <div class="main-aside__sticky-block">
                    <button type="button"
                            class="btn btn-dark main-aside__order-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#orderModal"
                            data-bs-source="<?= Loc::getMessage('ASIDE_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('ASIDE_ORDER_BTN_TEXT'); ?></button>
                </div>
            </aside>
            <main class="main-area<?php if ($CurDir === '/'): ?> main-area_page-index<?php endif; ?> col-lg-8">
                <?php if ($CurDir !== '/'): ?>
                <header class="page-header">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "breadcrumb",
                        Array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => SITE_ID,
                        ),
                        false
                    ); ?>
                    <h1 class="page-header__title"><?php $APPLICATION->ShowTitle(false); ?></h1>
                    <?php $APPLICATION->ShowViewContent('MAIN_SUBTITLE'); ?>
                </header>
                <?php endif; ?>