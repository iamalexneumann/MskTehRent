<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Цены");
?>

<?php
if ($siteparam_price_aerial_platform) {
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $siteparam_price_aerial_platform,
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    );
}
?>

<?php
if ($siteparam_price_truck_crane) {
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $siteparam_price_truck_crane,
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    );
}
?>

<?php
if ($siteparam_price_manipulators) {
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $siteparam_price_manipulators,
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    );
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>