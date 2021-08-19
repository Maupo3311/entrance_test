<?php

namespace App\Service;

use App\Exception\CurrencyException;
use App\Object\Currency;

final class CurrencyService
{
    /** @var string */
    private $currencyFilePath;
    /** @var array */
    private $currencyData = [];

    /**
     * @throws CurrencyException If it was not possible to get data about currencies.
     */
    public function __construct(string $currencyFilePath)
    {
        $this->currencyFilePath = $currencyFilePath;
        $this->insertCurrencyData();
    }

    /**
     * Get random currency.
     *
     * @return Currency
     */
    public function getRandCurrency(): Currency
    {
        $charCode = array_rand($this->currencyData);

        return new Currency($this->currencyData[$charCode]);
    }

    /**
     * Get currency data by currency name.
     *
     * @param string $charCode Currency name.
     * @return Currency
     * @throws CurrencyException If the specified currency is not found.
     */
    public function getCurrency(string $charCode): Currency
    {
        if (!isset($this->currencyData[$charCode])) {
            throw CurrencyException::specifiedCurrencyWasNotFound($charCode);
        }

        return new Currency($this->currencyData[$charCode]);
    }

    /**
     * Update currency data by daily_json.js file.
     *
     * @throws CurrencyException If it was not possible to get data about currencies.
     */
    private function insertCurrencyData(): void
    {
        $content = file_get_contents($this->currencyFilePath);
        $content = json_decode($content, true);
        if (empty($content['Valute'])) {
            throw CurrencyException::dataNotCollected();
        }
        $this->currencyData = $content['Valute'];
    }
}
