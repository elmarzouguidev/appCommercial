<?php

namespace App\Models\Utilities;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;

    protected $fillable = [
        'email',
        'primary',
        'active'
    ];

    public function emailable()
    {
        return $this->morphTo();
    }
}
