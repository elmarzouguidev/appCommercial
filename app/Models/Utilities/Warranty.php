<?php

namespace App\Models\Utilities;

use App\Models\Ticket;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;
    use GetModelByUuid;
    use UuidGenerator;

    protected $fillable = ['ticket_id', 'start_at', 'end_at', 'description', 'active', 'notify_admin', 'notify_client'];

    protected array $casts = [

        'start_at' => 'date:d-m-Y',
        'end_at' => 'date:d-m-Y',
        'active' => 'boolean',
        'notify_admin' => 'boolean',
        'notify_client' => 'boolean',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
