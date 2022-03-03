<?php

namespace App\Models\Finance;

use App\Models\Client;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;


    protected $fillable = [
        'bill_date',
        'bill_mode',
        'reference',
        'notes',
        'price_total',
        'billable_id',
        'billable_type',
    ];

    protected  $casts = [
        'bill_date' => 'date:Y-m-d',
    ];

    public function billable()
    {
        return $this->morphTo();
    }

    /* public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }*/

    public function getFormatedPriceTotalAttribute()
    {
        return number_format($this->sum('price_total'), 2);
    }

    public function getEditUrlAttribute()
    {
        return route('commercial:bills.edit', $this->uuid);
    }

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {

            $number = self::max('id') + 1;
            $model->code = str_pad($number, 5, 0, STR_PAD_LEFT);
            $model->full_number = 'REGL-' . str_pad($number, 5, 0, STR_PAD_LEFT);
        });
    }
}
