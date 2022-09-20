<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;

$param_small_card_tag_title = $arParams['SMALL_CARD_TAG_TITLE'] ?? '2';
?>
<div class="element-list row">
    <?php
    foreach ($arResult['SECTIONS'] as $arSection): ?>
    <div class="col-lg-6 product-list__col">
        <article class="category-item">
            <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="category-item__img-link" rel="nofollow">
                <img src="<?= $arSection['PICTURE_LQIP']['SRC']; ?>"
                     data-src="<?= $arSection['PICTURE']['SRC']; ?>"
                     class="category-item__img lazyload blur-up"
                     alt="<?= $arSection['NAME']; ?>"
                     width="<?= $arSection['PICTURE']['WIDTH']; ?>"
                     height="<?= $arSection['PICTURE']['HEIGHT']; ?>">
            </a>
            <div class="category-item__wrapper">
                <h<?=$param_small_card_tag_title; ?> class="category-item__title">
                    <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="category-item__link"><?= $arSection['NAME']; ?></a>
                </h<?=$param_small_card_tag_title; ?>>
                <ul class="category-item__element-list element-list">
                    <?php foreach ($arSection['ELEMENTS'] as $element_item): ?>
                    <li class="element-list__item">
                        <i class="element-list__icon fa-solid fa-angle-right"></i>
                        <a href="<?= $element_item['DETAIL_PAGE_URL']; ?>" class="element-list__link"><?= $element_item['NAME']; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="category-item__price">
                    <span class="category-item__price-title"><?= Loc::getMessage('PRODUCT_CATEGORIES_PRICE_TEXT'); ?>:</span>
                    <?= Loc::getMessage('PRODUCT_CATEGORIES_PRICE_CURRENCY_MIN_TEXT') .
                    ' ' .
                    number_format($arSection['MIN_PRICE'], 0, '', ' ') .
                    ' ' .
                    Loc::getMessage('PRODUCT_CATEGORIES_PRICE_CURRENCY'); ?>
                </div>
                <div class="category-item__btn-wrapper">
                    <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="btn btn-warning category-item__btn" rel="nofollow">
                        <?= Loc::getMessage('PRODUCT_CATEGORIES_MORE_BTN_TEXT'); ?> <i class="fa-solid fa-angle-right category-item__btn-icon"></i>
                    </a>
                </div>
            </div>
        </article>
    </div>
<?php endforeach; ?>