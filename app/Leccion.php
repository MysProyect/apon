<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    protected $table = 'leccions';
    protected $fillable = ['curso_id', 'leccion', 'texto', 'url','urlExt','visibility', 'user_created', 'user_updated'];


    // public function comments()
    // {
    //    return $this->hasManyThrough(Comment::class, Post::class);
    // }



    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function files()
	{
	   return $this->hasMany(FilesLeccion::class);
	}

    public function scopePublished($query)
    {
        return $query->where('visibility', 0);
    }



}
