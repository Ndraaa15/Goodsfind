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

    public function user()
    {
        return Order::belongsTo(User::class, 'user_id', 'id');
    }

    public function order_items()
    {
        return Order::hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }

    public function create_order(array $order)
    {
        return Order::create($order);
    }

    public function get_order_by_user_id(int $user_id)
    {
        return Order::with(['order_items.product', 'payment'])
            ->where('user_id', $user_id)
            ->get();
    }
}
