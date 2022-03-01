<?php

namespace App\Models;

use App\Traits\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Category extends Model
{
    use HasFactory;
    use UuidGenerator;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'active',
    ];

    protected array $casts = [
        'active' => 'boolean',
    ];


    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function getIsPublishedAttribute()
    {
        return  $this->attributes['is_published'] ? 'Oui' : 'Non';
    }

    public static function allCategories()
    {
        $categories = app(Pipeline::class)
            ->send(self::query())
            ->through([
                \App\Filters\QueryFilters\Active::class,
                \App\Filters\QueryFilters\Sort::class,
                \App\Filters\QueryFilters\MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(2);
        return $categories;
    }

    /*public function saveableFields(): array
    {

        return [

            'name' => StringField::new(),
            'slug' => SlugField::new(),
            'is_published' => BooleanField::new(),
            //'logo' => ImageField::new(),
            'logo' => ImageField::new()->storeToFolder('categories-photos'),
             'logo' => ImageField::new()
                ->storeToFolder('categories-photos')
                ->fileName(function (UploadedFile $uploadedFile) {
                    //  dd($uploadedFile);
                    return $uploadedFile->getClientOriginalName();

                })
        ];
    }*/
}
