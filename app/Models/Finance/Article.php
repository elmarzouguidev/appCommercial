<?php

namespace App\Models\Finance;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use HasFactory;
    use UuidGenerator;
    //use SoftDeletes;

    protected $fillable = [
        'articleable_id',
        'articleable_type',
        'designation',
        'description',
        'quantity',
        'prix_unitaire',
        'montant_ht',
    ];

    protected array $casts = [
        'quantity' => 'integer',
        'montant_ht' => 'float',
        'prix_unitaire' => 'float'
    ];

    public function articleable()
    {
        return $this->morphTo();
    }

    public function getFormatedMontantHtAttribute()
    {
        return number_format($this->montant_ht, 2);
    }

    public function getFormatedPrixUnitaireAttribute()
    {
        return number_format($this->prix_unitaire, 2);
    }
}
