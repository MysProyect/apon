<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
           
        //$this->call(UserSeeder::class); una x una
    $this->call([ //todas en un array
        ProfessionTableSeeder::class,
        RolesTableSeeder::class,
        RespSeeder::class,
        UserSeeder::class,
        ParticipantsSeeder::class,
        CursoSeeder::class,
        QuestionSeeder::class,
    ]); 
    

   //$this->call(ResponsablsSeeder::class); 
    



    DB::table('incriptions')->truncate(); 
        DB::table('incriptions')->insert([
                'curso_id' => rand(1,5), 
                'part_id' => rand(1,15),
                'conf' => rand(0,1)
        ]);
        DB::table('incriptions')->insert([
                'curso_id' => rand(1,5), 
                'part_id' => rand(1,15),
                'conf' => rand(0,1)
        ]);
        DB::table('incriptions')->insert([
                'curso_id' => rand(1,5), 
                'part_id' => rand(1,15),
                'conf' => rand(0,1)
        ]);
        DB::table('incriptions')->insert([
                'curso_id' => rand(1,5), 
                'part_id' => rand(1,15),
                'conf' => rand(0,1)
        ]);
    //ejecutar seeder una sola vez de lo contrario descom linea e ingresar registros manualmente
    DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    


     

    }


}
