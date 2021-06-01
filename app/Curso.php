<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
     protected $table = 'cursos';
     protected $fillable = ['title', 'description', 'user_created', 'user_updated', 'duration', 'img', 'cant_resps', 'statud'];

    // protected $attributes = [
    //     'title' => false,
    // ];

    // protected $dateFormat = '12-03-2021';
     // formato para fechas
     // const CREATED_AT = 'creation_date';
     // const UPDATED_AT = 'updated_date';

  
    public function inscs()
    {
         return $this->hasMany(Incription::class);
    }

    // public function aulas()
    // {
    //     return $this->hasMany(UserAulas::class);
    // }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function resps()
    {
        return $this->hasMany(CursoResp::class, 'resp_id');
    }

    public function scopePublished($query){
        return $query->where('statud', 1);
    }






    public function leccions()
    {
        return $this->hasMany(Leccion::class);
    }


   public function aulas() //toll aulas del mismo curso
    {
        return $this->hasMany(UserAulas::class);
    }


 




    //POR VALIDAR
    
    // public function parts()
    // {
    //     return $this->hasManyThrough(Participant::class, Incription::class, 'part_id');
    // }


}
