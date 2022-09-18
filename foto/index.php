<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фото");
?>

<?php
if ($siteparam_photos) {
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $siteparam_photos,
        ),
        '',
        Array(
            "HIDE_ICONS" => "Y"
        )
    );
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>