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
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="product-list row">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <div class="col-lg-6 product-list__col">
        <article class="product-item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="product-item__img-link" rel="nofollow">
                <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                     data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                     class="product-item__img lazyload blur-up"
                     alt="<?= $arItem['NAME']; ?>"
                     width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                     height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
            </a>
            <div class="product-item__wrapper">
                <h<?=$param_small_card_tag_title; ?> class="product-item__title">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="product-item__link"><?= $arItem['NAME']; ?></a>
                </h<?=$param_small_card_tag_title; ?>>
                <table class="table product-item__characteristics">
                    <tbody>
                        <?php
                        foreach ($arItem['DISPLAY_PROPERTIES'] as $property_key => $property):
                            if ($property_key !== 'ATT_PRICE'):
                        ?>
                        <tr>
                            <th scope="row"><?= $property['NAME']; ?></th>
                            <td><?= $property['VALUE']; ?></td>
                        </tr>
                        <?php
                            endif;
                        endforeach; ?>
                    </tbody>
                </table>
                <div class="product-item__price">
                    <span class="product-item__price-title"><?= Loc::getMessage('PRODUCTS_LIST_PRICE_TEXT'); ?>:</span>
                    <?= number_format($arItem['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('PRODUCTS_LIST_PRICE_CURRENCY'); ?>
                </div>
                <div class="product-item__btn-wrapper">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="btn btn-warning product-item__btn" rel="nofollow">
                        <?= Loc::getMessage('PRODUCTS_LIST_MORE_BTN_TEXT'); ?> <i class="fa-solid fa-angle-right product-item__btn-icon"></i>
                    </a>
                </div>
            </div>
        </article>
    </div>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
} ?>
<?php endif; ?>