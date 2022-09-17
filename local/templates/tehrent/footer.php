<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_footer_logo
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
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
 * @var COption $siteparam_scripts_body_after
 */
use Bitrix\Main\Localization\Loc;
?>
            </div>
        </main>
        <footer class="main-footer">
            <div class="main-footer__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 footer-contacts">
                            <a class="logo footer-contacts__logo"
                               title="<?= htmlspecialchars($siteparam_logo_name . ' - ' . custom_lcfirst($siteparam_logo_description)); ?>"
                                <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                                <img src="<?= $siteparam_footer_logo; ?>"
                                     class="logo__img"
                                     width="75"
                                     height="75"
                                     alt="<?= htmlspecialchars($siteparam_logo_name . ' - ' . custom_lcfirst($siteparam_logo_description)); ?>">
                                <span class="logo__wrapper">
                                    <span class="logo__name"><?= htmlspecialchars($siteparam_logo_name); ?></span>
                                    <span class="logo__description"><?= htmlspecialchars($siteparam_logo_description); ?></span>
                                </span>
                            </a>
                            <a class="footer-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
                               title="<?= Loc::getMessage('FOOTER_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>
                            <?php if ($siteparam_schedule): ?>
                            <div class="footer-contacts__item footer-contacts__item_schedule">
                                <i class="footer-contacts__icon fa-regular fa-clock"></i>
                                <?= $siteparam_schedule; ?></div>
                            <?php endif; ?>
                            <button type="button"
                                    class="btn btn-sm btn-warning footer-contacts__callback-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#callbackModal"
                                    data-bs-source="<?= Loc::getMessage('FOOTER_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('FOOTER_CALLBACK_BTN_TEXT'); ?></button>
                            <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link || $siteparam_viber_number): ?>
                            <ul class="messengers footer-contacts__messengers">
                                <?php if ($siteparam_whatsapp_number): ?>
                                <li class="messengers__item">
                                    <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                                       class="messengers__link"
                                       target="_blank"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_WHATSAPP_TITLE'); ?>"><i class="messengers__icon fa-brands fa-whatsapp"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_viber_number): ?>
                                <li class="messengers__item">
                                    <a href="<?= $siteparam_viber_link; ?>"
                                       class="messengers__link"
                                       target="_blank"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_VIBER_TITLE'); ?>"><i class="messengers__icon fa-brands fa-viber"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_telegram_link): ?>
                                <li class="messengers__item">
                                    <a href="<?= $siteparam_telegram_link; ?>"
                                       class="messengers__link"
                                       target="_blank"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_TELEGRAM_TITLE'); ?>"><i class="messengers__icon fa-brands fa-telegram"></i></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <?php endif; ?>
                            <div class="footer-contacts__item footer-contacts__item_email">
                                <i class="footer-contacts__icon fa-regular fa-envelope"></i>
                                <a href="mailto:<?= $siteparam_email; ?>"><?= $siteparam_email; ?></a>
                            </div>
                            <div class="footer-contacts__item footer-contacts__item_address">
                                <i class="footer-contacts__icon fa-solid fa-location-dot"></i>
                                <?= $siteparam_address; ?>
                            </div>
                        </div>
                        <div class="col-lg-8 footer-navigation">
                            <?php
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "footer_menu",
                                Array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "3",
                                    "MENU_CACHE_GET_VARS" => "",
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "services_menu",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => ""
                                ),
                                false
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer__copyright footer-copyright">
                <div class="container">
                    &#169; <?= htmlspecialchars($siteparam_logo_name . ' - ' . custom_lcfirst($siteparam_logo_description)); ?>, 2011-<?= date('Y'); ?> <?= Loc::getMessage('FOOTER_COPYRIGHT_YEARS_TEXT'); ?>. <?= Loc::getMessage('FOOTER_COPYRIGHT_RIGHTS_TEXT'); ?>.
                    <div class="footer-copyright__links">
                        <a href="/privacy-policy/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_PRIVACY_LINK_TEXT'); ?></a>
                        <a href="/sitemap/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_SITEMAP_LINK_TEXT'); ?></a>
                    </div>
                </div>
            </div>
        </footer>

        <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="h5 modal-title" id="callbackModalLabel"><?= Loc::getMessage('CALLBACK_MODAL_TITLE'); ?></div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?= Loc::getMessage('BTN_CLOSE_LABEL'); ?>"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="h5 modal-title" id="orderModalLabel"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?= Loc::getMessage('BTN_CLOSE_LABEL'); ?>"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <?= $siteparam_scripts_body_after; ?>
    </body>
</html>