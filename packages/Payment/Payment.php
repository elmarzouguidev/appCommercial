<?php

namespace Elmarzougui\Payment;

class Payment
{

    /***** Call Static *****/
    public static function _payment(): Payment
    {
        return new self;
    }

    public function getPayment(): string
    {
        return "Hello from pyament class";
    }
}
