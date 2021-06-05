<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
	
     public $timestamps = FALSE;
    //protected $table = 'professions';
    protected $fillable = ['name','abrev'];

    public function parts() 
    {
        return $this->hasMany(Participant::class);
    }


    public function resps() 
    {
        return $this->hasMany(Responsabl::class);
    }

    public function users() 
    {
        return $this->hasMany(User::class);
    }

    // otra funcion importante de recordar ->withTimestamps(); para marcas de tiempo en las relaciones

}
