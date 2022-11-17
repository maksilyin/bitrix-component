<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * @var array $arParams
 */
global $USER;

if($this->startResultCache(false, $USER->IsAuthorized())) {
    $this->process();

    if (empty($this->arResult['CURRENCY'])) {
        $this->AbortResultCache();
    }

   $this->includeComponentTemplate();
}