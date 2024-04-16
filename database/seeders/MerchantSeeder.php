<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchant= [
            'id' => 1,
            'user_id' => 1,
            'service_price' => 10000,
            'account_number' => '1234567890',
            'bank_name' => 'BCA',
            'location' => 'Malang',
        ];

        \App\Models\Merchant::create($merchant);
    }
}
