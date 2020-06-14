<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0; $i < 20 ; $i++) { 
        	DB::table('categories')->insert([
        		['name'=>'tablet','slug'=>'tablet','parent_id'=>0,'depth'=>0,'created_at'=>'2020/06/14 10:00:00','updated_at'=>'2020/06/14 21:44:00'],
                ['name'=>'điện thoại','slug'=>'mobile','parent_id'=>0,'depth'=>0,'created_at'=>'2020/06/14 10:00:00','updated_at'=>'2020/06/14 21:44:00'],
                ['name'=>'phụ kiện','slug'=>'phu_kien','parent_id'=>0,'depth'=>0,'created_at'=>'2020/06/14 10:00:00','updated_at'=>'2020/06/14 21:44:00'],
                ['name'=>'sạc dự phòng','slug'=>'sac_du_phong','parent_id'=>0,'depth'=>1,'created_at'=>'2020/06/14 10:00:00','updated_at'=>'2020/06/14 21:44:00'],
                ['name'=>'tai nghe','slug'=>'tai_nghe','parent_id'=>0,'depth'=>1,'created_at'=>'2020/06/14 10:00:00','updated_at'=>'2020/06/14 21:44:00'],
                ['name'=>'đồng hồ thông minh','slug'=>'smart_watch','parent_id'=>0,'depth'=>1,'created_at'=>'2020/06/14 10:00:00','updated_at'=>'2020/06/14 21:44:00'],
                
        	]);
        // }
    }
}
