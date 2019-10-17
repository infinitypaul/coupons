<?php

use App\Coupon;
use App\MinimumQuantityCoupon;
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
            'coupon_type' => 'App\MinimumQuantityCoupon',
            'coupon_id' => MinimumQuantityCoupon::create([
                'value' => 100,
                'quantity' => 1,
                'amount' => 50
            ])->id,

        ]);

        Coupon::create([
            'code' => 'PERCENT10',
            'coupon_type' => 'App\MinimumQuantityCoupon',
            'coupon_id' => MinimumQuantityCoupon::create([
                'percent_off' => 10,
                'quantity' => 2,
                'amount' => 100
            ])->id,

        ]);

        Coupon::create([
            'code' => 'MIXED10',
            'coupon_type' => 'App\MinimumQuantityCoupon',
            'coupon_id' => MinimumQuantityCoupon::create([
                'percent_off' => 10,
                'value' => 10,
                'quantity' => 3,
                'amount' => 200
            ])->id,
        ]);

        Coupon::create([
            'code' => 'REJECTED100',
            'coupon_type' => 'App\MinimumQuantityCoupon',
            'coupon_id' => MinimumQuantityCoupon::create([
                'percent_off' => 10,
                'value' => 10,
                'amount' => 1000
            ])->id,
        ]);

        Coupon::create([
            'code' => 'ABCDE',
            'coupon_type' => 'App\FixedValueCoupon',
            'coupon_id' => \App\FixedValueCoupon::create([
                'value' => 10
            ])->id,
        ]);

        Coupon::create([
            'code' => 'ABC',
            'coupon_type' => 'App\PercentOffCoupon',
            'coupon_id' => \App\PercentOffCoupon::create([
                'percent_off' => 20
            ])->id,
        ]);

    }
}
