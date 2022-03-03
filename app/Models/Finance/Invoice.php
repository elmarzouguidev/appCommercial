<?php

namespace App\Models\Finance;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\Utilities\History;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Invoice extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;
    //use SoftDeletes;

    protected $fillable = ['status', 'type', 'is_paid'];

    // protected $dates = ['due_date'];

    protected  $casts = [
        'due_date' => 'date:Y-m-d',
        'invoice_date' => 'date:Y-m-d',
    ];

    public function avoir()
    {
        return $this->hasOne(InvoiceAvoir::class);
    }

    public function estimate()
    {
        return $this->hasOne(Estimate::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function articles()
    {
        return $this->morphMany(Article::class, 'articleable');
    }

    public function histories()
    {
        return $this->morphMany(History::class, 'historyable');
    }

    public function bill()
    {
        return $this->morphOne(Bill::class, 'billable');
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
        return route('commercial:invoices.single', $this->uuid);
    }

    public function getEditUrlAttribute()
    {
        return route('commercial:invoices.edit', $this->uuid);
    }

    public function getUpdateUrlAttribute()
    {
        return route('commercial:invoices.update', $this->uuid);
    }

    public function getPdfUrlAttribute()
    {
        return route('commercial:invoices.pdf.build', $this->uuid);
    }

    public function getAddBillAttribute()
    {
        return route('commercial:bills.addBill', $this->uuid);
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->published_at->lessThanOrEqualTo(Carbon::now());
    }

    public function getIsPassedAttribute(): bool
    {
        return $this->date_due->lessThanOrEqualTo(Carbon::now());
    }


    public function getFullDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $date->translatedFormat('d') . ' ' . $date->translatedFormat('F') . ' ' . $date->translatedFormat('Y');
    }

    /*******Filters
     * @param Builder $query
     * @param $company
     * @return Builder
     */
    public function scopeFiltersCompanies(Builder $query, $company)
    {
        //$company = Company::whereUuid($company)->firstOrFail()->id;

        return $query->where('company_id', $company);
    }

    public function scopeFiltersClients(Builder $query, $client)
    {
        //$company = Company::whereUuid($company)->firstOrFail()->id;

        return $query->where('client_id', $client);
    }

    public function scopeFiltersStatus(Builder $query, $status)
    {
        // dd($status);
        return $query->whereStatus($status);
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
        return $query->select(['id', 'uuid', 'full_number', 'price_ht', 'price_tva', 'price_total', 'status', 'due_date', 'created_at']);
    }

    public function getBillablePrice()
    {
        if ($this->bill()->count() && $this->bill()->sum('price_total') > 0  && $this->bill()->sum('price_total') < $this->price_total) {
            //dd('Ouii');
            return $this->price_total - $this->bill()->sum('price_total');
        } else {
            return $this->price_total;
        }
    }

    public static function boot()
    {

        parent::boot();

        static::creating(function ($model) {


            if (self::count() <= 0) {

                $number = getDocument()->invoice_start;
            } else {

                $number = ($model->max('code') + 1);
            }

            $code = str_pad($number, 5, 0, STR_PAD_LEFT);

            $model->code = $code;

            $model->full_number = getDocument()->invoice_prefix . $code;
        });
    }
}
