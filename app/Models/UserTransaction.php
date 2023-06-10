<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transactions_id'
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id');
    }
}
