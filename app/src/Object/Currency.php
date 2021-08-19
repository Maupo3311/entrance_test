<?php

namespace App\Object;

final class Currency
{
    /** @var string */
    private $name;
    /** @var float */
    private $value;
    /** @var string */
    private $charCode;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name     = $data['Name'] ?? '';
        $this->value    = (float) $data['Value'];
        $this->charCode = $data['CharCode'] ?? '';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getCharCode(): string
    {
        return $this->charCode;
    }
}
