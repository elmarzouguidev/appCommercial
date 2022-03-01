<?php

namespace App\Models\Finance;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;

    public function getEditAttribute()
    {
        return route('commercial:providers.edit', $this->uuid);
    }

    public function bCommands()
    {
        return $this->hasMany(BCommand::class);
    }

    public static function boot()
    {

        parent::boot();

        $prefixer = config('app-config.providers.prefix');

        static::creating(function ($model) use ($prefixer) {

            $number = (self::max('id') + 1);

            $model->code = $prefixer . str_pad($number, 5, 0, STR_PAD_LEFT);
        });
    }
}
