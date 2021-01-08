<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class DataTransaksiNasabah extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'user_id',
        'debet',
        'kredit',
        'keterangan'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->uuid = Uuid::uuid4();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
