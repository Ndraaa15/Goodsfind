<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'shipping_price',
        'shipping_type',
        'service_price',
        'total_payment',
        'status_payment',
        'payment_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createPayment(array $payment): Payment
    {
        return Payment::create($payment);
    }
}
