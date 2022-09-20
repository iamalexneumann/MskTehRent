<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_schedule
 * @var COption $siteparam_email
 * @var COption $siteparam_address
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_message
 * @var COption $siteparam_viber_number
 * @var COption $siteparam_viber_link
 * @var COption $siteparam_telegram_link
 * @var COption $siteparam_api_key_yandex_map
 * @var COption $siteparam_coors_yandex_map
 * @var COption $siteparam_zoom_yandex_map
 * @var COption $siteparam_logo_name
 */
use Bitrix\Main\Localization\Loc;
?>
<div class="page-contacts">
    <a class="page-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
       title="<?= Loc::getMessage('PAGE_CONTACTS_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>

    <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link || $siteparam_viber_number): ?>
    <ul class="messengers messengers_bg-dark page-contacts__messengers">
        <?php if ($siteparam_whatsapp_number): ?>
        <li class="messengers__item">
            <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
               class="messengers__link"
               target="_blank"
               title="<?= Loc::getMessage('PAGE_CONTACTS_MESSENGERS_WHATSAPP_TITLE') ?>"><i class="messengers__icon fa-brands fa-whatsapp"></i></a>
        </li>
        <?php endif; ?>
        <?php if ($siteparam_viber_number): ?>
        <li class="messengers__item">
            <a href="<?= $siteparam_viber_link; ?>"
               class="messengers__link"
               target="_blank"
               title="<?= Loc::getMessage('PAGE_CONTACTS_MESSENGERS_VIBER_TITLE') ?>"><i class="messengers__icon fa-brands fa-viber"></i></a>
        </li>
        <?php endif; ?>
        <?php if ($siteparam_telegram_link): ?>
            <li class="messengers__item">
                <a href="<?= $siteparam_telegram_link; ?>"
                   class="messengers__link"
                   target="_blank"
                   title="<?= Loc::getMessage('PAGE_CONTACTS_MESSENGERS_TELEGRAM_TITLE') ?>"><i class="messengers__icon fa-brands fa-telegram"></i></a>
            </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>

    <button type="button"
            class="btn btn-warning page-contacts__callback-btn"
            data-bs-toggle="modal"
            data-bs-target="#callbackModal"
            data-bs-source="<?= Loc::getMessage('PAGE_CONTACTS_CALLBACK_BTN_DATA_SOURCE') ?>"><?= Loc::getMessage('PAGE_CONTACTS_CALLBACK_BTN_TEXT') ?></button>

    <?php if ($siteparam_schedule): ?>
        <div class="page-contacts__item page-contacts__item_schedule">
            <i class="page-contacts__icon fa-regular fa-clock"></i>
            <?= $siteparam_schedule; ?>
        </div>
    <?php endif; ?>

    <div class="page-contacts__item page-contacts__item_email">
        <i class="page-contacts__icon fa-regular fa-envelope"></i>
        <a href="mailto:<?= $siteparam_email; ?>"><?= $siteparam_email; ?></a>
    </div>

    <?php if ($siteparam_address): ?>
        <div class="page-contacts__item page-contacts__item_address">
            <i class="page-contacts__icon fa-solid fa-location-dot"></i>
            <?= $siteparam_address; ?>
        </div>
    <?php endif; ?>

    <?php if ($siteparam_api_key_yandex_map): ?>
        <script src="https://api-maps.yandex.ru/2.1?apikey=<?= $siteparam_api_key_yandex_map; ?>&lang=<?= LANGUAGE_ID; ?>"></script>
        <script>
            ymaps.ready(function () {
                const mainMap = new ymaps.Map("main-map", {
                    center: [<?= $siteparam_coors_yandex_map; ?>],
                    zoom: <?= $siteparam_zoom_yandex_map; ?>
                });

                mainPlacemark = new ymaps.Placemark([<?= $siteparam_coors_yandex_map; ?>], {
                    hintContent: "<?= htmlspecialchars($siteparam_logo_name); ?>",
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: '<?= SITE_TEMPLATE_PATH; ?>/img/pin.png',
                    iconImageSize: [48, 64],
                    iconImageOffset: [-24, -64],
                });

                mainMap.geoObjects.add(mainPlacemark);
            });
        </script>
        <div id="main-map" class="page-contacts__map"></div>
    <?php endif; ?>
</div>