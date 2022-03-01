<?php

namespace App\Models\Utilities;

use App\Collections\Report\ReportCollection;

use App\Models\Ticket;
use App\Models\User;
use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Report extends Model
{
    use HasFactory;
    use UuidGenerator;

    protected $fillable = [

        'uuid',
        'content',
        'type',
        'user_id',
        'ticket_id',
        'active',
        'close_report'
    ];

    protected array $casts = [

        'active' => 'boolean',
        'close_report' => 'boolean',
        'user_id' => 'integer',
        'ticket_id' => 'integer',
    ];

    public function getFullDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        return $date->format('d') . ' ' . $date->format('F') . ' ' . $date->format('Y');
    }

    public function getTicketUrlAttribute()
    {
        return route('admin:tickets.diagnose', $this->ticket->uuid);
    }

    public function getSingleUrlAttribute()
    {
        return route('admin:reparations.single', $this->ticket->uuid);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class)->withDefault();
    }

    public function technicien()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function newCollection(array $models = [])
    {
        return new ReportCollection($models);
    }

}
