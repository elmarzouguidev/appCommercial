<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{

    use FrontHelpers;
    use BackHelpers;
    use CalculatorHelpers;
    use InvoiceHelpers;


    public static function new()
    {
        return new self;
    }

    public function getName(): string
    {
        return "Abdelghafour Elmarzougui";
    }

    public function image($path)
    {
        return Storage::url($path);
    }

    function activeGuard()
    {

        foreach (array_keys(config('auth.guards')) as $guard) {

            if (auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
}
