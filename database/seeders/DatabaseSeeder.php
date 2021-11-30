<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'PayU',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/PayU.svg/2560px-PayU.svg.png',
            'cash_on_delivery' => 0
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Płatność przy odbiorze',
            'photo' => 'https://images.sport-shop.pl/data/help/pomoc/cod_logo.png',
            'cash_on_delivery' => 1
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Przelew bankowy - zwykły',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/8/81/Przelew.png',
            'cash_on_delivery' => 0
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Paczkomaty 24/7',
            'photo' => 'https://seeklogo.com/images/I/inpost-logo-F04BCA29D0-seeklogo.com.png',
            'cash_on_delivery' => 0,
            'value' => '10.99'
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Kurier DPD',
            'photo' => 'https://jakimkurierem.pl/logo_kuriera/dpd_logo.svg',
            'cash_on_delivery' => 0,
            'value' => '20.00'
        ]);

        DB::table('delivery_methods')->insert([
            'name' => 'Kurier DPD Pobranie',
            'photo' => 'https://jakimkurierem.pl/logo_kuriera/dpd_logo.svg',
            'cash_on_delivery' => 1,
            'value' => '22.00'
        ]);

        DB::table('codes')->insert([
            'code' => 'BlackWeek',
            'value' => '9.99',
            'is_active' => 1
        ]);

        DB::table('codes')->insert([
            'code' => 'Holidays',
            'value' => '20.01',
            'is_active' => 0
        ]);
    }
}
