<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Цены");
?>
<ul>
    <li>Стоимость указана при оплате по безналичному расчету с учетом НДС;</li>
    <li>Смена: 7 часов аренды + 1 час подачи;</li>
    <li>Въезд в садовое кольцо, ТТК, центр + 1 час к смене.</li>
</ul>
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
<ul>
    <li>Стоимость указана при оплате по безналичному расчету с учетом НДС;</li>
    <li>Смена: 7 часов аренды + 1 час подачи;</li>
    <li>Въезд в садовое кольцо, ТТК, центр + 1 час к смене.</li>
</ul>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>