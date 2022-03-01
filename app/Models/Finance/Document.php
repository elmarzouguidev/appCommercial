<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\GetModelByUuid;
use App\Traits\UuidGenerator;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Document extends Model implements HasMedia
{
    use HasFactory;
    use GetModelByUuid;
    use UuidGenerator;
    use InteractsWithMedia;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function estimate()
    {
        return $this->belongsTo(Invoice::class);
    }
}
