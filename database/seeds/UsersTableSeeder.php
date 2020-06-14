<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Ta',
            'email' => 'ta@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->where('id',1)->update(['name'=>'Anh']);

        // DB::table('users')->where('id',10)->delete();
        for ($i=1; $i < 10; $i++) { 
        	DB::table('users')->insert([
        		'name'=> 'admin'.$i,
        		'email'=>'admin'.$i.'@gmail.com',
        		'password'=>'admin'.$i

        	]);
        }
    }
}
