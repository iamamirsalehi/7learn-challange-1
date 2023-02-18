<?php

namespace Src\Exceptions\Business;

use Src\Exceptions\BusinessException;

class ProductApplicationException extends BusinessException
{
    public static function canNotHaveNegativePrice(): self
    {
        return new self('Product can not have negetive price');
    }

    public static function discountMustBeBetweenZeroAndHundred(): self
    {
        return new self('Discount must be between zero and hundred');
    }
}