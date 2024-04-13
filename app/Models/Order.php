<?php

namespace App\Models;

use App\StatusOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'total_price',
        'status_order',
    ];

    protected function casts():array
    {
        return [
            'condition' => StatusOrder::class,
        ];
    }

    public function user()
    {
        return Order::belongsTo(User::class);
    }

    public function payment()
    {
        return Order::belongsTo(Payment::class);
    }

    public function create_order(array $order)
    {
        return Order::create($order);
    }
}
