<?php

namespace App\Models\Finance;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BCommand extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;

    protected array $casts = [
        'date_command' => 'date:Y-m-d',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function articles()
    {
        return $this->morphMany(Article::class, 'articleable');
    }

    public function getEditUrlAttribute()
    {
        return route('commercial:bcommandes.edit', $this->uuid);
    }

    public function getUrlAttribute()
    {
        return route('commercial:bcommandes.single', $this->uuid);
    }

    public function getFormatedPriceHtAttribute()
    {
        return number_format($this->price_ht, 2);
    }

    public function getFormatedPriceTotalAttribute()
    {
        return number_format($this->price_total, 2);
    }

    public function getFormatedTotalTvaAttribute()
    {
        return number_format($this->price_tva, 2);
    }

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {

            if ($model->company->bCommands->count() <= 0) {
                //dd('OOO empty');
                $number = $model->company->bcommand_start_number;
            } else {
                //dd('Not empty ooo');
                $number = ($model->company->bCommands->max('code') + 1);
            }

            $code = str_pad($number, 5, 0, STR_PAD_LEFT);

            $model->code = $code;

            $model->full_number = $model->company->prefix_bcommand . $code;
        });
    }
}
