<?php
/**
 * @var CMain $APPLICATION
 */
use \Bitrix\Main\Config\Option;
use \Bitrix\Main\SiteTable;
CModule::IncludeModule('nurgush.mobiledetect');
$detect = new Nurgush\MobileDetect\Main();

$siteparam_main_logo = CFile::GetPath(Option::get('askaron.settings', 'UF_MAIN_LOGO', ''));
$siteparam_footer_logo = CFile::GetPath(Option::get('askaron.settings', 'UF_FOOTER_LOGO', ''));
$siteparam_logo_name = Option::get('askaron.settings', 'UF_LOGO_NAME', '');
$siteparam_logo_description = Option::get('askaron.settings', 'UF_LOGO_DESCRIPTION', '');
$siteparam_main_phone = Option::get('askaron.settings', 'UF_MAIN_PHONE', '');
$siteparam_email = Option::get('askaron.settings', 'UF_EMAIL', '');
$siteparam_schedule = Option::get('askaron.settings', 'UF_SCHEDULE', '');
$siteparam_whatsapp_number = Option::get('askaron.settings', 'UF_WHATSAPP_NUMBER', '');
$siteparam_whatsapp_message = transform_text_to_whatsapp_link(Option::get('askaron.settings', 'UF_WHATSAPP_MESSAGE', ''));
$siteparam_telegram_link = Option::get('askaron.settings', 'UF_TELEGRAM_LINK', '');
$siteparam_viber_number = Option::get('askaron.settings', 'UF_VIBER_NUMBER', '');
$siteparam_address = Option::get('askaron.settings', 'UF_ADDRESS', '');

$siteparam_price_aerial_platform = Option::get('askaron.settings', 'UF_PRICE_AERIAL_PLATFORM', '');
$siteparam_price_truck_crane = Option::get('askaron.settings', 'UF_PRICE_TRUCK_CRANE', '');
$siteparam_price_manipulators = Option::get('askaron.settings', 'UF_PRICE_MANIPULATORS', '');
$siteparam_photos = Option::get('askaron.settings', 'UF_PHOTOS', '');

$siteparam_api_key_yandex_map = Option::get('askaron.settings', 'UF_API_KEY_YANDEX_MAP', '');
$siteparam_coors_yandex_map = Option::get('askaron.settings', 'UF_COORS_YANDEX_MAP', '');
$siteparam_zoom_yandex_map = Option::get('askaron.settings', 'UF_ZOOM_YANDEX_MAP', '');

$siteparam_scripts_head = Option::get('askaron.settings', 'UF_SCRIPTS_HEAD', '');
$siteparam_scripts_body_before = Option::get('askaron.settings', 'UF_SCRIPTS_BODY_BEFORE', '');
$siteparam_scripts_body_after = Option::get('askaron.settings', 'UF_SCRIPTS_BODY_AFTER', '');

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
$arSite = SiteTable::getById(SITE_ID)->fetch();