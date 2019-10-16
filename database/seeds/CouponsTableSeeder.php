<?php

use App\Coupon;
use App\Rule;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'FIXED10',
            'type' => 'fixed',
            'value' => 10,
            'rule_id' => Rule::create([
                'name' => 'Testing1',
                'price' => 10.00,
                'items' => 1
            ])->id
        ]);
        Coupon::create([
            'code' => 'PERCENT10',
            'type' => 'percent',
            'value' => 10,
            'rule_id' => Rule::create([
                'name' => 'Testing2',
                'price' => 100.00,
                'items' => 2
            ])->id
        ]);
    }
}
