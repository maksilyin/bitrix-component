<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "PARAMETERS" => Array(
        "PERCENT_FOR_AUTH" => Array(
            "NAME" => GetMessage("OSMINOZHKA_PERCENT_FOR_AUTH"),
            "TYPE" => "INTEGER",
            "DEFAULT" => 0,
        ),
        "PERCENT_FOR_NO_AUTH" => Array(
            "NAME" => GetMessage("OSMINOZHKA_PERCENT_FOR_NO_AUTH"),
            "TYPE" => "INTEGER",
            "DEFAULT" => 0,
        ),
        "CURRENCY" => Array(
            "NAME" => GetMessage("OSMINOZHKA_CURRENCY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "DEFAULT" => [
                "USD",
                "EUR",
            ],
            "VALUES" => [
                "USD" => "USD",
                "EUR"=> "EUR",
            ]
        ),
    ),
);