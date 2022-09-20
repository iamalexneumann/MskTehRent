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
?>
<div class="product-detail">
    <ul class="carousel slide clearfix product-detail__carousel product-carousel" id="productCarousel" data-bs-interval="false">
        <li class="carousel-item active product-carousel__item">
            <div class="product-carousel__content">
                <a href="<?= $arResult['DETAIL_PAGE_URL']; ?>" class="product-carousel__img-link" rel="nofollow">
                    <img src="<?= $arResult['PICTURE_LQIP']['SRC']; ?>"
                         data-src="<?= $arResult['PICTURE']['SRC']; ?>"
                         class="product-carousel__img lazyload blur-up"
                         alt="<?= $arResult['NAME']; ?>"
                         width="<?= $arResult['PICTURE']['WIDTH']; ?>"
                         height="<?= $arResult['PICTURE']['HEIGHT']; ?>">
                </a>
            </div>
        </li>
    </ul>

    <table class="table table-bordered product-detail__characteristics">
        <thead>
            <th scope="col"><?= Loc::getMessage('PRODUCT_DETAIL_TABLE_TH_PARAM'); ?></th>
            <th scope="col"><?= Loc::getMessage('PRODUCT_DETAIL_TABLE_TH_VALUE'); ?></th>
        </thead>
        <tbody>
            <?php
            foreach ($arResult['DISPLAY_PROPERTIES'] as $property_key => $property):
                if ($property_key !== 'ATT_PRICE' && $property_key !== 'ATT_DETAIL_TEXT'):
            ?>
            <tr>
                <td><?= $property['NAME']; ?></td>
                <td><?= $property['VALUE']; ?></td>
            </tr>
            <?php
                endif;
            endforeach; ?>
        </tbody>
    </table>

    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/product_detail_price_block.php'); ?>

    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_features.php'); ?>

    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/product_detail_price_block.php'); ?>

    <?php if($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
    <div class="product-detail__text">
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/product_detail_price_block.php'); ?>
    <?php endif; ?>
</div>