<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Facades\DB;
use App\Participant;

class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create('es_ES');
        
    	DB::table('participants')->truncate();
        
       factory(Participant::class, 15)->create();
    }
}
