<?php

namespace App;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class IncriptionPago extends Model
{
	protected $table = 'pagos';
    protected $fillable = [ 'meth_pago', 'pago','incription_id', 'user_created', 'user_updated'];

 


}
