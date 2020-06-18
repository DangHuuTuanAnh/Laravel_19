<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=1; $i <= 5; $i++) { 
        	DB::table('orders')->insert([
        		'user_id'=>$faker->randomDigitNot(0),
        		'product_id'=>$faker->randomDigitNot(0),
        		'total_price'=>$faker->numberBetween(40000,100000),
        		'status'=> '1',
        		'created_at'=> \Carbon\Carbon::now(),
        		'updated_at'=> \Carbon\Carbon::now()

        	]);
        }
    }
}
