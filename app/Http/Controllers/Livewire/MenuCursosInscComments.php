<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Curso;
use App\Participant;
use App\Incription;
use App\Pago;
use App\Comment;
use Auth;



class MenuCursosInscComments extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	//public $cedula, $name;
	
	public $curso, $curso_id, $view_insc, $viewcomment, $show;
	public $pagar, $contac; //insc
	public $title, $img, $description, $duration;
	public $cedula, $name, $last_name, $email, $telef, $NroWp, $meth_pago, $pago; //
	public $comments, $comment,$emailCom, $nameCom;
	public $shearCurs = '';

	public $inscs;


    public function updatingSearch()
    {
        $this->resetPage();
    }


	public function mount(){
		$comments=Comment::all();
		$this->comments=$comments;

		// $inscs = Curso::withCount(['inscs'])->get();
		// $this->inscs = $inscs;

	}

    public function render()
    {    
		return view('livewire.menu-cursos-insc-comments',[
          'cursos'=>Curso::withCount(['inscs'])->where(function($sub_query)
		{
			$sub_query->where('title','like', '%'.$this->shearCurs.'%');
			})->published()->orderBy('id','desc')->paginate(3) 
		]);

		// return view('livewire.menu-cursos-inscripcion',[
  		//     'cursos'=>Curso::where('statud', '=', 1)->orderBy('id','desc')->simplepaginate(4) 
		// ]);
    }
    
    public function insc($id){
		$curso = Curso::find($id);		
		$this->view_insc = true;
		$this->curso = $curso;
		$this->curso_id = $curso->id;			
	}

	// public function pagar(){
	// 	$this->validate([
	// 		'cedula' => 'required|max:10',
	// 		'name' => 'required',
	// 		'last_name' => 'required'
	// 	 ]);
	//     //$this->pagar =  true;

	//      // $this->contac =  true;
	// 	}
 	// public function contac(){
 	// 		$this->validate([
		// 	'meth_pago' => 'required',
		// 	'pago' => 'required'
		//  ]);
	 //    $this->contac =  true;
 	// }

 	public function show($id){
 		$curso = Curso::find($id);
 		$this->curso = $curso;
 		$this->img = $curso->img;
 		$this->title = $curso->title;
 		$this->description = $curso->description;
 		$this->duration = $curso->duration;	
 	}














	public function verif(){ 
	    $part = Participant::where('cedula','=',$this->cedula)->first();
		if ($part)  {
			$this->name = $part->name;
			$this->last_name = $part->last_name;			    
			$this->telef = $part->telef;
			$this->email = $part->email;
			$this->NroWp = $part->NroWp;
		    return back()->with('alert','Datos ya Registrados');
		} 			
	}



	public function saveinsc(){
	// $this->curso_id;//$this->curso_id'';
		
		$this->validate([
		 'cedula' => 'required|max:10',
			'name' => 'required',
			'last_name' => 'required',
			// 'meth_pago' => 'required',
			// 'pago' => 'required',
			'email' => 'required|email'
		  ]);
		$part = Participant::where('cedula','=',$this->cedula)->first();
		if ($part){
			if(Auth::user()){
		 		$part->user_updated = Auth::user()->id;
		 		//$part->save();
			}
			$part->name = $this->name;
			$part->last_name = $this->last_name;	
			$part->email = $this->email;
			$part->phone = $this->telef;                                          
			$part->NroWp = $this->NroWp;
			$part->save();	
		
		}else {
		 	$part = Participant::create([
			'cedula' => $this->cedula,
			'name' => $this->name,	
			'last_name' => $this->last_name,
			'email' => $this->email,
			'phone' => $this->telef,                                          
			'NroWp' => $this->NroWp		
			]);
			if(Auth::user()){
				$part->user_created = Auth::user()->id;
				$part->save();		
			}				
		}

		$Buscpart = Participant::where('cedula','=',$this->cedula)->first(); //vuelve a buscar 
		// //$this->part= $Buscpart->id; 
		$CursoPartInsc = Incription::where('curso_id','=',$this->curso_id)
	 					->where('part_id','=',$Buscpart->id)->first(); 
		if ($CursoPartInsc){
			return back()->with('mensaje','Ya se encuentra adscrito en este curso, contactanos para mas informacion');
		}else{   
			$insc = Incription::create([ 
				'part_id' => $Buscpart->id,		
				'curso_id' => $this->curso_id,
				'conf' => 0, //1 para pruebas
			 ]);
			if(Auth::user()){
				$insc->user_created = Auth::user()->id;
				$insc->save();		
		 	}
		
		
			// $pago = Pago::create([
			// 'incription_id' => $insc->id,
			// 'meth_pago' => $this->meth_pago,
			// 'pago' => $this->pago 		
			// ]);



			 //RELACION CON ELOQUENT de pagos desabilitados pendiente x habilitar en pasarela de pagos
			 // $pago = $insc->pago()->create([
				// 'incription_id' => $insc->id,
				// 'meth_pago' => $this->meth_pago,
				// 'pago' => $this->pago 		
				// ]);
			// if(Auth::user()){
			// 	$pago->user_created = Auth::user()->id;
			// 	$pago->save();		
			// }


			$this->default();
			$this->view_insc = '';
		}
		if($insc) {
			return back()->with('mensaje','Ya te has registrado, pronto le sera notificada su confirmacion e inicio del curso');
		}else{

			$this->insc();
			request () -> session () -> flash ('alert','Verifique su informacion, e intente de nuevo');	
			//return flash()->with('error','Verifique su informacion, e intente de nuevo');
		}
				
	}











	
 	public function comment($id){
 		$this->clear();
 		$this->viewcomment = $id;
  		$curso = Curso::find($id);
  		$this->curso_id = $curso->id;
 		//$this->viewcomment = true; 		
 	}

 	public function savecomment(){
 		$this->validate([ 'nameCom' => 'required', 'emailCom' => 'required|email', 'comment' => 'required']);
 		$SaveCom = Comment::create([
		'name' => $this->nameCom,
		'email' => $this->emailCom,	
		'comment' => $this->comment,
		'curso_id' => $this->curso_id	
		]);
		$this->default();
		$this->emit('savecomment');
		$this->mount();
		session()->flash('comment', 'Nuevo comentario añadido...');			
 	}


	public function default(){
		$this->cedula = '';
		$this->name = '';
		$this->email = '';			
		$this->last_name = '';
		$this->id_curso = '';
		$this->Met_pago = '';
		$this->pago = '';
		$this->email = '';
		$this->telef = '';
		$this->NroWp = '';	
		$this->nameCom = '';
		$this->emailCom = '';
		$this->comment = '';

	}

	public function clear(){
		$this->name = '';
		$this->email = '';			
		$this->comment = '';
		$this->nameCom = '';
		$this->emailCom = '';
		$this->pagar = '';
		$this->contac = '';
	}

	public function close(){
		$this->view_insc = '';
		$this->viewcomment = '';		
		$this->pagar = '';
		$this->contac = '';
	}


    
    
}










