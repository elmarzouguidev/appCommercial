<?php

namespace App\Models\Utilities;

use App\Models\Ticket;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    use GetModelByUuid;
    use UuidGenerator;

    protected $fillable = [
        'name',
        'slug',
        'active'
    ];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_status', 'status_id', 'ticket_id');
    }
}
