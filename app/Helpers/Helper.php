<?php

namespace App\Helpers;
class Helper
{

    use CalculatorHelpers;
    use InvoiceHelpers;

    public static function new()
    {
        return new self;
    }

}
