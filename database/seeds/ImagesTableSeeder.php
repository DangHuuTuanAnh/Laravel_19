<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 
        	DB::table('images')->insert([
        		'name'=> 'image_'.$i,
        		'path'=>$faker->imageUrl().$i,
        		'product_id'=>$faker->randomDigitNot(0),
        		'created_at'=>$faker->dateTime(),
        		'updated_at'=>$faker->dateTime()

        	]);
        }
    }
}
