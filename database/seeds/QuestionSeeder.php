<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        DB::table('questions')->truncate();
    	

        DB::table('questions')->insert(
        	['question' => 'Nombre de mi mascota'],
       	);
       	DB::table('questions')->insert(
       		['question' => 'Mi deporte preferido'],
       	);
       	DB::table('questions')->insert(
       		['question' => 'Nombre de mi mejor maestro(a)'],
       	);
       	DB::table('questions')->insert(
       		['question' => 'Nombre de mi 1er colegio'],
       	);
       	DB::table('questions')->insert(
       		['question' => 'Mi mejor amigo(a) de la infancia'],
       	);
       	DB::table('questions')->insert(
       		['question' => 'Mi color preferido'],
       	);
       	DB::table('questions')->insert(
       		['question' => 'Nombre de mi 1era mascota'],
       	);  
        DB::table('questions')->insert(
          ['question' => 'Comida preferida'],
        );   
   		 DB::table('questions')->insert(
       		['question' => 'Mi programa de television favorito'],
       	);
    }
}
