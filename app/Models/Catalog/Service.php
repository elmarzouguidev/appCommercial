<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;

class Service extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;



    public static function boot()
    {

        parent::boot();

        $prefixer = "SRV-";

        static::creating(function ($model) use ($prefixer) {

            $number = (self::max('id') + 1);

            $model->code = $prefixer . str_pad($number, 5, 0, STR_PAD_LEFT);
        });
    }
}
