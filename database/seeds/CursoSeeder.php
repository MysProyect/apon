<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Curso;
// use Illuminate\Support\Str;


class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('cursos')->truncate();

	    	$faker = Faker\Factory::create('es_ES');
	        
	        factory(Curso::class, 5)->create();
	}
}
