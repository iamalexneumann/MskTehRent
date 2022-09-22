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
 * @var CBitrixComponentTemplate $this
 */
$item_picture = $arResult['DETAIL_PICTURE'];
if ($item_picture) {
    $arResultPictureFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 837,
            'height' => 470,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    $arResultPictureLqipFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 128,
            'height' => 72,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    if ($arResultPictureFileTmp['src']) {
        $arResultPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arResultPictureFileTmp['src'], true);
    }

    if ($arResultPictureLqipFileTmp['src']) {
        $arResultPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arResultPictureLqipFileTmp['src'], true);
    }

    $arResult['PICTURE'] = array_change_key_case($arResultPictureFileTmp, CASE_UPPER);
    $arResult['PICTURE_LQIP'] = array_change_key_case($arResultPictureLqipFileTmp, CASE_UPPER);
}

$att_photos = $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS'];

foreach ($att_photos['VALUE'] as $key => $att_photo) {
    if ($att_photo) {
        $arItemPictureFileTmp = \CFile::ResizeImageGet(
            $att_photo,
            [
                'width' => 837,
                'height' => 470,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
            $att_photo,
            [
                'width' => 128,
                'height' => 72,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        if ($arItemPictureFileTmp['src']) {
            $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
        }

        if ($arItemPictureLqipFileTmp['src']) {
            $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
        }

        $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS']['PICTURE'][$key] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
        $arResult['DISPLAY_PROPERTIES']['ATT_PHOTOS']['PICTURE_LQIP'][$key] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
    }
}