<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GetModelByUuid;
use App\Traits\HasCode;
use App\Traits\UuidGenerator;

class Brand extends Model
{
    use HasFactory;
    use UuidGenerator;
    use GetModelByUuid;
    use HasCode;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
