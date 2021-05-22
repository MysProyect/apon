<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $table = 'messages';
   protected $fillable = ['name', 'last_name', 'email', 'asunto', 'phone', 'whatsapp','message','answered','send_date','response_date','user_response'];  
}
