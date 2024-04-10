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



    public function getMerchantByUserID(int $id): Merchant
    {
        return Merchant::where('user_id', $id)->first();
    }

    public function getMerchantByID(int $id): Merchant
    {
        return Merchant::where('id', $id)->first();
    }

    public function createMerchant(array $merchant): Merchant
    {
        return Merchant::create($merchant);
    }
}
