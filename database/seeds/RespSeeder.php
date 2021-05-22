<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Responsabl;

class RespSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
    	DB::table('responsabls')->truncate();

    	$faker = Faker\Factory::create('es_ES');
        
        factory(Responsabl::class, 15)->create();
    }
}
