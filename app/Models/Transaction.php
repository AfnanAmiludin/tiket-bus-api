<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'booking_code',
        'chair_names_id',
        'total_payment',
        'status',
        'bus_chairs_id',
        'midtrans_order_id'
    ];
    public function userTransaction()
    {
        return $this->belongsToMany(User::class, 'user_transactions', 'transactions_id', 'user_id');
    }
}
