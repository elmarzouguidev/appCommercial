<?php

namespace App\Models\Utilities;

use App\Models\Client;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
        'telephone',
        'primary',
        'active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected  $casts = [
        //'email_verified_at' => 'datetime',
    ];


    public function telephoneable()
    {
        return $this->morphTo();
    }
}
