<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class productCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index)
        {
        	DB::table('product_catagories')->insert([
	            'brandName' => $faker->company,
	            'slug' => $faker->name
        	]);
        }
    }
}
