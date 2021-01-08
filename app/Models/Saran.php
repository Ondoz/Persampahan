<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $fillabe = [
        'diskripsi'
    ];

    public function persampahan()
    {
        return $this->belongsToMany(persampahan::class);
    }

    public function user()
    {
        return $this->belongsTo(saran::class);
    }
}
