<?php
/**
 * @var CMain $APPLICATION
 */
CModule::IncludeModule('nurgush.mobiledetect');
$detect = new Nurgush\MobileDetect\Main();

$siteparam_main_logo = CFile::GetPath(\COption::GetOptionString( 'askaron.settings', 'UF_MAIN_LOGO') ?? '');
$siteparam_footer_logo = CFile::GetPath(\COption::GetOptionString( 'askaron.settings', 'UF_FOOTER_LOGO') ?? '');
$siteparam_logo_name = \COption::GetOptionString( 'askaron.settings', 'UF_LOGO_NAME') ?? '';
$siteparam_logo_description = \COption::GetOptionString( 'askaron.settings', 'UF_LOGO_DESCRIPTION') ?? '';
$siteparam_main_phone = \COption::GetOptionString( 'askaron.settings', 'UF_MAIN_PHONE') ?? '';
$siteparam_email = \COption::GetOptionString( 'askaron.settings', 'UF_EMAIL') ?? '';
$siteparam_schedule = \COption::GetOptionString( 'askaron.settings', 'UF_SCHEDULE') ?? '';
$siteparam_whatsapp_number = \COption::GetOptionString( 'askaron.settings', 'UF_WHATSAPP_NUMBER') ?? '';
$siteparam_whatsapp_message = transform_text_to_whatsapp_link(\COption::GetOptionString( 'askaron.settings', 'UF_WHATSAPP_MESSAGE') ?? '');
$siteparam_telegram_link = \COption::GetOptionString( 'askaron.settings', 'UF_TELEGRAM_LINK') ?? '';
$siteparam_viber_number = \COption::GetOptionString( 'askaron.settings', 'UF_VIBER_NUMBER') ?? '';
$siteparam_address = \COption::GetOptionString( 'askaron.settings', 'UF_ADDRESS') ?? '';

$siteparam_price_aerial_platform = \COption::GetOptionString( 'askaron.settings', 'UF_PRICE_AERIAL_PLATFORM') ?? '';
$siteparam_price_truck_crane = \COption::GetOptionString( 'askaron.settings', 'UF_PRICE_TRUCK_CRANE') ?? '';
$siteparam_price_manipulators = \COption::GetOptionString( 'askaron.settings', 'UF_PRICE_MANIPULATORS') ?? '';

$siteparam_api_key_yandex_map = \COption::GetOptionString( 'askaron.settings', 'UF_API_KEY_YANDEX_MAP') ?? '';
$siteparam_coors_yandex_map = \COption::GetOptionString( 'askaron.settings', 'UF_COORS_YANDEX_MAP') ?? '';
$siteparam_zoom_yandex_map = \COption::GetOptionString( 'askaron.settings', 'UF_ZOOM_YANDEX_MAP') ?? '';

$siteparam_scripts_head = \COption::GetOptionString( 'askaron.settings', 'UF_SCRIPTS_HEAD') ?? '';
$siteparam_scripts_body_before = \COption::GetOptionString( 'askaron.settings', 'UF_SCRIPTS_BODY_BEFORE') ?? '';
$siteparam_scripts_body_after = \COption::GetOptionString( 'askaron.settings', 'UF_SCRIPTS_BODY_AFTER') ?? '';

$siteparam_main_phone_tel = get_tel_from_phone($siteparam_main_phone);
$siteparam_whatsapp_number_tel = get_tel_from_phone($siteparam_whatsapp_number);
$siteparam_viber_number_tel = substr(get_tel_from_phone($siteparam_viber_number), 1);
$siteparam_viber_link = '';
if ($detect->isMobile() && $detect->isTablet()) {
    $siteparam_viber_link = 'viber://add?number=' . $siteparam_viber_number_tel;
} else {
    $siteparam_viber_link = 'viber://chat?number=%2B' . $siteparam_viber_number_tel;
}

$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
$arSite = \Bitrix\Main\SiteTable::getById(SITE_ID)->fetch();