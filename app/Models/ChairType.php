<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChairType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public function chairName()
    {
        return $this->belongsTo(ChairName::class, 'id');
    }
}
