<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

global $APPLICATION;

$main_menu_title = Array(
    "Меню",
    "",
    Array(),
    Array(
        'FROM_IBLOCK' => 1,
        'IS_PARENT' => 1,
        'DEPTH_LEVEL' => 1,
    ),
    ""
);
array_unshift($aMenuLinks, $main_menu_title);

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "custom.bitrix:menu.sections",
    "",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "DEPTH_LEVEL" => "2",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_ID" => "1",
        "IBLOCK_TYPE" => "primary_content",
        "ID" => $_REQUEST["ID"],
        "IS_SEF" => "Y",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "SECTION_URL" => "",
        "SEF_BASE_URL" => "/spetstekhnika/"
    ),
    false,
    array("HIDE_ICONS"=>"Y"),
);

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);