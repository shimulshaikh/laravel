<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 2) as $index)
        {
        	DB::table('products')->insert([
	            'productName' => $faker->name,
	            'productDesc' => $faker->sentence(5),
	            'price' => $faker->randomDigit,
	            'categoryId' => App\ProductCatagory::inRandomOrder()->first()->id,
	            'slug' => $faker->name
        	]);
        }
    }
}
