<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;

class Product extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;


    public static function boot()
    {

        parent::boot();

        $prefixer = "PROD-";

        static::creating(function ($model) use ($prefixer) {

            $number = (self::max('id') + 1);

            $model->code = $prefixer . str_pad($number, 5, 0, STR_PAD_LEFT);
        });
    }

}
