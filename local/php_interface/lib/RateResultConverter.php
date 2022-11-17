<?php

namespace OSMINOZHKA;

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/xml.php');

/**
 * Class RateResultConverter
 *
 * @package OSMINOZHKA
 *
 * @brief Класс конвертирует результат, полученный с cbr.ru, в массив
 */
class RateResultConverter
{
    public static function convertToArray(string $result): array
    {
        $oXmlData = new \CDataXML();

        if ($oXmlData->LoadString($result)) {
            return $oXmlData->GetArray();
        }

        return [];
    }
}