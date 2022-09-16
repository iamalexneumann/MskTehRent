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
            <div class="footer-content bg-light pt-5 pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">

                        </div>
                        <div class="col-lg-3">
                            <a class="logo logo_header d-flex"
                               title="<?= htmlspecialchars($siteparam_logo_name . ' - ' . $siteparam_logo_description); ?>"
                                <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                                <img src="<?= $siteparam_footer_logo; ?>"
                                     class="logo__img me-2"
                                     width="75"
                                     height="75"
                                     alt="<?= htmlspecialchars($siteparam_logo_name . ' - ' . $siteparam_logo_description); ?>">
                                <span class="logo__wrapper d-flex flex-column justify-content-center">
                                    <span class="logo__name"><?= htmlspecialchars($siteparam_logo_name); ?></span>
                                    <span class="logo__description"><?= htmlspecialchars($siteparam_logo_description); ?></span>
                                </span>
                            </a>
                            <a class="d-block" href="tel:<?= $siteparam_main_phone_tel; ?>"
                               title="<?= Loc::getMessage('FOOTER_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>
                            <?php if ($siteparam_schedule): ?>
                            <div class="d-block"><?= $siteparam_schedule; ?></div>
                            <?php endif; ?>
                            <button type="button"
                                    class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#callbackModal"
                                    data-bs-source="<?= Loc::getMessage('FOOTER_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('FOOTER_CALLBACK_BTN_TEXT'); ?></button>
                            <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link || $siteparam_viber_number): ?>
                            <ul>
                                <?php if ($siteparam_whatsapp_number): ?>
                                <li>
                                    <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                                       target="_blank"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_WHATSAPP_TITLE'); ?>"><i class="fa-brands fa-whatsapp"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_viber_number): ?>
                                <li>
                                    <a href="<?= $siteparam_viber_link; ?>"
                                       target="_blank"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_VIBER_TITLE'); ?>"><i class="fa-brands fa-viber"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_telegram_link): ?>
                                <li>
                                    <a href="<?= $siteparam_telegram_link; ?>"
                                       target="_blank"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_TELEGRAM_TITLE'); ?>"><i class="fa-brands fa-telegram"></i></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <?php endif; ?>
                            <a href="mailto:<?= $siteparam_email; ?>" class="d-block"><?= $siteparam_email; ?></a>
                            <div class="d-block"><?= $siteparam_address; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    &#169; <?= htmlspecialchars($siteparam_logo_name . ' - ' . $siteparam_logo_description); ?>, 2011-<?= date('Y'); ?> <?= Loc::getMessage('FOOTER_COPYRIGHT_YEARS_TEXT'); ?>. <?= Loc::getMessage('FOOTER_COPYRIGHT_RIGHTS_TEXT'); ?>.
                    <a href="/privacy-policy/"><?= Loc::getMessage('FOOTER_COPYRIGHT_PRIVACY_LINK_TEXT'); ?></a>
                    <a href="/sitemap/"><?= Loc::getMessage('FOOTER_COPYRIGHT_SITEMAP_LINK_TEXT'); ?></a>
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