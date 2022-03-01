<?php

namespace App\Helpers;

use Carbon\Carbon;

trait CalculatorHelpers
{


    public function daysBeforCancelOrder($date): bool
    {
        $to = Carbon::createFromFormat('Y-m-d H:s:i', $date);

        $from = Carbon::createFromFormat('Y-m-d H:s:i', now());

        $diff_in_days = $to->diffInDays($from);

        return $diff_in_days >= 15;
    }

}
