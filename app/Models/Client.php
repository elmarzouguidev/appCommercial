<?php

namespace App\Models;


use App\Models\Finance\Company;
use App\Models\Finance\Invoice;
use App\Models\Finance\InvoiceAvoir;
use App\Models\Utilities\Email;
use App\Models\Utilities\Telephone;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Model implements HasMedia
{

    use HasFactory;
    use UuidGenerator;
    use InteractsWithMedia;
    use GetModelByUuid;

    protected $fillable = [
        'entreprise',
        'contact',
        'telephone',
        'email',
        'addresse',
        'rc',
        'ice',
        'description',
        'logo'
    ];

    public function telephones()
    {
        return $this->morphMany(Telephone::class, 'telephoneable');
    }

    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    public function invoicesAvoir()
    {
        return $this->hasMany(InvoiceAvoir::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function getEditAttribute()
    {
        return route('admin:client.edit', $this->uuid);
    }

    public function getUpdateAttribute()
    {
        return route('admin:client.update', $this->uuid);
    }

    public function getUrlAttribute()
    {
        return route('admin:clients.show', $this->uuid);
    }

    public function getFullDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $date->translatedFormat('d') . ' ' . $date->translatedFormat('F') . ' ' . $date->translatedFormat('Y');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->sharpen(10);
    }

    public static function boot()
    {

        parent::boot();

        $prefixer = config('app-config.clients.prefix');

        static::creating(function ($model) use ($prefixer) {

            $number = (self::max('id') + 1);

            $model->code = $prefixer . str_pad($number, 5, 0, STR_PAD_LEFT);

        });
    }
}
