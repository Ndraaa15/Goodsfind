<?php

namespace App\ThirdParty;


class Midtrans
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = '<your server key>';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function chargeCoreApi($params)
    {
        return \Midtrans\CoreApi::charge($params);
    }
}
