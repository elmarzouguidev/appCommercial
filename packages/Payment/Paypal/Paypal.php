<?php

namespace Elmarzougui\Payment\Paypal;

use Elmarzougui\Payment\PaymentInterface;

class Paypal  implements PaymentInterface
{

    public function getPaymentMethod(string $name): string
    {

        return $name;
    }
}
