<?php

namespace App\Models\Utilities;

use App\Models\Ticket;
use App\Models\User;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    use GetModelByUuid;
    use UuidGenerator;

    protected array $casts = [
        'date_end' => 'date:Y-m-d',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function reception()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
