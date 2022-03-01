<?php

namespace App\Models\Utilities;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
