<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // mass assigment
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'price',
        'stock',
        'is_popular',
        'category_id', // foreign key
        'brand_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand(): BelongsTo 
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function photos(): HasMany 
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function sizes(): HasMany 
    {
        return $this->hasMany(ProductSize::class);
    }
}
