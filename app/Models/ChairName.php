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
    public function busChair()
    {
        return $this->belongsToMany(Bus::class, 'bus_chairs', 'chair_name_id', 'buses_id');
    }
}
