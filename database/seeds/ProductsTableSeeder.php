<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "title"=> "Coffee",
                "description"=> "Chapman",
                "image"=> "https://via.placeholder.com/250",
                "price"=> 75.99
            ],
            [
                "title"=> "Tea",
                "description"=> "Guava",
                "image"=> "https://via.placeholder.com/250",
                "price"=> 90.99
            ],
            [
                "title"=> "Salad",
                "description"=> "A single aubergine",
                "image"=> "https://via.placeholder.com/250",
                "price"=> 60.5
            ],
            [
                "title"=> "Orange",
                "description"=> "A lovely yellow banana",
                "image"=> "https://via.placeholder.com/250",
                "price"=> 80.9
            ],
            [
                "title"=> "Apple",
                "description"=> "To brush your teeth",
                "image"=> "https://via.placeholder.com/250",
                "price"=> 52.5
            ]
        ];

        foreach ($products as $product) {
            Product::forceCreate($product);
        }
    }
}
