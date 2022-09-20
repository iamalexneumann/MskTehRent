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
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\Extension;
$localization_messages = Loc::loadLanguageFile(__FILE__);

$uf_seo_text_top = '';
$uf_seo_text_bottom = '';
if (Cmodule::IncludeModule('asd.iblock')) {
	$iblock_ufs = CASDiblockTools::GetIBUF($arParams['IBLOCK_ID']);
	$uf_seo_text_top = $iblock_ufs['UF_SEO_TEXT_TOP'] ?? '';
	$uf_seo_text_bottom = $iblock_ufs['UF_SEO_TEXT_BOTTOM'] ?? '';
}
if ($uf_seo_text_top || $uf_seo_text_bottom):
    Extension::load('ui.show_more'); ?>
<script>
    BX.message(<?= CUtil::PhpToJSObject($localization_messages); ?>);
</script>
<?php endif; ?>

<?php if ($uf_seo_text_top): ?>
<div class="seo-text seo-text_top mb-5">
	<?php
	$APPLICATION->IncludeComponent(
		"sprint.editor:blocks",
		".default",
		Array(
			"JSON" => $uf_seo_text_top,
		),
		$component,
		Array(
			"HIDE_ICONS" => "Y"
		)
	); ?>
</div>
<?php endif; ?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "product_categories",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "COUNT_ELEMENTS" => "Y",
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        "FILTER_NAME" => "sectionsFilter",
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
        "SECTION_FIELDS" => array("", ""),
        "SECTION_ID" => "",
        "SECTION_URL" => "",
        "SECTION_USER_FIELDS" => array("", ""),
        "SHOW_PARENT_NAME" => "Y",
        "TOP_DEPTH" => "1",
        "SMALL_CARD_TAG_TITLE" => $arParams["SECTIONS_SMALL_CARD_TAG_TITLE"],
    ),
    $component,
    Array(
        "HIDE_ICONS" => "Y"
    )
);?>

<?php if ($uf_seo_text_bottom): ?>
<div class="seo-text seo-text_bottom mt-5">
	<?php
	$APPLICATION->IncludeComponent(
		"sprint.editor:blocks",
		".default",
		Array(
			"JSON" => $uf_seo_text_bottom,
		),
		$component,
		Array(
			"HIDE_ICONS" => "Y"
		)
	); ?>
</div>
<?php endif; ?>