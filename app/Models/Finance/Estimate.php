<?php

namespace App\Models\Finance;

use App\Models\Client;
use App\Models\Ticket;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Estimate extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;
    //use SoftDeletes;

    protected $fillable = [
        'is_invoiced',
        'code',
        'full_number',
        'price_ht',
        'price_total',
        'price_tva',
        'status',
        'estimate_date',
        'due_date',
        'invoice_id',
        'client_id',
        'is_send',
        'active'
    ];

    protected  $with = [];

    //protected $dates = ['due_date', 'estimate_date'];

    protected   $casts = [
        'is_send' => 'boolean',
        'due_date' => 'date:Y-m-d',
        'estimate_date' => 'date:Y-m-d',
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
        return route('commercial:estimates.single', $this->uuid);
    }

    public function getEditUrlAttribute()
    {
        return route('commercial:estimates.edit', $this->uuid);
    }

    public function getUpdateUrlAttribute()
    {
        return route('commercial:estimates.update', $this->uuid);
    }

    public function getCreateInvoiceUrlAttribute()
    {
        return route('commercial:estimates.create.invoice', $this->uuid);
    }

    public function getInvoiceUrlAttribute()
    {
        return route('commercial:invoices.single', optional($this->invoice)->uuid);
    }

    public function getPdfUrlAttribute()
    {
        return route('public.show.estimate', ['estimate' => $this->uuid, 'logo' => optional($this->company)->logo]);
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->published_at->lessThanOrEqualTo(Carbon::now());
    }

    public function getFullDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $date->translatedFormat('d') . ' ' . $date->translatedFormat('F') . ' ' . $date->translatedFormat('Y');
    }

    public function scopeFiltersCompanies(Builder $query, $company)
    {
        //$company = Company::whereUuid($company)->firstOrFail()->id;

        return $query->where('company_id', $company);
    }

    public function scopeFiltersPeriods(Builder $query, $period): Builder
    {
        //dd($period);
        if ($period == 1) {
            return $query->whereBetween(
                'created_at',
                [
                    now()->startOfYear()->startOfQuarter(),
                    now()->startOfYear()->endOfQuarter(),
                ]
            );
        }
        if ($period == 2) {
            return $query->whereBetween(
                'created_at',
                [
                    now()->startOfYear()->addMonths(3)->startOfQuarter(),
                    now()->startOfYear()->addMonths(3)->endOfQuarter(),
                ]
            );
        }
        if ($period == 3) {
            return $query->whereBetween(
                'created_at',
                [
                    now()->startOfYear()->addMonths(6)->startOfQuarter(),
                    now()->startOfYear()->addMonths(6)->endOfQuarter(),
                ]
            );
        }
        if ($period == 4) {
            return $query->whereBetween(
                'created_at',
                [
                    now()->startOfYear()->addMonths(9)->startOfQuarter(),
                    now()->startOfYear()->addMonths(9)->endOfQuarter(),
                ]
            );
        }
    }

    public function scopeFiltersDate(Builder $query, $from, $to): Builder
    {
        return $query->whereBetween(
            'created_at',
            [
                Carbon::createFromFormat('Y-m-d', $from)->format('Y-m-d'),
                Carbon::createFromFormat('Y-m-d', $to)->format('Y-m-d')
            ]
        );
    }

    public function scopeDashboard(Builder $query)
    {
        return $query->select(['id', 'uuid', 'full_number', 'price_ht', 'price_tva', 'price_total', 'is_invoiced', 'due_date', 'estimate_date', 'created_at']);
    }

    public function scopeEstimatesNotsend($query)
    {
        return $query->whereIsSend(false)->count();
    }

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {


            if (self::count() <= 0) {

                $number = getDocument()->estimate_start;
            } else {

                $number = ($model->max('code') + 1);
            }

            $code = str_pad($number, 5, 0, STR_PAD_LEFT);

            $model->code = $code;

            $model->full_number = getDocument()->estimate_prefix . $code;
        });
    }
}
