<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Sampah extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'uuid',
        'nama',
        'slug',
        'harga'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->uuid = Uuid::uuid4();
        });
    }
}
