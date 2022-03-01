<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Category extends Model
{
    use HasFactory;
    use UuidGenerator;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'active',
    ];

    protected  $casts = [
        'active' => 'boolean',
    ];


    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function getIsPublishedAttribute()
    {
        return  $this->attributes['is_published'] ? 'Oui' : 'Non';
    }
}
