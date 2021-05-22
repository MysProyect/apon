<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoResp extends Model
{
    protected $table = 'curso_resps';



    public function resps()
	{
		return $this->hasMany(Responsabl::class,'id','resp_id');
	}


	public function curs()      //traer curso de ese registro
	{
		return $this->hasMany(Curso::class,'id','curso_id');
	}

}
