<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Message;

class CompContactanos extends Component
{

	public $contac, $write, $name, $lastname, $asunto, $email, $phone, $whatsapp, $message;
    

    public function render()
    {
        return view('livewire.comp-contactanos');
    }

    public function mount(){
    	$contac = Message::all();
    	$this->contac=$contac;

    }

    public function write(){
        $this->write = true;
    }


    public function enviar(){
    	$this->validate(['name' => 'required', 'asunto' => 'required','email' =>'required|email', 'message' => 'required']);                                        
		$mns = Message::create([
		'name' => $this->name,	
		'last_name' => $this->lastname,
        'email' => $this->email,
		'asunto' => $this->asunto,
		'phone' => $this->phone,           
        'whatsapp' => $this->whatsapp,
		'message' => $this->message,
        'send_date' => date('Y-m-d H:i:s')	
		]);


        $this->emit('save');

		$this->clear();
		return back()->with('mensaje','mensaje Enviado');

    }

    public function close(){
        $this->name= '';
        $this->lastname= '';
        $this->asunto= '';
        $this->email= '';
        $this->phone= '';
        $this->message= '';
    }

    public function clear(){
    	$this->name= '';
    	$this->lastname= '';
        $this->asunto= '';
    	$this->email= '';
    	$this->phone= '';
    	$this->message= '';
    }
}
