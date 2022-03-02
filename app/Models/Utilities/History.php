<?php

namespace App\Models\Utilities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user',
        'detail',
        'action'
    ];

    public function historyable()
    {
        return $this->morphTo();
    }
}
