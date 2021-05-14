<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
	    	DB::table('roles')->truncate(); 


       	DB::table('roles')->insert(
        	['name' => 'Administrador'],
       	);
        DB::table('roles')->insert(
        	['name' => 'Usuario con Privilegios'],
       	);

       	DB::table('roles')->insert(
       		['name' => 'Usuario Colaborador'],
       	);
       	DB::table('roles')->insert(
       		['name' => 'Usuario con recursos'],
       	);
    }
}
