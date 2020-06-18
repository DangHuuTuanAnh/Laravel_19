<?php

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
         for ($i=1; $i <= 20; $i++) { 
         	DB::table('products')->insert([
         		'name'=> 'sanpham' .$i,
         		'slug'=> 'san_pham_' .$i,
         		'origin_price'=> '1000' .$i,
         		'sale_price'=> $fake->numberBetween(10000,40000),
         		'discount_percent'=> '5' .$i,
         		'content'=> 'nội dung sản phẩm ' .$i,
         		'user_id'=> '0' .$i,
         		'category_id'=> '0' .$i,
         		'status'=> '0' .$i,
                'created_at'=> \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now()

         	]);
         }
    }
}
