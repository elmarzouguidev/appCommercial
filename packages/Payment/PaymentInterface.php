<?php

namespace Elmarzougui\Payment;

interface PaymentInterface
{


    public function getPaymentMethod(string $name);
}
