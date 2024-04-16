<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'company_name',
        'country',
        'province',
        'city',
        'postal_code',
        'phone',
        'email',
        'detail_address',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function create_shipping_address(array $shippingAddress): ShippingAddress
    {
        return ShippingAddress::create($shippingAddress);
    }

    public function get_shipping_address_by_order_id(int $orderID): ShippingAddress
    {
        return ShippingAddress::where('order_id', $orderID)->first();
    }
}
