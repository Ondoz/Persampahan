<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Daerah extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'status'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->uuid = Uuid::uuid4();
        });
    }

    public function persamapahan()
    {
        return $this->hasOne(persampahan::class);
    }
}
