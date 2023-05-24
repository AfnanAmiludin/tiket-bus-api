<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChairName extends Model
{
    use HasFactory;
    protected $fillable = [
        'chair_type_id',
        'name',
        'row_active'
    ];

    public function chairType()
    {
        return $this->hasMany(ChairType::class, 'id');
    }
    public function busBooking()
    {
        return $this->belongsToMany(User::class, 'buses', 'chair_name_id', 'user_id');
    }
}
