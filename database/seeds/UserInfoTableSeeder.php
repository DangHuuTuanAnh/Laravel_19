<?php

use Illuminate\Database\Seeder;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userinfo')->insert([
        	'user_id'=>'1',
        	'fullname'=>'tuan anh',
        	'address'=>'bac giang',
        	'phone'=>'01213232'
        ]);
    }
}
