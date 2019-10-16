<?php

use App\Rule;
use Illuminate\Database\Seeder;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rule::create([
            'name' => 'Testing1',
            'price' => 10,
            'item' => 1
        ]);

        Rule::create([
            'name' => 'Testing2',
            'price' => 100,
            'item' => 2
        ]);

        Rule::create([
            'name' => 'Testing3',
            'price' => 200,
            'item' => 3
        ]);

        Rule::create([
            'name' => 'Testing4',
            'price' => 1000
        ]);
    }
}
