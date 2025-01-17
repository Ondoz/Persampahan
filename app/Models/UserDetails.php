<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $table = 'users_details';

    protected $fillable = ['user_id', 'ttl', 'address'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
