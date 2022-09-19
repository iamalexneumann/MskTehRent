<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Цены");
?>
<ul>
    <li>Стоимость указана при оплате по безналичному расчету с учетом НДС;</li>
    <li>Смена: 7 часов аренды + 1 час подачи;</li>
    <li>Въезд в садовое кольцо, ТТК, центр + 1 час к смене.</li>
</ul>
<div class="mb-5">
    <?php
    if ($siteparam_price_aerial_platform) {
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $siteparam_price_aerial_platform,
            ),
            '',
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
    }
    ?>
    <button type="button"
            class="btn btn-warning"
            data-bs-toggle="modal"
            data-bs-target="#orderModal"
            data-bs-source='Кнопка на странице "Цены"'>Заказать спецтехнику</button>
</div>
<div class="mb-5">
    <?php
    if ($siteparam_price_truck_crane) {
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $siteparam_price_truck_crane,
            ),
            '',
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
    }
    ?>
    <button type="button"
            class="btn btn-warning"
            data-bs-toggle="modal"
            data-bs-target="#orderModal"
            data-bs-source='Кнопка на странице "Цены"'>Заказать спецтехнику</button>
</div>
<div class="mb-5">
    <?php
    if ($siteparam_price_manipulators) {
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $siteparam_price_manipulators,
            ),
            '',
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
    }
    ?>
    <button type="button"
            class="btn btn-warning"
            data-bs-toggle="modal"
            data-bs-target="#orderModal"
            data-bs-source='Кнопка на странице "Цены"'>Заказать спецтехнику</button>
</div>
<ul>
    <li>Стоимость указана при оплате по безналичному расчету с учетом НДС;</li>
    <li>Смена: 7 часов аренды + 1 час подачи;</li>
    <li>Въезд в садовое кольцо, ТТК, центр + 1 час к смене.</li>
</ul>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>