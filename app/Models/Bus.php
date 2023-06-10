<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'origin_destination',
        'price'
    ];

    public function busChair()
    {
        return $this->belongsToMany(ChairName::class, 'bus_chairs', 'buses_id', 'chair_name_id');
    }
}
