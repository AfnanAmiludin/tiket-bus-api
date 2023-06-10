<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusChair extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'buses_id',
        'chair_name_id',
        'row_active'
    ];
    public function bus()
    {
        return $this->hasMany(Bus::class, 'id');
    }
    public function chairName()
    {
        return $this->hasMany(ChairName::class, 'id');
    }
}
