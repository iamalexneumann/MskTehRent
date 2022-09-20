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

if ($arResult['SECTIONS']) {
    foreach ($arResult['SECTIONS'] as $key => &$arSection) {
        $section_picture = $arSection['PICTURE'];
        if ($section_picture) {
            $arSectionPictureFileTmp = \CFile::ResizeImageGet(
                $section_picture['ID'],
                [
                    'width' => 640,
                    'height' => 360,
                ],
                BX_RESIZE_IMAGE_EXACT,
                true
            );

            $arSectionPictureLqipFileTmp = \CFile::ResizeImageGet(
                $section_picture['ID'],
                [
                    'width' => 128,
                    'height' => 72,
                ],
                BX_RESIZE_IMAGE_EXACT,
                true
            );

            if ($arSectionPictureFileTmp['src']) {
                $arSectionPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arSectionPictureFileTmp['src'], true);
            }

            if ($arSectionPictureLqipFileTmp['src']) {
                $arSectionPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arSectionPictureLqipFileTmp['src'], true);
            }

            $arSection['SECTION_PICTURE'] = array_change_key_case($arSectionPictureFileTmp, CASE_UPPER);
            $arSection['SECTION_PICTURE_LQIP'] = array_change_key_case($arSectionPictureLqipFileTmp, CASE_UPPER);
        }

        $arSelect = [
            'ID',
            'NAME',
            'DETAIL_PAGE_URL',
            'PROPERTY_ATT_PRICE'
        ];
        $arFilter = [
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'SECTION_CODE' => $arSection['CODE'],
            'ACTIVE_DATE' => 'Y',
            'ACTIVE' => 'Y'
        ];
        $res = CIBlockElement::GetList('', $arFilter, false, '', $arSelect);
        $elements_key = 0;
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arResult['SECTIONS'][$key]['ELEMENTS'][$elements_key]['NAME'] = $arFields['NAME'];
            $arResult['SECTIONS'][$key]['ELEMENTS'][$elements_key]['DETAIL_PAGE_URL'] = $arFields['DETAIL_PAGE_URL'];
            if (!$arResult['SECTIONS'][$key]['MIN_PRICE']) {
                $arResult['SECTIONS'][$key]['MIN_PRICE'] = $arFields['PROPERTY_ATT_PRICE_VALUE'];
            } elseif ($arFields['PROPERTY_ATT_PRICE_VALUE'] < $arResult['SECTIONS'][$key]['MIN_PRICE']) {
                $arResult['SECTIONS'][$key]['MIN_PRICE'] = $arFields['PROPERTY_ATT_PRICE_VALUE'];
            }
            $elements_key++;
        }
    }
}