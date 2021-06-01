<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('users')->truncate(); 


	    DB::table('users')->insert([
			'username' => 'admin',
            'name' => 'Rosa Virginia',
            'last_name' => 'Palma Bravo',
            'email' => 'developmentsoft2020@gmail.com',	
            'email_verified_at' => now(),							
		    'password' => Hash::make('123123123'),
            'statud' => 1,
            // 'remember_token' => Str::random(10),	
		]);

        DB::table('role_user')->truncate(); 
        DB::table('role_user')->insert([
                'user_id' => 1, 
                'role_id' => 1,
                'nivel' => 1                                
        ]);
        
        DB::table('question_users')->truncate(); 
        DB::table('question_users')->insert([
            'answer' => Hash::make('krisni'),
            'question_id' => 5,
            'user_id' => 1, 
        ]);
        DB::table('question_users')->insert([
            'answer' => Hash::make('verde'),
            'question_id' => 6,
            'user_id' => 1, 
        ]);














    }
}
