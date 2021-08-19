<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class CurrencyException extends Exception
{
    /**
     * @param string $currency Currency.
     * @return CurrencyException
     */
    public static function specifiedCurrencyWasNotFound(string $currency): CurrencyException
    {
        return new self(
            "\"{$currency}\" currency not found",
            Response::HTTP_NOT_FOUND
        );
    }

    /**
     * @return CurrencyException
     */
    public static function dataNotCollected(): CurrencyException
    {
        return new self(
            'Failed to get data about currencies from https://www.cbr-xml-daily.ru/daily_json.js',
            Response::HTTP_BAD_REQUEST
        );
    }
}
