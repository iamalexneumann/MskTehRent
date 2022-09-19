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
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="reviews-list">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <div class="reviews-list__item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
        <div class="reviews-list__header">
            <div class="reviews-list__name"><?= $arItem['NAME']; ?></div>
            <time datetime="<?= $arItem['DATETIME']; ?>" class="reviews-list__date">
                <?= $arItem['DATE'] . ' ' . Loc::getMessage('REVIEWS_LIST_DATE_Y'); ?>
            </time>
        </div>
        <div class="reviews-list__text">
            <?= $arItem['PREVIEW_TEXT']; ?>
        </div>
        <?php if ($arItem['PREVIEW_PICTURE']): ?>
        <a href="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
           data-fancybox="gallery-reviews-list"
           class="reviews-list__img-link"
           data-caption="<?= $arItem['NAME'] . ': ' . Loc::getMessage('REVIEWS_LIST_IMG_ALT'); ?>"
           rel="nofollow">
            <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                 data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                 class="reviews-list__img lazyload blur-up"
                 alt="<?= $arItem['NAME'] . ': ' . Loc::getMessage('REVIEWS_LIST_IMG_ALT'); ?>"
                 width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                 height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
        </a>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
?>
<?php endif; ?>