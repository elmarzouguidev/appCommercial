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

    protected  $casts = [
        'date_command' => 'date:Y-m-d',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
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

            if (self::count() <= 0) {

                $number = getDocumentStart()->bc_start;
            } else {

                $number = ($model->max('code') + 1);
            }

            $code = str_pad($number, 5, 0, STR_PAD_LEFT);

            $model->code = $code;

            $model->full_number = getDocumentPrefix()->bc_prefix . $code;
        });
    }
}
