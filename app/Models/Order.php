<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'total_price',
    ];

    public function user()
    {
        return Order::belongsTo(User::class);
    }

    public function payment()
    {
        return Order::belongsTo(Payment::class);
    }

    public function addOrder(array $order)
    {
        return Order::create($order);
    }
}
