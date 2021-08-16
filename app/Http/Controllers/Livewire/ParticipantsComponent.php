<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use PDF;  //download
use App\Participant;
use App\Incription;
use App\Profession;
use App\Curso; //cuando desee saber a cuantos cursos a participado.
use Auth;

//Desd Admin
class ParticipantsComponent extends Component
{
	
	use WithPagination;
	public $part_id, $cedula, $name, $last_name, $email, $phone, $NroWp, $profession_id;
	public $view; //$view='create'
	public $searchPart = '';
	public $part, $mensaje;
	public $InscCurs, $InscPart;
	public $No_acceso, $conf;

	
    

	protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {
		$cursos= Curso::all();
       return view('livewire.participants-component',compact('cursos'), [
		'parts'=> Participant::where(function($sub_query)
		{
			$sub_query->where('name','like', '%'.$this->searchPart.'%')
			->orWhere('last_name','like', '%'.$this->searchPart.'%');
			})->orderBy('id','desc')->paginate(10) 
		]);
		
		
	}

   public function pdf(){
    	$parts = Participant::all();


    	$pdf = PDF::loadView('livewire.participants-pdf',compact('parts'));
        return $pdf->setPaper('a4', 'landscape')->download('Download-pdf');
        // setPaper('a4', 'landscape') para pasar a horizontal
    }




	public function show($id){
		$part= Participant::find($id);
		$this->part_id	= $part->id; 
		$this->cedula = $part->cedula;
		$this->name = $part->name;
		$this->last_name = $part->last_name;  		
		$this->email = $part->email;
		$this->phone = $part->phone;
		$this->NroWp = $part->NroWp;		
		$this->show = true;
	} 


	public function create(){
		$this->clear();		
		$user_id = Auth::user()->id;
		$rol = Auth::user()->role;   
			foreach ($rol as $r) { //recorro la fila pivot del user
				$nivel = $r->pivot['nivel'];				
			}			
			if ($nivel == 1 || $nivel == 2){
				$this->view = 'create';	
			}else{
				$this->No_acceso = "No tiene permisos para agregar";
			}
							
	}


    public function verif(){ 

		   $part = Participant::where('cedula','=',$this->cedula)->first();
		   if ($part)  {
		   		$this->name = $part->name;
		   		$this->last_name = $part->last_name;			    
		   		$this->phone = $part->phone;
		   		$this->email = $part->email;
		   		$this->NroWp = $part->NroWp;
			
			    $this->edit($part->id);  
			    $this->view = 'edit';
			    //return back()->with('mensaje','Datos Registrados');
			    request () -> session () -> flash ('mensaje','Datos ya Registrados, ¡actualizar!');	
			} 			
	}
	  
	  
	  
    public function store() {
    	// $requestPart = new RequestStorePart();
    	// $this->validate($requestPart->rules(), $requestPart->messages());
		$this->validate(['cedula' => 'required|numeric','name'=>'required','last_name'=>'required','email' =>'required|email']); 
<<<<<<< HEAD
	
		            Route::get('/downloadpdf',[ComponentPdf::class,'downloadpdf']);
=======
>>>>>>> Tuto-Eloq
                               
		$part = Participant::create([
		'cedula' => $this->cedula,
		'name' => $this->name,	
		'last_name' => $this->last_name,
		 'email' => $this->email,
		'phone' => $this->phone,                                          
		'NroWp' => $this->NroWp		
		]);
		if(Auth::user()){
			$part->user_created = Auth::user()->id;
			$part->save();		
		}
		$this->emit('save');
		$this->clear();$this->clear2();$this->close();
		return back()->with('mensaje','Datos Registrados');			
	}
                                                                
     

	 
     
     
    public function edit($id){		
		$user_id = Auth::user()->id;		
		$rol = Auth::user()->role; 
			foreach ($rol as $r) { //recorro la fila pivot del user
				$nivel = $r->pivot['nivel'];							
			}					
			if ($nivel == 1 || $nivel == 2 || $nivel == 3 ){
				$part= Participant::find($id);
				$this->part_id	= $part->id; 
				$this->cedula = $part->cedula;
				$this->name = $part->name;
				$this->last_name = $part->last_name;  		
				$this->email = $part->email;
				$this->phone = $part->phone;
				$this->NroWp = $part->NroWp;		
				$this->view = 'edit';
			}else{
				$this->No_acceso = "No tiene permisos para editar";
			}
		 		$this->clear2();
	} 
	

	
	
	public function update(){
		$this->validate(['cedula' => 'required|numeric']);
		if($this->email){
			$this->validate(['email' => 'email']);
		}
		$part = Participant::find($this->part_id); 		
		$part->update([
			'cedula' => $this->cedula,
			'name' => $this->name,
			'last_name' => $this->last_name, 		
			'email' => $this->email,
			'phone' => $this->phone,
			'NroWp' => $this->NroWp,
		]); 
		if(Auth::user()){
			$part->user_updated = Auth::user()->id;
			$part->save();		
		}
		$this->update = true;
		$this->emit('save');
		$this->clear();$this->close();
		return back()->with('mensaje','Datos Actualizados');	
	}
	
     

	public function conf($id){
		$part = Participant::find($id);
	 	$this->part = $part;
	 	$this->part_id = $part->id;
	 	$part_insc = Incription::where('part_id',$id)->first();	
	 	//Permisos
		$user_id = Auth::user()->id;
		$rol = Auth::user()->role;   			
		foreach ($rol as $r) { //recorro la fila pivot del user
			$nivel = $r->pivot['nivel'];				
		}			
		if ($nivel == 1){	
			if ($part_insc){
				$this->conf = "¡se eliminaran tambien los datos de inscripcion de:"; 
			}else{
				$this->conf = "¡se elimimaran el registro de:"; 
			}	
		}else{
			$this->No_acceso = "No tiene permisos para eliminar";
		}
		// $this->emit('savecomment');
	}


   public function destroy($id){  		
		Participant::destroy($id);
		$this->close();
		// //return back()->with('mensaje','Datos Eliminados Coorectamente');
		request () -> session () -> flash ('alert','Datos Eliminado');	
			
	}












	public function close(){
		$this->view = '';
		$this->msjdest = '';
		$this->No_acceso = '';
		$this->conf = '';
		$this->part = '';

	}
	public function clear(){
		$this->cedula = '';
		$this->name = '';			
		$this->last_name = '';
		$this->email = '';
		$this->phone = '';
		$this->NroWp = '';
		$this->profession_id='';
	}
	public function clear2(){
		$this->No_acceso = '';
	}
     
    
    
    
}
