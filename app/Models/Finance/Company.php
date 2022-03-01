<?php

namespace App\Models\Finance;

use App\Models\Client;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{

    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'website',
        'logo',
        'city',
        'addresse',
        'telephone',
        'email',
        'rc',
        'ice',
        'cnss',
        'patente',
        'if',
        'prefix_invoice'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function invoicesAvoir()
    {
        return $this->hasMany(InvoiceAvoir::class);
    }

    public function estimates()
    {
        return $this->hasMany(Estimate::class);
    }

    public function bCommands()
    {
        return $this->hasMany(BCommand::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function getEditUrlAttribute()
    {
        return route('commercial:companies.edit', $this->uuid);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(180)
            ->sharpen(10);
    }
}
