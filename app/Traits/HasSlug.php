<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

trait HasSlug
{

    public static function bootUuidGenerator(): void
    {
        static::creating(function ($model) {

            if (Schema::hasColumn($model->getTable(), 'slug')) {

                $model->slug = Str::slug($model->name);
            }
        });
    }
}
