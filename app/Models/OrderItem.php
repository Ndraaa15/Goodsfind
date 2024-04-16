<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\StatusOrder;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total_price_product',
    ];

    protected function casts(): array
    {
        return [
            'condition' => StatusOrder::class,
        ];
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function create_order_item(array $order_item)
    {
        return $this->create($order_item);
    }

    public function get_order_item_by_merchant_id(int $merchantID)
    {
        return $this->with('product')
            ->whereHas('product', function ($query) use ($merchantID) {
                $query->where('merchant_id', $merchantID);
            })
            ->get();
    }

    public function get_order_item_by_order_item_id(int $orderItemID)
    {
        return $this->with('product')
            ->where('id', $orderItemID)
            ->first();
    }

    public function update_order_item(OrderItem $orderItem)
    {
        return $orderItem->save();
    }
}
