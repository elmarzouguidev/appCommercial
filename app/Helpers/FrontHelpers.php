<?php

namespace App\Helpers;

Trait FrontHelpers
{


    public function tryHello(): string
    {
        return "Hello Ticket Application";
    }

    public function calculateNumber()
    {
        return 5*5;
    }
}
