<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;




class ProductsChart extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker::create();
            foreach (range(1,10) as $index){
                DB::table('products')->insert([

                    'name'=>$faker->name,
                    'reference'=>$faker->title,
                    'price'=>$faker->randomFloat(1,100),
                    'quantity'=>$faker->randomFloat(1,100),
                    'shippingCost'=>$faker->randomFloat(1,100),
                    'description'=>$faker->sentence(5),
                    'image'=>$faker->title,
                    'created_at' => now(),
                    'updated_at' => now()

                ]);
            }
    }

}
