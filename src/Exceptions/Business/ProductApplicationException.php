<?php

namespace Src\Exceptions\Business;

use Src\Exceptions\Contract\BusinessException;

class ProductApplicationException extends BusinessException
{
    public static function canNotHaveNegativePrice(): self
    {
        return new self('SingleProduct can not have negative price');
    }

    public static function discountMustBeBetweenZeroAndHundred(): self
    {
        return new self('Discount must be between zero and hundred');
    }
}