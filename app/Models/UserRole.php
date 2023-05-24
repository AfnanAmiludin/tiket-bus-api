<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id'
    ];

    public function role()
    {
        return $this->hasMany(Role::class, 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
}
