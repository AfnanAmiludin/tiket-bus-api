<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'chair_name_id',
        'user_id'
    ];
    public function chairName()
    {
        return $this->hasMany(ChairName::class, 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
}
