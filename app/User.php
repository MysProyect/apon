<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable implements MustVerifyEmail 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','username', 'email', 'password', 'profession_id', 'profile_id', 'email_verified_at','id_user_created','id_user_updated', 'statud'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthIdentifiel()
    {
        return $this->getKey(); //obtener el usuario
    }

    public function getAuthPassword()
    {
        return $this->password; //obtener solo password
    }

    public function getReminderEmail()
    {
        return $this->email; //obtener email
    }

    public function isAdmin(){
        return $this->email == 'developmentsoft2020@gmail.com';
    }

    // public function profile()
    // {
    //       return $this->belongsTo(Profile::class);
    // }


    public function profession()
    {
          return $this->belongsTo(Profession::class);
    }


    public function role(){ //para saber el nivel
        return $this->belongsToMany(Role::class,'role_user')
        ->withPivot('role_id','nivel');
    }




    
    
}
