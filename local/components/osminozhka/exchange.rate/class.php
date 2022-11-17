<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/xml.php');

use OSMINOZHKA\RateLoader;


class OsminozhkaExchangeRateComponent extends CBitrixComponent
{
    public function process()
    {
        $arData = $this->getData();
        $this->prepareData($arData);
    }

    private function getData(): array
    {
        $rateLoader = new RateLoader();
        return $rateLoader->getData();
    }

    private function prepareData($arData): void
    {
        global $USER;

        $this->arResult['CURRENCY'] = [];
        $percent = $this->arParams['PERCENT_FOR_NO_AUTH'];

        if ($USER->IsAuthorized()) {
            $percent = $this->arParams['PERCENT_FOR_AUTH'];
        }

        foreach ($arData["ValCurs"]["#"]["Valute"] as $arItem) {
            if (!in_array($arItem['#']['CharCode'][0]['#'], $this->arParams['CURRENCY'])) {
                continue;
            }
            $valueWithPercent = $value = str_replace(",", ".", $arItem['#']['Value'][0]['#']);

            if ($percent) {
                $valueWithPercent = $value + $value * ($percent / 100);
            }

            $this->arResult['CURRENCY'][] = [
                'CODE' => $arItem['#']['CharCode'][0]['#'],
                'NAME' => $arItem['#']['Name'][0]['#'],
                'VALUE' => $value,
                'VALUE_WITH_PERCENT' => number_format($valueWithPercent, 4),
            ];
        }
    }
}