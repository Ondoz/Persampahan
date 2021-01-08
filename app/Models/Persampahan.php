<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persampahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sampah',
        'berat',
        'kategoris_id',
        'daerah_id',
        'user_id',
    ];

    public function daerah()
    {
        return $this->belongsTo(daerah::class);
    }

    public function kategories()
    {
        return $this->belongsTo(kategori::class);
    }

    public function saran()
    {
        return $this->belongsToMany(saran::class);
    }
}
