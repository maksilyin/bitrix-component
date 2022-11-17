<?php

namespace OSMINOZHKA;

use \Bitrix\Main\Web\Uri;
use \Bitrix\Main\Web\HttpClient;
use \Bitrix\Main\Text\Encoding;

/**
 * Class RateLoader
 *
 * @package OSMINOZHKA
 *
 * @brief Класс загружает курсы валют
 */
class RateLoader
{
    protected string $baseUrl = "https://www.cbr.ru/scripts/XML_daily.asp";
    private Uri $uri;
    private HttpClient $httpClient;
    private string $data;
    private string $charset;

    public function __construct($charset = "UTF-8") {
        $this->uri = new Uri($this->baseUrl);
        $this->httpClient = new HttpClient();
        $this->charset = $charset;
    }

    protected function query(): void
    {
        if ($this->httpClient->query('GET', $this->uri)) {
            $this->data = $this->httpClient->getResult();
            $this->data = Encoding::convertEncoding($this->data, "windows-1251", $this->charset);
        }
    }

    public function getData(): array
    {
        if (empty($this->data)) {
            $this->query();
        }

        return RateResultConverter::convertToArray($this->data);
    }
}