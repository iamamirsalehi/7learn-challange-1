<?php

namespace Src\Exceptions\Business;

use src\Exceptions\Contract\BusinessException;

class ProductApplicationException extends BusinessException
{
    public static function canNotHaveNegativePrice(): self
    {
        return new self('ProductItem can not have negetive price');
    }

    public static function discountMustBeBetweenZeroAndHundred(): self
    {
        return new self('Discount must be between zero and hundred');
    }
}