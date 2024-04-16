<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipping_addresses =
            [[
                'id' => 1,
                'order_id' => 1,
                'name' => 'John Doe',
                'company_name' => 'PT. ABC',
                'country' => 'Indonesia',
                'province' => 'DKI Jakarta',
                'city' => 'Jakarta',
                'postal_code' => '12345',
                'phone' => '08123456789',
                'email' => 'indrabrata599@gmail.com',
                'detail_address' => 'Jl. Jend. Sudirman No. 1',
            ]];

        foreach ($shipping_addresses as $shipping_address) {
            ShippingAddress::create($shipping_address);
        }
    }
}
