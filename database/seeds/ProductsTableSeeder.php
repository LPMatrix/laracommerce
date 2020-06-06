<?php

use App\Products;
use Faker\Factory as Faker;
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
        $faker = Faker::create('App\Products');
        for ($i=0; $i <= 20 ; $i++) { 
            
        DB::table('products')->insert([
            'user_id' => $faker->randomNumber(1),
            'name' => $faker->company,
            'description' => $faker->paragraph(5),
            'image' => $faker->imageUrl($width = 500, $height = 500),
            'price' => $faker->randomNumber(2),
            
          ]);
        }
    }
}
