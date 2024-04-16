<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_price',
        'shipping_price',
        'account_number',
        'bank_name',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function create_merchant(array $merchant): Merchant
    {
        return Merchant::create($merchant);
    }

    public function get_merchant_by_user_id(int $id): Merchant
    {
        return Merchant::where('user_id', $id)
        ->first();
    }

    public function get_merchant_by_id(int $id): Merchant
    {
        return Merchant::where('id', $id)
        ->first();
    }

    public function update_merchant(Merchant $merchant): bool
    {
        return $merchant->save();
    }
}
