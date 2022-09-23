<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arResult
 */
use Bitrix\Main\Localization\Loc;
?>
<div class="product-detail__price-wrapper">
    <div class="product-detail__price">
        <span class="product-detail__price-title"><?= Loc::getMessage('PRODUCT_DETAIL_PRICE_TEXT'); ?>:</span>
        <?= number_format($GLOBALS['PRODUCT_PRICE'] ?? $arResult['ATT_PRICE'], 0, '', ' ') . ' ' . Loc::getMessage('PRODUCT_DETAIL_PRICE_CURRENCY'); ?>
    </div>
    <button type="button"
            class="btn btn-dark"
            data-bs-toggle="modal"
            data-bs-target="#orderModal"
            data-bs-source="<?= Loc::getMessage('ASIDE_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('PRODUCT_DETAIL_ORDER_BTN_TEXT'); ?></button>
</div>
