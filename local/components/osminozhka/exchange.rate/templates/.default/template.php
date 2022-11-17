<?php
/**
 * @var array $arResult
 * @var array $arParams
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?php if (!empty($arResult['CURRENCY'])) { ?>
    <div class = "rate">
        <h2><?=GetMessage('OSMINOZHKA_CARRUNCY_TITLE');?></h2>
        <?php foreach ($arResult['CURRENCY'] as $arItem) { ?>
            <div><?=$arItem['CODE']?>: <?=$arItem['VALUE_WITH_PERCENT']?></div>
        <?php } ?>
    </div>
<?php } ?>