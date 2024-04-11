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

    public function createShippingAddress(array $shippingAddress): ShippingAddress
    {
        return ShippingAddress::create($shippingAddress);
    }
}
