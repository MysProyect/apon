<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incription extends Model
{


      protected $table = 'incriptions';
      protected $fillable = [ 'curso_id', 'part_id','conf','user_conf'];
      
   	
		public function pago()
		{
			return $this->hasOne(Pago::class);
		}

		public function part()
		{
			return $this->belongsTo(Participant::class);

		}




    	public function curso()
    	{
        	 return $this->belongsTo(Curso::class);
    	}


    	// public function scopePublished($query){
     //    	return $query->where('conf', 1);
    	// }

   		// public function publicd($query){
     //    	return $query->where('conf', 1);
    	// }
		
		// $users = Incription::where('conf', 1)->get();


 // public function update($id)
 //    {
 //      return $this->"updateee";

 //        // $this->post->save();
 //    }


}
