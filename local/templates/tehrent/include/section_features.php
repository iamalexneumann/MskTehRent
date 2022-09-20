<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<div class="features-list">
    <div class="features-list__item">
        <div class="features-list__icon">
            <i class="features-list__fa fa-solid fa-clock"></i>
        </div>
        <div class="features-list__wrapper">
            <div class="features-list__title"><?= Loc::getMessage('SECTION_FEATURES_1_TITLE'); ?></div>
            <div class="features-list__description"><?= Loc::getMessage('SECTION_FEATURES_1_DESCRIPTION'); ?></div>
        </div>
    </div>
    <div class="features-list__item">
        <div class="features-list__icon">
            <i class="features-list__fa fa-solid fa-truck-moving"></i>
        </div>
        <div class="features-list__wrapper">
            <div class="features-list__title"><?= Loc::getMessage('SECTION_FEATURES_2_TITLE'); ?></div>
            <div class="features-list__description"><?= Loc::getMessage('SECTION_FEATURES_2_DESCRIPTION'); ?></div>
        </div>
    </div>
    <div class="features-list__item">
        <div class="features-list__icon">
            <i class="features-list__fa fa-regular fa-id-card"></i>
        </div>
        <div class="features-list__wrapper">
            <div class="features-list__title"><?= Loc::getMessage('SECTION_FEATURES_3_TITLE'); ?></div>
            <div class="features-list__description"><?= Loc::getMessage('SECTION_FEATURES_3_DESCRIPTION'); ?></div>
        </div>
    </div>
    <div class="features-list__item">
        <div class="features-list__icon">
            <i class="features-list__fa fa-solid fa-user-graduate"></i>
        </div>
        <div class="features-list__wrapper">
            <div class="features-list__title"><?= Loc::getMessage('SECTION_FEATURES_4_TITLE'); ?></div>
            <div class="features-list__description"><?= Loc::getMessage('SECTION_FEATURES_4_DESCRIPTION'); ?></div>
        </div>
    </div>
    <div class="features-list__item">
        <div class="features-list__icon">
            <i class="features-list__fa fa-solid fa-screwdriver-wrench"></i>
        </div>
        <div class="features-list__wrapper">
            <div class="features-list__title"><?= Loc::getMessage('SECTION_FEATURES_5_TITLE'); ?></div>
            <div class="features-list__description"><?= Loc::getMessage('SECTION_FEATURES_5_DESCRIPTION'); ?></div>
        </div>
    </div>
</div>