<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Message;
use App\Mail\ContactanosMaillable;
use Illuminate\Support\Facades\Mail;
use Auth;
//use Mail;

class AdmMensaj extends Component
{
	use WithPagination;

	public $message, $search;
	public $msj, $show, $answer;
    public $data, $email, $name, $msj_id, $answered;
   
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.adm-mensaj');

        return view('livewire.adm-mensaj', [
        'mensajs'=> Message::where(function($sub_query)
        {
            $sub_query->where('name','like', '%'.$this->search.'%')
            ->orWhere('last_name','like', '%'.$this->search.'%')->orWhere('asunto','like', '%'.$this->search.'%');
            })->orderBy('id','asc')->paginate(15) 
        ]);
    }


    // public function mount(){
    // 	$mensajs = Message::all();
    // 	$this->mensajs = $mensajs;
    // }

    public function show($id){
    	$msj = Message::find($id);
    	$this->msj = $msj;
        $this->msj_id = $msj->id;
        $this->name = $msj->name;
        $this->email = $msj->email;
        $this->answered = $msj->answered;
        $this->message = '';
    	$this->show = true;
        $this->answer = true;
    }

    // public function answer($id){
    //     $msj = Message::find($id);
    //     $this->msj = $msj;
    //     $this->show = true;
    //     $this->email = email;
    // }

    public function send()
    {

     //     $this->validate($this, [
     //  'name'     =>  'required',
     //  'email'  =>  'required|email',
     //  'message' =>  'required'
     // ]);
    $data = array(
        'name'      =>  $this->name,
        'message'   =>   $this->message
    );
    $email = $this->email;
    $send = Mail::to($email)->send(new ContactanosMaillable($data));
    $this->send=$send;
        $save = Message::find($this->msj_id);
        $save->answered = 1;
        $save->response_date = date('Y-m-d H:i:s');
        $save->user_response = Auth::user()->id;
        $save->save();        
        $this->show = '';
        $this->answer = '';
        $this->message = '';
        request () -> session () -> flash ('mensaje','ha respondido el mensaje');       
    }






    public function clear(){
        $this->message = '';
    }

    public function salir(){
        $this->show = '';
        $this->answer = '';
        $this->msj = '';
        $this->message = '';
    }


}
