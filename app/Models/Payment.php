<?php

namespace App\Models;

use App\StatusPayment;
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

    protected function casts():array
    {
        return [
            'status_payment' => StatusPayment::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function create_payment(array $payment): Payment
    {
        return Payment::create($payment);
    }

    public function get_payment_by_order_id(int $orderID): Payment
    {
        return Payment::where('order_id', $orderID)->first();
    }

    public function update_payment(Payment $payment): bool
    {
        return $payment->save();
    }
}
