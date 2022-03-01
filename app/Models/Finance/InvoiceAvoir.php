<?php

namespace App\Models\Finance;

use App\Models\Client;
use App\Models\Ticket;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceAvoir extends Model
{
    use HasFactory;
   // use SoftDeletes;
    use GetModelByUuid;
    use UuidGenerator;

    protected $fillable = ['status', 'type'];

    protected  $casts = [
        'due_date' => 'date:Y-m-d',
        'invoice_date' => 'date:Y-m-d',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function articles()
    {
        return $this->morphMany(Article::class, 'articleable');
    }

    public function bill()
    {
        return $this->morphOne(Bill::class, 'billable')->withDefault();
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

    public function getUrlAttribute()
    {
        return route('commercial:invoices.single.avoir', $this->uuid);
    }

    public function getEditUrlAttribute()
    {
        return route('commercial:invoices.edit.avoir', $this->uuid);
    }

    public function getUpdateUrlAttribute()
    {
        return route('commercial:invoices.update.avoir', $this->uuid);
    }

    public function getPdfUrlAttribute()
    {
        return route('commercial:invoices.pdf.build.avoir', $this->uuid);
    }

    public function getAddBillAttribute()
    {
        return route('commercial:bills.addBill.avoir', $this->uuid);
    }

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {


            if (self::count() <= 0) {

                $number = getDocument()->invoice_avoir_start;
            } else {

                $number = ($model->max('code') + 1);
            }

            $code = str_pad($number, 5, 0, STR_PAD_LEFT);

            $model->code = $code;

            $model->full_number = getDocument()->invoice_avoir_prefix . $code;
        });
    }
}
