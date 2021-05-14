<?php
namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Responsabl;
use App\Profession;
use App\Incription;
use App\CursoResp;
use App\Curso; //cuando desee saber a cuantos cursos as sido responsables.
use Auth;
 
//Desd Admin   
class ResponsablsComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	
	public $resp_id, $cedula, $name, $last_name, $email, $phone, $NroWp, $profession_id='';
	public $view, $update;
	public $searchResp = '';
	public $resp, $mensaje;
	public $professions;
	public $No_acceso, $conf;

	public function updatingSearch()
    {
        $this->resetPage();
    }

    
	function mount(){
		$professions=Profession::all();
			$this->professions=$professions;
			
	}


    public function render()
    {
    	
		 //$profiles=Profession:all();
    	$cursos= Curso::all();
		return view('livewire.responsabls-component',compact('cursos'),[			
			'resps'=> Responsabl::where(function($sub_query)
			{
			$sub_query->where('name','like', '%'.$this->searchResp.'%')
				->orWhere('last_name','like', '%'.$this->searchResp.'%');
				})->orderBy('id','desc')->paginate(10) 
		]);
     }
    
      public function show($id){
		$resp= Responsabl::find($id);
		$this->resp_id	= $resp->id; 
		$this->cedula = $resp->cedula;
		$this->name = $resp->name;
		$this->last_name = $resp->last_name;  		
		$this->email = $resp->email;
		$this->phone = $resp->phone;
		$this->NroWp = $resp->NroWp;		
		$this->show = true;
	} 
	 
		public function create(){
		
		$user_id = Auth::user()->id;
		$rol = Auth::user()->role;   
			foreach ($rol as $r) { //recorro la fila pivot del user
				$nivel = $r->pivot['nivel'];				
			}			
			if ($nivel == 1 || $nivel == 2 ){
				$this->view = 'create';	
			}else{
				$this->No_acceso = "No tiene permisos para agregar";
			}
							
	}

    public function verif(){    		  
	   $resp = Responsabl::where('cedula','=',$this->cedula)->first();
	   if ($resp)  {
		    $this->edit($resp->id);  
		    $this->view = 'edit';
		    return back()->with('mensaje','Datos Registrados');	
		    $this->update = true;
		}
			
	}
     
     public function store() {
		$this->validate(['cedula' => 'required|numeric']);
		 if ($this->email){
			  $this->validate([ 'email' => 'email']);  			 
			}	
		$resp = Responsabl::create([
		'cedula' => $this->cedula,
		'name' => $this->name,	
		'last_name' => $this->last_name,
		'email' => $this->email,
		'phone' => $this->phone,
		'NroWp' => $this->NroWp,
		'profession_id' => $this->profession_id,
		'user_created' => Auth::user()->id
		]); 

		if(Auth::user()){
			$resp->user_created = Auth::user()->id;
			$resp->save();		
		} 		 
			//vaciar los campos
			//$this->cedula = '';
			//$this->name= '';
			//$this->last_name= '';
		$this->close();
		return back()->with('mensaje','Datos Registrados');	
			
	}
     
     
    public function edit($id){
    	$user_id = Auth::user()->id;
		$rol = Auth::user()->role;   
			foreach ($rol as $r) { //recorro la fila pivot del user
				$rol_id = $r->id;
				$nivel = $r->pivot['nivel'];				
			}			
			if ($nivel == 1 || $nivel == 2 || $nivel == 3){
				$resp= Responsabl::find($id); 
				$this->resp_id	= $resp->id;
				$this->profession_id	= $resp->profession_id;
				$this->cedula = $resp->cedula;
				$this->name = $resp->name;
				$this->last_name = $resp->last_name;
				$this->email = $resp->email;
				$this->phone = $resp->phone;
				$this->NroWp = $resp->NroWp;
				$this->view = 'edit';	
			}else{
				$this->No_acceso = "No tiene permisos para editar";
			}
			$this->clear2();
		 		
		
	} 
	
	public function update(){
		$this->validate(['cedula' => 'required|numeric|unique']);
		 if ($this->email){
		  $this->validate([ 'email' => 'email']);  			 
		  }
		$resp = Responsabl::find($this->resp_id); 	
		
		$resp->update([
			'cedula' => $this->cedula,
			'name' => $this->name,
			'last_name' => $this->last_name,
			'email' => $this->email,
			'phone' => $this->phone,
			'NroWp' => $this->NroWp,
			'profession_id' => $this->profession_id,
			'user_updated' => Auth::user()->id
		]);


		if(Auth::user()){
			$resp->user_created = Auth::user()->id;
			$resp->save();		
		} 
		$this->close(); 
		return back()->with('mensaje','Datos Actualizados');	
	}
	
  public $rol, $resp_curs;   

	public function conf($id){
		$this->conf = '';
		$resp = Responsabl::find($id);
	 	$this->resp_id = $resp->id;
	 	$this->resp = $resp;
		$resp_curs = CursoResp::where('resp_id',$id)->get();	
		$this->resp_curs = $resp_curs;
	  	//Permisos
		$user_id = Auth::user()->id;
		$rol = Auth::user()->role;   	
			
		//$this->resp = $resp;
		foreach ($rol as $r) { //recorro la fila pivot del user
			$nivel = $r->pivot['nivel'];								
		}			
		if ($nivel == 1){	
		 	if ($resp_curs){
		 		$this->conf = "¡con 'esta accion', se emininaran tambien los datos relacionados con los cursos que ha dictado o fue responsable!"; 
		 	}
		}else{
		 	$this->No_acceso = "No tiene permisos para eliminar";
		}	
		// // $this->emit('savecomment');
	}


   public function destroy($id){  	
		Responsabl::destroy($id);
		$this->close();
		// //return back()->with('mensaje','Datos Eliminados Coorectamente');
		request () -> session () -> flash ('alert','Datos Eliminado');	
			
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

	public function close(){
		$this->conf = '';
		$this->resp_id = '';
		$this->resp = '';
		$this->view = '';
	}
	

    
}
