<?php
//Desd Admin

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use PDF;  //download
use Illuminate\Support\Str;
use Illuminate\Support\Arr;



use App\Incription;
use App\Curso;
use App\Participant;
use Auth;


//Desd Admin
class InscriptionComp extends Component
{

	use WithPagination;

	public $title, $curso_id, $description, $duracion;
	public $ver, $valid;
	public $All_inscs, $parts, $insc_id=[], $Marc;
	public $CursSelec, $inscs, $busc, $Insc;
	public $refresh_inscs;

	protected $paginationTheme = 'bootstrap';


   public function render()
    {
     //    return view('livewire.inscription-comp',[
     //    	'cursos' => Curso::published()->withCount(['inscs'])->simplepaginate(10) 
    	// ]);
        return view('livewire.inscription-comp',[
  		    'cursos'=>Curso::withCount(['inscs'])->orderBy('id','desc')->paginate(15) 
		]);

    }

	  function mount(){
		$inscs = Incription::all();
    	$this->All_inscs = $inscs;


    	$parts = Participant::all();
    	$this->parts = $parts;	

  //   	$count_parts = Incription::withCount(['part_id'])->get();
		// $this->count_parts=$count_parts;	
	}
	  






  

    public function ConfIns($id) { //ver Inscritos/aspirantes
   
    	$CursSelec = Curso::find($id);
    	$this->CursSelec = $CursSelec;
    	$this->Insc = $CursSelec->inscs;

    	$this->valid = true;
    	$this->ver = '';
			
	}






	public function saveconf($id) { //Save confir 

		
		 $refresh_inscs = Incription::where('curso_id',$id)->get();
		  $this->refresh_inscs =  $refresh_inscs;
		 //$this->CursSelec=$id;
		 //CursSelec=$CursSelec;
		
		$cont_insc = Count($this->insc_id);
		// 	$this->CursSelec = $CursSelec;

    	// $this->insc=$this->insc_id;
      for($i=0; $i<$cont_insc; $i++){
         	//$this->confir = $this->insc_id[$i];	
		    $inscSelec = Incription::find($this->insc_id[$i]);
		   	$inscSelec->conf = 1;
			$inscSelec->save();	

		    if(Auth::user()){
			$inscSelec->user_conf = Auth::user()->id;
			$inscSelec->save();		
			}
			$id = $this->CursSelec->id;
  			$this->ConfIns($id);
    	//request () -> session () -> flash ('conf','confirmado');
  
    	}
    	
	}














	public function ConfSavePDF() {
		
	}




	
	public function ver($id){
			$this->ver = true;
 	 		$this->valid = '';
 	 		$CursSelec = Curso::find($id);
    		$this->CursSelec = $CursSelec;
    		//return back()->with('mensaje','Lista Actualizada');	
	} 

	 public function destroy($id){	 
		$insc= Incription::destroy($id); 
    	// return back()->with('conf','confirmado');	

    	request () -> session () -> flash ('alert','eliminado');
        //return  redirect ()->to( '/admin-inscription' );
        $id = $this->CursSelec->id;
  		$this->ConfIns($id);

	}

	public function default(){	

			$this->ver='';
			$this->valid ='';

	} 
	
    
    
    
    
    
    
    
    
    
    
    
    
}
