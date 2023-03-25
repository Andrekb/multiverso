<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'headline',
        'weight',
        'height',
        'width',
        'lenght'
    ];

    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'products_stores', 'product_id', 'store_id')->withPivot('stock');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
