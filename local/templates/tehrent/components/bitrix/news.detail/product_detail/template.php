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
$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'] ?? '';
$carousel_interval = 3000;
?>
<div class="product-detail">
    <div class="carousel slide clearfix product-detail__carousel product-carousel carousel-fade" id="productCarousel" data-bs-ride="carousel">
        <ul class="carousel-inner product-carousel__list">
            <li class="carousel-item active product-carousel__item" data-bs-interval="<?= $carousel_interval; ?>">
                <a href="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>"
                   data-fancybox="gallery-product-detail"
                   data-caption="<?= $arResult['NAME']; ?> - <?= Loc::getMessage('PRODUCT_DETAIL_IMG_ALT_PHOTO_NUMBER_TEXT'); ?> №1"
                   class="product-carousel__img-link">
                    <img src="<?= $arResult['PICTURE_LQIP']['SRC']; ?>"
                         data-src="<?= $arResult['PICTURE']['SRC']; ?>"
                         class="product-carousel__img lazyload blur-up"
                         alt="<?= $arResult['NAME']; ?>"
                         width="<?= $arResult['PICTURE']['WIDTH']; ?>"
                         height="<?= $arResult['PICTURE']['HEIGHT']; ?>">
                </a>
            </li>

            <?php
            if ($att_photos):
                foreach ($att_photos['VALUE'] as $key => $att_photo): ?>
            <li class="carousel-item product-carousel__item" data-bs-interval="<?= $carousel_interval; ?>">
                <a href="<?= $att_photos['FILE_VALUE'][$key]['SRC'] ?: $att_photos['FILE_VALUE']['SRC']; ?>"
                   data-fancybox="gallery-product-detail"
                   data-caption="<?= $arResult['NAME']; ?> - <?= Loc::getMessage('PRODUCT_DETAIL_IMG_ALT_PHOTO_NUMBER_TEXT'); ?> №<?= $key + 2; ?>"
                   class="product-carousel__img-link">
                    <img src="<?= $att_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                         data-src="<?= $att_photos['PICTURE'][$key]['SRC']; ?>"
                         class="product-carousel__img lazyload blur-up"
                         alt="<?= $arResult['NAME']; ?>"
                         width="<?= $att_photos['PICTURE'][$key]['WIDTH']; ?>"
                         height="<?= $att_photos['PICTURE'][$key]['HEIGHT']; ?>">
                </a>
            </li>
            <?php
                endforeach;
            endif; ?>
        </ul>

        <?php if ($att_photos): ?>
        <button class="carousel-control-prev product-carousel__control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev"
                title="<?= Loc::getMessage('PRODUCT_DETAIL_CAROUSEL_PREV_BTN_TEXT'); ?>">
            <i class="fa-solid fa-chevron-left"></i>
            <span class="visually-hidden"><?= Loc::getMessage('PRODUCT_DETAIL_CAROUSEL_PREV_BTN_TEXT'); ?></span>
        </button>
        <button class="carousel-control-next product-carousel__control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next"
                title="<?= Loc::getMessage('PRODUCT_DETAIL_CAROUSEL_NEXT_BTN_TEXT'); ?>">
            <i class="fa-solid fa-chevron-right"></i>
            <span class="visually-hidden"><?= Loc::getMessage('PRODUCT_DETAIL_CAROUSEL_NEXT_BTN_TEXT'); ?></span>
        </button>
        <?php endif; ?>
    </div>

    <table class="table table-bordered product-detail__characteristics">
        <thead>
            <tr>
                <th scope="col"><?= Loc::getMessage('PRODUCT_DETAIL_TABLE_TH_PARAM'); ?></th>
                <th scope="col"><?= Loc::getMessage('PRODUCT_DETAIL_TABLE_TH_VALUE'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arResult['DISPLAY_PROPERTIES'] as $property_key => $property):
                if ($property_key !== 'ATT_PRICE' && $property_key !== 'ATT_DETAIL_TEXT' && $property_key !== 'ATT_PHOTOS'):
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

    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/product_detail_price_block.php'); ?>

    <div class="main-section border-bottom-0">
        <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/section_features.php'); ?>
    </div>

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