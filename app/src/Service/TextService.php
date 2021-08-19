<?php

namespace App\Service;

use App\Object\Currency;

final class TextService
{
    /**
     * @param Currency $currency A Currency instance.
     * @return string
     */
    public function formulateResponseAboutCurrency(Currency $currency): string
    {
        return "1 {$currency->getName()} равен {$currency->getValue()} " . $this->getDeclensionByNumber($currency->getValue());
    }

    /**
     * @param float $number Currency value.
     * @return string
     */
    private function getDeclensionByNumber(float $number): string
    {
        $intValue = (int) $number;
        $strValue = (string) $intValue;

        $lastNumbers = substr($strValue, -2);
        if ($lastNumbers === '11') {
            return 'рублям';
        }

        $lastNumber = substr($strValue, -1);
        if ($lastNumber === '1') {
            return 'рублю';
        }

        return 'рублям';
    }
}
